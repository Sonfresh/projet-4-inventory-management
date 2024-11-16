<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\User;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_order_belongs_to_user()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create(['customer_id' => $user->id]);

        $this->assertEquals($user->id, $order->user->id);
    }
}
