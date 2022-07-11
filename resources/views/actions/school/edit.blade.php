@extends('layouts.main')
@section('title', 'MyStudents | School Data')
@section('content')

<section id="school_data">
	<h2 class="section-title">Editar dados</h2>

	<form method="POST" action="{{ route('schooldata.update', [$schooldata->id]) }}">
		@csrf
		@method('PUT')
		<div class="row mb-5">
			<div class="mb-3 col-md-6">
				<label for="school_name" class="form-label">Nome da escola</label>
				<input type="text" class="form-control" id="school_name" name="school_name" value="{{$schooldata->school_name}}" placeholder="{{$schooldata->school_name}}">
			</div>

			<div class="mb-3 col-md-6">
				<label for="school_principal" class="form-label">Nome do diretor</label>
				<input type="text" class="form-control" id="school_principal" name="school_principal" value="{{$schooldata->school_principal}}" placeholder="{{$schooldata->school_principal}}">
			</div>

			<div class="mb-3 col-md-6">
				<label for="address" class="form-label">Endereço da escola</label>
				<input type="text" class="form-control" id="address" name="address" value="{{$schooldata->address}}" placeholder="{{$schooldata->address}}">
			</div>

			<div class="mb-3 col-md-6">
				<label for="city" class="form-label">Cidade da escola</label>
				<input type="text" class="form-control" id="city" name="city" value="{{$schooldata->city}}" placeholder="{{$schooldata->city}}">
			</div>

			<div class="mb-3 col-md-6">
				<label for="country" class="form-label">País da escola</label>
				<input type="text" class="form-control" id="country" name="country" value="{{$schooldata->country}}" placeholder="{{$schooldata->country}}">
			</div>

			<div class="mb-3 col-md-6">
				<label for="school_phone" class="form-label">Telefone escolar</label>
				<input type="text" class="form-control" id="school_phone" name="school_phone" value="{{$schooldata->school_phone}}" placeholder="{{$schooldata->school_phone}}">
			</div>
	    </div>
	    <div class="row mb-5">
			<hr>
			<h4 class="py-3">Sobre os estudantes</h4>

			<div class="mb-3 col-md-6">
				<label for="avarage_score" class="form-label">Pontuação média por estudante</label>
				<input type="text" class="form-control" id="avarage_score" name="avarage_score" value="{{$schooldata->avarage_score}}" placeholder="{{$schooldata->avarage_score}}">
			</div>

			<div class="mb-3 col-md-6">
				<label for="national_position" class="form-label">Posição nacional</label>
				<select class="form-select" id="national_position" name="national_position">
					@for($i = 0; $i < 20; $i++)
					<option value="{{$i+1}}">{{$i+1}}º</option>
					@endfor
					<option value="-">-</option>
				</select>
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-success" value="Salvar">
	</form>
</section>

@endsection

@if(isset($schooldata))
@push('scripts')

<script>
	setSelectedIndex(document.getElementById("national_position"), '{{$schooldata->national_position}}');
</script>

@endpush
@endif