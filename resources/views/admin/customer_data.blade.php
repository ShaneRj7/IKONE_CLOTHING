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
            <h2 class="font_sizecd adminheading2">Customers</h2>
            <table class="table centercd">
                <thead>
                    <tr class="th_colorcd table-header2">
                        <th class="header__item" scope="col">ID</th>
                        <th class="header__item" scope="col">Name</th>
                        <th class="header__item" scope="col">Email</th>
                        <th class="header__item" scope="col">Phone</th>
                        <th class="header__item" scope="col">Date Of Birth</th>
                        <th class="header__item" scope="col">Gender</th>
                        <th class="header__item" scope="col">Street</th>
                        <th class="header__item" scope="col">City</th>
                        <th class="header__item" scope="col">Country</th>
                        <th class="header__item" scope="col">Remove </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer_data as $customer_data)

                <tr class="table-header">
                    <th class="table-data" scope="row">{{ $customer_data->id }}</td>
                    <td class="table-data">{{ $customer_data->name }}</td>
                    <td class="table-data">{{ $customer_data->email }}</td>
                    <td class="table-data">{{ $customer_data->phone }}</td>
                    <td class="table-data">{{ $customer_data->DOB  }}</td>
                    <td class="table-data">{{ $customer_data->gender  }}</td>
                    <td class="table-data">{{ $customer_data->street }}</td>
                    <td class="table-data">{{ $customer_data->city  }}</td>
                    <td class="table-data">{{ $customer_data->country  }}</td>
                    <td>
                        <a onclick="return confirm('Are You Sure. You want to remove this Customer.')" href="{{ url('delete_customer', $customer_data->id) }}" class="btn btn-danger">Remove</a>
                    </td>
                </tr>

                @endforeach

                </tbody>




            </table>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>
