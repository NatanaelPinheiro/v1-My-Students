@extends('layouts.main')
@section('title', 'MyStudents | Home')

@section('content')

<!-- DADOS GERAIS -->
<section id="data-overview">
    <h2 class="section-title">Dados gerais</h2>


    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-3 data">
            <div class="progress progressA"></div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3 data">
            <div class="progress progressB"></div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3 data">
            <div class="progress progressC"></div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3 data">
            <div class="progress progressD"></div>
        </div>
    </div>
</section>

<!-- ALUNOS E CLASSES -->
<section id="registered-table">
    <!-- CLASSES -->
    <div id="registered-classes" class="col col-md-12">
        <div class="row justify-content-between align-items-center table-title bg-dark text-white">
            <h2 class="section-title col col-8">Turmas cadastradas</h2>
            <button class="btn btn-outline-secondary btn-sm col col-4" type="button" data-bs-toggle="collapse" data-bs-target="#classesCollapse" 
            aria-expanded="false" aria-controls="classesCollapse">
            <i class="bi bi-caret-down-fill"></i>
        </button>
    </div>

    <div class="collapse show table-responsive" id="classesCollapse">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Turma</th>
                    <th scope="col">Série</th>
                    <th scope="col">Nº Alunos</th>
                </tr>
            </thead>
            <tbody>
                @if(count($schoolclasses) > 0)
                @for($i = 0; $i < 3; $i++)
                <tr>
                    <th scope="row">{{ $i+1 }}</th>
                    <td>{{$schoolclasses[$i]->class_name}}</td>
                    <td>{{$schoolclasses[$i]->grade}}</td>
                    <td>{{count($schoolclasses[$i]->students)}}</td>
                </tr>

                @if($i == (count($schoolclasses) -1))
                <?php
                break;
                ?>
                @endif
                @endfor
                @else
                <tr>
                    <th scope="row">-</th>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                @endif
            </tbody>
        </table>

        <a href="{{route('classes.index')}}">Ver mais</a>
    </div>
</div>

<!-- STUDENTS -->
<div id="registered-students" class="col col-md-12">
    <div class="row justify-content-between align-items-center table-title bg-dark text-white">
        <h2 class="section-title col col-8">
            Alunos cadastrados
        </h2>
        <button class="btn btn-outline-secondary btn-sm col col-4" type="button" data-bs-toggle="collapse" data-bs-target="#studentsCollapse" 
        aria-expanded="false" aria-controls="studentsCollapse">
        <i class="bi bi-caret-down-fill"></i>
    </button>
</div>

<div class="collapse show table-responsive" id="studentsCollapse">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Aluno</th>
                <th scope="col">Série</th>
                <th scope="col">Turma</th>
            </tr>
        </thead>
        <tbody>
            @if(count($students) > 0)
            @for($i = 0; $i < 3; $i++)
            <tr>
                <th scope="row">{{ $i + 1}}</th>
                <td class="text-truncate">
                    <a href="{{route('students.show', [$students[$i]->id])}}">
                        {{$students[$i]->student_name}}
                    </a>
                </td>
                <td>{{$students[$i]->schoolclass->grade}}</td>
                <td>{{$students[$i]->schoolclass->class_name}}</td>
            </tr>
            @if($i == (count($schoolclasses) -1))
            <?php
            break;
            ?>
            @endif

            @endfor
            @else
            <tr>
                <th scope="row">-</th>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            @endif
        </tbody>
    </table>

    <a href="{{route('students.index')}}">Ver mais</a>
</div>
</div>
</section>

@endsection

@push('scripts')

<script type="text/javascript">

    new CircleProgress('.progressA', {
        max: {{count($schoolclasses)}},
        value: {{count($schoolclasses)}},
        indeterminateText: '-',
        textFormat: function(value, max) {
            return value + ' classes';
        },
        animationDuration: 1100,
        
    });

    new CircleProgress('.progressB', {
        max: {{count($students)}},
        value: {{count($students)}},
        indeterminateText: '-',
        textFormat: function(value, max) {
            return value + ' alunos';
        },
        animationDuration: 1200,
    });

    new CircleProgress('.progressC', {
        max: {{$schooldata[0]->avarage_score}},
        value: {{$schooldata[0]->avarage_score}},
        indeterminateText: '-',
        textFormat: function(value, max) {
            return 'nota média: ~'+value;
        },
        animationDuration: 1300,
    });

    new CircleProgress('.progressD', {
        max: {{$schooldata[0]->national_position}},
        value: {{$schooldata[0]->national_position}},
        indeterminateText: '-',
        textFormat: function(value, max) {
            return value + 'º colocação';
        },
        animationDuration: 1400,
    });



</script>

@endpush