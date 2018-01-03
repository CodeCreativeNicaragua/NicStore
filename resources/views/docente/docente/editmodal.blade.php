<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$d->id}}">
	{{ Form::Open(array('action'=>array('DocenteController@update',$d->id),'method'=>'PATCH'))}}
			<div class="modal-dialog">
				<div class=" modal-content">
					<div class=" modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" >
							<span aria-hidden="true" >x</span>
						</button>
						<h4 class="modal-title">Editar Docente:  {{$d->primernombre}}</h4>					
					</div>
					<div class="modal-body">
					@if (count($errors)>0)
					<div class="alert alert-danger">
						<ul>
						@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach 
						</ul>
					</div>
					@endif
							<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="primernombre">Primer Nombre</label>
					<input type="text" name="primernombre" required="true"  value="{{$d->primernombre}}" class="form-control" placeholder="Primer Nombre..." >
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="segundonombre">Segundo Nombre</label>
					<input type="text" name="segundonombre" required="true"  value="{{$d->segundonombre}}" class="form-control" placeholder="Segundo Nombre..." >
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="primerapellido">Primer Apellido</label>
					<input type="text" name="primerapellido" required="true"  value="{{$d->primerapellido}}" class="form-control" placeholder="Primer Apellido..." >
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="segundoapellido">Segundo Apellido</label>
					<input type="text" name="segundoapellido" required="true"  value="{{$d->segundoapellido}}" class="form-control" placeholder="Segundo Apellido..." >
				</div>
			</div>


			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="correo">Correo</label>
					<input type="text" name="correo" required="true"  value="{{$d->correo}}" class="form-control" placeholder="Correo..." >
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="celular">Celular</label>
					<input type="text" name="celular" required="true"  value="{{$d->celular}}" class="form-control" placeholder="Celular..." >
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Tipo docente</label>
					<select name="idtipodocente" class="form-control">
					
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="estado">Estado</label>
					<select name="estado" class="form-control" required="true">
					
						<option value="Activo">Activo</option>
						<option value="Inactivo">Inactivo</option>
					
					</select>
				</div>
			
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="imagen">Imagen</label>
					<input type="file" name="imagen"   class="form-control"  >
					@if (($d->imagen)!="")
						<img src="{{asset('imagenes/docentes/'.$d->imagen)}}" height="100px" width="100px">
					@endif
				</div>
			
			</div>
			
			
			
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

