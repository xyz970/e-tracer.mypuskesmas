<?php

namespace Tests\Feature;

use App\Events\NotifikasiKeterlambatanEvent;
use App\Helper\PusherNotificationHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    use PusherNotificationHelper;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        event(new NotifikasiKeterlambatanEvent('1-L7WJD27-12345678','1'));
        // $response = $this->get('/');

        // $response->assertStatus(200);
    }
}
