@extends ('plantilla.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Listado de Estudiantes<a href="estudiante/create"><button class="btn btn-success ml-5">Nuevo</button></a></h3>
	@include('estudiantes.estudiante.search')
	</div>
</div>
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>edad</th>
						<th>Curso</th>
						<th>Opciones</th>
					</thead>
						
					@foreach ($estudiantes as $std)
					
					<tr>
						
						<td>{{$std->idestudiante}}</td>
						<td>{{$std->nombre}}</td>
						<td>{{$std->edad}}</td>
						<td>{{$std->curso}}</td>
						<td>
							
							<a href=" {{ route('estudiante.edit' , $std->idestudiante) }}
							 "><button class="btn btn-info">Editar</button>
							</a>
							<a href="" data-target="#modal-delete-{{$std->idestudiante}} " data-toggle="modal"><button class="btn btn-danger" type="submit">Eliminar</button></a>
						
						</td>
						
 
					</tr>
					@include ('estudiantes.estudiante.delete')
					@endforeach

				</table>
			</div>
			{{$estudiantes->render()}}
		</div>
	</div>	
















@endsection