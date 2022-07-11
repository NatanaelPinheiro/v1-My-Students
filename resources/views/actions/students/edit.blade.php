@extends('layouts.main')
@section('title', 'MyStudents | Edit Student')
@section('content')

<section id="edit-students">
	<h2 class="section-title">Editar Aluno</h2>

	<form method="POST" action="{{route('students.update', [$student->id])}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')		
		<div class="row">
			<div class="mb-3 col-12">
				<label for="student_name" class="form-label">Nome do estudante</label>
				<input type="text" class="form-control" id="student_name" name="student_name" placeholder="{{$student->student_name}}" value="{{ $student->student_name }}">
				@error('student_name')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="cpf" class="form-label">CPF</label>
				<input type="text" class="form-control" id="cpf" name="cpf" placeholder="{{ $student->cpf }}" value="{{ $student->cpf }}">
				@error('cpf')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="birth_date" class="form-label">Data de nascimento</label>
				<input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $student->birth_date->format('Y-m-d') }}">
				@error('birth_date')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="gender" class="form-label">Gênero</label>
				<select class="form-select" id="gender" name="gender">
					<option value="male">homem</option>
					<option value="female">mulher</option>
				</select>
				@error('gender')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror	
			</div>

			<div class="mb-3 col-md-6">
				<label for="father_name" class="form-label">Nome do pai</label>
				<input type="text" class="form-control" id="father_name" name="father_name" placeholder="{{ $student->father_name }}" value="{{ $student->father_name }}">
				@error('father_name')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="mother_name" class="form-label">Nome da mãe</label>
				<input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="{{ $student->mother_name }}e" value="{{ $student->mother_name }}">
				@error('mother_name')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="country" class="form-label">País</label>
				<input type="text" class="form-control" id="country" name="country" placeholder="{{ $student->country }}" value="{{ $student->country }}">
				@error('country')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="address" class="form-label">Endereço</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="{{ $student->address }}" value="{{ $student->address }}">
				@error('address')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="city" class="form-label">Cidade</label>
				<input type="text" class="form-control" id="city" name="city" placeholder="{{ $student->city }}" value="{{ $student->city }}">
				@error('city')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="email_address" class="form-label">Email</label>
				<input type="text" class="form-control" id="email_address" name="email_address" placeholder="{{ $student->email_address }}" value="{{ $student->email_address }}">
				@error('email_address')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="student_phone" class="form-label">Número do estudante</label>
				<input type="text" class="form-control" id="student_phone" name="student_phone" placeholder="{{ $student->student_phone }}" value="{{ $student->student_phone }}">
				@error('student_phone')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-4 col-md-6">
				<label for="emergency_phone" class="form-label">Telefone de emergência</label>
				<input type="text" class="form-control" id="emergency_phone" name="emergency_phone" placeholder="{{ $student->emergency_phone }}" value="{{ $student->emergency_phone }}">
				@error('emergency_phone')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<hr>
			<div class="mb-3 col-md-6">
				<label for="school_class_id" class="form-label">Turma</label>
				<select class="form-select" id="school_class_id" name="school_class_id">

			        @foreach($schoolclasses as $schoolclass)
				    	<option value="{{$schoolclass->id}}">
				    		{{$schoolclass->grade}} - {{$schoolclass->class_name}}
				    	</option>
	     		    @endforeach

				</select>
				@error('class')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-success" value="Salvar">
	</form>

</section>

@endsection

@if(isset($student))
@push('scripts')

<script>

	setSelectedIndex(document.getElementById("gender"), '{{$student->gender}}');
	setSelectedIndex(document.getElementById("school_class_id"), '{{$student->school_class_id}}');

</script>
@endpush
@endif