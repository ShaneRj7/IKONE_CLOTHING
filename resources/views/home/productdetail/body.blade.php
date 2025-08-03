
<div class="containerfluid productcontainer">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-6 imagescol">
            <img src="/product/{{ $product->image }}">
        </div>
        <div class="col col-xs-12 col-sm-12 col-lg-6 textcol ">
            <h1>{{ $product->name }}</h1>
            <h2>Rs. {{ $product->price }} /-</h2>
            <h5>Description</h5>
            <p class="mb-3">Made from heavyweight cotton in a roomy fit for easy movement and layering, this product from our Premiuim collection ups any outfit with its premium construction and embroidery on the front. The enzyme wash softens the feel and makes it look like you've been saving it for years.</p>

            <form action="{{ url('cart',$product->id) }}" method="Post">

                @csrf

            <div class="row">
                    <div class="col">
                        <h6>Size</h6>
                     <select class="form-select mb-4" aria-label="Size" name="size" required="">
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                     </select>
                    <div>
                        <h6>Quantity</h2>
                        <input type="number" name="quantity" value="1" min="1">
                        </div>
                    </div>
                <div class="col">
                    <button class="btn btn-dark btnproduct">Add to cart</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
