@extends ('plantilla.admin') 
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Estudiante</h3>
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
		
		<form action="{{ url('estudiantes/estudiante') }}" method="POST" autocomplete="off" >
			@csrf
			<div class="container">
				<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					
					<div class="form-group">
					<label  for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" required value="{{old('nombre')}}" placeholder="Nombre...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<label  for="edad">Edad</label>
					<input type="text" name="edad" class="form-control" required value="{{old('edad')}}" placeholder="Edad Estudiante...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
				<label>Curso</label>
					<select name="idcurso" class="form-control">
					@foreach ($cursos as $crs)
						<option value="{{$crs->idcurso}}" > {{$crs->nombre}} </option>
					@endforeach
					</select>
	
				</div>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<button class="btn btn-primary mt-4"  type="submit">Guardar</button>
					<button class="btn btn-danger mt-4" type="reset">Cancelar</button>
					</div>
				</div>	
				</div>
			</div>
					
			
		</form>

@endsection