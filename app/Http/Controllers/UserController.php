<?php

namespace App\Http\Controllers;

use App\Services\UserAchievementServices;
use App\Services\UserAudienceServices;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    protected $userServices;
    protected $userAchievementervices;
    protected $userAudienceServices;
    public function __construct(
        UserServices $userServices,
        UserAchievementServices $userAchievementervices,
        UserAudienceServices $userAudienceServices) {
        parent::__construct();
        $this->userServices = $userServices;
        $this->userAchievementervices = $userAchievementervices;
        $this->userAudienceServices = $userAudienceServices;
    }
    public function repository()
    {
        return UserServices::class;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'image' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'phone_country_code' => 'nullable|string|max:4',
            'birthday' => 'nullable|date',
            'email_verified_at' => 'nullable|date',
            'terms_accepted' => 'required|boolean',
            'role_id' => 'required|exists:role,id',
            'main_goal_id' => 'required|exists:main_goal,id',
            'language_id' => 'required|exists:language,id',
            'password' => 'required|string|min:4',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = $this->userServices->create($validatedData);

        return response()->json($user, 201);
    }

    public function getAllAchievementForUser(Request $request, $user_id){
        return response()->json([
            'data' => $this->userAchievementervices->where(['user_id' => $user_id])
        ]);
    }

    public function destroyAchievement(Request $request, $id){
        return response()->json([
            'data' => $this->userAchievementervices->delete($id, null)
        ]);
    }

    public function destroyAllAchievementForUser(Request $request, $user_id){
        return response()->json([
            'data' => $this->userAchievementervices->deleteByColumn(['user_id' => $user_id])
        ]);
    }

    public function userAchievementStore(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'achievement_id' => 'required|exists:achievement,id',
        ]);

        $userAchievement = $this->userAchievementervices->create($validatedData);

        return response()->json($userAchievement, 201);
    }

    public function getAllAudienceForUser(Request $request, $user_id){
        return response()->json([
            'data' => $this->userAudienceServices->where(['user_id' => $user_id])
        ]);
    }

    public function destroyAudience(Request $request, $id){
        return response()->json([
            'data' => $this->userAudienceServices->delete($id, null)
        ]);
    }

    public function destroyAllAudienceForUser(Request $request, $user_id){
        return response()->json([
            'data' => $this->userAudienceServices->deleteByColumn(['user_id' => $user_id])
        ]);
    }

    public function userAudienceStore(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'audience_id' => 'required|exists:audience,id',
        ]);

        $userAudience = $this->userAudienceServices->create($validatedData);

        return response()->json($userAudience, 201);
    }

}
