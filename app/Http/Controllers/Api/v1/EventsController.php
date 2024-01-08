<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\Event\CreateEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Http\Resources\Event\MinifiedEventResource;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::query()->orderBy('updated_at', 'desc')->get();
        return view('event.events', ['events' => $events]);
    }

    public function show(Event $event)
    {
        return view('event.event_info', ['event' => $event]);
    }

    public function create()
    {
        return view('event.event_create');
    }

    public function store(CreateEventRequest $request)
    {
        Event::query()->create($request->validated());
        return redirect()->back();
    }

    public function change(Event $event)
    {
        return view('event.event_update', ['event' => $event]);
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        // Event::query()->update($request->validated());
        $event->update($request->validated());
        return new MinifiedEventResource($event);
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('event.index');
    }
}
