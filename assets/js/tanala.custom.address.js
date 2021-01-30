$(document).ready(function() {
    $('#contactForm').validate({
        rules: {
            clientAddress: {
                required: true,
            },
            clientNumber: {
                required: true
            }
        },
        messages: {
            clientAddress: {
                required: "Please Enter Your Address"
            },
            clientNumber: {
                required: "Please Enter A Contact Number"
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
        },
        submitHandler: function(x){
            x.submit();
        }
    });
    
});