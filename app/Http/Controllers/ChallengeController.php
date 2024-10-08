<?php

namespace App\Http\Controllers;

use App\Services\ChallengeJudgeServices;
use App\Services\ChallengeParticipantsServices;
use App\Services\ChallengeServices;
use Illuminate\Http\Request;

class ChallengeController extends BaseController
{
    protected $challengeServices;
    protected $challengeJudgeServices;
    protected $challengeParticipantsServices;
    public function __construct(
        ChallengeServices $challengeServices,
        ChallengeJudgeServices $challengeJudgeServices,
        ChallengeParticipantsServices $challengeParticipantsServices) {
        parent::__construct();
        $this->challengeServices = $challengeServices;
        $this->challengeJudgeServices = $challengeJudgeServices;
        $this->challengeParticipantsServices = $challengeParticipantsServices;
    }
    public function repository()
    {
        return ChallengeServices::class;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'difficulty' => 'required|string|in:low,medium,high',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'user_id' => 'required|exists:users,id',
        ]);

        $challenge = $this->challengeServices->create($validatedData);

        return response()->json($challenge, 201);
    }

    public function getAllJudgesForChallenge(Request $request, $user_id){
        return response()->json([
            'data' => $this->challengeJudgeServices->where(['challenge_id' => $user_id])
        ]);
    }

    public function challengeJudgeStore(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'challenge_id' => 'required|exists:challenge,id',
        ]);

        $challengeJudge = $this->challengeJudgeServices->create($validatedData);

        return response()->json($challengeJudge, 201);
    }

    public function removeJudge(Request $request, $id){
        return response()->json([
            'data' => $this->challengeJudgeServices->delete($id, null)
        ]);
    }

    public function destroyAllJudgeForChallenge(Request $request, $user_id){
        return response()->json([
            'data' => $this->challengeJudgeServices->deleteByColumn(['challenge_id' => $user_id])
        ]);
    }

    public function getAllParticipantsForChallenge(Request $request, $user_id){
        return response()->json([
            'data' => $this->challengeParticipantsServices->where(['challenge_id' => $user_id])
        ]);
    }

    public function challengeParticipantsStore(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'challenge_id' => 'required|exists:challenge,id',
        ]);

        $challengeParticipant = $this->challengeParticipantsServices->create($validatedData);

        return response()->json($challengeParticipant, 201);
    }

    public function removeParticipant(Request $request, $id){
        return response()->json([
            'data' => $this->challengeParticipantsServices->delete($id, null)
        ]);
    }

    public function destroyAllParticipantForChallenge(Request $request, $user_id){
        return response()->json([
            'data' => $this->challengeParticipantsServices->deleteByColumn(['challenge_id' => $user_id])
        ]);
    }


}
