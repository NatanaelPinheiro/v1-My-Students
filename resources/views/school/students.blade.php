@extends('layouts.main')
@section('title', 'MyStudents | Students')
@section('content')

<section id="students_list">
    @if(empty($search))
    <h2 class="section-title">Estudantes registrados</h2>
    @else
    <h2 class="section-title">Exibindo resultados para: {{$search}}</h2>
    @endif

    <div class="row justify-content-between mb-3">
        <div class="col-md-6 col-sm-12">
            <a href="{{route('students.create')}}" class="btn btn-success btn-sm mb-3 create-data-btn">
                Cadastrar estudantes
            </a>
        </div>

        <form method="get" action="{{route('students.index')}}" class="d-flex col-md-6 col-sm-12 search-form">
            @csrf
            @method('get')
            <input class="form-control me-2 search-input" type="search" 
            placeholder="Pesquisar" aria-label="Pesquisar" name="search">
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>
    </div>
    
    <div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Aluno</th>
                <th scope="col">Série</th>
                <th scope="col">Turma</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
         @if(count($students) > 0)
         @foreach($students as $student)
         <tr>
          <th scope="row">{{ $loop->index+1}}</th>
          <td class="datatotruncate-row">
            <a href="{{route('students.edit', [$student->id])}}" class="d-block text-truncate">
                {{$student->student_name}}
            </a>
          </td>
          <td>{{$student->schoolclass->grade}}</td>
          <td>{{$student->schoolclass->class_name}}</td>
          <td>
           <a href="{{route('students.edit', [$student->id])}}" 
               class="btn btn-sm btn-warning">
               <i class="bi bi-pencil me-1"></i>
               <span class="action-text">Editar</span>
           </a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteStudentModal" data-studentid="{{$student->id}}">
                <i class="bi bi-trash3 me-1"></i>
                <span class="action-text">Deletar</span>
            </button>                            
</td>
</tr>
@endforeach
@else
<tr>
  <th scope="row">-</th>
  <td>-</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
</tr>
@endif
</tbody>
</table>
</div>

@if(count($students) > 0)
{{$students->links()}}
@endif

@if(count($students) < 1)
<p>
    Ops, parece que não há nenhum estudante cadastrado. 
    <a href="{{route('students.create')}}">clique aqui para cadastrar</a>
</p>
@endif

</section>

<!-- Modal -->
<div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Tem certeza?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <form action="{{route('students.delete')}}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-body">
                    <p>Tem certeza que deseja deletar esse estudante?</p>
                    <input type="hidden" name="student_id" id="student_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                    <a  href="{{route('students.delete')}}"
                        class="btn btn-sm btn-danger"
                        onclick="
                        event.preventDefault();
                        this.closest('form').submit();"
                        >
                        Confirmar exclusão
                    </a>                                 
                </div>
            </form>
        </div>
    </div>
</div> 

@endsection
