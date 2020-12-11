function signUp() {

    var form = document.getElementById("login-form");

    if(form.className == "login"){
        var input_email = document.createElement("input");
        var label_email = document.createElement("label");

        button = form.removeChild(form.lastElementChild);
        button.value = "Cadastre-se";

        label_email.for = "email";
        label_email.innerHTML = "E-mail";

        input_email.type = "email";
        input_email.name = "email";

        form.appendChild(label_email);
        form.appendChild(input_email);
        form.appendChild(button);

        form.className = "signup";
        form.action = "../back-end/php/add_user.php";

        document.getElementById("signUpButton").innerHTML = "Faça Login";
    }
    else{
        button = form.removeChild(form.lastElementChild);
        form.removeChild(form.lastElementChild);
        form.removeChild(form.lastElementChild);

        button.value = "Login";
        form.appendChild(button);

        form.className = "login";
        form.action = "../back-end/php/validate.php";

        document.getElementById("signUpButton").innerHTML = "Cadastre-se";
    }
}
  