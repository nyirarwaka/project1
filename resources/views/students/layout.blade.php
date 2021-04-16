<!DOCTYPE html>

<html>
<head>
<title>studentmanagement system</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
@yield('content')
</div>
</body>
<script>
$(document).ready(function () {

/* When click New student button */
$('#new-student').click(function () {
$('#btn-save').val("create-student");
$('#student').trigger("reset");
$('#studentCrudModal').html("Add New student");
$('#crud-modal').modal('show');
});

/* Edit student */
$('body').on('click', '#edit-student', function () {
var student_id = $(this).data('id');
$.get('students/'+student_id+'/edit', function (data) {
$('#studentCrudModal').html("Edit student");
$('#btn-update').val("Update");
$('#btn-save').prop('disabled',false);
$('#crud-modal').modal('show');
$('#stud_id').val(data.id);
$('#name').val(data.name);
$('#email').val(data.email);
$('#address').val(data.address);
})
});
/* Show student */
$('body').on('click', '#show-student', function () {
$('#studentCrudModal-show').html("StudentDetails");
$('#crud-modal-show').modal('show');
});

/* Delete student*/
$('body').on('click', '#delete-student', function () {
var student_id = $(this).data("id");
var token = $("meta[name='csrf-token']").attr("content");
confirm("Are You sure want to delete !");

$.ajax({
type: "DELETE",
url: "http://localhost/studentinfo/public/students/"+student_id,
data: {
"id": student_id,
"_token": token,
},
success: function (data) {
$('#msg').html('Student entry deleted successfully');
$("#student_id_" + student_id).remove();
},
error: function (data) {
console.log('Error:', data);
}
});
});
});

</script>
</html>