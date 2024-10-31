<?php
namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderApiControllerTest extends TestCase
{
    protected $params = [
        'id'      => 'A0000001',
        'name'    => 'Melody Holiday Inn',
        'address' => [
            'city'     => 'taipei-city',
            'district' => 'da-an-district',
            'street'   => 'fuxing-south-road'
        ],
        'price'    => '2050',
        'currency' => 'TWD'
    ];

    /**
     * @test
     */
    public function test_update(): void
    {
        $response = $this->post(route('orders.update'), $this->params);
        $response->assertStatus(200);
    }
}
