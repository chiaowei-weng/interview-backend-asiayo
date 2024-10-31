<?php
namespace Tests\Feature\Http\Services;

use App\Services\OrderService;
use Tests\TestCase;

class OrderServiceTest extends TestCase
{
    public function test_convert_to_twd_success() : void
    {
        $orderService = new OrderService();
        $price        = $orderService->convertToTwd(2000, 'USD');
        $this->assertEquals(2000 * 31, $price);
    }

    public function test_convert_to_twd_with_invalid_currency() : void
    {
        $orderService = new OrderService();
        $this->expectException(\Exception::class);
        $orderService->convertToTwd(2000, 'JPY');
    }

    public function test_get_currency_rates() : void
    {
        $orderService = new OrderService();
        $rate         = $orderService->getCurrencyRate('USD');
        $this->assertEquals(31, $rate);
    }

    public function test_get_currency_rates_with_invalid_currency() : void
    {
        $orderService = new OrderService();
        $this->expectException(\Exception::class);
        $orderService->getCurrencyRate('JPY');
    }
}
