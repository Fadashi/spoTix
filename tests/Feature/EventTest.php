<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class EventTest extends TestCase
{
    use RefreshDatabase;

    public function test_event_can_be_created(): void
    {
        $user = User::factory()->create(['role' => 'eventOrganizer']);

        $response = $this->actingAs($user)->post('/events', [
            'name' => 'Test Event',
            'description' => 'This is a test event.',
            'category' => 'Test Category',
            'date' => now()->addDays(10),
            'location' => 'Test Location',
            'price' => 50.00,
            'available_tickets' => 100,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg'),
            'capacity' => 100,
            'status' => 'Upcoming',
        ]);

        $response->assertRedirect(route('eventOrganizer.events.index'));
        $this->assertDatabaseHas('events', [
            'name' => 'Test Event',
            'description' => 'This is a test event.',
        ]);
    }

    public function test_event_can_be_updated(): void
    {
        $user = User::factory()->create(['role' => 'eventOrganizer']);
        $event = Event::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->put("/events/{$event->id}", [
            'name' => 'Updated Event',
            'description' => 'This is an updated test event.',
            'category' => 'Updated Category',
            'date' => now()->addDays(5),
            'location' => 'Updated Location',
            'price' => 75.00,
            'available_tickets' => 150,
            'thumbnail' => UploadedFile::fake()->image('updated_thumbnail.jpg'),
            'capacity' => 150,
            'status' => 'Ongoing',
        ]);

        $response->assertRedirect(route('eventOrganizer.events.index'));
        $this->assertDatabaseHas('events', [
            'name' => 'Updated Event',
            'description' => 'This is an updated test event.',
        ]);
    }

    public function test_event_can_be_deleted(): void
    {
        $user = User::factory()->create(['role' => 'eventOrganizer']);
        $event = Event::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete("/events/{$event->id}");

        $response->assertRedirect(route('eventOrganizer.events.index'));
        $this->assertModelMissing($event);
    }

    public function test_event_can_be_viewed(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $event = Event::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('user.show', ['id' => $event->id]));

        $response->assertStatus(200);
        $response->assertSee($event->name);
        $response->assertSee($event->description);
    }
}