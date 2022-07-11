@extends('layouts.main')
@section('title', 'MyStudents | Show Class')
@section('content')

<section id="edit-classes">
	<h2 class="section-title">Ver turma</h2>
	<form>
		<div class="row">
			<div class="mb-3 col-12">
				<label for="class_name" class="form-label">Nome da turma (curso)</label>
				<input type="text" class="form-control" id="class_name" name="class_name" placeholder="{{$schoolclass->class_name}}" value="{{$schoolclass->class_name}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="grade" class="form-label">Série</label>
				<select class="form-select" id="grade" name="grade" disabled>
					<option value="1º">1º ano</option>
					<option value="2º">2º ano</option>
					<option value="3º">3º ano</option>
				</select>
			</div>

			<div class="mb-3 col-md-6">
				<label for="course_coordinator" class="form-label">Coordenador de curso</label>
				<input type="text" class="form-control" id="course_coordinator" name="course_coordinator" placeholder="{{$schoolclass->course_coordinator}}" value="{{$schoolclass->course_coordinator}}" disabled>
			</div>
		</div>
        <a href="{{route('classes.edit', [$schoolclass->id])}}" class="btn btn-warning">
            Editar
        </a>
	</form>

</section>

@endsection

@if(isset($schoolclass))
@push('scripts')

<script>
	setSelectedIndex(document.getElementById("grade"), '{{$schoolclass->grade}}');
</script>

@endpush
@endif