<?php

namespace App\Services;

use App\Models\Meeting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class MeetingService
{

    public function searchFollowers(Meeting $meeting): array
    {
        $followersEmail = [];
        $users = User::all();
        foreach($users as $user){
            $meetings = $user->meetings()->where('theme_id', $meeting->theme_id)->get();
            if(count($meetings) >= 2) {
                $followersEmail[] = $user->email;
            }
        }
        return $followersEmail;
    }


    public function signUp($meeting)
    {
        $meeting->users()->attach(auth()->user()->id);
    }
}
