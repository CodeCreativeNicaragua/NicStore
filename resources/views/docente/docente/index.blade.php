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
                		<h3><strong> Listado de Docentes </strong><a href="docente/create"><button class="btn btn-success">Nuevo</button></a></h3>
						@include('docente.docente.search')

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
							<th>Primer Nombre</th>
              <th>Segundo Nombre</th>
              <th>Primer Apellido</th>
              <th>Segundo Apellido</th>
              <th>Imagen</th>
              <th>Correo</th>
              <th>Celular</th>
              <th>Tipo de Docente</th>
              <th>Estado    </th>
							<th>Editar</th>
							<th>Eliminar</th>
					</thead>
					@foreach ($docentes as $d)
					<tr>
							<td>{{ $d->id}}</td>
							<td>{{ $d->primernombre}}</td>
              <td>{{ $d->segundonombre}}</td>
							<td>{{ $d->primerapellido}}</td>
              <td>{{ $d->segundoapellido}}</td>
              <td>
                <img src="{{asset('imagenes/docentes/'.$d->imagen)}}" alt="{{ $d->primernombre}}" height="100px" width="100px" class="thumbnail">
              </td>
              <td>{{ $d->correo}}</td>
              <td>{{ $d->celular}}</td>
              <td>{{ $d->tipodocente}}</td>
              <td>{{ $d->estado}}</td>
							 <td>
							 	<p data-placement="top" data-toggle="tooltip" title="Editar">
                    <a href="{{URL::action('DocenteController@edit',$d->id)}}"> <button class="btn btn-primary btn-md" data-title="Edit" href="{{URL::action('DocenteController@edit',$d->id)}}" >
                            <i class="fa fa-pencil-square-o" ></i>
                    </button>
                    </a>
                </p>
              </td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Eliminar">
                                        <button class="btn btn-danger btn-md" data-title="Delete" data-toggle="modal" data-target="#modal-delete-{{$d->id}}" >
                                            <i class="fa fa-trash" aria-hidden="true"></i>

                                        </button>
                                    </p>
                                </td>
                               
					</tr>
					@include('docente.docente.modaleliminar')
					

					@endforeach
				</table>
			</div>
			{{$docentes->render()}}
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