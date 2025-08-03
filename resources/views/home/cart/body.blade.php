<div class="container-fluid cartcontainer p-4">
    <div class="row shoppingrow">
        <h1>Shopping Cart</h1>
    </div>
    <div class="row">
        <div class="col-lg-7 productscol">
            <div class="row singleproductrow p-4">
                <table class="table carttable">
                    <tr class="adminheading table-header2">
                        <th class="cth header__item" scope="col">Product Name</th>
                        <th class="cth header__item" scope="col">Product Quantity</th>
                        <th class="cth header__item" scope="col">Price</th>
                        <th class="cth header__item" scope="col">Size</th>
                        <th class="cth header__item" scope="col">Image</th>
                        <th class="cth header__item" scope="col">Remove</th>
                    </tr>

                    <?php $totalprice=0; ?>
                    @foreach ($cart as $cart )

                    <tr class="carttr table-header">
                        <td class="ctd table-data">{{ $cart->product_name }}</td>
                        <td class="ctd table-data">{{ $cart->quantity }}</td>
                        <td class="ctd table-data">LKR {{ $cart->price }}</td>
                        <td class="ctd table-data">{{ $cart->size }}</td>
                        <td class="imgd table-data"><img src="/product/{{ $cart->image }}" alt=""></td>
                        <td class="ctd table-data">
                            <div class="btn btntrash" >
                            <a href="{{ url('remove_cart',$cart->id) }}" onclick="return confirm('Do you want to remove this product?')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                </svg>
                            </a>
                        </div>
                        </td>
                    </tr>

                    <?php $totalprice=$totalprice + $cart->price ?>
                    @endforeach

                </table>

            </div>
        </div>
        <div class="col-lg-5 p-2">
            <h1>Summary</h1>
            <div class="row">
                <div class="col-6 subt">
                    <p>Subtotal</p>
                </div>
                <div class="col-6 pricecol ">
                    <p>LKR {{ $totalprice }} /-</p>
                </div>
            </div>
            <a href="{{ url('/place_order') }}"><div class="btn btn-dark btncontpayment">Place Order</div></a>
            <a href="{{ url('/view_order') }}"><div class="btn btn-dark btncontpayment">View Orders</div></a>
            <a href={{ url('/productpage') }}><div class="btn btn-outline-dark btncontshop">Continue Shopping</div></a>
        </div>
    </div>
</div>


