<?php
namespace App\Services;

class OrderService
{
    // 取得其他貨幣對 TWD 的匯率
    public function getCurrencyRates() : array
    {
        return [
            'TWD' => 1,
            'USD' => 31,
        ];
    }

    // 轉換成 TWD
    public function convertToTwd(float $price, string $currency) : float
    {
        $rates = $this->getCurrencyRates();
        $rate  = $rates[$currency] ?? null;
        if (is_null($rate)) {
            throw new \Exception('Currency rate not found');
        }
        return $price * $rate;
    }
}
