@extends("layouts.app")
@section("content")
<div class="">
	<h1 class="text-center">Tu carrito de compras</h1>
</div>
<div class="container">
	<table class="table table-bordered">
		<thead>
			<tr>
				<td>Producto</td>
				<td>Precio</td>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
				<tr>
					<td>{{ $product->title }}</td>
					<td>{{ $product->pricing }}</td>
				</tr>
			@endforeach
				<tr>
					<td>Total</td>
					<td>{{ $total }}</td><!--$total se llama desde el controlador -->
				</tr>
		</tbody>
	</table>
</div>
@endsection