@extends('layouts.main')
@section('title', 'MyStudents | Add Classes')
@section('content')

<section id="add-classes">
	<h2 class="section-title">Cadastrar turmas</h2>

	<form name="addClassesForm">
		@csrf
		<div class="row">
			<div class="mb-3 col-12">
				<label for="class_name" class="form-label">Nome da turma (curso)</label>
				<input type="text" class="form-control" id="class_name" name="class_name" placeholder="nome do curso. Ex: informática">
				@error('class_name')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="grade" class="form-label">Série</label>
				<select class="form-select" id="grade" name="grade">
					<option value="1º">1º ano</option>
					<option value="2º">2º ano</option>
					<option value="3º">3º ano</option>
				</select>
				@error('grade')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3 col-md-6">
				<label for="course_coordinator" class="form-label">Coordenador de curso</label>
				<input type="text" class="form-control" id="course_coordinator" name="course_coordinator" placeholder="nome do coordenador de curso">
				@error('course_coordinator')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-success" value="Cadastrar">
	</form>

</section>

@endsection

@push('scripts')

<script type="text/javascript">

	$(function(){
		$('form[name="addClassesForm"]').submit(function(event){
			event.preventDefault();

			$.ajax({
				url: "{{ route('classes.store') }}",
				type: "post",
				data: $(this).serialize(),
				dataType:  'json',
				success: function(response){
					
                    if(response.success === true){
						$("input[name='class_name']").val("");
					    $("input[name='course_coordinator']").val("");

						$(".msg-status").removeClass('msg-error').addClass('msg-success');
					}else{
						$(".msg-status").removeClass('msg-success').addClass('msg-error');
					}

					$(".msg-status").removeClass('d-none').html(response.message) 
				}
			});
		})
	})

</script>

@endpush