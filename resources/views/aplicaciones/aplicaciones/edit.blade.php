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
				<h3>Editar Aplicacion: {{ $aplicaciones->nombre}}</h3>
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
				{!! Form::model($aplicaciones,['method'=>'PATCH','route'=>['aplicaciones.update',$aplicaciones->id],'files'=>'true'])!!}
				{{Form::token()}}


				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" required="true" class="form-control" placeholder="Nombre..."  value="{{$aplicaciones->nombre}}">
				</div>
				<div class="form-group">
					<label for="descripcion">Descripción</label>
					<input type="text" name="descripcion" class="form-control" placeholder="descripcion..."  value="{{$aplicaciones->descripcion}}">
				</div>

				

				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Grado</label>
						<select name="idgrado" required="true" class="form-control">
						@foreach ($Grados as $grados)
						@if ($grados->id==$aplicaciones->idgrado)
						<option value="{{$grados->id}}" selected="true">{{$grados->nombre}}</option>
						@else
						<option  value="{{$grados->id}}">{{$grados->nombre}}</option>
						@endif
						@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Asignatura</label>
						<select name="idasignatura" required="true" class="form-control">
						@foreach ($asignaturas as $asigs)
						@if ($asigs->id==$aplicaciones->idasignatura)
						<option value="{{$asigs->id}}" selected="true">{{$asigs->nombre}}</option>
						@else
						<option value="{{$asigs->id}}">{{$asigs->nombre}}</option>
						@endif
						@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Unidad</label>
						<select name="idunidad" required="true" class="form-control">
						@foreach ($unidades as $unid)
						@if ($unid->id==$aplicaciones->idunidad)
						<option value="{{$unid->id}}" selected="true">{{$unid->nombre}}</option>
						@else
						<option value="{{$unid->id}}">{{$unid->nombre}}</option>
						@endif
						@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Tema</label>
						<select name="idtema" required="true" class="form-control">
						@foreach ($temas as $te)
						@if ($te->id==$aplicaciones->idtema)
						<option value="{{$te->id}}" selected="true">{{$te->nombre}}</option>
						@else
						<option value="{{$te->id}}">{{$te->nombre}}</option>
						@endif
						@endforeach
						</select>
					</div>
				</div>
				

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<label for="imagen">Imagen</label>
					<input type="file" name="imagen"  class="form-control" >
					@if (($aplicaciones->imagen)!="")
						<img src="{{asset('imagenes/aplicaciones/'.$aplicaciones->imagen)}}" height="100px" width="100px">
					@endif
					</div>

			
				</div>	

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Docente</label>
						<select name="iddocente" required="true" class="form-control">
						@foreach ($docentes as $doc)
						@if ($doc->id==$aplicaciones->iddocente)
						<option value="{{$doc->id}}" selected="true">{{$doc->primernombre}}</option>
						@else
						<option value="{{$doc->id}}">{{$doc->primernombre}}</option>
						@endif
						@endforeach
						</select>
					</div>
				</div>
			

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<button type="reset" class="btn btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i>Cancelar</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i>Actualizar</button>
					
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
