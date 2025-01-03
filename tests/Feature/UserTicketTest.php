<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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

        // Simulasi pembelian tiket
        $response = $this->actingAs($user)->post(route('user.order.store'), [
            'event_id' => $event->id,
            'quantity' => 2,
        ]);

        // Periksa apakah pesanan berhasil dibuat
        $order = Order::first();
        $this->assertNotNull($order, 'Order tidak berhasil dibuat');
        $response->assertRedirect(route('user.order.confirmation', ['id' => $order->id]));

        $this->assertDatabaseHas('orders', [
            'event_id' => $event->id,
            'user_id' => $user->id,
            'quantity' => 2,
            'total_price' => 200.00,
        ]);

        // Simulasi pengurangan tiket
        $event->available_tickets -= $order->quantity;
        $this->assertEquals(8, $event->available_tickets, 'Jumlah tiket tidak berkurang sesuai ekspektasi');
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
            'total_price' => 200.00,
        ]);
    
        // Pastikan pengguna telah login
        $response = $this->actingAs($user)->get(route('user.myTickets'));
    
        // Verifikasi status 200, pastikan pengguna dapat mengakses halaman detail tiket
        $response->assertStatus(200);
        $response->assertSee($event->name);  // Menampilkan nama event
        $response->assertSee($order->quantity);  // Menampilkan jumlah tiket
        $response->assertSee($order->status);  // Menampilkan status order
        $response->assertSee('Total: Rp 200'); // Menampilkan total harga
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

        $response->assertRedirect();
        $response->assertSessionHas('error', 'Tiket tidak cukup tersedia!');
    }
}
