// DISPLAY ADDITIONAL POPUP
let additionalButton = document.querySelectorAll(".info_popup_icon");
let additionalPopup = document.querySelectorAll(".info_popup");

additionalButton.forEach((element, index) => {
    element.addEventListener("mouseenter", () => {
        additionalPopup[index].classList.add("active");
    });
    element.addEventListener("mouseleave", () => {
        additionalPopup[index].classList.remove("active");
    });

    element.addEventListener("focus", () => {
        additionalPopup[index].classList.add("active");
    });
    element.addEventListener("focusout", () => {
        additionalPopup[index].classList.remove("active");
    });
});
