@extends ('plantilla.admin') 
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Nueva Materia</h3>
		@if (count($errors)>0)
		
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	</div>
	@endif
</div>
		
		<form action="{{ url('estudiantes/materia') }}" method="POST" autocomplete="off" >
			@csrf
			<div class="container-fluid">
				<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
					<div class="form-group">
					<label  for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" required value="{{old('nombre')}}" placeholder="Nombre...">
					</div>
				</div>
		

				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					<button class="btn btn-primary mt-4"  type="submit">Guardar</button>
					<button class="btn btn-danger mt-4" type="reset">Cancelar</button>
					</div>
				</div>	
				</div>
			</div>
			
					
			
		</form>

@endsection