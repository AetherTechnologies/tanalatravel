$(document).ready(function() {
    $.validator.setDefaults({
        submitHandler: function() {
            $.ajax({
                url: '../api/loginRequest.php',
                type: 'POST',
                data: {
                    request: 'log',
                    userEmail: $('#clientEmail').val(),
                    userPassword: $('#clientPassword').val()
                },
                success: function(e) {
                    if (e) {
                        window.location.replace('login.php');
                    } else {
                        Swal.fire({
                            title: 'Log in Failed',
                            text: "Try Again",
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes'
                        })
                    }
                },
                error: function(xhs, status, error) {
                    alert("Error -" + xhs + " " + status + " : " + error);
                }
            });
        }
    });
    $('#loginForm').validate({
        rules: {
            clientEmail: {
                required: true,
                email: true,
            },
            clientPassword: {
                required: true
            }
        },
        messages: {
            clientEmail: {
                required: "Please Enter Email to login",
                email: "Input a Valid Email"
            },
            clientPassword: {
                required: "Please Enter Password to login"
            }
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