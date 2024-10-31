<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function update(Request $request)
    {
        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
