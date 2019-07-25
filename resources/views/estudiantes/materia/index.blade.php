@extends ('plantilla.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Listado de Materias<a href="materia/create"><button class="btn btn-success ml-5">Nuevo</button></a></h3>
	@include('estudiantes.materia.search')
	</div>
</div>
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Opciones</th>
					</thead>
						
					@foreach ($materias as $mat)
					
					<tr>
						
						<td>{{$mat->idmaterias}}</td>
						<td>{{$mat->nombre}}</td>
						<td>
							
							<a href=" {{ route('materia.edit' , $mat->idmaterias) }}
							 "><button class="btn btn-info">Editar</button>
							</a>
							<a href="" data-target="#modal-delete-{{$mat->idmaterias}} " data-toggle="modal"><button class="btn btn-danger" type="submit">Eliminar</button></a>
						
						</td>
						
 
					</tr>
					@include ('estudiantes.materia.delete')
					@endforeach

				</table>
			</div>
			{{$materias->render()}}
		</div>
	</div>	
















@endsection