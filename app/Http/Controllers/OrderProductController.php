<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderProductController extends Controller
{
    public function index(Request $request, Order $order)
    {
        $query = $order->products()
            ->select(
                'products.id as product_id',
                'products.name', 
                'products.price', 
                'order_product.order_id', 
                'order_product.product_id'
            );

        // Filter
        if ($request->has('filter_name')) {
            $query->where('products.name', 'like', '%' . $request->input('filter_name') . '%');
        }

        // Pagination
        $products = $query->paginate(
            $request->input('limit', 10),
            ['*'],
            'page', 
            $request->input('page', 1)
        );

        return response()->json($products);
    }
}
