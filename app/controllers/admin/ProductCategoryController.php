<?php
namespace App\controllers\admin;
use App\models\Category;
use App\classes\Request;
use App\classes\CSRFToken;
use Dotenv\Validator;
use App\classes\ValidateRequest;
use App\controllers\BaseController;
use App\classes\Redirect;
use App\classes\Session;
use App\models\SubCategory;
//use Illuminate\Support\Facades\Request;

class ProductCategoryController extends BaseController
{

    public $table_name = 'categories';
    public $categories;
    public $subcategories;
    public $subcategories_links;
    public $links;

    public function __construct()
    {

        $total = Category::all()->count();
        $subTotal = SubCategory::all()->count();
        $object = new Category;

        list($this->categories, $this->links) = paginate(3, $total, $this->table_name, $object);
        list($this->subcategories, $this->subcategories_links) = paginate(3, $subTotal, 'sub_categories', new SubCategory);
    }

    public function show()
    {
        return view('/admin/products/categories', [
            'categories' => $this->categories, 'links' => $this->links,
            'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links,
        ]);
    }

    public function store()
    {
        if (Request::has('post')) {
            $request = Request::get('post');

            if (CSRFToken::VerifyCSRFToken($request->token)) {

                $rules = [
                    'name' => ['required' => true, 'minLength' => 3, 'string' => true, 'unique' => 'categories']
                ];

                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);

                if ($validate->hasError()) {
                    $errors = $validate->getErrorMessage();
                    return view('/admin/products/categories', [
                        'categories' => $this->categories, 'links' => $this->links, 'errors' => $errors,
                        'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links,
                    ]);
                }
                //process form data
                Category::create([
                    'name' => $request->name,
                    'slug' => slug($request->name)
                ]);
                $total = category::all()->count();
                $subTotal = SubCategory::all()->count();
                list($this->categories, $this->links) = paginate(4, $total, $this->table_name, new Category());
                list($this->subcategories, $this->subcategories_links) = paginate(3, $subTotal, 'sub_categories', new SubCategory);
                return view('/admin/products/categories', [
                    'categories' => $this->categories, 'links' => $this->links, 'success' => 'category created',
                    'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links,
                ]);

            }
            throw new \Exception('Token mismatch');
        }
        return null;
    }

    public function edit($id)
    {
        if (Request::has('post')) {
            $request = Request::get('post');

            if (CSRFToken::VerifyCSRFToken($request->token, false)) {

                $rules = [
                    'name' => ['required' => true, 'minLength' => 3, 'string' => true, 'unique' => 'categories']
                ];

                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);

                if ($validate->hasError()) {
                    $errors = $validate->getErrorMessage();
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($errors);
                    exit;
                }

                Category::where('id', $id)->update(['name' => $request->name]);
                echo json_encode(['success' => 'Record update Successfully']);
                exit;
            }
            throw new \Exception('Token mismatch');
        }
        return null;
    }


    public function delete($id)
    {
        if (Request::has('post')) {
            $request = Request::get('post');

            if (CSRFToken::VerifyCSRFToken($request->token)) {
                Category::destroy($id);
                Session::add('success', 'Category Deleted');
                Redirect::to('/admin/product/categories');
            }
            else {
                throw new \Exception('Token mismatch');
            }
        }
        return null;
    }
}