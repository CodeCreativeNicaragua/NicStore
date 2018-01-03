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
				<h3>Editar Docente: {{ $docentes->primernombre}}</h3>
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
				{!! Form::model($docentes,['method'=>'PATCH','route'=>['docente.update',$docentes->id],'files'=>'true'])!!}
				{{Form::token()}}
			<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="primernombre">Primer Nombre</label>
					<input type="text" name="primernombre" required="true"  value="{{$docentes->primernombre}}" class="form-control" placeholder="Primer Nombre..." >
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="segundonombre">Segundo Nombre</label>
					<input type="text" name="segundonombre" value="{{$docentes->segundonombre}}" class="form-control" placeholder="Segundo Nombre..." >
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="primerapellido">Primer Apellido</label>
					<input type="text" name="primerapellido" required="true"  value="{{$docentes->primerapellido}}" class="form-control" placeholder="Primer Apellido..." >
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="segundoapellido">Segundo Apellido</label>
					<input type="text" name="segundoapellido"   value="{{$docentes->segundoapellido}}" class="form-control" placeholder="Segundo Apellido..." >
				</div>
			</div>


			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="correo">Correo</label>
					<input type="text" name="correo" required="true"  value="{{$docentes->correo}}" class="form-control" placeholder="Correo..." >
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="celular">Celular</label>
					<input type="text" name="celular" required="true"  value="{{$docentes->celular}}" class="form-control" placeholder="Celular..." >
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Tipo docente</label>
					<select name="idtipodocente" class="form-control">
					@foreach ($tipodocentes as $td)
						@if ($td->id==$docentes->idtipodocente)
						<option value="{{$td->id}}" selected="true">{{$td->nombre}}</option>
						@else
						<option  value="{{$td->id}}">{{$td->nombre}}</option>
						@endif
					@endforeach
					</select>
				</div>
			</div>

		
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="imagen">Imagen</label>
					<input type="file" name="imagen"   class="form-control"  >
					@if (($docentes->imagen)!="")
						<img src="{{asset('imagenes/docentes/'.$docentes->imagen)}}" height="100px" width="100px">
					@endif
				</div>
			
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<button type="reset" class="btn btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i>Cancelar</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i>Actualizar</button>
					
				</div>
			
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



