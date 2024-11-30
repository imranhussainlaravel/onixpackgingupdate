<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Blog;
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
        $categorymodel = new Categories();
        $productmodel = new Product();
        $products = $productmodel->select('id', 'title', 'status', 'category_id')
            ->orderBy('id', 'DESC') // Assuming 'id' indicates the latest records
            ->get();
        foreach ($products as $key => $pro){
            $category = $categorymodel->select('title')->where('id', $pro->category_id)->first();

            if ($category) {
                // Assign category title if found
                $products[$key]->category_name = $category->title;
            } else {
                // Set category name to 'Category Deleted' if not found
                $products[$key]->category_name = '<span style="color: red;">Category Deleted</span>'; // Use HTML for styling
                // Optionally, log the missing category for debugging
                \Log::warning('Category not found for category_id: ' . $pro->category_id);
            }
        }
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
        // $uploadPath = '/home/onixuvjm/public_html/uploads/categories/';
        // $temppath = '/home/onixuvjm/public_html/uploads/temporary/';
        $uploadPath = 'uploads/categories/';
        $temppath = 'uploads/temporary/';
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'nav_id' => 'required|max:255',
            'header_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',  // 10 MB
            'main_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',  // 10 MB
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',  // 10 MB
        ]);


        if ($request->hasFile('icon')) {

            $icon_img = $request->file('icon');
            $icon_img_name = time() . '3.' . $icon_img->getClientOriginalExtension();
            $icon_img->move($temppath, $icon_img_name);
            $imgmanager = new ImageManager(new Driver());
            $readimage3 = $imgmanager->read($temppath . $icon_img_name);
            $size3 = min($readimage3->width(), $readimage3->height());
            $readimage3->cover($size3, $size3)->save($uploadPath . $icon_img_name);

            $imagePath3 = ($temppath . $icon_img_name);

            if (isset($imagePath3) && File::exists($imagePath3)) {
                if (!File::delete($imagePath3)) {
                    \Log::error("Failed to delete temporary header image: " . $imagePath3);
                }
            }
        }
    
        $header_img = $request->file('header_img');
        $main_img = $request->file('main_img');
    
        // Generate unique names for images
        $header_img_name = time() . '1.' . $header_img->getClientOriginalExtension();
        $main_img_name = time() . '2.' . $main_img->getClientOriginalExtension();
    
        // Move images to the temporary directory
        $header_img->move($temppath, $header_img_name);
        $main_img->move($temppath, $main_img_name);
    
        // Create an ImageManager instance
        $imgmanger = new ImageManager(new Driver());

    
        // Read the images from the temporary directory
        $readimage1 = $imgmanger->read($temppath . $header_img_name);
        $readimage2 = $imgmanger->read($temppath . $main_img_name);
    
        // Get original dimensions
        $originalWidth = $readimage1->width();
        $originalHeight = $readimage1->height();
    
        // Calculate new dimensions based on aspect ratio
        if (($originalWidth / $originalHeight) > (2 / 3)) {
            $newHeight = $originalHeight;
            $newWidth = intval($newHeight * (2 / 3));
        } else {
            $newWidth = $originalWidth;
            $newHeight = intval($newWidth * (3 / 2));
        }
    
        // Ensure the categories directory exists
        if (!File::exists(public_path('uploads/categories'))) {
            File::makeDirectory(public_path('uploads/categories'), 0755, true);
        }
    
        // Save resized images
        $readimage1->cover($newWidth, $newHeight)->save($uploadPath . $header_img_name);
        $size = min($readimage2->width(), $readimage2->height());
        $readimage2->cover($size, $size)->save($uploadPath . $main_img_name);
    
        // Cleanup temporary images
        $imagePath1 = ($temppath . $header_img_name);
        $imagePath2 = ($temppath . $main_img_name);
    
        // Check if temporary images exist before unlinking
        // if (File::exists($imagePath1)) {
        //     unlink($imagePath1);
        // }
        // if (File::exists($imagePath2)) {
        //     unlink($imagePath2);
        // }
        if (isset($imagePath1) && File::exists($imagePath1)) {
            if (!File::delete($imagePath1)) {
                \Log::error("Failed to delete temporary header image: " . $imagePath1);
            }
        }
        if (isset($imagePath2) && File::exists($imagePath2)) {
            if (!File::delete($imagePath2)) {
                \Log::error("Failed to delete temporary main image: " . $imagePath2);
            }
        }
    
        // Save the validated data and image paths in the database
        $category = new Categories();
        $category->title = $validatedData['title'];
        $category->description = $validatedData['description'];
        $category->nav_id = $validatedData['nav_id'];
        $category->header_img = asset('uploads/categories/' . $header_img_name);
        $category->main_img = asset('uploads/categories/' . $main_img_name);
        $category->icon = asset('uploads/categories/' . $icon_img_name);
        $category->save();
    
        // Redirect with success message
        return redirect()->route('admin.categoty')->with('success', 'Category saved successfully!');
    }
    
    public function productform(Request $request) {
        $uploadPath = '/home/onixuvjm/public_html/uploads/products/';
        $temppath = '/home/onixuvjm/public_html/uploads/temporary/';
        // $uploadPath = 'uploads/products/';
        // $temppath = 'uploads/temporary/';
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|max:255',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',  // Add image validation
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',  // Add image validation
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',  // Add image validation
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',  // Add image validation
            'description2' => 'required',
            'heading2' =>  'required',
            'image_5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',  // Add image validation
            'content' => 'required',

        ]);
    
      
    
        $image1 = $request->file('image_1');
        $image2 = $request->file('image_2');
        $image3 = $request->file('image_3');
        $image4 = $request->file('image_4');
        $image5 = $request->file('image_5');

        $imagename1 = time().'1.'.$image1->getClientOriginalExtension();
        $imagename2 = time().'2.'.$image2->getClientOriginalExtension();
        $imagename3 = time().'3.'.$image3->getClientOriginalExtension();
        $imagename4 = time().'4.'.$image4->getClientOriginalExtension();
        $imagename5 = time().'5.'.$image5->getClientOriginalExtension();


        $image1->move($temppath , $imagename1);
        $image2->move($temppath , $imagename2);
        $image3->move($temppath , $imagename3);
        $image4->move($temppath , $imagename4);
        $image5->move($temppath , $imagename5);



        $imgmanger = new ImageManager(new Driver());

        $readimage1 = $imgmanger->read($temppath . $imagename1);
        $readimage2 = $imgmanger->read($temppath . $imagename2);
        $readimage3 = $imgmanger->read($temppath . $imagename3);
        $readimage4 = $imgmanger->read($temppath . $imagename4);
        $readimage5 = $imgmanger->read($temppath . $imagename5);



        $size = min($readimage1->width(), $readimage1->height()); // Get width and height after creating image instance
        $readimage1->cover($size, $size)->save($uploadPath . $imagename1);

        $size = min($readimage2->width(), $readimage2->height()); // Get width and height after creating image instance
        $readimage2->cover($size, $size)->save($uploadPath . $imagename2);
        
        $size = min($readimage3->width(), $readimage3->height()); // Get width and height after creating image instance
        $readimage3->cover($size, $size)->save($uploadPath . $imagename3);

        $size = min($readimage4->width(), $readimage4->height()); // Get width and height after creating image instance
        $readimage4->cover($size, $size)->save($uploadPath . $imagename4);

        $size = min($readimage4->width(), $readimage5->height()); // Get width and height after creating image instance
        $readimage5->cover($size, $size)->save($uploadPath . $imagename5);


        $imagePath1 = ($temppath . $imagename1);
        $imagePath2 = ($temppath . $imagename2);
        $imagePath3 = ($temppath . $imagename3);
        $imagePath4 = ($temppath . $imagename4);
        $imagePath5 = ($temppath . $imagename5);


        // unlink($imagePath1);
        // unlink($imagePath2);
        // unlink($imagePath3);
        // unlink($imagePath4);
        if (isset($imagePath1) && File::exists($imagePath1)) {
            if (!File::delete($imagePath1)) {
                \Log::error("Failed to delete temporary header image: " . $imagePath1);
            }
        }
        if (isset($imagePath2) && File::exists($imagePath2)) {
            if (!File::delete($imagePath2)) {
                \Log::error("Failed to delete temporary main image: " . $imagePath2);
            }
        }
        if (isset($imagePath3) && File::exists($imagePath3)) {
            if (!File::delete($imagePath3)) {
                \Log::error("Failed to delete temporary main image: " . $imagePath3);
            }
        }if (isset($imagePath4) && File::exists($imagePath4)) {
            if (!File::delete($imagePath4)) {
                \Log::error("Failed to delete temporary main image: " . $imagePath4);
            }
        }if (isset($imagePath5) && File::exists($imagePath5)) {
            if (!File::delete($imagePath5)) {
                \Log::error("Failed to delete temporary main image: " . $imagePath5);
            }
        }


       
        $product = new Product();
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->category_id = $request['category_id'];
        $product->image_1 = $imagename1 ? asset('uploads/products/' . $imagename1) : null;
        $product->image_2 = $imagename2 ? asset('uploads/products/' . $imagename2) : null;
        $product->image_3 = $imagename3 ? asset('uploads/products/' . $imagename3) : null;
        $product->image_4 = $imagename4 ? asset('uploads/products/' . $imagename4) : null;
        $product->image_5 = $imagename5 ? asset('uploads/products/' . $imagename5) : null;
        $product->description2 = $request['description2'];
        $product->heading2 = $request['heading2'];
        $product->content = $request['content'];
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
        // $fullPath = public_path($headerImgPath);
        $mainImgPath = parse_url($category->main_img, PHP_URL_PATH); // Get the path part of the URL
        // $fullPath1 = public_path($mainImgPath);

        $baseUploadPath = '/home/onixuvjm/public_html';

        $fullPath = $baseUploadPath . $headerImgPath;
        $fullPath1 = $baseUploadPath . $mainImgPath;

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

        $baseUploadPath = '/home/onixuvjm/public_html';

        $image1 = parse_url($product->image_1, PHP_URL_PATH); // Get the path part of the URL
        // $fullPath1 = public_path($image1);
        $image2 = parse_url($product->image_2, PHP_URL_PATH); // Get the path part of the URL
        // $fullPath2 = public_path($image2);
        $image3 = parse_url($product->image_3, PHP_URL_PATH); // Get the path part of the URL
        // $fullPath3 = public_path($image3);
        $image4 = parse_url($product->image_4, PHP_URL_PATH); // Get the path part of the URL
        // $fullPath4 = public_path($image4);
        
        $fullPath1 = $baseUploadPath . $image1;
        $fullPath2 = $baseUploadPath . $image2;
        $fullPath3 = $baseUploadPath . $image3;
        $fullPath4 = $baseUploadPath . $image4;

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
    public function toggleStatus($id) {
        $category = Categories::find($id);
        
        if ($category) {
            $category->status = $category->status === 'active' ? 'inactive' : 'active';
            $category->save();
        }
        
        return redirect()->back();  // Redirect back to the page after updating the status
    } 
    public function toggleStatuspro($id) {
        $Product = Product::find($id);
        
        if ($Product) {
            $Product->status = $Product->status === 'active' ? 'inactive' : 'active';
            $Product->save();
        }
        
        return redirect()->back();  // Redirect back to the page after updating the status
    } 
    public function editCategory($id)
    {
        $category = Categories::find($id);  // Assuming your Category model is used
        
        return view('admin.editcategory', compact('category'));
    }
    public function updateCategory(Request $request, $id)
    {
        $uploadPath = '/home/onixuvjm/public_html/uploads/categories/';
        $temppath = '/home/onixuvjm/public_html/uploads/temporary/';
        // $uploadPath = 'uploads/categories/';
        // $temppath = 'uploads/temporary/';

        // Validate input
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'nav_id' => 'required|max:255',
            'header_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
            'main_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ]);

        // Find the category to update
        $category = Categories::find($id);
        $category->title = $validatedData['title'];
        $category->description = $validatedData['description'];
        $category->nav_id = $validatedData['nav_id'];

        // Check if header image is uploaded
        if ($request->hasFile('header_img')) {
            // Delete old header image if it exists
            if ($category->header_img && File::exists(public_path(parse_url($category->header_img, PHP_URL_PATH)))) {
                File::delete(public_path(parse_url($category->header_img, PHP_URL_PATH)));
            }

            $header_img = $request->file('header_img');
            $header_img_name = time() . '1.' . $header_img->getClientOriginalExtension();

            // Move and process header image
            $header_img->move($temppath, $header_img_name);
            $imgmanager = new ImageManager(new Driver());
            $readimage1 = $imgmanager->read($temppath . $header_img_name);

            $originalWidth = $readimage1->width();
            $originalHeight = $readimage1->height();

            if (($originalWidth / $originalHeight) > (2 / 3)) {
                $newHeight = $originalHeight;
                $newWidth = intval($newHeight * (2 / 3));
            } else {
                $newWidth = $originalWidth;
                $newHeight = intval($newWidth * (3 / 2));
            }

            $readimage1->cover($newWidth, $newHeight)->save($uploadPath . $header_img_name);


            // Update category header image path
            $category->header_img = asset('uploads/categories/' . $header_img_name);

            // Delete temporary header image
            File::delete($temppath . $header_img_name);
        }

        // Check if main image is uploaded
        if ($request->hasFile('main_img')) {
            // Delete old main image if it exists
            if ($category->main_img && File::exists(public_path(parse_url($category->main_img, PHP_URL_PATH)))) {
                File::delete(public_path(parse_url($category->main_img, PHP_URL_PATH)));
            }

            $main_img = $request->file('main_img');
            $main_img_name = time() . '2.' . $main_img->getClientOriginalExtension();

            // Move and process main image
            $main_img->move($temppath, $main_img_name);
            $imgmanager = new ImageManager(new Driver());
            $readimage2 = $imgmanager->read($temppath . $main_img_name);
            $size = min($readimage2->width(), $readimage2->height());
            $readimage2->cover($size, $size)->save($uploadPath . $main_img_name);

            // Update category main image path
            $category->main_img = asset('uploads/categories/' . $main_img_name);

            // Delete temporary main image
            File::delete($temppath . $main_img_name);
        }

        // Save the updated category
        $category->save();

        // Redirect with success message
        return redirect()->route('admin.categoty')->with('success', 'Category updated successfully.');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Categories::all(); // Get all categories for the dropdown
    
        return view('admin.editproduct', compact('product', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        $uploadPath = '/home/onixuvjm/public_html/uploads/products/';
        $temppath = '/home/onixuvjm/public_html/uploads/temporary/';
        // $uploadPath = 'uploads/products/';
        // $temppath = 'uploads/temporary/';

        $product = Product::findOrFail($id);
    
        // Validate the input data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image_1' => 'image|nullable',
            'image_2' => 'image|nullable',
            'image_3' => 'image|nullable',
            'image_4' => 'image|nullable',
            'image_5' => 'image|nullable',
            'content' => 'required',
        ]);
    
        // Update product data
        $product->title = $validatedData['title'];
        $product->description = $validatedData['description'];
        $product->category_id = $validatedData['category_id'];
        $product->heading2 = $request->input('heading2');
        $product->description2 = $request->input('description2');
        $product->content = $request->content;
    
        // Handle image uploads
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('image_' . $i)) {
                // Check if old image exists and delete it
                $oldImage = $product->{'image_' . $i};
                if ($oldImage && File::exists(public_path(parse_url($oldImage, PHP_URL_PATH)))) {
                    File::delete(public_path(parse_url($oldImage, PHP_URL_PATH)));
                }

                
                // Handle new image upload
                $image1 = $request->file('image_' . $i);
                // **Corrected file name creation**
                $imagename1 = time() . '_' . $i . '.' . $image1->getClientOriginalExtension(); // Added underscore
    
                $image1->move($temppath, $imagename1);
    
                $imgmanger = new ImageManager(new Driver());
                $readimage1 = $imgmanger->read($temppath . $imagename1);
    
                $size = min($readimage1->width(), $readimage1->height()); // Get width and height
                $readimage1->cover($size, $size)->save($uploadPath . $imagename1);
    
                // **Cleanup temporary image immediately after saving**
                $imagePath1 = ($temppath . $imagename1);
                if (File::exists($imagePath1)) {
                    File::delete($imagePath1); // Ensure temporary image is deleted
                }
    
                // **Corrected assignment to product image**
                $product->{'image_' . $i} = $imagename1 ? asset('uploads/products/' . $imagename1) : null; // Saving relative path
            }
        }
    
        $product->save(); // Save updated product to the database
    
        return redirect()->route('admin.product')->with('success', 'Product updated successfully!');
    }
    
    public function createblog() {
        return view('admin.blog');
    }
    public function blogpage() {
        $blogmodel = new Blog();
        $blog = $blogmodel->select('id', 'title', 'main_img')
            ->orderBy('id', 'DESC') // Assuming 'id' indicates the latest records
            ->get();
        return view('admin.blogpage',compact('blog'));
    }
    public function saveblog(Request $request){

        $uploadPath = '/home/onixuvjm/public_html/uploads/blog/';
        $temppath = '/home/onixuvjm/public_html/uploads/temporary/';
        //  $uploadPath = 'uploads/blog/';
        // $temppath = 'uploads/temporary/';
        $request->validate([
            'title' =>'required|string|max:255',
            'main_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',  // 10 MB
            'content' => 'required',
        ]);
        // print_r($request->content);exit();

        $main_img = $request->file('main_img');

        $main_img_name = time() . '2.' . $main_img->getClientOriginalExtension();

        $main_img->move($temppath, $main_img_name);

        $imgmanger = new ImageManager(new Driver());
    
        $readimage2 = $imgmanger->read($temppath . $main_img_name);
    
        $size = min($readimage2->width(), $readimage2->height());
        $readimage2->cover($size, $size)->save($uploadPath . $main_img_name);
    
        $imagePath2 = ($temppath . $main_img_name);

        if (isset($imagePath2) && File::exists($imagePath2)) {
            if (!File::delete($imagePath2)) {
                \Log::error("Failed to delete temporary main image: " . $imagePath2);
            }
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->main_img = asset('uploads/blog/' . $main_img_name);
        $blog->content = $request->content;
        $blog->save();


        return redirect()->route('admin.blogpage')->with('success', 'Blog saved successfully!');
 
    }

    public function blogedit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogedit', compact('blog'));
    }
    public function blogupdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'main_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',  // Accept webp and other formats
            'content' => 'required',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->content = $request->content;

        // Handle image upload if a new image is provided
        if ($request->hasFile('main_img')) {
            // Define upload paths
            $uploadPath = '/home/onixuvjm/public_html/uploads/blog/';
            $temppath = '/home/onixuvjm/public_html/uploads/temporary/';
            
            $main_img = $request->file('main_img');
            $main_img_name = time() . '2.' . $main_img->getClientOriginalExtension();

            // Move the image to temporary directory
            $main_img->move($temppath, $main_img_name);

            // Use the image manager to crop and save the image
            $imgmanger = new ImageManager(new Driver());
            $readimage2 = $imgmanger->read($temppath . $main_img_name);
            $size = min($readimage2->width(), $readimage2->height());
            $readimage2->cover($size, $size)->save($uploadPath . $main_img_name);

            // Delete the temporary image
            $imagePath2 = $temppath . $main_img_name;
            if (File::exists($imagePath2)) {
                File::delete($imagePath2);
            }

            $blog->main_img = asset('uploads/blog/' . $main_img_name);
        }

        // Save the updated blog post
        $blog->save();

        return redirect()->route('admin.blogpage')->with('success', 'Blog updated successfully!');
    }

    public function blogdestroy($id)
    {
        // Find the product by ID
        $blog = Blog::find($id);
        
        if (!$blog) {
            return redirect()->back()->withErrors('Product not found.'); // Handle case when product is not found
        }

        $baseUploadPath = '/home/onixuvjm/public_html';

        $image1 = parse_url($blog->main_img, PHP_URL_PATH); // Get the path part of the URL
        // $fullPath1 = public_path($image1);

        
        $fullPath1 = $baseUploadPath . $image1;


        if ($fullPath1) {
            File::delete($fullPath1);
        }
       
        // Delete the product
        $blog->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Blog deleted successfully.');
    }
}