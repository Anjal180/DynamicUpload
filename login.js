$(document).ready(function () {
    $( "#form" ).validate({
        rules: {
            email: {required: true,email: true},
            pwd: {required: true,minlength: 6,maxlength: 10}
            },
        messages: {
            email:{required: "**This field is required.",email: "**Please enter a valid email address"},
            pwd:{required: "**This field is required.",minlength:"**minimum lenght is 6",maxlength:"**maximum lenght is 10"}
        }
    });
});