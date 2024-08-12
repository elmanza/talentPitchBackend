<?php

namespace App\Http\Controllers;

use App\Services\VideoChallengeRateServices;
use App\Services\VideoChallengeServices;
use App\Services\VideoLikesServices;
use App\Services\VideoServices;
use Illuminate\Http\Request;

class VideoController extends BaseController
{
    protected $videoServices;
    protected $videoLikesServices;
    protected $videoChallengeRateServices;
    protected $videoChallengeServices;
    public function __construct(
        VideoServices $videoServices,
        VideoLikesServices $videoLikesServices,
        VideoChallengeRateServices $videoChallengeRateServices,
        VideoChallengeServices $videoChallengeServices) {
        parent::__construct();
        $this->videoServices = $videoServices;
        $this->videoLikesServices = $videoLikesServices;
        $this->videoChallengeRateServices = $videoChallengeRateServices;
        $this->videoChallengeServices = $videoChallengeServices;
    }
    public function repository()
    {
        return VideoServices::class;
    }

    public function getByUser(Request $request, $user_id){
        return response()->json([
            "data" => $this->videoServices->allByUser($user_id)
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'url' => 'required|string|max:255',
            'is_pitch' => 'boolean',
            'likes' => 'integer|min:0',
            'user_id' => 'required|exists:users,id',
        ]);

        $video = $this->videoServices->create($validatedData);

        return response()->json($video, 201);
    }

    public function videoLikesStore(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'video_id' => 'required|exists:video,id',
        ]);

        $videoLike = $this->videoLikesServices->create($validatedData);

        return response()->json($videoLike, 201);
    }

    public function videoChallengeRateStore(Request $request)
    {
        $validatedData = $request->validate([
            'video_challenge_id' => 'required|exists:video_challenge,id',
            'challenge_judge_id' => 'required|exists:challenge_judge,id',
            'rate' => 'integer|min:1',
        ]);

        $videoChallengeRate = $this->videoChallengeRateServices->create($validatedData);

        return response()->json($videoChallengeRate, 201);
    }

    public function videoChallengeStore(Request $request)
    {
        $validatedData = $request->validate([
            'video_id' => 'required|exists:video,id',
            'challenge_id' => 'required|exists:challenge,id',
        ]);

        $videoChallenge = $this->videoChallengeServices->create($validatedData);

        return response()->json($videoChallenge, 201);
    }

    public function updateVideoChallengeRate(Request $request, $id)
    {
        $videoChallengeRate = $this->videoChallengeRateServices->update($request->input(), $id);
        return response()->json($videoChallengeRate, 201);
    }


}
