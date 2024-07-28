<?php

namespace App\Http\Controllers\Api\v1;

use App\Filters\v1\CartFilter;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Http\Resources\v1\CartCollection;
use App\Http\Resources\v1\CartResource;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $filter = new CartFilter();
        $filterItems = $filter->transform($request);

        $cart = Cart::where($filterItems);
        return new CartCollection($cart->paginate());
    }


    public function store(CartRequest $request)
    {
        return new CartResource(Cart::create($request->all()));
    }

    public function show(Cart $Cart)
    {
                return new CartResource($Cart);
    }

    public function update(CartRequest $request, Cart $Cart)
    {
         $Cart->update($request->all());
        return 'update success';
    }

    public function destroy(Cart $Cart)
    {
        $Cart->delete();
        return 'delete success';
    }
}
