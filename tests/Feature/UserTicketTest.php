<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class UserTicketTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_purchase_ticket(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $event = Event::factory()->create([
            'user_id' => $user->id,
            'available_tickets' => 10,
            'price' => 100.00,
        ]);

        $response = $this->actingAs($user)->post(route('user.order.store'), [
            'event_id' => $event->id,
            'quantity' => 2,
        ]);

        $order = Order::first(); // Ambil order yang baru saja dibuat
        $response->assertRedirect(route('user.order.confirmation', ['id' => $order->id])); // Gunakan ID order yang benar
        $this->assertDatabaseHas('orders', [
            'event_id' => $event->id,
            'user_id' => $user->id,
            'quantity' => 2,
            'total_price' => 200.00,
        ]);
        $event->refresh();
        $this->assertEquals(8, $event->available_tickets); // Memastikan tiket berkurang
    }

    public function test_user_can_view_ticket_details(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $event = Event::factory()->create([
            'user_id' => $user->id,
            'available_tickets' => 10,
            'price' => 100.00,
        ]);
        $order = Order::factory()->create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'quantity' => 2,
            'status' => 'paid',
        ]);

        $response = $this->actingAs($user)->get(route('user.ticketDetail', ['id' => $order->id]));

        $response->assertStatus(200);
        $response->assertSee($event->name);
        $response->assertSee($order->quantity);
        $response->assertSee('Paid');
    }

    public function test_user_cannot_purchase_more_tickets_than_available(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $event = Event::factory()->create([
            'user_id' => $user->id,
            'available_tickets' => 1,
            'price' => 100.00,
        ]);

        $response = $this->actingAs($user)->post(route('user.order.store'), [
            'event_id' => $event->id,
            'quantity' => 2,
        ]);

        $response->assertRedirect(); // Redirect ke halaman sebelumnya
        $response->assertSessionHas('error', 'Tiket tidak cukup tersedia!');
    }
} 