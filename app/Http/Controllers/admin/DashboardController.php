<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;


class DashboardController extends Controller
{
    public function index()
    {
        $categoriesmodel = new Categories();
        $categories = $categoriesmodel->select('id', 'title', 'status', 'nav_id')
            ->orderBy('id', 'DESC') // Assuming 'id' indicates the latest records
            ->limit(10)
            ->get();
        return view('admin.dashboard',compact('categories'));
        // $categories = Categories::all(); // Ensure this is defined and correct
        // return view('admin.dashboard', compact('categories'));
    }
    public function create_category() 
    {
        return view('admin.createc');
    }
    public function categories() 
    {
        $categoriesmodel = new Categories();
        $categories = $categoriesmodel->select('id', 'title', 'status', 'nav_id')
            ->orderBy('id', 'DESC') // Assuming 'id' indicates the latest records
            ->get();
        return view('admin.category' , compact('categories'));
    }
    public function product() 
    {
        $productmodel = new Product();
        $products = $productmodel->select('id', 'title', 'status', 'category_id')
            ->orderBy('id', 'DESC') // Assuming 'id' indicates the latest records
            ->get();
        return view('admin.product', compact('products'));

        
    }
    public function create_product()
    {
        $categoriesmodel = new Categories();
        $categories = $categoriesmodel->select('id', 'title')
            ->orderBy('id', 'DESC') // Assuming 'id' indicates the latest records
            ->get();
        return view('admin.createp', compact('categories'));

    }
    public function form(Request $request) {
        // print_r($request);exit();
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'nav_id' => 'required|max:255',
            'header_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Add image validation
            'main_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',    // Add image validation
        ]);
    
        $header_img = $request->file('header_img');
        $main_img = $request->file('main_img');

        $header_img_name = time().'1.'.$header_img->getClientOriginalExtension();
        $main_img_name = time().'2.'.$main_img->getClientOriginalExtension();

        $header_img->move('uploads/temporary/',$header_img_name);
        $main_img->move('uploads/temporary/',$main_img_name);

        $imgmanger = new ImageManager(new Driver());

        $readimage1 = $imgmanger->read('uploads/temporary/'.$header_img_name);
        $readimage2 = $imgmanger->read('uploads/temporary/'.$main_img_name);

        $originalWidth = $readimage1->width();
        $originalHeight = $readimage1->height();


        if (($originalWidth / $originalHeight) > (2 / 3)) {
            // If the image is wider than the 2:3 ratio, adjust based on height
            $newHeight = $originalHeight;
            $newWidth = intval($newHeight * (2 / 3));  // Calculate new width based on 2:3 ratio
        } else {
            // Otherwise, adjust based on width
            $newWidth = $originalWidth;
            $newHeight = intval($newWidth * (3 / 2));  // Calculate new height based on 2:3 ratio
        }

        $readimage1->cover($newWidth, $newHeight)->save(public_path('uploads/categories/' . $header_img_name));
        // $size = min($readimage1->width(), $readimage1->height()); // Get width and height after creating image instance
        // $readimage1->cover($size, $size)->save(public_path('uploads/categories/'.$header_img));

        $size = min($readimage2->width(), $readimage2->height()); // Get width and height after creating image instance
        $readimage2->cover($size, $size)->save(public_path('uploads/categories/'.$main_img_name));

        $imagePath1 = 'uploads/temporary/' . $header_img_name;
        $imagePath2 = 'uploads/temporary/' . $main_img_name;

        unlink($imagePath1);
        unlink($imagePath2);
    

    

    
        // Save the validated data and image paths in the database
        $category = new Categories();
        $category->title = $validatedData['title'];
        $category->description = $validatedData['description'];
        $category->nav_id = $validatedData['nav_id'];
        $category->header_img = $header_img_name ? asset('uploads/categories/' . $header_img_name) : null;
        $category->main_img = $main_img_name ? asset('uploads/categories/' . $main_img_name) : null;
        $category->save();
    
        // return redirect()->back()->with('success', 'Category saved successfully!');
        return redirect()->route('admin.categoty')->with('success', 'Category saved successfully!');

    
    }
    public function productform(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'category_id' => 'required|max:255',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Add image validation
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Add image validation
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Add image validation
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Add image validation

        ]);
    
      
    
        $image1 = $request->file('image_1');
        $image2 = $request->file('image_2');
        $image3 = $request->file('image_3');
        $image4 = $request->file('image_4');

        $imagename1 = time().'1.'.$image1->getClientOriginalExtension();
        $imagename2 = time().'2.'.$image1->getClientOriginalExtension();
        $imagename3 = time().'3.'.$image1->getClientOriginalExtension();
        $imagename4 = time().'4.'.$image1->getClientOriginalExtension();


        $image1->move('uploads/temporary/',$imagename1);
        $image2->move('uploads/temporary/',$imagename2);
        $image3->move('uploads/temporary/',$imagename3);
        $image4->move('uploads/temporary/',$imagename4);


        $imgmanger = new ImageManager(new Driver());

        $readimage1 = $imgmanger->read('uploads/temporary/'.$imagename1);
        $readimage2 = $imgmanger->read('uploads/temporary/'.$imagename2);
        $readimage3 = $imgmanger->read('uploads/temporary/'.$imagename3);
        $readimage4 = $imgmanger->read('uploads/temporary/'.$imagename4);


        $size = min($readimage1->width(), $readimage1->height()); // Get width and height after creating image instance
        $readimage1->cover($size, $size)->save(public_path('uploads/products/'.$imagename1));

        $size = min($readimage2->width(), $readimage2->height()); // Get width and height after creating image instance
        $readimage2->cover($size, $size)->save(public_path('uploads/products/'.$imagename2));
        
        $size = min($readimage3->width(), $readimage3->height()); // Get width and height after creating image instance
        $readimage3->cover($size, $size)->save(public_path('uploads/products/'.$imagename3));

        $size = min($readimage4->width(), $readimage4->height()); // Get width and height after creating image instance
        $readimage4->cover($size, $size)->save(public_path('uploads/products/'.$imagename4));


        $imagePath1 = 'uploads/temporary/' . $imagename1;
        $imagePath2 = 'uploads/temporary/' . $imagename2;
        $imagePath3 = 'uploads/temporary/' . $imagename3;
        $imagePath4 = 'uploads/temporary/' . $imagename4;

        unlink($imagePath1);
        unlink($imagePath2);
        unlink($imagePath3);
        unlink($imagePath4);


       
        $product = new Product();
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->category_id = $request['category_id'];
        $product->image_1 = $imagename1 ? asset('uploads/products/' . $imagename1) : null;
        $product->image_2 = $imagename2 ? asset('uploads/products/' . $imagename2) : null;
        $product->image_3 = $imagename3 ? asset('uploads/products/' . $imagename3) : null;
        $product->image_4 = $imagename4 ? asset('uploads/products/' . $imagename4) : null;
        $product->save();
    
        // return redirect()->back()->with('success', 'Product saved successfully!');admin.dashboard
        return redirect()->route('admin.product')->with('success', 'Product saved successfully!');
    }


    public function categorydestroy($id)
    {
        // Find the product by ID
        $category = Categories::find($id);
        
        if (!$category) {
            return redirect()->back()->withErrors('Product not found.'); // Handle case when product is not found
        }

        $headerImgPath = parse_url($category->header_img, PHP_URL_PATH); // Get the path part of the URL
        $fullPath = public_path($headerImgPath);
        $mainImgPath = parse_url($category->main_img, PHP_URL_PATH); // Get the path part of the URL
        $fullPath1 = public_path($mainImgPath);
        if ($fullPath) {
            File::delete($fullPath);
        }
        if ($fullPath1) {
            File::delete($fullPath1);

            // Storage::delete($category->main_img);
        }
        
        // Delete the product
        $category->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
    public function productdestroy($id)
    {
        // Find the product by ID
        $product = product::find($id);
        
        if (!$product) {
            return redirect()->back()->withErrors('Product not found.'); // Handle case when product is not found
        }

        $image1 = parse_url($product->image_1, PHP_URL_PATH); // Get the path part of the URL
        $fullPath1 = public_path($image1);
        $image2 = parse_url($product->image_2, PHP_URL_PATH); // Get the path part of the URL
        $fullPath2 = public_path($image2);
        $image3 = parse_url($product->image_3, PHP_URL_PATH); // Get the path part of the URL
        $fullPath3 = public_path($image3);
        $image4 = parse_url($product->image_4, PHP_URL_PATH); // Get the path part of the URL
        $fullPath4 = public_path($image4);
        
        if ($fullPath1) {
            File::delete($fullPath1);
        }
        if ($fullPath2) {
            File::delete($fullPath2);
        }
        if ($fullPath3) {
            File::delete($fullPath3);
        }
        if ($fullPath4) {
            File::delete($fullPath4);
        }
        
        // Delete the product
        $product->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
    
}