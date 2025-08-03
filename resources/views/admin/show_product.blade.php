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

            <h2 class="font_sizesp adminheading2">Products</h2>
            <table class="centersp">
                <tr class="th_colorsp table-header2">
                    <th class="header__item">Product Name</th>
                    <th class="header__item">Category</th>
                    <th class="header__item">Quantity</th>
                    <th class="header__item">Size</th>
                    <th class="header__item">Price</th>
                    <th class="header__item">Description</th>
                    <th class="header__item">Image</th>
                    <th class="header__item">Delete</th>
                    <th class="header__item">Edit</th>
                </tr>

                @foreach ($product as $product)

                <tr class="table-header">
                    <td class="table-data">{{ $product->name }}</td>
                    <td class="table-data">{{ $product->category }}</td>
                    <td class="table-data">{{ $product->quantity }}</td>
                    <td class="table-data">{{ $product->size }}</td>
                    <td class="table-data">{{ $product->price }}</td>
                    <td class="table-data">{{ $product->description }}</td>
                    <td class="table-data">
                        <img class="img_sizesp" src="/product/{{ $product->image }}" alt="">
                    </td>
                    <td class="table-data">
                        <a class="btn btn-danger" onclick="return confirm('Confirm To Delete This Record!')" href="{{ url('delete_product', $product->id) }}">Delete</a>
                    </td>
                    <td class="table-data">
                        <a class="btn btn-success" onclick="return confirm('Confirm To Edit This Record!')" href="{{ url('edit_product', $product->id) }}">Edit</a>
                    </td>
                </tr>

                @endforeach

            </table>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>
