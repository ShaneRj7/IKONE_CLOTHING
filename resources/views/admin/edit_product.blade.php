<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>

    @include('admin.sidebar')
    @include('admin.header')

    <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
                <button type="button" class="close" data-dismiss="alert
                " aria-hidden="true"></button>
            </div>

            @endif

            <div class="div_centerep">
                <h1 class="font_sizeep adminheading">Edit Product</h1>
            <form action="{{ url('/edit_product_confirm',$product->id) }}" method="POST" enctype="multipart/form-data" >

                @csrf

                <div class="contep">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelep'>Product Name :</label>
                        </div>
                        <div class="col">
                            <input class="text_colorep admininput" type="text" name="name" placeholder="Enter Product Name" required="" value="{{ $product->name }}">
                        </div>
                    </div>
                </div>
                <div class="conto">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelp'>Description :</label>
                        </div>
                        <div class="col">
                            <input class="text_colorp admininput" type="text" name="description" placeholder="Write a Description" required="{{ $product->description }}">
                        </div>
                    </div>
                </div>
                <div class="contep">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelep'>Price :</label>
                        </div>
                        <div class="col">
                            <input class="text_colorep admininput" type="number" name="price" placeholder="Enter Price" required="" value="{{ $product->price }}">
                        </div>
                    </div>
                </div>
                <div class="contep">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelep'>Quantity :</label>
                        </div>
                        <div class="col">
                            <input class="text_colorep admininput" type="number" name="quantity" min="0" placeholder="Enter Quantity" required="" value="{{ $product->quantity }}">
                        </div>
                    </div>
                </div>
                <div class="contep">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelep'>Size :</label>
                        </div>
                        <div class="col">
                            <select class="text_colorp admininput" name="size" required="">
                                <option value="{{ $product->size }}" selected="">Select Size</option>
                                <option value="Small" >Small</option>
                                <option value="Medium" >Medium</option>
                                <option value="Large" >Large</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="contep">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelep'>Category :</label>
                        </div>
                        <div class="col">
                            <select class="text_colorep admininput" name="category" required="">
                                <option value="{{ $product->category }}" selected="">{{ $product->category }}</option>

                                @foreach ($category as $category )

                                <option value="{{$category->category_name }}">{{$category->category_name }}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
                <div class="contep">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelep'>Current Product Image :</label>
                        </div>
                        <div class="col">
                            <img style="margin: auto; float: left;" height="100" width="100" src="/product/{{ $product->image }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="contep">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelep'>Change Product Image :</label>
                        </div>
                        <div class="col">
                            <div class="div admininput">
                                <input type="file" name="image" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contep">
                    <input type="submit" value="Edit Product" class="btn btn-primary btnaddproduct">
                </div>
            </form>
            </div>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>
