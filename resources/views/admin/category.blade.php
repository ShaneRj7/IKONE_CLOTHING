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

            <div class="div_centerc">
                <h1 class="h2_fontc adminheading">Add Category</h1>
                <form action="{{ url('/add_category') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input class="input_colorc admininput2" name="category" placeholder="Write category name">
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-primary btnaddproduct2" name="submit" value="Add Category ">
                        </div>
                    </div>
                </form>
            </div>

            <table class="centerc table">
              <tr class="table-header">
                <td class='header__item'>Category Name</td>
                <td class='header__item'>Action</td>
              </tr>

              @foreach ($data as $data )

              <tr class='table-row'>
                <td class='table-data2'>{{ $data->category_name }}</td>
                <td class='table-data2'>
                  <a onclick="return confirm('Confirm To Delete Category')" class="btn btn-danger" href="{{ url('delete_category',$data->id) }}">Delete</a>
                </td>
              </tr>

              @endforeach

            </table>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>
