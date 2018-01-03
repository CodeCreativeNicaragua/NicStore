@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			
		</div>
	</div>
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
                		<h3><strong> Listado de Aplicaciones </strong> <a href="aplicaciones/create"><button class="btn btn-success">Nuevo</button></a></h3>
                    <div class="row col-lg-12">
                       @include('aplicaciones.aplicaciones.search')
                    </div>
						     

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                             <div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hove">
					<thead>
							<th>ID</th>
							<th>nombre</th>
              <th>descripcion</th>
              <th>imagen</th>
              <th>Grado</th>
              <th>Asignatura</th>
              <th>Unidad</th>
              <th>Tema</th>
              <th>Docente</th>
							<th>Editar</th>
							<th>Eliminar</th>
					</thead>
					@foreach ($aplicaciones as $app)
					<tr>
							<td>{{ $app->id}}</td>
							<td>{{ $app->nombre}}</td>
              <td>{{ $app->descripcion}}</td>
              <td>
                <img src="{{asset('imagenes/aplicaciones/'.$app->imagen)}}" alt="{{ $app->nombre}}" height="100px" width="100px" class="thumbnail">
              </td>
              <td>{{ $app->grado}}</td>
              <td>{{ $app->asignatura}}</td>
              <td>{{ $app->Unidades}}</td>
              <td>{{ $app->Temas}}</td>
              <td>{{ $app->docente}}</td>
							
							 <td>
							 	<p data-placement="top" data-toggle="tooltip" title="Editar">
                                    <a href="{{URL::action('AppsDocenteController@edit',$app->id)}}"><button class="btn btn-primary btn-md" data-title="Edit"  >
                                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                </p>
                             </td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Eliminar">
                                        <button class="btn btn-danger btn-md" data-title="Delete" data-toggle="modal" data-target="#modal-delete-{{$app->id}}" >
                                            <i class="fa fa-trash" aria-hidden="true"></i>

                                        </button>
                                    </p>
                                </td>
					</tr>
					@include('aplicaciones.aplicaciones.modaleliminar')
					

					@endforeach
				</table>
			</div>
			{{$aplicaciones->render()}}
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


@endsection