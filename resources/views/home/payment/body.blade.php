{{-- <div class="container-fluid cartcontainer p-4">
    <div class="row">
        <h1>Shopping Cart</h1>
    </div>
    <div class="row">
        <div class="col-lg-7 productscol">
            <p class="d-inline-flex gap-1 CODdropdown">
                <button class="btn btn-dark CODdropdown cbtn" type="button" data-bs-toggle="collapse" data-bs-target="#COD" aria-expanded="false" aria-controls="collapseExample">
                  Cash On Delivery
                </button>
            </p>
            <div class="collapse p-4" id="COD">
                <h1>Cash On Delivery</h1>
                <form class=" card card-body px-4 py-3">
                  <div class="mb-3">
                    <label for="inputaddress1" class="form-label">Address 1</label>
                    <input type="text" class="form-control" id="inputaddress1">
                  </div>
                  <div class="mb-3">
                    <label for="inputaddress2" class="form-label">Address 2</label>
                    <input type="text" class="form-control" id="inputaddress2">
                  </div>
                </form>
            </div>
            <p class="d-inline-flex gap-1 CODdropdown">
                <button class="btn btn-dark CODdropdown cbtn" type="button" data-bs-toggle="collapse" data-bs-target="#Card" aria-expanded="false" aria-controls="collapseExample">
                    Card Payment
                </button>
            </p>
            <div class="collapse p-4" id="Card">
                <h1>Card Payment</h1>
                <form class=" card card-body px-4 py-3">
                  <div class="mb-3">
                    <label for="inputcardnumber" class="form-label">Card Number</label>
                    <input type="number" class="form-control" id="inputcardnumber">
                  </div>
                  <div class="row">
                    <div class="mb-3 col-md-6 col-lg-6">
                        <label for="inputCVV" class="form-label">CVV Code</label>
                        <input type="password" class="form-control" id="inputCVV">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-6">
                        <label for="inputexdate" class="form-label">Expiry Date</label>
                        <input type="date" class="form-control" id="inputexdate">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="inputnameoncard" class="form-label">Name on Card</label>
                    <input type="text" class="form-control" id="inputnameoncard">
                  </div>

                </form>
            </div>
        </div>

        <div class="col-lg-5 p-2">
            <h1>Summary</h1>
            <div class="row">
                <div class="col-6 subt">
                    <p>Subtotal</p>
                </div>
                <div class="col-6 pricecol">
                    <p>LKR  /-</p>
                </div>
            </div>
            <a href="{{ url('/payment') }}"><div class="btn btn-dark btncontpayment">Continue Payment</div></a>
            <a href={{ url('/productpage') }}><div class="btn btn-outline-dark btncontshop">Continue Shopping</div></a>
        </div>
    </div>
</div> --}}
