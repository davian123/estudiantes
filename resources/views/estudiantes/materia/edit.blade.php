@extends ('plantilla.admin') 
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Materia: {{$materia->nombre}}</h3>
		@if (count($errors)>0)
		
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
	
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>
		<form action=" {{ url('estudiantes/materia', $materia->idmaterias) }}" method="POST" >
		
			<input type="hidden" name="_method" value="PATCH"> 
		@csrf
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
					<div class="form-group">
					<label  for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" required value="{{$materia->nombre}}">
					</div>
				</div>

			
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
				</div>	
				</div>		
			</div>
		</form>

@endsection