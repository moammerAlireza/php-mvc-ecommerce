<?php
namespace App\controllers\admin;
use App\models\Category;
use App\classes\Request;
use App\classes\CSRFToken;
use Illuminate\Support\Facades\Session;
use Dotenv\Validator;
use App\classes\ValidateRequest;
//use Illuminate\Support\Facades\Request;

class ProductCategoryController
{
    public function show()
    {
        $message = ""; 
        $categories = category::all();
        return view('/admin/products/categories', compact(['categories', 'message']));
    }

    public function store()
    {
        if (Request::has('post')){
            $request = Request::get('post');
            
            if(CSRFToken::VerifyCSRFToken($request->token)){

                $rules = [
                    'name' => ['required' => true, 'maxLength' => 5, 'string' => true, 'unique' => 'categories']
                ];

                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);

                if($validate->hasError()){
                    var_dump($validate->getErrorMessage());
                    exit;
                }
                //process form data
                Category::create([
                    'name' => $request->name,
                    'slug' => slug($request->name)
                ]);
                $categories = Category::all();
                $message = 'Category created';
            
                return view('/admin/products/categories', compact(['categories', 'message']));

            }
            throw new \Exception('Token mismatch');
        }
        return null;
    }
}