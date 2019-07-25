@extends ('plantilla.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Lista de Cursos<a href="curso/create"><button class="btn btn-success ml-5">Nuevo</button></a></h3>
	@include('estudiantes.curso.search')
	</div>
</div>
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>salon Curso</th>
						<th>Materias</th>
						<th>Opciones</th>
					</thead>
						
					@foreach ($cursos as $crs)
					
					<tr>
						
						<td>{{$crs->idcurso}}</td>
						<td>{{$crs->nombre}}</td>
						<td>{{$crs->salon_curso}}</td>
						<td>{{$crs->materia}}</td>
					
			
						<td>
							
							<a href=" {{ route('curso.edit' , $crs->idcurso) }}
							 "><button class="btn btn-info">Editar</button>
							</a>
							<a href="" data-target="#modal-delete-{{$crs->idcurso}} " data-toggle="modal"><button class="btn btn-danger" type="submit">Eliminar</button></a>
						
						</td>
						

					</tr>
					@include ('estudiantes.curso.delete')
					@endforeach

				</table>
			</div>
			{{$cursos->render()}}
		</div>
	</div>	
















@endsection