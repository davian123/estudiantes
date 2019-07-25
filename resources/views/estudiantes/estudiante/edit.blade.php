@extends ('plantilla.admin') 
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Estudiante: {{$estudiante->nombre}}</h3>
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
		<form action=" {{ url('estudiantes/estudiante', $estudiante->idestudiante) }}" method="POST" >
		
			<input type="hidden" name="_method" value="PATCH"> 
		@csrf
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					
					<div class="form-group">
					<label  for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" required value="{{$estudiante->nombre}}">
					</div>
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<label  for="edad">Edad</label>
					<input type="text" name="edad" class="form-control" required value="{{$estudiante->edad}}">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
				<label>Curso</label>
					<select name="idcurso" class="form-control">
					@foreach ($cursos as $crs)
					@if ($crs->idcurso==$estudiante->idcurso)
						<option value="{{$crs->idcurso}}" selected>{{$crs->nombre}} </option>
					@else
						<option value="{{$crs->idcurso}}" > {{$crs->nombre}} </option>
					@endif
					@endforeach
					</select>
				</div>
				</div>
			
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
				</div>	
				</div>		

		</form>

@endsection