$(document).ready(function() {
    $.validator.setDefaults({
        submitHandler: function() {

            $.ajax({
                url: '../api/requests.php',
                type: 'POST',
                data: {
                    request: 'reg',
                    userFullname: $('#userFullname').val(),
                    userEmail: $('#userEmail').val(),
                    userPassword: $('#password').val()

                },
                success: function() {
                    Swal.fire({
                        title: 'Registration Success',
                        text: "You may proceed To login",
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then(() => {
                        window.location.replace("login.php")
                    })
                }
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
                minlength: 5,
                equalTo: '#confirmPassword'
            },
            confirmPassword: {
                required: true,
                minlength: 5,
                equalTo: '#password'
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
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Password Not Match"
            },
            confirmPassword: {
                equalTo: "Password Not Match"
            },
            terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});