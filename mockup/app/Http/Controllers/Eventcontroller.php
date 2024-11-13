<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Fetch all events for the calendar
    public function fetch()
    {
        $events = Event::all();
        return response()->json($events); // Return events as JSON for the frontend
    }

    // In CalendarController.php
public function showCalendar()
{
    return view('layouts.calendar');  // Ensure this matches the filename and location
}


    // Store a new event in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $event = Event::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json($event, 201); // Return the created event as JSON
    }

    // Delete an event from the database
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(null, 204); // Return a 204 No Content response on successful deletion
    }
}
