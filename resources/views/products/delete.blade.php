{!! Form::open(['url' => '/products/'.$product->id, 'method' => 'DELETE', 'class' => 'inline-block']) !!}
	<input type="submit" class="btn btn-link" value="Eliminar" style="padding: 0px; margin: 0px; text-transform: none; color: red;">

{!! Form::close() !!}