<?php

namespace App\Http\Controllers;

use App\Services\UserAchievementServices;
use App\Services\UserAudienceServices;
use App\Services\UserServices;
use Illuminate\Http\Request;

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
            'role_id' => 'required|exists:roles,id',
            'main_goal_id' => 'required|exists:main_goals,id',
            'language_id' => 'required|exists:languages,id',
            'password' => 'required|string|min:8',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = $this->userServices->create($validatedData);

        return response()->json($user, 201);
    }

    public function userAchievementStore(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'achievement_id' => 'required|exists:achievements,id',
        ]);

        $userAchievement = $this->userAchievementervices->create($validatedData);

        return response()->json($userAchievement, 201);
    }

    public function userAudienceStore(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'audience_id' => 'required|exists:audiences,id',
        ]);

        $userAudience = $this->userAudienceServices->create($validatedData);

        return response()->json($userAudience, 201);
    }

}
