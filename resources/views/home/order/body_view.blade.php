<div class="container-fluid cartcontainer p-4">
    <div class="row title">
        <h1>Placed Orders</h1>
    </div>
</div>
<div class="row productsrow">
    <div class="col-lg-7 productscol">
        <div class="row singleproductrow p-4">
            <table class=" table carttable">
                <thead>
                    <tr class="adminheading table-header2">
                        <th class="cth header__item" scope="col">Product Name</th>
                        <th class="cth header__item" scope="col">Quantity</th>
                        <th class="cth header__item" scope="col">Size</th>
                        <th class="cth header__item" scope="col">Price</th>
                        <th class="cth header__item" scope="col">Payment Status</th>
                        <th class="cth header__item" scope="col">Delivery Status</th>
                        <th class="cth header__item" scope="col">Image</th>
                        <th class="cth header__item" scope="col">Cancel Order</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $order )

                <tr class="carttr table-header">
                    <td class="ctd table-data" scope="row">{{ $order->product_name }}</td>
                    <td class="ctd table-data" scope="row">{{ $order->quantity }}</td>
                    <td class="ctd table-data" scope="row">{{ $order->size }}</td>
                    <td class="ctd table-data" scope="row">{{ $order->price }}</td>
                    <td class="ctd table-data" scope="row">{{ $order->payment_status }}</td>
                    <td class="ctd table-data" scope="row">{{ $order->delivery_status }}</td>
                    <td class="imgd table-data" scope="row"><img src="/product/{{ $order->image }}" alt=""></td>
                    <td class="ctd table-data" scope="row">

                        @if($order->delivery_status=='Processing')

                        <a onclick="return confirm('Do you want to cancel this order?')" href="{{ url('cancel_order',$order->id) }}" class="btn btn-danger">Cancel Order</a>

                        @else

                        <img class="greentick" src="/home/images/greentick.png" alt="">

                        @endif

                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
