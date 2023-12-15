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
        return MinifiedEventResource::collection(Event::all());
    }

    public function create(CreateEventRequest $request)
    {
        Event::query()->create($request->validated());
        return responseOk();
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
        return responseOk();
    }
}
