<?php

namespace App\controllers;
use App\models\Product;
use App\classes\Request;
use App\classes\CSRFToken;



class IndexController extends BaseController
{

    public function show()
    {
        $token = CSRFToken::_token();
        $featuredProducts = Product::where('featured', 1)->inRandomOrder()->limit(4)->get();
        $normalProducts = Product::where('featured', 0)->skip(0)->take(8)->get();
        return view('home',compact('token', 'featuredProducts', 'normalProducts'));
    }


    public function loadMoreProducts (){
        $request = Request::get('post');
        if(CSRFToken::VerifyCSRFToken($request->token, false)){

            $count = $request->count;
            $item_per_page = $count + $request->next;
            $products = Product::where('featured', 0)->skip(0)->take($item_per_page)->get();
            echo json_encode(['products' => $products, 'count' => count($products)]);
        }
    }
}