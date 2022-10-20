@extends('layouts.main')
@section('title', 'MyStudents | School Classes')
@section('content')

<section id="classes_list">

    @if(empty($search))
    <h2 class="section-title">Turmas registradas</h2>
    @else
    <h2 class="section-title">Exibindo resultados para: {{$search}}</h2>
    @endif

    <div class="row justify-content-between mb-3">
        <div class="col-md-6 col-sm-12">
            <a href="{{route('classes.create')}}" class="btn btn-success btn-sm mb-3 create-data-btn">
                Cadastrar turmas
            </a>
        </div>

        <form method="get" action="{{route('classes.index')}}" class="d-flex col-md-6 col-sm-12 search-form">
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
                <th scope="col">Nome</th>
                <th scope="col">Série</th>
                <th scope="col">Coordenador(a)</th>
                <th scope="col" class="numberOfStudents-col">Nº Alunos</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if(count($schoolclasses) > 0)
            @foreach($schoolclasses as $schoolclass)
            <tr>
                <th scope="row">{{ $loop->index+1}}</th>
                <td class="datatotruncate-row">
                    <a href="{{route('classes.edit', [$schoolclass->id])}}" class="d-block text-truncate">
                        {{$schoolclass->class_name}}
                    </a>        
                </td>
                <td>{{$schoolclass->grade}}</td>
                <td>{{$schoolclass->course_coordinator}}</td>
                <td class="numberOfStudents-row ">{{count($schoolclass->students)}}</td>
                <td>
                    <a href="{{route('classes.edit', [$schoolclass->id])}}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil me-1"></i>
                        <span class="action-text">Editar</span>
                    </a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteClassModal" data-schoolclassid="{{$schoolclass->id}}">
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
    @if(count($schoolclasses) > 0)
    {{$schoolclasses->links()}}
    @endif

    @if(count($schoolclasses) < 1)
        <p>
            Ops, parece que não há nenhuma turma cadastrada. 
            <a href="{{route('classes.create')}}">clique aqui para cadastrar</a>
        </p>
    @endif

</section>

<!-- Modal -->
<div class="modal fade" id="deleteClassModal" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Tem certeza?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{route('classes.delete')}}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-body">
                    <p>Tem certeza que deseja deletar essa turma?</p>
                    <input type="hidden" name="schoolclass_id" id="schoolclass_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                    <a  href="{{route('classes.delete')}}"
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