$(document).ready(function(){
    const firstName = $('input[name=first_name]');
    const lastName = $('input[name=last_name]');
    const email = $('input[name=email]');

    let error_fname = true;
    let error_lname = true;
    let error_email = true;

    function check_fname() {
        const pattern = /^[A-Za-z]+$/;
        if (pattern.test(firstName.val()) && firstName.val() !== '') {
           $("#fname_error_message").hide();
           firstName.css("border-bottom","2px solid #34F458");
           error_fname = false;
        } else {
           $("#fname_error_message").html("Please enter letters only");
           $("#fname_error_message").show();
           firstName.css("border-bottom","2px solid #F90A0A");
           error_fname = true;
        }
    }

    function check_lname() {
        const pattern = /^[A-Za-z]+$/;
        if (pattern.test(lastName.val()) && lastName.val() !== '') {
           $("#lname_error_message").hide();
           lastName.css("border-bottom","2px solid #34F458");
           error_lname = false;
        } else {
           $("#lname_error_message").html("Please enter letters only");
           $("#lname_error_message").show();
           lastName.css("border-bottom","2px solid #F90A0A");
           error_lname = true;
        }
    }

    function check_email() {
        if (email.is(':valid') && email.val() !== '') {
           $("#email_error_message").hide();
           email.css("border-bottom","2px solid #34F458");
           error_email= false;
        } else {
           $("#email_error_message").html("Please enter valid Email");
           $("#email_error_message").show();
           email.css("border-bottom","2px solid #F90A0A");
           error_email = true;
        }
    }

    firstName.focusout(function(){
        check_fname();
    });

    lastName.focusout(function(){
        check_lname();
    });

    email.focusout(function(){
        check_email();
    });

    
    function submitForm() {
        if (!error_fname && !error_lname && !error_email) {
            const formData = {first_name: firstName.val(), last_name: lastName.val(), email: email.val()}
            $.ajax({url:"submit.php", type: "POST", data: formData, success: function(response){
                const res = JSON.parse(response);
                console.log(res);
                $("#form").trigger("reset");
            }});
        } else {
            check_fname();
            check_lname();
            check_email();
        }
    }


    $("#button").on("click", submitForm);
})