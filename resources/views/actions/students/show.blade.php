@extends('layouts.main')
@section('title', 'MyStudents | Show Student')
@section('content')

<section id="add-students">
	<h2 class="section-title">Ver aluno </h2>

	<form>
		@csrf
		<div class="row">
			<div class="mb-3 col-12">
				<label for="student_name" class="form-label">Nome do estudante</label>
				<input type="text" class="form-control" id="student_name" name="student_name" placeholder="nome completo" value="{{$student->student_name}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="cpf" class="form-label">CPF</label>
				<input type="text" class="form-control" id="cpf" name="cpf" placeholder="apenas números" value="{{$student->cpf}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="birth_date" class="form-label">Data de nascimento</label>
				<input type="date" class="form-control" id="birth_date" name="birth_date" value="{{$student->birth_date->format('Y-m-d')}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="gender" class="form-label">Gênero</label>
				<select class="form-select" id="gender" name="gender" disabled>
					<option value="male">homem</option>
					<option value="female">mulher</option>
				</select>
	
			</div>

			<div class="mb-3 col-md-6">
				<label for="father_name" class="form-label">Nome do pai</label>
				<input type="text" class="form-control" id="father_name" name="father_name" placeholder="nome do pai" value="{{$student->father_name}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="mother_name" class="form-label">Nome da mãe</label>
				<input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="nome da mãe" value="{{$student->mother_name}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="country" class="form-label">País</label>
				<input type="text" class="form-control" id="country" name="country" placeholder="país onde vive" value="{{$student->country}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="address" class="form-label">Endereço</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="endereço (rua, bairro)" value="{{$student->address}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="city" class="form-label">Cidade</label>
				<input type="text" class="form-control" id="city" name="city" placeholder="cidade on vive" value="{{$student->city}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="email_address" class="form-label">Email</label>
				<input type="text" class="form-control" id="email_address" name="email_address" placeholder="endereço de email" value="{{$student->email_address}}" disabled>
			</div>

			<div class="mb-3 col-md-6">
				<label for="student_phone" class="form-label">Número do estudante</label>
				<input type="text" class="form-control" id="student_phone" name="student_phone" placeholder="número do estudante" value="{{$student->student_phone}}" disabled>
			</div>

			<div class="mb-4 col-md-6">
				<label for="emergency_phone" class="form-label">Telefone de emergência</label>
				<input type="text" class="form-control" id="emergency_phone" name="emergency_phone" placeholder="telefone de emergência" value="{{$student->emergency_phone}}" disabled>
			</div>
			<hr>

			<div class="mb-3 col-md-6">
				<label for="school_class_id" class="form-label">Turma</label>

				@if(count($schoolclasses) > 0)
				<select class="form-select" id="school_class_id" name="school_class_id" disabled>
					@foreach($schoolclasses as $schoolclass)
					<option value="{{$schoolclass->id}}">
						{{$schoolclass->grade}} - {{$schoolclass->class_name}}
					</option>
					@endforeach
				</select>
				@else
				<p>
					Não há nenhuma turma criada no momento. 
					<a href="{{route('classes.create')}}">Crie uma</a> e volte novamente.
				</p>
				@endif

			</div>
		</div>
		
        <a href="{{route('students.edit', [$student->id])}}" class="btn btn-warning">
            Editar
        </a>	
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