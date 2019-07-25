<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$mat->idmaterias}}">
	
	<form action="{{ route('materia.destroy' , $mat->idmaterias) }} " method="POST">
			@csrf
			<input type="hidden" name="_method" value="DELETE">  
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header align-content-between">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						
					</button>
					<h4 class="modal-title text-left" >Eliminar Materia</h4>
				</div>
				<div class="modal-body">
					<p>Confirme si desea eliminar la Materia</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</div>	
		</div>
	</form>
</div>