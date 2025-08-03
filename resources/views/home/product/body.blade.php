<div class="container-fluid productscontainer p-4">
    <div class="row productsheadrow mensheadrow">
        <div class="col">
            <h1>Menswear & Womenswear</h1>
            <p>Discover our selection of premium clothing products.</p>
        </div>
    </div>
    <div class="row tshirtheadrow p-4">
        <div class="col">
            <h1>Products</h1>
        </div>
    </div>
    <div class="row productsfootrow">
        <div class="row">

            @foreach($product as $products)

            <div class="col col-xs-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <a href={{ url('productdetail',$products->id)}}><img src="product/{{ $products->image }}" alt=""></a>
                <p>{{ $products->name }}</p>
                <p>LKR {{ $products->price }}</p>
                <div class="button" id="addtocartbtn">
                    <a href={{ url('productdetail',$products->id)}}><button class="btn btn-dark">Show Details</button></a>
                </div>
            </div>

            @endforeach

            <span class="pgnext">
                {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
            </span>
        </div>
    </div>
</div>
