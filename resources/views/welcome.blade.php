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
                    <a href="{{route('students.edit', [$students[$i]->id])}}">
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

<script>


</script>

@endsection

@push('scripts')

<script type="text/javascript">


//   FETCH DATA FOR CIRCLE PROGRESS

  function fetchStudents(){
        $.ajax({
            type: "GET",
            url: '/fetch-students',
            dataType: 'json',
            success: function(response){
                studentsCircleProgress(response.students)
            }
        })
    }

    function fetchClasses() {
        $.ajax({
            type: "GET",
            url: '/fetch-classes',
            dataType: 'json',
            success: function(response){
                classesCircleProgress(response.classes)
            }
        })
    }

    function fetchSchoolData() {
        $.ajax({
            type: "GET",
            url: '/fetch-schooldata',
            dataType: 'json',
            success: function(response){
                avgScoreCircleProgress(response.schooldata[0])
                NationalPositionCircleProgress(response.schooldata[0])
            }
        })
    }

    fetchStudents()
    fetchClasses()
    fetchSchoolData()



</script>

@endpush