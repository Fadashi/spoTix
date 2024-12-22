<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index()
    {
        $events = Event::all(); // Mengambil semua event dari database
        return view('eventOrganizer.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('eventOrganizer.events.create'); // Mengarahkan ke halaman form create event
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        // Upload gambar thumbnail
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        $validated['thumbnail'] = $thumbnailPath;

        // Simpan data ke database
        Event::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('eventOrganizer.events.index')->with('success', 'Event berhasil dibuat!');
    }

    /**
     * Display the specified event.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id); // Cari event berdasarkan ID
        return view('eventOrganizer.events.index', compact('event'));
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id); // Cari event berdasarkan ID
        return view('eventOrganizer.events.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'thumbnail' => 'image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $event = Event::findOrFail($id);

        // Update gambar jika ada file baru
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $thumbnailPath;
        }

        // Update data event
        $event->update($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('eventOrganizer.events.index')->with('success', 'Event berhasil diupdate!');
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Hapus data event
        $event->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('eventOrganizer.events.index')->with('success', 'Event berhasil dihapus!');
    }
}
