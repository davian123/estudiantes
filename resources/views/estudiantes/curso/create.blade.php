@extends ('plantilla.admin') 
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Curso</h3>
		@if (count($errors)>0)
		
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>@endif
	</div>
	
</div>
		
		<form action="{{ url('estudiantes/curso') }}" method="POST" autocomplete="off" >
			@csrf
			
				<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					
					<div class="form-group">
					<label  for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" required value="{{old('nombre')}}" placeholder="Nombre Curso...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<label  for="salon_curso">Salon del Curso</label>
					<input type="text" name="salon_curso" class="form-control" value="{{old('salon_curso')}}" placeholder="Salon Curso...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
				<label>Materias</label>
					<select name="idmaterias" class="form-control">
					@foreach ($materias as $mat)
						<option value="{{$mat->idmaterias}}" > {{$mat->nombre}} </option>
					@endforeach
					</select>
	
				</div>
				</div>

				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<button class="btn btn-primary"  type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
				</div>	
				</div>
			
					
		</form>

@endsection