<?php

namespace App\Services;

use App\Models\Lector;
use App\Models\Meeting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Storage;
use Nette\Iterators\Mapper;
use PhpParser\Node\Expr\Cast\Array_;

class MeetingService
{

    //создание конференции
    public function createMeeting($request, $files): Meeting
    {

        $data = $request;
        unset($data['uploads']);
        $data['lector_id'] = Lector::query()->where('email', auth()->user()->email)->first()->id;
        $meeting = Meeting::query()->create($data);
        if (is_dir('storage/public')) {
            mkdir('storage/public/' . $meeting->id);
            foreach ($files as $file) {
                // dd($file);
                $path = $file->storeAs('/public/' . $meeting->id, $file->getClientOriginalName());
            }
        } else {
            mkdir('storage/public/' . $meeting->id);
            foreach ($files as $file) {
                $file->storeAs('/public/' . $meeting->id, $file->getClientOriginalName());
            }
        }
        return $meeting;
    }

    public function updateMeeting($request, Meeting $meeting, $files)
    {
        $data = $request;
        unset($data['uploads']);
        $meeting->update($data);
        if ($files) {
            foreach ($files as $file) {
                // dd($file);
                $file->storeAs('/public/' . $meeting->id, $file->getClientOriginalName());
            }
        }
    }

    public function meetingRefs(Meeting $meeting): array
    {
        $files = Storage::allFiles('public/' . $meeting->id);
        $filesRef = [];
        foreach ($files as $file) {
            $str = explode('/', $file);
            $fileName = $str[2];
            $filesRef[$fileName] = Storage::url($file);
        }
        return $filesRef;
    }

    //Отправка уведомлений на почту
    public function searchFollowers(Meeting $meeting): array
    {
        $followersEmail = [];
        $users = User::all();
        foreach ($users as $user) {
            $meetings = $user->meetings()->where('theme_id', $meeting->theme_id)->get();
            if (count($meetings) >= 2) {
                $followersEmail[] = $user->email;
            }
        }
        return $followersEmail;
    }


    //Подписка на конференцию
    public function signUp($meeting)
    {
        $meeting->users()->attach(auth()->user()->id);
    }


    //Описка от конференции
    public function unsubscribe($meeting)
    {
        $meeting->users()->detach(auth()->user()->id);
    }


    //Проходит по коллекции конференций и добавляет атрибут(sign) для конференций пользователя
    public function markedMeetings(Collection $meetings): Collection
    {
        if (auth()->user()) {
            $userMeetings = auth()->user()->meetings;
            foreach ($meetings as $meeting) {
                if ($userMeetings->contains($meeting)) {
                    $meeting->setAttribute('sign', true);
                } else {
                    $meeting->setAttribute('sign', false);
                }
            }
        }
        return $meetings;
    }
}
