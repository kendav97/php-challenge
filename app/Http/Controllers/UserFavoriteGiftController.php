<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserFavoriteGift;

class UserFavoriteGiftController extends Controller
{
    public function getAll()
    {
        return response()->json(UserFavoriteGift::all(), 200);
    }

    public function save(Request $request, int $user_id)
    {
        $data = $request->validate([
            'gift_id' => 'required',
            'alias' => 'required',
        ]);
        
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(['status' => 400, 'message' => 'Validation error: the user id is invalid'], 400);
        }

        UserFavoriteGift::create([
            'gift_id' => $data['gift_id'],
            'alias' => $data['alias'],
            'user_id' => $user_id,
        ]);

        return response()->json(['status' => 200, 'message' => 'OK'], 200);
    }
}
