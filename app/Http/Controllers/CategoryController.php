<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{

	protected $category;

	function __construct(Category $category)
	{
		$this->category = $category;
	}

    public function index()
    {
    	$categories = $this->category->get();
    	return view('category.index', compact('categories'));
    }

    public function create()
    {
    	return view('category.create');
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
		    'name' 		=> 'bail|required|string',
		    'details' 	=> 'bail|required|string',
		    'slug' 		=> 'bail|required|string|unique:categories',
		]);

		$store = $this->category->create([
		    'name' => $request->input('name'),
		    'details' => $request->input('details'),
		    'slug' => $request->input('slug'),
		]);

		if($store){
			Session::flash('message', 'Data saved successfully');
			Session::flash('alert-class', 'alert-success'); 
			return redirect('/category/index');
		}else{
			Session::flash('message', 'Failed');
			Session::flash('alert-class', 'alert-danger'); 
			return redirect('/category/index');
		}
    }

    public function show()
    {
    	
    }

    public function edit($id)
    {
    	$category = $this->category->findOrfail($id);
        return view('category.edit', ['id',$id], compact('category'));
    }

    public function update(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'id'        => 'required',
            'name'      => 'bail|required|string',
            'details'   => 'bail|required|string',
            'slug'      => 'bail|required|string|unique:categories',
        ]);

        $category = $this->category->findOrfail($request->input('id'));

        $category->name     = $request->input('name');
        $category->details  = $request->input('details');
        $category->slug     = $request->input('slug');

        $update = $category->save();

        if($update){
            Session::flash('message', 'Data updated successfully');
            Session::flash('alert-class', 'alert-success'); 
            return redirect('/category/index');
        }else{
            Session::flash('message', 'Failed');
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('/category/index');
        }
    }

    public function destroy()
    {
        $id = request()->input('id');
    	$category = $this->category->findOrfail($id);
        if ($category) {
            try {
                $delete = $category->delete();
                if ($delete) {
                    Session::flash('message', 'Data deleted successfully');
                    Session::flash('alert-class', 'alert-success'); 
                    return redirect('/category/index');
                }else{
                    Session::flash('message', 'Failed');
                    Session::flash('alert-class', 'alert-danger'); 
                    return redirect('/category/index');
                }
            } catch (Exception $e) {
                
            }
        }
    }
}
