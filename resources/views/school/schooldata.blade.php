@extends('layouts.main')
@section('title', 'MyStudents | School Data')
@section('content')

<section id="school_data">
	<h2 class="section-title">Dados da escola</h2>

	@forelse($schooldata as $schooldata)

	<form>
		@csrf
		<div class="row mb-5">
			<div class="mb-3 col-md-6">
				<label for="school_name" class="form-label">Nome da escola</label>
				<input type="text" class="form-control" id="school_name" name="school_name" value="{{$schooldata->school_name}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="school_principal" class="form-label">Nome do diretor</label>
				<input type="text" class="form-control" id="school_principal" name="school_principal" value="{{$schooldata->school_principal}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="address" class="form-label">Endereço da escola</label>
				<input type="text" class="form-control" id="address" name="address" value="{{$schooldata->address}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="city" class="form-label">Cidade da escola</label>
				<input type="text" class="form-control" id="city" name="city" value="{{$schooldata->city}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="country" class="form-label">País da escola</label>
				<input type="text" class="form-control" id="country" name="country" value="{{$schooldata->country}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="school_phone" class="form-label">Telefone escolar</label>
				<input type="text" class="form-control" id="school_phone" name="school_phone" value="{{$schooldata->school_phone}}" disabled>
			</div>
	    </div>
	    <!-- <div class="row mb-5"> -->
			<hr>
			<h4 class="py-3">Sobre os estudantes</h4>

			<div class="mb-3 col-md-6">
				<label for="avarage_score" class="form-label">Pontuação média por estudante</label>
				<input type="text" class="form-control" id="avarage_score" name="avarage_score" value="{{$schooldata->avarage_score}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="national_position" class="form-label">Posição nacional</label>
				<select class="form-select" id="national_position" name="national_position" disabled>
					@for($i = 0; $i < 20; $i++)
					<option value="{{$i+1}}">{{$i+1}}º</option>
					@endfor
					<option value="-">-</option>
				</select>
			</div>
		</div>
	</form>
	<a class="btn btn-warning" href="{{ route('schooldata.edit', [$schooldata->id]) }}">Editar</a>
	@empty
	<div class="alert alert-danger">
		<p>Ops.. something went wrong. Contact the developer for more details.</p>
	</div>
	@endif

</section>

@endsection

@if(isset($schooldata))
@push('scripts')

<script>
	setSelectedIndex(document.getElementById("national_position"), '{{$schooldata->national_position}}');
</script>

@endpush
@endif
