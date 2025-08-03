<div class="container-fluid cartcontainer p-4">
    <div class="row">
        <h1>Payment Method</h1>
    </div>

    @if(session()->has('message'))

    <div class="alert alert-success">
        {{session()->get('message')}}
        <button type="button" class="close" data-dismiss="alert
        " aria-hidden="true"></button>
    </div>

    @endif

    <div class="row mb-6">
        <div class="col-lg-7 productscol">
            <p class="d-inline-flex gap-1 CODdropdown2">
                <a href="{{ url('cash_order') }}" class="CODdropdown2"><button class="btn btn-dark CODdropdown cbtn" type="button" data-bs-toggle="collapse" data-bs-target="#COD" aria-expanded="false" aria-controls="collapseExample">
                  Cash On Delivery
                </button></a>
            </p>
            <p class="d-inline-flex gap-1 CODdropdown2">
                <a href="{{ url('card_order') }}" class="CODdropdown2"><button class="btn btn-dark CODdropdown cbtn" type="button" data-bs-toggle="collapse" data-bs-target="#Card" aria-expanded="false" aria-controls="collapseExample">
                    Card Payment
                </button></a>
            </p>
            </div>
    </div>
    <div class="row">
            <a href={{ url('/productpage') }}><div class="btn btn-outline-dark btncontshop2">Continue Shopping</div></a>
    </div>
</div>
