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
               {{  session()->get('message') }}}
                <button type="button" class="close" data-dismiss="alert
                " aria-hidden="true"></button>
            </div>

            @endif

            <div class="div_centerp">
                <h1 class="font_sizep adminheading">Add Product</h1>
            <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data" >

                @csrf

                <div class="conto">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelp'>Product Name :</label>
                        </div>
                        <div class="col">
                            <input class="text_colorp admininput" type="text" name="name" placeholder="Enter Product Name" required="">
                        </div>
                    </div>
                    </div>
                <div class="conto">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelp'>Description :</label>
                        </div>
                        <div class="col">
                            <input class="text_colorp admininput" type="text" name="description" placeholder="Write a Description" required="">
                        </div>
                    </div>
                </div>
                <div class="conto">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelp'>Price :</label>
                        </div>
                        <div class="col">
                            <input class="text_colorp admininput" type="number" name="price" placeholder="Enter Price" required="">
                        </div>
                    </div>
                </div>
                <div class="conto">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelp'>Quantity :</label>
                        </div>
                        <div class="col">
                            <input class="text_colorp admininput" type="number" name="quantity" min="0" placeholder="Enter Quantity" required="">
                        </div>
                    </div>
                </div>
                <div class="conto">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelp'>Size :</label>
                        </div>
                        <div class="col">
                            <select class="text_colorp admininput" name="size" required="">
                                <option value="" selected="">Select Size</option>
                                <option value="Small" >Small</option>
                                <option value="Medium" >Medium</option>
                                <option value="Large" >Large</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="conto">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelp'>Category :</label>
                        </div>
                        <div class="col">
                            <select class="text_colorp admininput" name="category" required="">
                                <option value="" selected="">Select Category</option>

                                @foreach ($category as $category )

                                <option value="{{$category->category_name }}">{{$category->category_name }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="conto">
                    <div class="row">
                        <div class="col">
                            <label class='adminlabel labelp'>Product Image :</label>
                        </div>
                        <div class="col">
                            <div class="div admininput">
                                <input  classs='admininput' type="file" name="image" required="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="conto">
                    <input type="submit" value="Add Product" class="btn btn-primary btnaddproduct">
                </div>
            </form>
            </div>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>
