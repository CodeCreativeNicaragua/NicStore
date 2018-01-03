{!! Form::open(array('url'=>'aplicaciones/aplicaciones','method'=>'GET','autocomplete'=>'on','role'=>'search'))!!}
	
		<div class="form-group">
			<div class="input-group">
				<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}" list="listapps">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">Buscar</button>
				</span>
			</div>
			
		</div>

		<datalist id="listapps">
			@foreach ($aplicaciones as $app)
			<option>
				{{ $app->nombre}}
			</option>
			@endforeach
			
		</datalist>
	
	
{{Form::close()}}