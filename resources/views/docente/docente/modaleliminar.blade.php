<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$d->id}}">
	{{ Form::Open(array('action'=>array('DocenteController@destroy',$d->id),'method'=>'delete'))}}
			<div class="modal-dialog">
				<div class=" modal-content">
					<div class=" modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" >
							<span aria-hidden="true" >x</span>
						</button>
						<h4 class="modal-title">Eliminar de Docente:  {{$d->id}}</h4>					
					</div>
					<div class="modal-body alert alert-danger">
							<p>Confirme si desea eliminar Docente  {{$d->primernombre}}</p>	
					</div>
					<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i>Cerrar</button>
							<button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i>Aceptar</button>
					</div>
					
				</div>
				
			</div>

	{{Form::close()}}
</div>