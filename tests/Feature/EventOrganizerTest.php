<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class EventOrganizerTest extends TestCase
{
    use RefreshDatabase;

    public function test_event_organizer_can_create_event(): void
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

    public function test_event_organizer_can_update_event(): void
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

    public function test_event_organizer_can_delete_event(): void
    {
        $user = User::factory()->create(['role' => 'eventOrganizer']);
        $event = Event::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete("/events/{$event->id}");

        $response->assertRedirect(route('eventOrganizer.events.index'));
        $this->assertModelMissing($event);
    }

    public function test_event_organizer_can_view_reports(): void
    {
        $user = User::factory()->create(['role' => 'eventOrganizer']);
        $event = Event::factory()->create(['user_id' => $user->id]);

        // Simulasi beberapa order
        $event->orders()->createMany([
            ['user_id' => $user->id, 'quantity' => 2, 'status' => 'paid', 'total_price' => 200.00],
            ['user_id' => $user->id, 'quantity' => 3, 'status' => 'paid', 'total_price' => 300.00],
        ]);

        $response = $this->actingAs($user)->get(route('eventOrganizer.reports'));

        $response->assertStatus(200);
        $response->assertSee($event->name);
        $response->assertSee('Total Orders');
    }

    public function test_event_organizer_can_view_dashboard(): void
    {
        $user = User::factory()->create(['role' => 'eventOrganizer']);
        $event = Event::factory()->create(['user_id' => $user->id]);

        // Simulasi beberapa order
        $event->orders()->create(['user_id' => $user->id, 'quantity' => 2, 'status' => 'paid', 'total_price' => 200.00]);

        $response = $this->actingAs($user)->get(route('eventOrganizer.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Total Profit');
        $response->assertSee('Total Orders');
    }
} 