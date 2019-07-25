@extends ('plantilla.admin') 
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Curso: {{$curso->nombre}}</h3>
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
		<form action=" {{ url('estudiantes/curso', $curso->idcurso) }}" method="POST" >
		
			<input type="hidden" name="_method" value="PATCH"> 
		@csrf
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					
					<div class="form-group">
					<label  for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" required value="{{$curso->nombre}}">
					</div>
				</div>
			
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<label  for="salon_curso">Salon Curso</label>
					<input type="text" name="salon_curso" class="form-control" value="{{$curso->salon_curso}}">
					</div>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
				<label>Materias</label>
					<select name="idmaterias" class="form-control">
					@foreach ($materias as $mat)
					@if ($mat->idmaterias==$curso->idmaterias)
						<option value="{{$mat->idmaterias}}" selected>{{$mat->nombre}} </option>
					@else
						<option value="{{$mat->idmaterias}}" > {{$mat->nombre}} </option>
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