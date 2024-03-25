<?php

namespace App\Http\Controllers\API\Cart;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\Cart\CartResource;
use App\Models\Cart;
use App\Traits\Cart\CartStoreTrait;
use App\Traits\Cart\CartTrait;
use App\Traits\Cart\ItemStoreTrait;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
  use CartTrait, ItemStoreTrait;

  public function model()
  {
    return Cart::class;
  }
  public function __invoke(Request $request)
  {

      $user = auth('api')->user();
      $item_store = $this->itemStore($request->all());

      if(!$item_store){
          return $this->sendError('error');
      }

      $products = $this->products($user);
      $tickets = $this->tickets($user);


      $cart = $this->getCartItems($user);
      $data = new CartResource(['products' => $products, 'tickets' => $tickets]);

      $parrams['items_count'] = $cart->count();

      return $this->sendResponse($data, 'success', $parrams);



  }
}
