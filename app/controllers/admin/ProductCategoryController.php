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
    
    public $table_name = 'categories';
    public $categories;
    public $links;
    
    public function __construct()
    {
       
        $total = category::all()->count();
        $object = new Category;

        list($this->categories, $this->links) = paginate(5, $total, $this->table_name, $object);
    }

    public function show()
    {
        
        return view('/admin/products/categories', [
            'categories'=> $this->categories, 'links'=> $this->links
            ]);
    }

    public function store()
    {
        if (Request::has('post')){
            $request = Request::get('post');
            
            if(CSRFToken::VerifyCSRFToken($request->token)){

                $rules = [
                    'name' => ['required' => true, 'minLength' => 3, 'string' => true, 'unique' => 'categories']
                ];

                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);

                if($validate->hasError()){
                   $errors=$validate->getErrorMessage();
                   return view('/admin/products/categories',[
                    'categories'=> $this->categories, 'links'=> $this->links, 'errors'=>$errors
                   ]);
                }
                //process form data
                Category::create([
                    'name' => $request->name,
                    'slug' => slug($request->name)
                ]);
                $total = category::all()->count();
                list($this->categories, $this->links) = paginate(5, $total, $this->table_name, new Category());
                return view('/admin/products/categories', [
                    'categories' => $this->categories, 'links' => $this->links, 'success' => 'category created']);

            }
            throw new \Exception('Token mismatch');
        }
        return null;
    }
}