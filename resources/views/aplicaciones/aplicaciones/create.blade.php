@extends ('layouts.admin')
@section ('contenido')

		 <section class="content">
             <div class="row">
            	<div class="col-md-12">
              		<div class="box">
                		<div class="box-header with-border">
                  			<h3 class="box-title"><strong>Nueva Aplicación</strong></h3>
                  			<div class="box-tools pull-right">
                    		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    		
                  			</div>
                		</div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <!--Contenido-->
        <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				
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
				{!! Form::open(array('url'=>'aplicaciones/aplicaciones','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
				{{Form::token()}}

				<div class="container">
  <div class="row">
    <section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Paso 1">
                            <span class="round-tab">
								<i class="fa fa-film" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Paso 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Paso 3">
                            <span class="round-tab">
                                <i class="fa fa-book" aria-hidden="true"></i>


                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Completo">
                            <span class="round-tab">
                                 <i class="fa fa-user"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>Paso 1</h3>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" required="true" class="form-control" placeholder="Nombre del recurso..." >
						</div>
				<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label for="descripcion">Descripción</label>
					<input type="text" name="descripcion" class="form-control" placeholder="descripcion..." >
				</div>
                        <ul class="list-inline pull-right">
                            <li><button type="button " class="btn btn-primary next-step">Guardar y continuar</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Paso 2</h3>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Grado</label>
						<select name="idgrado" required="true" class="form-control">
						@foreach ($grados as $gra)
						<option value="{{$gra->id}}">{{$gra->nombre}}</option>
						@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Asignatura</label>
						<select name="idasignatura" required="true" class="form-control">
						@foreach ($asignaturas as $asigs)
						<option value="{{$asigs->id}}">{{$asigs->nombre}}</option>
						@endforeach
						</select>
					</div>
				</div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Anterior</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Guardar y continuar</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Paso 3</h3>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Unidad</label>
						<select name="idunidad" required="true" class="form-control">
						@foreach ($unidades as $unid)
						<option value="{{$unid->id}}">{{$unid->nombre}}</option>
						@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Tema</label>
						<select name="idtema" required="true" class="form-control">
						@foreach ($temas as $te)
						<option value="{{$te->id}}">{{$te->nombre}}</option>
						@endforeach
						</select>
					</div>
				</div>
				

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<label for="imagen">Imagen</label>
					<input type="file" name="imagen"  class="form-control" required="true">
					</div>

			
				</div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Anterior</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Guardar y continuar</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                    <h3>Completo</h3>
                        <p>Ha completado satisfactoriamente todos los pasos.</p>
                        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Docente</label>
						<select name="iddocente" required="true" class="form-control">
						@foreach ($docentes as $doc)
						<option value="{{$doc->id}}">{{$doc->primernombre}}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">		
					<div class="form-group">
						<button class="btn btn-primary" type="submit"><strong>Agregar</strong></button>
						<button class="btn btn-danger" type="reset"><strong>Cancelar</strong></button>
					</div>
				</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
           
        </div>
    </section>
   </div>
</div>

				

				

				
				

				

			

				{!!Form::close()!!}

			
		</div>
                              <!--Fin Contenido-->
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </section>
@endsection 


