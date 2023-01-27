//************ VERIFICATION POPUP STEP1
//inputs
let email = document.querySelector("#email");
let firstname = document.querySelector("#firstname");
let name = document.querySelector("#name");

//variables
let emailPassed = false;

//submit button
let signupStep1__button = document.querySelector("#signupStep1__button");

email.addEventListener("input", function (event) {
    validationEmail(this);
});
firstname.addEventListener("input", function () {
    confirmPopup();
});
name.addEventListener("input", function () {
    confirmPopup();
});

function validationEmail(emailvalue) {
    if (
        /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/.test(
            email.value
        )
    ) {
        emailPassed = true;
    } else {
        emailPassed = false;
    }

    confirmPopup();
}

function confirmPopup() {
    // firstname
    firstnamePassed = false;
    if (firstname.value == "" || firstname.value == null) {
        firstnamePassed = false;
    } else {
        firstnamePassed = true;
    }

    // name
    namePassed = false;
    if (name.value == "" || name.value == null) {
        namePassed = false;
    } else {
        namePassed = true;
    }

    // global
    if (emailPassed == true && firstnamePassed == true && namePassed == true) {
        signupStep1__button.classList.remove("blockSubmit");
    } else {
        signupStep1__button.classList.add("blockSubmit");
    }
}

//************ validation step1 if enter and all is passed
email.addEventListener("keypress", function (event) {
    enterToggle(event.key);
});
firstname.addEventListener("keypress", function (event) {
    enterToggle(event.key);
});
name.addEventListener("keypress", function (event) {
    enterToggle(event.key);
});

function enterToggle(key) {
    if (key === "Enter") {
        if (signupStep1__button.classList.contains("blockSubmit")) {
            return;
        } else {
            let popupStep1 = document.querySelector("#signupStep1");
            let popupStep2 = document.querySelector("#signupStep2");

            popupStep1.classList.add("popupDesactivate");
            popupStep2.classList.remove("popupDesactivate");
        }
    }
}

//************ TOGGLE POPUP STEP1
signupStep1__button.addEventListener("click", () => {
    if (signupStep1__button.classList.contains("blockSubmit")) {
        return;
    } else {
        let popupStep1 = document.querySelector("#signupStep1");
        let popupStep2 = document.querySelector("#signupStep2");

        popupStep1.classList.add("popupDesactivate");
        popupStep2.classList.remove("popupDesactivate");
    }
});

//************ PASSWORD VERIFICATION
//user indication
let minchar = document.querySelector("#minchar");
let maxchar = document.querySelector("#maxchar");
let uppercase = document.querySelector("#uppercase");
let lowercase = document.querySelector("#lowercase");
let figure = document.querySelector("#chiffre");
//input
let passwordvalue = document.querySelector("#password");

let signupStep2__button = document.querySelector("#signupStep2__button");

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
        signupStep2__button.classList.remove("blockSubmit");
    } else {
        signupStep2__button.classList.add("blockSubmit");
    }
}

//************ submit form
signupStep2__button.addEventListener("click", () => {
    if (signupStep2__button.classList.contains("blockSubmit")) {
        return;
    } else {
        let createAccountForm = document.querySelector("#createAccountForm");
        createAccountForm.submit();
    }
});

//************ submit form if enter and all is passed
passwordvalue.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        if (signupStep2__button.classList.contains("blockSubmit")) {
            return;
        } else {
            let createAccountForm =
                document.querySelector("#createAccountForm");
            createAccountForm.submit();
        }
    }
});

//************ return button
let returnToStep1 = document.querySelector("#returnToStep1");
returnToStep1.addEventListener("click", () => {
    passwordvalue.value = "";

    let popupStep1 = document.querySelector("#signupStep1");
    let popupStep2 = document.querySelector("#signupStep2");

    popupStep1.classList.remove("popupDesactivate");
    popupStep2.classList.add("popupDesactivate");

    figure.classList.remove("regexValidate");
    uppercase.classList.remove("regexValidate");
    lowercase.classList.remove("regexValidate");
    minchar.classList.remove("regexValidate");
    maxchar.classList.remove("regexValidate");
});
