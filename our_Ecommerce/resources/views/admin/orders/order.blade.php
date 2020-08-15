@extends('admin.app')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Customers</li>
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Customer ID</th>
                <th>Product ID</th>
                <th>Quentity</th>
                <th>Status</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($orders->count() > 0)
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user_id}}</td>
                        <td>{{$order->product_id}}</td>
                        <td>{{$order->qty}}</td>
                        <td>{{$order->status}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>Update status button lagaon ga</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" class="alert alert-info">No products Found..</td>
                </tr>
            @endif

            </tbody>

        </table>
    </div>
@endsection

