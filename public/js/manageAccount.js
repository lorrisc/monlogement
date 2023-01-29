// when the page is reload and form error, focus the first error input
let inputErrors = document.querySelectorAll(".errorInput");

if (inputErrors.length > 0) {
    inputErrors[0].focus();
}

// reset form
// if form is submit and form have error, the reset button dont reset to default value
let resets = document.querySelectorAll("button[type='reset']");
resets.forEach((element) => {
    element.addEventListener("click", () => {
        location.reload();
    });
});
