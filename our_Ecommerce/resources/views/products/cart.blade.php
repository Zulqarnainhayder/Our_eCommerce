@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 mt-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light shadow-sm">
                            <li class="breadcrumb-item glyphicon glyphicon-home"><a href="{{route('home')}}" style="color: black"> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: #34ce57">Cart</li>
                        </ol>
                    </nav>
                    <div style="border-bottom: 1px solid #0e0c0c; padding-bottom: 10px; margin-bottom: 20px">

                    </div>
                </div>
                <h1 class="text-center py-5" style="font-weight: bold">Cart</h1>
                @if(isset($cart) && $cart->getContents())
                    <div class="card table-responsive bg-light shadow-lg">
                        <table class="table table-hover shopping-cart-wrap" style="margin-bottom: 0px !important;">
                            <thead class="text-muted">
                            <tr>
                                <th scope="col">PRODUCT</th>
                                <th scope="col">QUENTITY</th>
                                <th scope="col">PRICE</th>
                                <th scope="col"  class="text-right">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($cart->getContents() as $slug => $product)

                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap"><img src="{{asset('../storage/app/public/'.$product['product']->thumbnail)}}" class="img-thumbnail img-sm"></div>
                                            <figcaption class="">
                                                <h4 class="title text-truncate">{{$product['product']->title}}</h4>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('cart.update', $slug)}}" >
                                            @csrf
                                            <input style="width: 40%" type="number" name="qty" id="qty" class="form-control text-center" min="0" max="99" value="{{$product['qty']}}">
                                            <input type="submit" name="update" value="Update" style="background-color: #80bb01; color: white; width: 40%" class="btn mt-2" style="width: 40%">
                                        </form>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <span class="price" style="color: #80bb01">Rs-{{$product['price']}}</span>
                                            <small class="price text-muted">(Rs-{{$product['product']->price}} per KG)</small>
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right">
                                        <form action="{{route('cart.remove', $slug)}}" method="POST" accept-charset="utf-8">
                                            @csrf

                                            <input type="submit" name="remove" value="Remove" class="btn btn-danger"/>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div> <!-- card.// -->
                    <div class="row" style="margin: 100px 0px 100px 0px">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="coupon">
                                    <h2 style="border-bottom: 1px solid #0e0c0c; padding-bottom: 15px" for="coupon_code">Coupon</h2>
                                    <p class="mt-5" style="font-weight: bold">Enter your coupon code if you have one.</p>
                                    <input style="width: 50%; padding: 5px" type="text" name="coupon_code" class="input-text my-5" id="coupon_code" value="" placeholder="Coupon code"><br>
                                    <input type="submit" style="background-color: #80bb01; color: white" class="btn border-1 p-3" name="apply_coupon" value="Apply coupon">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <section class="bg-light shadow-lg p-4">
                                    <h2 style="font-weight: bold; border-bottom: 1px solid #0e0c0c; padding-bottom: 15px; margin-bottom: 50px">Cart Totals</h2>
                                    <div class="col-md-12" style=" border-bottom: 1px solid #0e0c0c; margin-bottom: 50px">
                                        <div class="col-md-6">
                                            <h3 style="font-weight: bold">Total Quantity</h3>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 style="font-weight: bold; text-align: right; color: #80bb01; margin-top: 25px">{{$cart->getTotalQty()}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style=" border-bottom: 1px solid #0e0c0c; margin-bottom: 50px">
                                        <div class="col-md-6">
                                            <h3 style="font-weight: bold">Total Price</h3>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 style="font-weight: bold; text-align: right; color: #80bb01; margin-top: 25px">Rs-{{$cart->getTotalPrice()}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style=" border-bottom: 1px solid #0e0c0c; margin-bottom: 50px">
                                        <div class="col-md-6">
                                            <h3 style="font-weight: bold">Shipping</h3>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 style="font-weight: bold; text-align: right; color: #80bb01; margin-top: 25px">Will be discuessed</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style=" border-bottom: 1px solid #0e0c0c; margin-bottom: 50px">
                                        <div class="col-md-6">
                                            <h3 style="font-weight: bold">Total</h3>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 style="font-weight: bold; text-align: right; color: #80bb01; margin-top: 25px">Shipping+Total price</h4>
                                        </div>
                                    </div>
                                    <a href="{{route('checkout.index')}}" class="btn" style="background-color: #80bb01; color: white; font-weight: bold; font-size: 18px">Proceed To Checkout</a>
                                </section>
                            </div>
                        </div>
                    </div>

                @else
                    <p class="alert alert-danger">No Products in the Cart <a href="{{route('products.all')}}">Buy Some Products</a></p>
                @endif
            </div>
        </div>
    </div>
@endsection
