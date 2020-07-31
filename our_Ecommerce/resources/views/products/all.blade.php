@extends('layouts.app')
@section('sidebar')
<div class="m-md-5 bg-white shadow-lg p-3">
	@parent

</div>
@endsection
@section('content')
	@include('layouts/partials/products')
@endsection
