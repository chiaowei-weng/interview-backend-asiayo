<?php
namespace App\Services;

class OrderService
{
    // 取得其他貨幣對 TWD 的匯率
    public function getCurrencyRate(string $currency) : float
    {
        $rates = [
            'TWD' => 1,
            'USD' => 31,
        ];
        $rate = $rates[$currency] ?? null;
        if (is_null($rate)) {
            throw new \Exception('Currency rate not found');
        }

        return $rate;
    }

    // 轉換成 TWD
    public function convertToTwd(float $price, string $currency) : float
    {
        return $price * $this->getCurrencyRate($currency);
    }
}
