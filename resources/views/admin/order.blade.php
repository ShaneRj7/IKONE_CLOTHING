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
            <h2 class="font_sizeo adminheading2">Orders</h2>
            <div>
                <form action="{{ url('search') }}" method="get">

                @csrf

                    <input type="text" class="icolor" name="search" placeholder="Search Order">
                    <input type="submit" value="Search" class="btn btn-outline-primary">
                </form>
            </div>

            <table class="centero table">
                <tr class="th_coloro table-header2">
                    <th class="header__item2">User ID</th>
                    <th class="header__item2">Name</th>
                    <th class="header__item2">Email</th>
                    <th class="header__item2">Street</th>
                    <th class="header__item2">City</th>
                    <th class="header__item2">Country</th>
                    <th class="header__item2">Phone</th>
                    <th class="header__item2">Product Name</th>
                    <th class="header__item2">Quantity</th>
                    <th class="header__item2">Size</th>
                    <th class="header__item2">Price</th>
                    <th class="header__item2">Payment Status</th>
                    <th class="header__item2">Delivery Status</th>
                    <th class="header__item2">Image</th>
                    <th class="header__item2">Delivered</th>
                </tr>

                @forelse ($order as $order)

                <tr class="table-header">
                    <td class="table-data3">{{ $order->user_id }}</td>
                    <td class="table-data3">{{ $order->name }}</td>
                    <td class="table-data3">{{ $order->email }}</td>
                    <td class="table-data3">{{ $order->street }}</td>
                    <td class="table-data3">{{ $order->city }}</td>
                    <td class="table-data3">{{ $order->country }}</td>
                    <td class="table-data3">{{ $order->phone }}</td>
                    <td class="table-data3">{{ $order->product_name }}</td>
                    <td class="table-data3">{{ $order->quantity }}</td>
                    <td class="table-data3">{{ $order->size }}</td>
                    <td class="table-data3">{{ $order->price}}</td>
                    <td class="table-data3">{{ $order->payment_status }}</td>
                    <td class="table-data3">{{ $order->delivery_status }}</td>
                    <td class="table-data3">
                        <img class="img_sizeo" src="/product/{{ $order->image }}" alt="">
                    </td>
                    <td class="table-data3">
                    @if($order->delivery_status=='Processing')
                        <a href="{{ url('delivered',$order->id) }}" onclick="return confirm('Are You Sure This Product Is Delivered?')" class="btn btn-primary">Delivered</a>
                    @else
                        <p style="color: green" class="table-data3">Delivered</p>

                    @endif
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="20">
                        NO DATA FOUND!
                    <td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>
