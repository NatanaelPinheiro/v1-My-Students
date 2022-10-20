
// SET SELECTED INDEX

function setSelectedIndex(s, valsearch){
	for (i = 0; i< s.options.length; i++){ 
		if (s.options[i].value == valsearch){
			s.options[i].selected = true;
			break;
		}
	}
	return;
}

// RETURN DATA ID TO DELETE FORM

$('#deleteStudentModal').on('show.bs.modal', function(event){

	var button = $(event.relatedTarget)
	var student_id = button.data('studentid')
	var modal = $(this)

	modal.find('.modal-body #student_id').val(student_id)

});

$('#deleteClassModal').on('show.bs.modal', function(event){

	var button = $(event.relatedTarget)
	var schoolclass_id = button.data('schoolclassid')
	var modal = $(this)

	modal.find('.modal-body #schoolclass_id').val(schoolclass_id)

});

// CIRCLE PROGRESS


    function classesCircleProgress(data){
		new CircleProgress('.progressA', {
			max: data.length,
			value: data.length,
			indeterminateText: '-',
			textFormat: function(value, max) {
				return value + ' classes';
			},
			animationDuration: 1100,
		});
	}

    function studentsCircleProgress(data){
        new CircleProgress('.progressB', {
            max: data.length,
            value: data.length,
            indeterminateText: '-',
            textFormat: function(value, max) {
                return value + ' alunos';
            },
            animationDuration: 1200,
        });
    }

	function avgScoreCircleProgress(data){
		new CircleProgress('.progressC', {
			max: data.avarage_score,
			value: data.avarage_score,
			indeterminateText: '-',
			textFormat: function(value, max) {
				return 'nota média: ~'+value;
			},
			animationDuration: 1300,
		});
	}

	function NationalPositionCircleProgress(data){
		new CircleProgress('.progressD', {
			max: data.national_position,
			value: data.national_position,
			indeterminateText: '-',
			textFormat: function(value, max) {
				return value + 'º colocação';
			},
			animationDuration: 1400,
		});
	}

	