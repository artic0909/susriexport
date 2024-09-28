<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
// use App\Http\Controllers\ModelNotFoundException;

class AdminController extends Controller
{


    public function index()
    {
        return view('admin.index');
    }




    public function productsAdmin()
    {
        $products = Product::with('categoryy')->paginate(20);
        $categories = Category::all();
        $sizesOfProducts = Size::all();
        return view('admin.adminProducts', compact('products', 'categories', 'sizesOfProducts'));
    }

    public function categoryAdmin()
    {
        $categories = Category::paginate(10);
        return view('admin.adminCatagories', compact('categories'));
    }

    public function sizesAdmin()
    {
        $sizes = Size::paginate(10);
        return view('admin.adminSizes', compact('sizes'));
    }




    public function deleteProduct(int $id)
    {
        $product = Product::find($id);

        if ($product == null) {
            return redirect('/admin-products')->with('error', 'No product found with that id');
        }

        $product->delete();
        return redirect('/admin-products')->with('success', 'Product removed!');
    }




    public function deleteSize(int $id)
    {
        $Size = Size::find($id);

        if ($Size == null) {
            return redirect('/admin-size')->with('error', 'No product found with that id');
        }

        $Size->delete();
        return redirect('/admin-size')->with('success', 'Product removed!');
    }








    public function addNewProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required',
            'specification' => 'required',
            'minimum_size_id' => 'required',
            'maximum_size_id' => 'required',
            // 'size_id' => 'required|array',
            // 'size_id.*' => 'string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Max size: 10MB for each image
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->category_id = $validatedData['category_id'];
        $product->specification = $validatedData['specification'];
        $product->minimum_size_id = $validatedData['minimum_size_id'];
        $product->maximum_size_id = $validatedData['maximum_size_id'];
        // $product->size_id = implode(',', $validatedData['size_id']);

        // Generate slug from the title
        $slug = Str::slug($validatedData['name']);

        // Check if the generated slug already exists in the database
        $count = Product::where('slug', $slug)->count();
        if ($count > 0) {
            // If slug exists, append a number to make it unique
            $slug .= '-' . ($count + 1);
        }

        $product->slug = $slug; // Assign the generated slug

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/products'), $imageName);
                $imagePaths[] = 'uploads/products/' . $imageName; // Store image paths in an array
            }
        }

        $product->image = $imagePaths;
        $product->save();

        return redirect('/admin-products')->with('message', 'New Product Added Successfully!');
    }











    public function addNewCategory(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Max size: 10MB for each image
        ]);

        $product = new Category();
        $product->title = $validatedData['title'];

        // Generate slug from the title
        $slug = Str::slug($validatedData['title']);

        // Check if the generated slug already exists in the database
        $count = Product::where('slug', $slug)->count();
        if ($count > 0) {
            // If slug exists, append a number to make it unique
            $slug .= '-' . ($count + 1);
        }

        $product->slug = $slug; // Assign the generated slug

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/products'), $imageName);
                $imagePaths[] = 'uploads/products/' . $imageName; // Store image paths in an array
            }
        }

        $product->image = $imagePaths; // Save the array of image file paths to the database

        $product->save();

        return redirect('/admin-category')->with('message', 'New category Added Successfully!');
    }





    public function addNewSize(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'product_size' => 'required|array',
                'product_size.*' => 'string|max:255',
            ]);

            foreach ($validatedData['product_size'] as $size) {
                $Sizes = new Size();

                $slug = Str::slug($size);
                $count = Size::where('slug', $slug)->count();
                if ($count > 0) {
                    $slug .= '-' . ($count + 1);
                }

                $Sizes->slug = $slug;
                $Sizes->product_size = $size;
                $Sizes->save();
            }

            return redirect('/admin-size')->with('message', 'New category Added Successfully!');
        } catch (\Exception $e) {
            if ($e instanceof ValidationException) {
                return redirect()->back()->withErrors($e->validator->errors())->withInput();
            } elseif ($e->getCode() === '23000') { // Check for Integrity constraint violation
                return redirect()->back()->withInput()->with('error', 'Duplicate size value. Please choose a unique size value.');
            } else {
                return redirect()->back()->withInput()->with('error', 'An error occurred while adding the size.');
            }
        }
    }





    public function updateProduct(Request $request)
    {
        $product = Product::find($request->input("id"));
        if (!$product) {
            return redirect('/admin-products')->with('error', 'Product not found!');
        }

        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        $product->category_id = $request->input("category_id");
        $product->specification = $request->input("specification");
        $product->minimum_size_id = $request->input("minimum_size_id");
        $product->maximum_size_id = $request->input("maximum_size_id");

        
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/products'), $imageName);
                $imagePaths[] = 'uploads/products/' . $imageName;
            }
            $product->image = $imagePaths;
        }

        $product->save();
        return redirect('/admin-products')->with('message', 'Product Updated Successfully!');
    }





    public function updateCategory(Request $request)
    {
        $product = Category::find($request->input("id"));
        if (!$product) {
            return redirect('/admin-category')->with('error', 'Category not found!');
        }

        $product->title = $request->input("title");

        // Check if new images are uploaded
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/products'), $imageName);
                $imagePaths[] = 'uploads/products/' . $imageName; // Store image paths in an array
            }
            $product->image = $imagePaths;
        }

        $product->save();
        return redirect('/admin-category')->with('message', 'Category Updated Successfully!');
    }





    public function updateSize(Request $request)
    {
        try {
            $sizes = Size::findOrFail($request->input("id"));
            $sizes->product_size = $request->input("product_size");
            $sizes->save();

            return redirect('/admin-size')->with('message', 'Size updated successfully!');
        } catch (\Exception $e) {
            if ($e instanceof ModelNotFoundException) {
                return redirect('/admin-category')->with('error', 'Category not found!');
            } elseif ($e instanceof ValidationException) {
                return redirect()->back()->withErrors($e->validator->errors())->withInput();
            } elseif ($e->getCode() === '23000') { // Check for Integrity constraint violation
                return redirect()->back()->withInput()->with('error', 'Duplicate size value. Please choose a unique size value.');
            } else {
                return redirect()->back()->withInput()->with('error', 'An error occurred while updating the size.');
            }
        }
    }




    public function deleteCategoryWithProducts(Category $category)
    {
        // Delete the category and its related products
        $category->products()->delete();
        $category->delete();

        return redirect('/admin-category')->with('success', 'Category removed!');
    }





    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        try {
            $data = $request->all();
            if (Auth::guard('admin')->attempt(["email" => $data["email"], "password" => $data["password"]])) {
                return redirect()->route('admin.dashboard');
            } else {
                return back()->with("msg", "Invalid credentials");
            }
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with("msg", throw $th);
        }
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with("msg", "Logged out successfully");
    }
}
