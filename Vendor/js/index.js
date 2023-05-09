function isEmail(email) {
    var regex = /\S+@\S+\.\S+/;
    return regex.test(email);
}

function try_login(){
    var email = $("#email_login").val();
    var password = $("#psw_login").val();

    if(email.trim() && password.trim()){
        if(isEmail(email)){
            $.post("query.php", {login: 1, email: email, psw: password}, function(data){
                if(data == 0){
                    window.location.href = "user/index.php";
                }else if(data == 1){
                    window.location.href = "admin/index.php";
                }else if(data == 2){
                    alert("Invalid email or password");
                }else{
                    alert("Error occured. Please try again later");
                }
            });
        }else{
            alert("Invalid email");
        }
    }
}