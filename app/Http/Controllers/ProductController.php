<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    public function view_product()
    {
        $category =category::all();
        return view('admin.product',compact('category'));
    }
    public function add_product(Request $request)
    {
        $product=new product;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->category=$request->category;
        $product->size=$request->size;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        $product->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }
    public function show_product()
    {
        $product=product::all();
        return view('admin.show_product',compact('product'));
    }
    public function delete_product($id)
    {
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');;
    }
    public function edit_product($id)
    {
        $product=product::find($id);
        $category=category::all();
        return view('admin.edit_product',compact('product','category'));
    }
    public function edit_product_confirm(Request $request,$id)
    {
        $product=product::find($id);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->category=$request->category;
        $product->image=$request->image;
        $product->size=$request->size;
        $product->quantity=$request->quantity;
        $image=$request->image;
        if($image)
        {
            $currentimage=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$currentimage);
            $product->image=$currentimage;
        }
        $product->save();
        return redirect()->back()->with('message','Product Edited Successfully');;
    }



    //API
            //CREATE PRODUCT
            public function newProduct(Request $request)
            {
                Log::info('Received new product request', ['request_data' => $request->all()]);

                try {
                    $request->validate([
                        'name' => 'required|string',
                        'description' => 'required|string',
                        'category' => 'required|string',
                        'size' => 'required|string',
                        'quantity' => 'required|integer',
                        'price' => 'required|numeric',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
                    ]);

                    Log::info('Validation passed');

                    $product_name = $request->input('name');
                    $product_description = $request->input('description');
                    $product_category = $request->input('category');
                    $product_size = $request->input('size');
                    $product_quantity = $request->input('quantity');
                    $product_price = $request->input('price');
                    $product_image = $request->file('image');

                    Log::info('Input data extracted', [
                        'name' => $product_name,
                        'description' => $product_description,
                        'category' => $product_category,
                        'size' => $product_size,
                        'quantity' => $product_quantity,
                        'price' => $product_price,
                        'image' => $product_image ? $product_image->getClientOriginalName() : 'No image'
                    ]);

                    $response = $this->createProduct($product_name, $product_description, $product_category, $product_size, $product_quantity, $product_price, $product_image);

                    if ($response instanceof Product) {
                        Log::info('Product created successfully', ['product' => $response]);

                        return response()->json([
                            'status' => [
                                'code' => 200,
                                'message' => 'Success'
                            ],
                            'data' => [
                                'response' => $response
                            ]
                        ]);
                    } else {
                        Log::error('Product creation failed', ['response' => $response]);
                        return $response;
                    }
                } catch (\Exception $e) {
                    Log::error('Error in newProduct method', ['exception' => $e->getMessage()]);
                    return response()->json([
                        'status' => [
                            'code' => 500,
                            'message' => 'Internal Server Error'
                        ],
                        'error' => $e->getMessage()
                    ]);
                }
            }
            private function createProduct($name, $description, $category, $size, $quantity, $price, $image)
            {
                try {
                    Log::info('Creating product', [
                        'name' => $name,
                        'description' => $description,
                        'category' => $category,
                        'size' => $size,
                        'quantity' => $quantity,
                        'price' => $price,
                        'image' => $image ? $image->getClientOriginalName() : 'No image'
                    ]);

                    $product = new Product();
                    $product->name = $name;
                    $product->description = $description;
                    $product->category = $category;
                    $product->size = $size;
                    $product->quantity = $quantity;
                    $product->price = $price;

                    // Store the image and save the path
                    if ($image) {
                        $imagePath = $image->store('images', 'public');
                        Log::info('Image stored', ['imagePath' => $imagePath]);
                        $product->image = $imagePath;
                    } else {
                        Log::warning('No image provided');
                    }

                    $product->save();
                    Log::info('Product saved', ['product' => $product]);

                    return $product;
                } catch (\Exception $e) {
                    Log::error('Error creating product', ['exception' => $e->getMessage()]);
                    return response()->json([
                        'status' => [
                            'code' => 500,
                            'message' => 'Internal Server Error'
                        ],
                        'error' => $e->getMessage()
                    ]);
                }
            }


             //GET PRODUCT
 public function getProduct($id)
 {
     $product = Product::find($id);
     if ($product == null) {
         return response()->json([
             'status' => [
                 'code' => 500,
                 'message' => 'Product not found'
             ]
         ]);
     } else {
         return response()->json([
             'status' => [
                 'code' => 200,
                 'message' => 'Success'
             ],
             'data' => [
                 'response' => $product
             ]
         ]);
     }
 }


            //DELETE PRODUCT
            public function deleteProduct($id)
            {
                $product = Product::find($id);
                if ($product == null) {
                    return response()->json([
                        'status' => [
                            'code' => 500,
                            'message' => 'Product not found'
                        ]
                    ]);
                } else {
                    $product->delete();
                    return response()->json([
                        'status' => [
                            'code' => 200,
                            'message' => 'Success'
                        ]
                    ]);
                 }
                }


            //UPDATE PRODUCT
 public function updateProduct(Request $request, int $id)
{
    // Find the product by ID
    $product = Product::find($id);
    // Check if the product exists
    if (!$product) {
        return response()->json(['status' => 404, 'message' => 'Product not found'], 404);
    }
    // Define validation rules
    $validator = Validator::make($request->all(), [
        'name' => 'sometimes|required|string|max:255',
        'description' => 'sometimes|required|string',
        'category' => 'sometimes|required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'size' => 'sometimes|required|string|max:50',
        'quantity' => 'sometimes|required|integer',
        'price' => 'sometimes|required|numeric',
    ]);
    // Check if validation fails
    if ($validator->fails()) {
        return response()->json(['status' => 422, 'errors' => $validator->errors()], 422);
    }
    // Update product fields, excluding image
    $product->update($request->only(['name', 'description', 'category', 'size', 'quantity', 'price']));
    // Handle image file if present
    if ($request->hasFile('image')) {
        // Delete the old image if exists
        if ($product->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete('product/' . $product->image);
        }
        $image = $request->file('image');
        $imagePath = 'product';
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($imagePath), $imageName);
        $product->image = $imageName;
    }
    // Save the updated product
    $product->save();
    // Return a success response
    return response()->json(['status' => 200, 'message' => 'Product updated successfully'], 200);
}
}
