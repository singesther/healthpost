<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $member = member::all();

        return view('welcome', compact('member'));
    }

    public function updateStatus(Request $request)
    {
        $member = User::findOrFail($request->user_id);
        $member->status = $request->status;
        $member->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }
}
