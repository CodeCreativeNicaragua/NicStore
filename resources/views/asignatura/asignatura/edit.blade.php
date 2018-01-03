<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$asig->id}}">
	{{ Form::Open(array('action'=>array('AsignaturaController@update',$asig->id),'method'=>'PATCH'))}}
			<div class="modal-dialog">
				<div class=" modal-content">
					<div class=" modal-header alert-info">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" >
							<span aria-hidden="true" >x</span>
						</button>
						<h4 class="modal-title">Editar Asignatura:  {{$asig->nombre}}</h4>					
					</div>
					<div class="modal-body">
					
							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="nombre" required="true" class="form-control" value="{{$asig->nombre}}" placeholder="Nombre..." >
							</div>
					
					</div>
					<div class="modal-footer">
							<button type="reset" class="btn btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i>Cancelar</button>
							<button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i>Actualizar</button>
					</div>
					
				</div>
				
			</div>

	{{Form::close()}}
</div>
