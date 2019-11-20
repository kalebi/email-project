$(document).ready(function(){
    $("#bGoToRegister").click(function(){
        window.location.href="./html/register.html";
    });

    $("#bGoToLogin").click(function(){
        window.location.href="./html/login.html";
    });

    $("#bNewMessage").click(function(){
        window.location.href="newEmail.html";
    });

    $("#bEmailSent").click(function(){
        window.location.href="emailSent.html";
    });

    $("#bInbox").click(function(){
        window.location.href="inbox.html";
    });
});