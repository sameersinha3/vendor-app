$(document).ready(function() {
    var window_height = $(window).height();
    $("body").css("height", window_height);

    $(window).resize(function() {
        window_height = $(window).height();
        $("body").css("height", window_height);
    });
});

function logout() {
    location.href = "../index.php";
}

function new_app() {
    location.href = "new_app.php";
}

function all_apps() {
    location.href = "all_apps.php";
}

function all_users() {
    location.href = "all_users.php";
}

function try_create(){
    var name = $("#name_app").val();
    var site = $("#site_app").val();
    var category = $("#category_app").val();
    var description = $("#description_app").val();
    var instagram = $("#instagram_app").val();
    var facebook = $("#facebook_app").val();
    var twitter = $("#twitter_app").val();
    var author = $("#author_app").val();
    if(name.trim() && category.trim() && description.trim()) {
        if (!site.trim()) {
            site = 'NULL';
        }
        if (!instagram.trim()) {
            instagram = 'NULL';
        }
        if (!facebook.trim()) {
            facebook = 'NULL';
        }
        if (!twitter.trim()) {
            twitter = 'NULL';
        }
        $.post("query.php", {create: 1, name: name, site: site, category: category, description: description, instagram: instagram, facebook: facebook, twitter: twitter, author: author}, function (data) {
            if(data == 1) {
                alert("App created successfully");
                location.href = "index.php";
            }else{
                alert("There was a problem creating the app");
            }
        });
    }else{
        alert("Please fill all required fields");
    }
}

function main_menu(){
    location.href = "index.php";
}

function modify_app(id_app){
    location.href = "modify_app.php?id_app="+id_app;
}

function try_modify_app(id_app){
    var name = $("#name_modify_app").val();
    var site = $("#site_modify_app").val();
    var category = $("#category_modify_app").val();
    var description = $("#description_modify_app").val();
    var instagram = $("#instagram_modify_app").val();
    var facebook = $("#facebook_modify_app").val();
    var twitter = $("#twitter_modify_app").val();
    var author = $("#author_modify_app").val();
    var active = $("#active_modify_app").val();
    if(name.trim() && category.trim() && description.trim()) {
        if (!site.trim()) {
            site = 'NULL';
        }
        if (!instagram.trim()) {
            instagram = 'NULL';
        }
        if (!facebook.trim()) {
            facebook = 'NULL';
        }
        if (!twitter.trim()) {
            twitter = 'NULL';
        }
        $.post("query.php", {modify: 1, id_app: id_app, name: name, site: site, category: category, description: description, instagram: instagram, facebook: facebook, twitter: twitter, author: author, active: active}, function (data) {
            if(data == 1) {
                alert("App modified successfully");
                location.href = "all_apps.php";
            }else{
                alert("There was a problem modifying the app");
            }
        });
    }else {
        alert("Please fill all required fields");
    }
}
function try_delete_app(id_app){
    $.post("query.php", {delete: 1, id_app: id_app}, function (data) {
        if(data == 1) {
            alert("App deleted successfully");
            location.reload();
        }else{
            alert("There was a problem deleting the app");
        }
    });
}

function try_delete_user(id_user){
    $.post("query.php", {delete_user: 1, id_user: id_user}, function (data) {
        if(data == 1) {
            alert("User deleted successfully");
            location.reload();
        }else{
            alert("There was a problem deleting the user");
        }
    });
}

function try_change_active(id_user){
    var active = $("#active_"+id_user).val();
    $.post("query.php", {change_active: 1, id_user: id_user, active: active}, function (data) {
        if(data == 1) {
            alert("User modified successfully");
            location.reload();
        }else{
            alert("There was a problem modifying the user");
        }
    });
}