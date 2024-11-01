<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function update(UpdateOrderRequest $request, OrderService $orderService)
    {
        $data = $request->validated();

        // 如果幣別是 USD，則將價格轉換成 TWD
        if ($data['currency'] === 'USD') {
            $data['price']    = $orderService->convertToTwd($data['price'], $data['currency']);
            $data['currency'] = 'TWD';
        }

        return response()->json([
            'message' => 'success',
            'data'    => $data,
        ], 200);
    }
}
