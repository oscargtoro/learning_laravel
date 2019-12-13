@extends('layouts.app')

@section('title', 'Actualización de Departamento')
@section('title2', 'Actualización de Departamento')
@section('content')

	<div class="row" >
		<div class="col-sm">
			<div class="card" style="margin-top: 10px;">
				<div class="card-body">
					<form method="POST" action="/comuna/{{$elemento->depa_codi}}" accept-charset="UTF-8" style="display:inline">
						@csrf			
						<input type="hidden" name="_method" value="PUT">
						<div class="form-group">
							<label for="depa_nomb">Departamento</label>
							<input type="text" value = '{{$elemento->depa_nomb}}' class="form-control" name="comu_nomb"/>
						</div>
						
						<div class="form-group">
							<label for="pais_codi">Pais </label>
							<select name='pais_id' class = 'form-control'>
								<option value="">Seleccione uno ... </option>
								@foreach($paises as $elemento)
									@if($departamento->pais_codi == $pais->pais_codi)
										<option selected value = '{{ $pais->pais_codi }}'> {{ $pais->pais_nomb }} </option>
									@else
										<option value = '{{ $pais->pais_codi }}'> {{ $pais->pais_nomb }} </option>
									@endif
								@endforeach
							</select>
						</div>
						<button type="submit" class="btn btn-primary btn-xs fa fa-save" style="margin-left: 10px"> Actualizar </button>				
					</form>
					<a href="/comuna" class="btn btn-danger btn-xs fa fa-arrow-alt-circle-right" style="margin-left: 10px"> Cancelar </a>				
				</div>
			</div>
		</div>
	</div>

@endsection
