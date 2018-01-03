@extends ('layouts.admin')
@section ('contenido')
		 <section class="content">
             <div class="row">
            	<div class="col-md-12">
              		<div class="box">
                		<div class="box-header with-border">
                  			<h3 class="box-title">Repositorio de Aplicaciones Educativas</h3>
                  		<div class="box-tools pull-right">
                    		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    		
                  		</div>
                		</div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
        <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h3><strong>Nuevo Docente</strong></h3>
				@if (count($errors)>0)
					<div class="alert alert-danger">
						<ul>
						@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach 
						</ul>
					</div>
			</div>
		</div>
				@endif
				{!! Form::open(array('url'=>'docente/docente','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
				{{Form::token()}}
				<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="primernombre">Primer Nombre</label>
					<input type="text" name="primernombre" required="true"  value="{{old('primernombre')}}" class="form-control" placeholder="Primer Nombre..." >
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="segundonombre">Segundo Nombre</label>
					<input type="text" name="segundonombre"   value="{{old('segundonombre')}}" class="form-control" placeholder="Segundo Nombre..." >
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="primerapellido">Primer Apellido</label>
					<input type="text" name="primerapellido" required="true"  value="{{old('primerapellido')}}" class="form-control" placeholder="Primer Apellido..." >
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="segundoapellido">Segundo Apellido</label>
					<input type="text" name="segundoapellido"   value="{{old('segundoapellido')}}" class="form-control" placeholder="Segundo Apellido..." >
				</div>
			</div>


			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="correo">Correo</label>
					<input type="email" name="correo" required="true"  value="{{old('correo')}}" class="form-control " placeholder="Correo..." >
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="celular">Celular</label>
					<input type="text" name="celular" required="true"  value="{{old('celular')}}" class="form-control" placeholder="Celular..." >
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Tipo docente</label>
					<select name="idtipodocente" class="form-control">
					@foreach ($tipodocentes as $td)
						<option value="{{$td->id}}">{{$td->nombre}}</option>
					@endforeach
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
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class="form-group">
					<label for="imagen">Imagen</label>
					<input type="file" name="imagen"   class="form-control">
				</div>
			
			</div>
			
			
			
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">
				<div class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<button class="btn btn-danger" type="reset" >Cancelar</button>
				</div>
			</div>

				{!!Form::close()!!}

		
                              <!--Fin Contenido-->
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </section>
@endsection
     


