<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index()
    {
        $userId = Auth::id(); // Ambil ID pengguna yang sedang login
        if (!$userId) {
            abort(403, 'Anda belum login!');
        }

        $events = Event::where('user_id', $userId)->get();
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
        $validated = $request->validate([
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        // Upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnailName = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            $thumbnailPath = 'thumbnails/' . time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move(public_path('thumbnails'), $thumbnailName);
            $validated['thumbnail'] = $thumbnailPath;
        }
        
        $validated['user_id'] = Auth::id();

        Event::create($validated);

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
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $event = Event::findOrFail($id);

        // Jika ada file baru, hapus file lama dan unggah yang baru
        if ($request->hasFile('thumbnail')) {
            // Hapus file lama jika ada
            if ($event->thumbnail && file_exists(public_path($event->thumbnail))) {
                unlink(public_path($event->thumbnail));
            }

            // Unggah file baru
            $thumbnailName = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            $thumbnailPath = $request->file('thumbnail')->move(public_path('thumbnails'), $thumbnailName);
            $validated['thumbnail'] = 'thumbnails/' . $thumbnailName; // Path relatif yang disimpan ke database
        }

        // Update data event
        $event->update($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('eventOrganizer.events.index')->with('success', 'Event berhasil diupdate!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->thumbnail && file_exists(public_path($event->thumbnail))) {
            unlink(public_path($event->thumbnail));
        }

        // Hapus data event
        $event->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('eventOrganizer.events.index')->with('success', 'Event berhasil dihapus!');
    }
}
