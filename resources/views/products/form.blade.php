{!! Form::open(['url' => $url, 'method' => $method]) !!} <!-- $url y $method son variables y esperan un post o url diversas -->

		<div class="form-group">
		{{ Form::text('title',$product->title,['class' => 'form-control', 'placeholder'=>'Titulo...']) }}
		</div>
		<div class="form-group">
		{{ Form::number('pricing',$product->pricing,['class' => 'form-control', 'placeholder'=>'Precio...']) }}
		</div>
		<div class="form-group">
		{{ Form::textarea('description',$product->description,['class' => 'form-control', 'placeholder'=>'Descripcion...']) }}
		</div>
		<div class="form-group text-right">
			<input type="submit" value="Enviar" class="btn btn-success" >

			<a href="{{ url('/products') }}"> Regresar al listado de productos</a>
		</div>


	{!! Form::close() !!}