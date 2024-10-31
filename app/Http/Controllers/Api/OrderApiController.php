<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function update(UpdateOrderRequest $request)
    {
        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
