<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\MuseumStaff;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCreateController extends Controller
{
  public function create(Request $request){
    $data = ProductCategory::all();
    $museum_staff = MuseumStaff::where('user_id', Auth::id())->first();

    return view('content.product.create',compact('data','museum_staff'));
  }
}
