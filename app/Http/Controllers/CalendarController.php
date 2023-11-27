<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
    public function index()
    {
        // Fetch all events
        $events = Event::all();

        return view('calendar.index', compact('events'));
    }

    // Display events for a specific date
    public function showEvents($date)
    {
        // Retrieve events for the specified date
        $events = Event::where('date', $date)->get();

        return view('calendar.show', compact('date', 'events'));
    }

    // Add a new event for a specific date
    public function addEvent(Request $request, $date)
    {
        // Your logic to add a new event
        $newEvent = new Event([
            'name' => $request->input('name'),
            'date' => $date,
            // Add other fields as needed
        ]);
        $newEvent->save();

        // Redirect to the showEvents route after adding the event
        return redirect()->route('calendar.show', ['date' => $date]);
    }

    // Edit an existing event for a specific date
    public function editEvent(Request $request, $date, $eventName)
    {
        // Your logic to retrieve and edit the specified event
        $event = Event::where('date', $date)->where('name', $eventName)->first();

        if ($event) {
            // Update event fields based on $request
            $event->name = $request->input('name');
            // Update other fields as needed
            $event->save();
        }

        // Redirect to the showEvents route after editing the event
        return redirect()->route('calendar.show', ['date' => $date]);
    }
}
