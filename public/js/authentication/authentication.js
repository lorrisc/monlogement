let navbar = document.querySelector("#navbar");
navbar.classList.add("lightNavbar");

// when the page is reload and form error, focus the first error input
let inputErrors = document.querySelectorAll(".errorInput");

if (inputErrors.length > 0) {
    inputErrors[0].focus();
}

// select all first inputErrors, here is always email type
let inputs = document.querySelectorAll('input[type="email"]');
if (
    inputErrors.lenght <= 0 ||
    inputErrors.lenght == null ||
    inputErrors.lenght == undefined
) {
    inputs[0].focus();
}
