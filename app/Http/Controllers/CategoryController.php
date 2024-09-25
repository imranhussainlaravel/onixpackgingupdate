<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Product;


class CategoryController extends Controller
{
    public function index() {

        $categories = Categories::where('status', 'active')->get();

        return view('index' , compact('categories'));

    }
    public function show($id)
    {
        // $id = $request['id'];
        // print_r($id);exit();
        $categoryModel = new Categories();
        $category = $categoryModel->find($id);


        if (!$category) {
            return redirect()->back()->withErrors('Category not found.');
        }

        $productModel = new Product();
        $products = $productModel->select('id','title','image_1') // Select specific columns
        ->where('category_id', $id) // Add the where condition
        ->get()                    // Retrieve the results
        ->toArray();   
        // echo $products->toSql();


        return view('listof', compact('category', 'products'));
    }
    public function final($id){

        // $id = $request['id'];
        $productModel = new Product();
        $products = $productModel->where('id',$id)->first();

        if (!$products) {
            return redirect()->back()->withErrors('Category not found.');
        }

        return view('finalp', compact('products'));
    }
}
