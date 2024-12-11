function toast_action(toastrMessage) {
    toastr.options = {
        closeButton: toastrMessage.closeButton ?? true,
        debug: toastrMessage.debug ?? false,
        newestOnTop: toastrMessage.newestOnTop ?? false,
        progressBar: toastrMessage.progressBar ?? true,
        positionClass: toastrMessage.positionClass ?? "toast-top-right",
        preventDuplicates: toastrMessage.preventDuplicates ?? false,
        onclick: null,
        showDuration: toastrMessage.showDuration ?? 300,
        hideDuration: toastrMessage.hideDuration ?? 1000,
        timeOut: toastrMessage.timeOut ?? 5000,
        extendedTimeOut: toastrMessage.extendedTimeOut ?? 1000,
        showEasing: toastrMessage.showEasing ?? "swing",
        hideEasing: toastrMessage.hideEasing ?? "linear",
        showMethod: toastrMessage.showMethod ?? "fadeIn",
        hideMethod: toastrMessage.hideMethod ?? "fadeOut",
    };

    toastr[toastrMessage.type ?? ""](toastrMessage.message);
}

var checkConfirmingPassword = function () {
    document.getElementById("password_confirmation_message").innerHTML = "";
    if (
        document.getElementById("new_password").value.trim() != "" &&
        document.getElementById("password_confirmation").value.trim() != ""
    ) {
        if (
            document.getElementById("new_password").value ==
            document.getElementById("password_confirmation").value
        ) {
            document.getElementById(
                "password_confirmation_message"
            ).style.color = "green";
            document.getElementById("password_confirmation_message").innerHTML =
                "Password confirmation has matched!";
        } else {
            document.getElementById(
                "password_confirmation_message"
            ).style.color = "red";
            document.getElementById("password_confirmation_message").innerHTML =
                "Password confirmation dost not match!";
        }
    }
};
function incorrectActivePassword() {
    var old_passowrd = document.getElementById("old_passowrd");
    old_passowrd.classList.add("is-invalid");
    document.getElementById("password_message").innerHTML =
        "The inputted password is incorrect!";
}
function focusPassword1() {
    var old_passowrd = document.getElementById("old_passowrd");
    old_passowrd.classList.remove("is-invalid");
    document.getElementById("password_message").innerHTML = "";
}
function focusPassword2() {
    document
        .getElementById("password_confirmation")
        .classList.remove("is-invalid");
    document.getElementById("password_confirmation_message").innerHTML = "";
}
function showAndHidePasswordChangeGroup() {
    var passwordChange = document.getElementById("passwordChange");
    var passwordChangeGroup = document.getElementById("password_change_group");
    var old_passowrd = document.getElementById("old_passowrd");
    var new_password = document.getElementById("new_password");
    var password_confirmation = document.getElementById(
        "password_confirmation"
    );

    if (passwordChange.checked) {
        passwordChange.value = "yes";
        passwordChangeGroup.style.display = "block";
        old_passowrd.required = true;
        new_password.required = true;
        password_confirmation.required = true;
    } else {
        passwordChange.value = "no";
        passwordChangeGroup.style.display = "none";
        old_passowrd.required = false;
        new_password.required = false;
        password_confirmation.required = false;
    }
}
