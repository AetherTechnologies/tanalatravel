$(document).ready(function(){
    $.validator.setDefaults({
        submitHandler: function () {
          $.ajax({
              
          });
        }
    });
    $('#registerForm').validate({
        rules: {
          userFullname: {
            required: true
          },
          userEmail: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 5
          },
          confirmPassword: {
            required: true,
            minlength: 5,
          },
          terms: {
            required: true
          },
        },
        messages: {
          userEmail: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          userFullname: {
            required: "Please enter your full name"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
    });
});