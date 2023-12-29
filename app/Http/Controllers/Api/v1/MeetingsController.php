<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Http\Requests\Meeting\CreateMeetingRequest;
use App\Http\Requests\Meeting\UpdateMeetingRequest;
use App\Facades\Meeting as FacadesMeeting;
use App\Events\MeetingCreated;
use App\Http\Resources\Meeting\MinifiedMeetingResource;
use App\Http\Resources\Comment\MinifiedCommentResource;
use App\Models\Lector;
use App\Models\Theme;
use App\Services\MeetingService;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\map;

class MeetingsController extends Controller
{
    public function index()
    {
        $unmarkedMeetings = Meeting::query()->orderBy('date', 'desc')->get();
        $markedMeetings = FacadesMeeting::markedMeetings($unmarkedMeetings);
        return view('meeting.meetings', ['meetings' => $markedMeetings]);
    }

    public function create()
    {
        $themes = Theme::all();
        return view('meeting.meeting_create', ['themes' => $themes]);
    }

    public function store(CreateMeetingRequest $request)
    {
        // dd($request->validated());
        $meeting = FacadesMeeting::createMeeting($request->validated(), $request->uploads);
        $emails = FacadesMeeting::searchFollowers($meeting);
        event(new MeetingCreated($meeting, $emails));
        return redirect()->route('meeting.lector');
    }

    public function show(Meeting $meeting)
    {
        return view('meeting.meeting_info', ['meeting' => $meeting]);
    }

    public function updateList()
    {
        $lector = Lector::query()->where('email', auth()->user()->email)->first();
        $meetings = Meeting::query()->where('lector_id', $lector->id)->get();
        return view('meeting.lectors_meeting', ['meetings' => $meetings]);
    }

    public function change(Meeting $meeting)
    {
        $themes = Theme::all();
        $filesRef = FacadesMeeting::meetingRefs($meeting);
        return view('meeting.meeting_update', ['meeting' => $meeting,
         'themes' => $themes,
        'files' => $filesRef]);
    }
    public function update(UpdateMeetingRequest $request, Meeting $meeting)
    {
        FacadesMeeting::updateMeeting($request->validated(), $meeting, $request->uploads);
        return redirect()->back();
    }

    public function destroy(Meeting $meeting)
    {
        if(Storage::exists('public/' . $meeting->id)){
            Storage::deleteDirectory('public/' . $meeting->id);
        }
        $meeting->delete();
        return redirect()->route('meeting.lector');
    }

    public function deleteFile(Meeting $meeting, string $filename)
    {
        if(Storage::exists('public/' . $meeting->id . '/' . $filename)){
            Storage::disk('public')->delete('public/' . $meeting->id . '/' . $filename);
        }
        return redirect()->back();
    }

    public function makeAppointment(Meeting $meeting)
    {
        // dd($meeting);
        FacadesMeeting::signUp($meeting);
        return redirect()->route('meeting.index');
    }

    public function unsubscribeUser(Meeting $meeting)
    {
        FacadesMeeting::unsubscribe($meeting);
        return redirect()->back();
    }


    public function getComments(Meeting $meeting)
    {
        return MinifiedCommentResource::collection($meeting->comments);
    }

    public function meetingUsers()
    {
        $unmarkedMeetings = auth()->user()->meetings;
        $markedMeetings = FacadesMeeting::markedMeetings($unmarkedMeetings);
        return view('meeting.users_meeting', ['meetings' => $markedMeetings]);
    }
}
