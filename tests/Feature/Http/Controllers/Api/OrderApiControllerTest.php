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
        'price'    => '2000',
        'currency' => 'TWD'
    ];

    public function test_update_request_success(): void
    {
        $response = $this->post(route('orders.update'), $this->params);
        $response->assertStatus(200);
    }

    public function test_update_with_invalid_name_not_capitalized() : void
    {
        // 單字不是大寫開頭
        $response = $this->post(route('orders.update'), array_merge($this->params, [
            'name' => 'Melody holiday inn',
        ]));
        $response->assertStatus(400);
    }

    public function test_update_with_invalid_name_contains_non_english_characters() : void
    {
        // 包含非英文
        $response = $this->post(route('orders.update'), array_merge($this->params, [
            'name' => 'Melody Holiday 1nn',
        ]));
        $response->assertStatus(400);
    }

    public function test_update_with_invalid_price() : void
    {
        $response = $this->post(route('orders.update'), array_merge($this->params, [
            'price' => '2050',
        ]));
        $response->assertStatus(400);
    }

    public function test_update_with_invalid_currency() : void
    {
        $response = $this->post(route('orders.update'), array_merge($this->params, [
            'currency' => 'JPY',
        ]));
        $response->assertStatus(400);
    }
}
