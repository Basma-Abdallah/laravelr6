<section class="featured-product section-padding">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-12 text-center">
                            <h2 class="mb-5">Featured Products</h2>
                        </div>
                        @foreach ( $products as $product)
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="{{route('products.edit' , $product['id'])}}">
                                    <img src="{{asset('assets/images/product/'. $product->image )}}" class="img-fluid product-image" alt="{{$product->ProductName}}">
                                </a>

                                <div class="product-top d-flex">
                                    <span class="product-alert me-auto">{{$product->ProductName}}</span>

                                    <a href="#" class="bi-heart-fill product-icon"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="{{route('products.edit' , $product['id'])}}" class="product-title-link">{{$product->ProductName}}</a>
                                        </h5>

                                        <p class="product-p">{{$product->description}}</p>
                                    </div>

                                    <small class="product-price text-muted ms-auto mt-auto mb-5">{{$product->price}}</small>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        

                        <div class="col-12 text-center">
                            <a href="products.html" class="view-all">View All Products</a>
                        </div>

                    </div>
                </div>
            </section>