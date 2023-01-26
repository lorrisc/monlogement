// input radio
let searchTypes_buy = document.querySelector(
    "#homeContainer__searchBox__types #buy"
);
let searchTypes_rent = document.querySelector(
    "#homeContainer__searchBox__types #rent"
);

// label
let searchTypes_label_buy = document.querySelector(
    "#homeContainer__searchBox__types #buylabel"
);
let searchTypes_label_rent = document.querySelector(
    "#homeContainer__searchBox__types #rentlabel"
);

// label > button
let searchTypes_label_buy_button = document.querySelector(
    "#homeContainer__searchBox__types #buylabel button"
);
let searchTypes_label_rent_button = document.querySelector(
    "#homeContainer__searchBox__types #rentlabel button"
);



searchTypes_label_buy_button.addEventListener("click", () => {
    searchTypes_label_buy.classList.add("selected");
    searchTypes_label_rent.classList.remove("selected");
});
searchTypes_label_rent_button.addEventListener("click", () => {
    searchTypes_label_buy.classList.remove("selected");
    searchTypes_label_rent.classList.add("selected");
});
