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
                <th>Username</th>
                <th>Email</th>
                <th>Billing Address</th>
                <th>Shipping Address</th>
                <th>Country</th>
                <th>State</th>
                <th>Zip Code</th>
{{--                <th>Actions</th>--}}
            </tr>
            </thead>
            <tbody>
            @if($customers->count() > 0)
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->username}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->billing_address1}}</td>
                        <td>{{$customer->shipping_address1}}</td>
                        <td>{{$customer->billing_country}}</td>
                        <td>{{$customer->billing_state}}</td>
                        <td>{{$customer->billing_zip}}</td>
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

