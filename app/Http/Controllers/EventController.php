<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;


class EventController extends Controller
{
    public function index()
    { 
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date',
            'time' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
    
        // Convertir la date en un objet Carbon si ce n'est pas déjà le cas
        if (is_string($event->date)) {
            $event->date = Carbon::parse($event->date);
        }
    
        return view('admin.events.show', compact('event'));
    }
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'date_time' => 'required|date_format:Y-m-d\TH:i',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        $event->title = $validatedData['title'];
        $event->date = \Carbon\Carbon::parse($validatedData['date_time']);
        $event->location = $validatedData['location'];
        $event->description = $validatedData['description'];
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/events');
            $event->image = basename($imagePath);
        }
    
        $event->save();
    
        return Redirect::route('admin.events.index')->with('success', 'L\'événement a été mis à jour avec succès!');
    }
    public function destroy(Event $event)
    {
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
