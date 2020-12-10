<div class="album bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @section('sidebar')
                    @include('layouts.partials.sidebar')
                @show
            </div>
            <div class="col-md-9">
                <div class="col-md-12 my-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white shadow-lg">
                            <li class="breadcrumb-item glyphicon glyphicon-home"><a href="{{route('home')}}"> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                    @if(session()->has('message'))
                        <p class="alert alert-success">
                            {{ session()->get('message') }}
                        </p>
                    @endif
                </div>
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card mb-4 shadow-lg">
                        <img class="card-img-top img-thumbnail" style="width: 285px;height: 250px" src="{{ asset('../storage/app/public/'. $product->thumbnail)}}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $product->title }}</h4>
                            <h4 style="color: #80bb01; font-weight: bold">Rs-{{$product->price}}</h4>
                            <p class="card-text">{!! substr($product->description,0, 30 ) !!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a type="button" style="background-color: #80bb01; color: white" class="btn btn-sm" href="{{route('products.single', $product)}}">View Product</a>
                                    <a type="button" href="{{route('products.addToCart', $product)}}" style="background-color: #80bb01; margin-left: 2px; color: white" class="btn btn-sm">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
