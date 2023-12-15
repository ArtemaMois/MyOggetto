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
use App\Services\MeetingService;

class MeetingsController extends Controller
{
    public function index()
    {
        $meetings = Meeting::query()->orderBy('date', 'desc')->get();
        return view('meeting.meetings', ['meetings' => $meetings]);
    }

    public function create(CreateMeetingRequest $request)
    {
        $meeting = Meeting::query()->create($request->validated());
        $emails = FacadesMeeting::searchFollowers($meeting);
        event(new MeetingCreated($meeting, $emails));
        return responseOk();
    }

    public function show(Meeting $meeting)
    {
        return view('meeting.meeting_info', ['meeting' => $meeting]);
    }
    public function update(UpdateMeetingRequest $request, Meeting $meeting)
    {
        $meeting->update($request->validated());
        return new MinifiedMeetingResource($meeting);
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return responseOk();
    }

    public function makeAppointment(Meeting $meeting)
    {
        // dd($meeting);
        FacadesMeeting::signUp($meeting);
        return redirect()->route('meeting.index');
    }

    public function getComments(Meeting $meeting)
    {
        return MinifiedCommentResource::collection($meeting->comments);
    }
}
