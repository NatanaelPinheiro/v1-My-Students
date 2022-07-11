
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