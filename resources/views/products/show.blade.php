@extends('layouts.app')
@section('content')
	<div class="container text-center">
		<div class="card product text-left">
		<!-- condicionante para saber si el user esta logeado y si creo el producto -->
		@if(Auth::check() && $product->user_id == Auth::user()->id)
			<div class="pull-right">
				<a href="{{ url('/products/'.$product->id.'/edit') }}">Editar</a>
				@include('products.delete', ['product' => $product])
			</div>
		@endif
			<h1 class="center text-center">{{ $product->title }}</h1>
			<div class="row">
				<div class="col-sm-6 col-xs-12"></div>
				<div class="col-sm-6 col-xs-12">
				<p><strong>Descripcion</strong></p>
				<p style="word-break: break-all;">  {{ $product->description }}  </p>
				<p>
					@include("in_shopping_carts.form", ["product" => $product])
				</p>
				</div>

			</div>
		</div>
	</div>
@endsection