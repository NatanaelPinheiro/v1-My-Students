@extends('layouts.main')
@section('title', 'MyStudents | Add Students')
@section('content')

<section id="add-students">
	<h2 class="section-title">Cadastrar Alunos</h2>

	<form method="POST" action="{{route('students.store')}}" enctype="multipart/form-data">
		@csrf
		@method('POST')		
		<div class="row">
			<div class="mb-3 col-12">
				<label for="student_name" class="form-label">Nome do estudante</label>
				<input type="text" class="form-control" id="student_name" name="student_name" placeholder="nome completo">
				@error('student_name')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="cpf" class="form-label">CPF</label>
				<input type="text" class="form-control" id="cpf" name="cpf" placeholder="apenas números">
				@error('cpf')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="birth_date" class="form-label">Data de nascimento</label>
				<input type="date" class="form-control" id="birth_date" name="birth_date">
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
				<input type="text" class="form-control" id="father_name" name="father_name" placeholder="nome do pai">
				@error('father_name')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="mother_name" class="form-label">Nome da mãe</label>
				<input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="nome da mãe">
				@error('mother_name')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="country" class="form-label">País</label>
				<input type="text" class="form-control" id="country" name="country" placeholder="país onde vive">
				@error('country')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="address" class="form-label">Endereço</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="endereço (rua, bairro)">
				@error('address')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="city" class="form-label">Cidade</label>
				<input type="text" class="form-control" id="city" name="city" placeholder="cidade on vive">
				@error('city')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="email_address" class="form-label">Email</label>
				<input type="text" class="form-control" id="email_address" name="email_address" placeholder="endereço de email">
				@error('email_address')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="student_phone" class="form-label">Número do estudante</label>
				<input type="text" class="form-control" id="student_phone" name="student_phone" placeholder="número do estudante">
				@error('student_phone')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-4 col-md-6">
				<label for="emergency_phone" class="form-label">Telefone de emergência</label>
				<input type="text" class="form-control" id="emergency_phone" name="emergency_phone" placeholder="telefone de emergência">
				@error('emergency_phone')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<hr>

			<div class="mb-3 col-md-6">
				<label for="school_class_id" class="form-label">Turma</label>

				@if(count($schoolclasses) > 0)
				<select class="form-select" id="school_class_id" name="school_class_id">
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

				@error('class')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-success" value="Cadastrar">
	</form>

</section>

@endsection