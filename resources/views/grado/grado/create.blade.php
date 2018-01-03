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
				<h3><strong>Nuevo Grado</strong></h3>
				@if (count($errors)>0)
					<div class="alert alert-danger">
						<ul>
						@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach 
						</ul>
					</div>
				@endif
				{!! Form::open(array('url'=>'grado/grado','method'=>'POST','autocomplete'=>'off'))!!}
				{{Form::token()}}
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" placeholder="Nombre..." >
				</div>			
				<div class="form-group">
						<button class="btn btn-primary" type="submit"><strong>Agregar</strong></button>
						<button class="btn btn-danger" type="reset"><strong>Cancelar</strong></button>
				</div>

				{!!Form::close()!!}

			</div>
		</div>
                              <!--Fin Contenido-->
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </section>


