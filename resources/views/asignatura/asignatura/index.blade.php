@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('asignatura.asignatura.create')
		</div>
	</div>
	<section class="content">
             <div class="row">
            	<div class="col-md-8">
              		<div class="box">
                		<div class="box-header with-border">
                  			<h3 class="box-title">Repositorio de Aplicaciones Educativas</h3>

                  		<div class="box-tools pull-right">
                    		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    		
                  		</div>
                		</div>
                		<h3><strong> Listado de Asignaturas </strong></h3>
						@include('asignatura.asignatura.search')

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
							<th>Editar</th>
							<th>Eliminar</th>
					</thead>
					@foreach ($asignaturas as $asig)
					<tr>
							<td>{{ $asig->id}}</td>
							<td>{{ $asig->nombre}}</td>
							
							 <td>
							 	<p data-placement="top" data-toggle="tooltip" title="Editar">
                                    <button class="btn btn-primary btn-md" data-title="Edit" data-toggle="modal" data-target="#modal-edit-{{$asig->id}}" >
                                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                </p>
                             </td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Eliminar">
                                        <button class="btn btn-danger btn-md" data-title="Delete" data-toggle="modal" data-target="#modal-delete-{{$asig->id}}" >
                                            <i class="fa fa-trash" aria-hidden="true"></i>

                                        </button>
                                    </p>
                                </td>
					</tr>
					@include('asignatura.asignatura.modaleliminar')
					@include('asignatura.asignatura.edit')

					@endforeach
				</table>
			</div>
			{{$asignaturas->render()}}
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