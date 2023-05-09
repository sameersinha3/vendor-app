$(document).ready(function() {
    var window_width = $(window).width();
    var window_height = $(window).height();

    $("body").css("width", window_width);
    $("body").css("height", window_height);

    $(window).resize(function() {
        window_width = $(window).width();
        window_height = $(window).height();

        $("body").css("width", window_width);
        $("body").css("height", window_height);
    });
});

function isEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test(email);
}

function try_registration(){
    var first_name = $("#first_name_signup").val();
    var last_name = $("#last_name_signup").val();
    var email = $("#email_signup").val();
    var password = $("#psw_signup").val();
    var phone = $("#phone_signup").val();

    if(first_name.trim() && last_name.trim() && email.trim() && password.trim() && phone.trim()){
        if(isEmail(email)){
            $.post("query.php", {registration: 1, first_name: first_name, last_name: last_name, email: email, psw: password, phone: phone}, function(data){
                if(data == 0){
                    window.location.href = "user/index.php";
                }else if(data == 1){
                    window.location.href = "admin/index.php";
                }else if(data == 2){
                    alert("Please use another email address");
                }else{
                    alert("Error occured. Please try again later");
                }
            });
        }else{
            alert("Please enter a valid email address");
        }
    }else {
        alert("Please fill all fields");
    }
}