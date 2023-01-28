//************ PASSWORD VERIFICATION
//user indication
let minchar = document.querySelector("#minchar");
let maxchar = document.querySelector("#maxchar");
let uppercase = document.querySelector("#uppercase");
let lowercase = document.querySelector("#lowercase");
let figure = document.querySelector("#chiffre");
//input
let passwordvalue = document.querySelector("#password");

let restorePassword__button = document.querySelector("#restorePassword__button");

//event
passwordvalue.addEventListener("input", function () {
    validation(this);
});

function validation(password) {
    //figure
    if (/[0-9]{1}/.test(password.value)) {
        figure.classList.add("regexValidate");
    } else {
        figure.classList.remove("regexValidate");
    }

    //uppercase
    if (/[A-Z]{1}/.test(password.value)) {
        uppercase.classList.add("regexValidate");
    } else {
        uppercase.classList.remove("regexValidate");
    }

    //lowercase
    if (/[a-z]{1}/.test(password.value)) {
        lowercase.classList.add("regexValidate");
    } else {
        lowercase.classList.remove("regexValidate");
    }

    //lenght
    //min
    if (password.value.length >= 8) {
        minchar.classList.add("regexValidate");
    } else {
        minchar.classList.remove("regexValidate");
    }
    //max
    if (password.value.length <= 50) {
        maxchar.classList.add("regexValidate");
    } else {
        maxchar.classList.remove("regexValidate");
    }

    if (
        figure.classList.contains("regexValidate") &&
        uppercase.classList.contains("regexValidate") &&
        lowercase.classList.contains("regexValidate") &&
        minchar.classList.contains("regexValidate") &&
        maxchar.classList.contains("regexValidate")
    ) {
        restorePassword__button.classList.remove("blockSubmit");
    } else {
        restorePassword__button.classList.add("blockSubmit");
    }
}

//************ submit form
restorePassword__button.addEventListener("click", () => {
    if (restorePassword__button.classList.contains("blockSubmit")) {
        return;
    } else {
        let restorePasswordForm = document.querySelector("#restorePasswordForm");
        restorePasswordForm.submit();
    }
});

//************ submit form if enter and all is passed
passwordvalue.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        if (restorePassword__button.classList.contains("blockSubmit")) {
            return;
        } else {
            let restorePasswordForm =
                document.querySelector("#restorePasswordForm");
            restorePasswordForm.submit();
        }
    }
});