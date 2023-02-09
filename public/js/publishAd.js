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

// ADD THE FOREGROUND IN FORMS
let formParts = document.querySelectorAll("form > article");

formParts.forEach((element, index) => {
    if (index == 0) {
        return;
    } else {
        addForeground(index);
    }
});

function addForeground(index) {
    let foreground = document.createElement("div");
    foreground.classList.add("foregroundCreation");
    formParts[index].appendChild(foreground);
}

//BLOCK TABS SCROLL
let autoScrolling = false;

let actualScroll = 0;
let inAntiScroll = false;

window.onscroll = function () {
    if (autoScrolling == false && inAntiScroll == false) {
        window.scrollTo({
            top: actualScroll,
            behavior: "smooth",
        });
        inAntiScroll = true;
        window.addEventListener("scroll", function () {
            // Vérifier si la position du défilement est égale à la position souhaitée
            if (window.scrollY === actualScroll) {
                // Supprimer l'écouteur d'événement pour éviter les fuites de mémoire
                window.removeEventListener("scroll", arguments.callee);
                inAntiScroll = false;
            }
        });
    }
};
// window.addEventListener("scroll", function () {
//     if (inscrolling == false) {
//         console.log("scroll");
//         inscrolling = true;
//         setTimeout(() => {
//             console.log("reel");
//             let heightActualPart = formParts[actualPart].offsetTop;
//             window.scrollTo({
//                 top: heightActualPart - 80,
//             });
//         }, 2000);
//         inscrolling = false;
//     }
// });

// ANIMATION ON RADIO BUTTONS
function radioAnimation(element, indexParent, indexElement) {
    // add active background
    let labels = formParts[indexParent].querySelectorAll(".buttonContent");
    labels[indexElement].classList.add("active");

    let inputs = formParts[indexParent].querySelectorAll(
        ".inputContainer input[type=radio]"
    );

    inputs.forEach((inputelement, index) => {
        // si un autre bouton est coché, on le décoche (designement parlant)
        if (index != indexElement && inputelement.checked == true) {
            labels[index].classList.remove("active");
        }
    });

    scrollAnimation(indexParent);

    // close popup
    let popupContainer = document.querySelector(
        "#propertieType .popupContainer"
    );
    if (popupContainer.classList.contains != "popupDesactivate") {
        popupContainer.classList.add("popupDesactivate");
    }
}

// AUTO SCROLL WHEN COMPLETE A PART
let indexParentVar = 0;
function scrollAnimation(indexParent, unscroll = false) {
    return new Promise(function (resolve) {
        // if (unscroll == true) {
        //     heightPart = formParts[indexParentVar].scrollHeight;
        // } else {
        //     heightPart = formParts[indexParent].scrollHeight;
        // }
        if (unscroll == true) {
            indexParent = indexParentVar;
        }
        actualScroll = window.scrollY;

        setTimeout(() => {
            autoScrolling = true;
            // window.scrollBy(0, heightPart + 80);

            // window.scrollTo({
            //     top: actualScroll + heightPart + 80,
            //     behavior: "smooth",
            // });

            if (unscroll == true) {
                window.scrollTo({
                    top: formParts[indexParent - 1].offsetTop - 100,
                    behavior: "smooth",
                });
            } else {
                window.scrollTo({
                    top: formParts[indexParent + 1].offsetTop - 100,
                    behavior: "smooth",
                });
            }
            // );
            // Attacher un écouteur d'événement à la fenêtre pour surveiller le défilement
            window.addEventListener("scroll", function () {
                // Vérifier si la position du défilement est égale à la position souhaitée
                if (unscroll == true) {
                    if (
                        window.scrollY ===
                        actualScroll +
                            formParts[indexParent - 1].offsetTop -
                            100
                    ) {
                        // Supprimer l'écouteur d'événement pour éviter les fuites de mémoire
                        window.removeEventListener("scroll", arguments.callee);
                        autoScrolling = false;
                        actualScroll = window.scrollY;
                    }
                } else {
                    if (
                        window.scrollY ===
                        actualScroll +
                            formParts[indexParent + 1].offsetTop -
                            100
                    ) {
                        // Supprimer l'écouteur d'événement pour éviter les fuites de mémoire
                        window.removeEventListener("scroll", arguments.callee);
                        autoScrolling = false;
                        actualScroll = window.scrollY;
                    }
                }
            });

            // remove foreground on next
            if (unscroll == true) {
                let foreground = formParts[indexParent - 1].querySelector(
                    ".foregroundCreation"
                );
                formParts[indexParent - 1].removeChild(foreground);
            } else {
                let foreground = formParts[indexParent + 1].querySelector(
                    ".foregroundCreation"
                );
                formParts[indexParent + 1].removeChild(foreground);
            }

            // add foreground on previous
            if (unscroll == true) {
                addForeground(indexParentVar);
                indexParentVar = indexParent - 1;
            } else {
                addForeground(indexParent);
                indexParentVar = indexParent + 1;
            }

            setTimeout(() => {
                resolve();
            }, 300);
        });
    }, 100);
}

// EVENT ON USER DESCROLL
let animatingUnscroll = false;
window.addEventListener("wheel", function (event) {
    if (event.deltaY < 0 && animatingUnscroll == false) {
        if (indexParentVar > 0) {
            animatingUnscroll = true;
            scrollAnimation(null, true).then(function () {
                animatingUnscroll = false;
            });
        }
    }
});

// CHANGE LIFE LINE INFORMATION
let lifeLineArticles = document.querySelectorAll(
    "#userIndicationFormStatus > article"
);
function updateLifeLine(index, text) {
    // index = element validé a l'instant
    let lifeLineText = lifeLineArticles[index].querySelector("p.content");
    setTimeout(() => {
        lifeLineText.innerHTML = text;

        // bullet style
        lifeLineArticles[index].classList.remove("inprogress");
        lifeLineArticles[index].classList.add("validate");

        lifeLineArticles[index + 1].classList.add("inprogress");

        // change focus position
        let inputs = formParts[index + 1].querySelectorAll(
            ':is(input[type="text"],input[type="number"],textarea,input[type="email"])'
        );
        if (inputs.length > 0) {
            inputs[0].focus();
        } else {
            //unfocus
            document.activeElement.blur();
        }
    }, 100);
}
let topLifeLineText = document.querySelector(
    "#userIndicationFormStatus > p > span"
);

//* types
let adTypeButton__Rent = document.querySelector("#adTypeButton__Rent");
let adTypeButton__Sell = document.querySelector("#adTypeButton__Sell");

adTypeButton__Rent.addEventListener("click", () => {
    radioAnimation(adTypeButton__Rent, 0, 0);
    updateLifeLine(0, "Location");
    setTimeout(() => {
        topLifeLineText.innerHTML = "Louer";
    }, 100);
});
adTypeButton__Sell.addEventListener("click", () => {
    radioAnimation(adTypeButton__Sell, 0, 1);
    updateLifeLine(0, "Vendre");
    setTimeout(() => {
        topLifeLineText.innerHTML = "Vendre";
    }, 100);
});

//* propertieType
let propertieTypeButton__House = document.querySelector(
    "#propertieTypeButton__House"
);
let propertieTypeButton__Appartment = document.querySelector(
    "#propertieTypeButton__Appartment"
);

let propertieTypeButton__CarParkBox = document.querySelector(
    "#propertieTypeButton__CarParkBox"
);
let propertieTypeButton__Ground = document.querySelector(
    "#propertieTypeButton__Ground"
);
let propertieTypeButton__LoftWorkshopArea = document.querySelector(
    "#propertieTypeButton__LoftWorkshopArea"
);
let propertieTypeButton__CommercialProperty = document.querySelector(
    "#propertieTypeButton__CommercialProperty"
);
let propertieTypeButton__Buildings = document.querySelector(
    "#propertieTypeButton__Buildings"
);
let propertieTypeButton__Castle = document.querySelector(
    "#propertieTypeButton__Castle"
);
let propertieTypeButton__CommercialPremises = document.querySelector(
    "#propertieTypeButton__CommercialPremises"
);
let propertieTypeButton__Offices = document.querySelector(
    "#propertieTypeButton__Offices"
);
let propertieTypeButton__Mansion = document.querySelector(
    "#propertieTypeButton__Mansion"
);
let propertieTypeButton__Others = document.querySelector(
    "#propertieTypeButton__Others"
);

propertieTypeButton__House.addEventListener("click", () => {
    radioAnimation(propertieTypeButton__House, 1, 0);
    updateLifeLine(1, "Maison");
});
propertieTypeButton__Appartment.addEventListener("click", () => {
    radioAnimation(propertieTypeButton__Appartment, 1, 1);
    updateLifeLine(1, "Appartement");
});
propertieTypeButton__CarParkBox.addEventListener("click", () => {
    radioAnimation(propertieTypeButton__CarParkBox, 1, 2);
    updateLifeLine(1, "Parking/box");
});
propertieTypeButton__Ground.addEventListener("click", () => {
    radioAnimation(propertieTypeButton__Ground, 1, 3);
    updateLifeLine(1, "Terrain");
});
propertieTypeButton__LoftWorkshopArea.addEventListener("click", () => {
    radioAnimation(propertieTypeButton__LoftWorkshopArea, 1, 4);
    updateLifeLine(1, "Loft/atelier/surface");
});
propertieTypeButton__CommercialProperty.addEventListener("click", () => {
    radioAnimation(propertieTypeButton__CommercialProperty, 1, 5);
    updateLifeLine(1, "Fonds de commerce");
});
propertieTypeButton__Buildings.addEventListener("click", () => {
    radioAnimation(propertieTypeButton__Buildings, 1, 6);
    updateLifeLine(1, "Bâtiments/immeuble");
});
propertieTypeButton__Castle.addEventListener("click", () => {
    radioAnimation(propertieTypeButton__Castle, 1, 7);
    updateLifeLine(1, "Château");
});
propertieTypeButton__CommercialPremises.addEventListener("click", () => {
    radioAnimation(propertieTypeButton__CommercialPremises, 1, 8);
    updateLifeLine(1, "Local commercial");
});
propertieTypeButton__Offices.addEventListener("click", () => {
    radioAnimation(propertieTypeButton__Offices, 1, 9);
    updateLifeLine(1, "Bureaux");
});
propertieTypeButton__Mansion.addEventListener("click", () => {
    radioAnimation(propertieTypeButton__Mansion, 1, 10);
    updateLifeLine(1, "Hôtel particulier");
});
propertieTypeButton__Others.addEventListener("click", () => {
    radioAnimation(propertieTypeButton__Others, 1, 11);
    updateLifeLine(1, "Autres");
});

//close popup
let propertyTypesPopupButton = document.querySelector(
    "#propertieType #popupButton"
);
propertyTypesPopupButton.addEventListener("click", () => {
    let popupContainer = document.querySelector(
        "#propertieType .popupContainer"
    );
    popupContainer.classList.remove("popupDesactivate");
});
//close popup
let propertyTypesClick = document.querySelector("#propertieType .closeButton");
propertyTypesClick.addEventListener("click", () => {
    let popupContainer = document.querySelector(
        "#propertieType .popupContainer"
    );
    popupContainer.classList.add("popupDesactivate");
});

//* surface
let surfaceValue = document.querySelector("#surfaceValue");
let surfaceButton = document.querySelector("#submitSurface");
surfaceValue.addEventListener("input", () => {
    if (surfaceValue.value > 0) {
        surfaceButton.classList.remove("blockSubmit");
    } else {
        surfaceButton.classList.add("blockSubmit");
    }
});
surfaceValue.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        if (surfaceValue.value > 0) {
            scrollAnimation(2);
            updateLifeLine(2, surfaceValue.value + " m²");
        }
    }
});
surfaceButton.addEventListener("click", () => {
    if (surfaceValue.value > 0) {
        scrollAnimation(2);
        updateLifeLine(2, surfaceValue.value + " m²");
    }
});

//* rooms
// total rooms
function buttonNumber(input, buttonIndication, chef) {
    if (chef == 1) {
        if (buttonIndication == "add") {
            input.value = parseInt(input.value) + 1;
        } else if (buttonIndication == "remove" && input.value > 0) {
            input.value = parseInt(input.value) - 1;
        } else if (buttonIndication == "input") {
            let totalsBelowInputs =
                parseInt(bedroomNumberValue.value) +
                parseInt(bathroomNumberValue.value) +
                parseInt(toiletNumberValue.value);

            if (totalsBelowInputs > roomNumberValue.value) {
                bedroomNumberValue.value = 0;
                bathroomNumberValue.value = 0;
                toiletNumberValue.value = 0;

                inputButtonDesign(
                    bedroomNumberValue,
                    bedroomNumberRemoveButton
                );
                inputButtonDesign(
                    bathroomNumberValue,
                    bathoomNumberRemoveButton
                );
                inputButtonDesign(toiletNumberValue, toiletNumberRemoveButton);
            }
        }
    } else {
        if (buttonIndication == "add") {
            let sumInputs =
                parseInt(bedroomNumberValue.value) +
                parseInt(bathroomNumberValue.value) +
                parseInt(toiletNumberValue.value);

            if (sumInputs < roomNumberValue.value) {
                input.value = parseInt(input.value) + 1;
            }
        } else if (buttonIndication == "remove" && input.value > 0) {
            input.value = parseInt(input.value) - 1;
        } else if (buttonIndication == "input") {
            let totalsBelowInputs =
                parseInt(bedroomNumberValue.value) +
                parseInt(bathroomNumberValue.value) +
                parseInt(toiletNumberValue.value);

            if (totalsBelowInputs > roomNumberValue.value) {
                input.value = 0;
            }
        }
    }
}
function inputButtonDesign(input, button) {
    let totalsBelowInputs =
        parseInt(bedroomNumberValue.value) +
        parseInt(bathroomNumberValue.value) +
        parseInt(toiletNumberValue.value);

    // add button
    if (roomNumberValue.value <= totalsBelowInputs) {
        bedroomNumberAddButton.classList.add("disabled");
        bathroomNumberAddButton.classList.add("disabled");
        toiletNumberAddButton.classList.add("disabled");
    } else {
        bedroomNumberAddButton.classList.remove("disabled");
        bathroomNumberAddButton.classList.remove("disabled");
        toiletNumberAddButton.classList.remove("disabled");
    }

    // remove button
    if (input.value > 0) {
        button.classList.remove("disabled");
    } else {
        button.classList.add("disabled");
    }

    // totals inputs
    if (parseInt(roomNumberValue.value) <= totalsBelowInputs) {
        roomNumberRemoveButton.classList.add("disabled");
    } else {
        roomNumberRemoveButton.classList.remove("disabled");
    }

    // submit button
    if (roomNumberValue.value > 0) {
        roomButton.classList.remove("blockSubmit");
    } else {
        roomButton.classList.add("blockSubmit");
    }
}

let roomButton = document.querySelector("#submitRoom");

let roomNumberValue = document.querySelector("#roomNumberValue");
let roomNumberRemoveButton = document.querySelector(
    "#room__number .actionOnInputButton:first-child"
);
let roomNumberAddButton = document.querySelector(
    "#room__number .actionOnInputButton:last-child"
);

roomNumberAddButton.addEventListener("click", () => {
    buttonNumber(roomNumberValue, "add", 1);
    inputButtonDesign(roomNumberValue, roomNumberRemoveButton);
});
roomNumberRemoveButton.addEventListener("click", () => {
    let sumInputs =
        parseInt(bedroomNumberValue.value) +
        parseInt(bathroomNumberValue.value) +
        parseInt(toiletNumberValue.value);

    if (sumInputs < roomNumberValue.value) {
        buttonNumber(roomNumberValue, "remove", 1);
    }
    inputButtonDesign(roomNumberValue, roomNumberRemoveButton);
});
roomNumberValue.addEventListener("change", () => {
    buttonNumber(roomNumberValue, "input", 1);
    inputButtonDesign(roomNumberValue, roomNumberRemoveButton);
});

// bedrooms
let bedroomNumberValue = document.querySelector("#bedroomNumberValue");
let bedroomNumberRemoveButton = document.querySelector(
    "#bedroom__number .actionOnInputButton:first-child"
);
let bedroomNumberAddButton = document.querySelector(
    "#bedroom__number .actionOnInputButton:last-child"
);

bedroomNumberAddButton.addEventListener("click", () => {
    buttonNumber(bedroomNumberValue, "add");
    inputButtonDesign(bedroomNumberValue, bedroomNumberRemoveButton);
});
bedroomNumberRemoveButton.addEventListener("click", () => {
    buttonNumber(bedroomNumberValue, "remove");
    inputButtonDesign(bedroomNumberValue, bedroomNumberRemoveButton);
});
bedroomNumberValue.addEventListener("change", () => {
    buttonNumber(bedroomNumberValue, "input");
    inputButtonDesign(bedroomNumberValue, bedroomNumberRemoveButton);
});

// bedrooms

// bathrooms
let bathroomNumberValue = document.querySelector("#bathroomNumberValue");
let bathoomNumberRemoveButton = document.querySelector(
    "#bathroom__number .actionOnInputButton:first-child"
);
let bathroomNumberAddButton = document.querySelector(
    "#bathroom__number .actionOnInputButton:last-child"
);

bathroomNumberAddButton.addEventListener("click", () => {
    buttonNumber(bathroomNumberValue, "add");
    inputButtonDesign(bathroomNumberValue, bathoomNumberRemoveButton);
});
bathoomNumberRemoveButton.addEventListener("click", () => {
    buttonNumber(bathroomNumberValue, "remove");
    inputButtonDesign(bathroomNumberValue, bathoomNumberRemoveButton);
});
bathroomNumberValue.addEventListener("change", () => {
    buttonNumber(bathroomNumberValue, "input");
    inputButtonDesign(bathroomNumberValue, bathoomNumberRemoveButton);
});

// toilets
let toiletNumberValue = document.querySelector("#toiletNumberValue");
let toiletNumberRemoveButton = document.querySelector(
    "#toilet__number .actionOnInputButton:first-child"
);
let toiletNumberAddButton = document.querySelector(
    "#toilet__number .actionOnInputButton:last-child"
);

toiletNumberAddButton.addEventListener("click", () => {
    buttonNumber(toiletNumberValue, "add");
    inputButtonDesign(toiletNumberValue, toiletNumberRemoveButton);
});
toiletNumberRemoveButton.addEventListener("click", () => {
    buttonNumber(toiletNumberValue, "remove");
    inputButtonDesign(toiletNumberValue, toiletNumberRemoveButton);
});
toiletNumberValue.addEventListener("change", () => {
    buttonNumber(toiletNumberValue, "input");
    inputButtonDesign(toiletNumberValue, toiletNumberRemoveButton);
});

// submit button
roomButton.addEventListener("click", () => {
    if (roomNumberValue.value > 0) {
        scrollAnimation(3);
        let text = "";
        if (roomNumberValue.value > 1) {
            text = roomNumberValue.value + " pièces";
        } else {
            text = "Studio";
        }
        updateLifeLine(3, text);
    }
});

//* furniture
let furnitureButton__furniture = document.querySelector(
    "#furnitureButton__furniture"
);
let furnitureButton__unfurniture = document.querySelector(
    "#furnitureButton__unfurniture"
);

furnitureButton__furniture.addEventListener("click", () => {
    radioAnimation(furnitureButton__furniture, 4, 0);
    updateLifeLine(4, "Meublé");
});
furnitureButton__unfurniture.addEventListener("click", () => {
    radioAnimation(furnitureButton__unfurniture, 4, 1);
    updateLifeLine(4, "Non meublé");
});

//* surface field
let surfaceFieldValue = document.querySelector("#surfaceFieldValue");
let submitSurfaceField = document.querySelector("#submitSurfaceField");
surfaceFieldValue.addEventListener("input", () => {
    if (surfaceFieldValue.value > 0) {
        submitSurfaceField.classList.remove("blockSubmit");
    } else {
        submitSurfaceField.classList.add("blockSubmit");
    }
});
surfaceFieldValue.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        if (surfaceFieldValue.value > 0) {
            scrollAnimation(5);
            updateLifeLine(5, surfaceFieldValue.value + " m²");
        }
    }
});
submitSurfaceField.addEventListener("click", () => {
    if (surfaceFieldValue.value > 0) {
        scrollAnimation(5);
        updateLifeLine(5, surfaceFieldValue.value + " m²");
    }
});

//* price
let priceValue = document.querySelector("#priceValue");
let submitPrice = document.querySelector("#submitPrice");
priceValue.addEventListener("input", () => {
    if (priceValue.value > 0) {
        submitPrice.classList.remove("blockSubmit");
    } else {
        submitPrice.classList.add("blockSubmit");
    }
});
priceValue.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        if (priceValue.value > 0) {
            scrollAnimation(6);
            updateLifeLine(6, priceValue.value + " €");
        }
    }
});
submitPrice.addEventListener("click", () => {
    if (priceValue.value > 0) {
        scrollAnimation(6);
        updateLifeLine(6, priceValue.value + " €");
    }
});

//* description
let descriptionValue = document.querySelector("#descriptionValue");
let submitDescription = document.querySelector("#submitDescription");
descriptionValue.addEventListener("input", () => {
    if (descriptionValue.value.length > 10) {
        submitDescription.classList.remove("blockSubmit");
    } else {
        submitDescription.classList.add("blockSubmit");
    }
});
submitDescription.addEventListener("click", () => {
    if (descriptionValue.value.length > 10) {
        scrollAnimation(7);
        updateLifeLine(7, "Description du bien");

        // setTimeout(() => {
        //     scrollAnimation(8);
        //     updateLifeLine(8, "Photos");
        // }, 500);
    }
});

//* energyConsumption
let energyConsumptionValue = document.querySelector("#energyConsumptionValue");
let submitEnergy = document.querySelector("#submitEnergy");
energyConsumptionValue.addEventListener("input", () => {
    if (energyConsumptionValue.value > 0) {
        submitEnergy.classList.remove("blockSubmit");
    } else {
        submitEnergy.classList.add("blockSubmit");
    }
});
energyConsumptionValue.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        if (energyConsumptionValue.value > 0) {
            scrollAnimation(9);
            updateLifeLine(9, energyConsumptionValue.value + " KWh ep./m².an");
        }
    }
});
submitEnergy.addEventListener("click", () => {
    if (energyConsumptionValue.value > 0) {
        scrollAnimation(9);
        updateLifeLine(9, energyConsumptionValue.value + " KWh ep./m².an");
    }
});

//* adress
let timeoutId;
let addressArray = [];
let adresseDropDownUl = document.querySelector("#adresse .contentDropDown ul");

let adresseValue = document.querySelector("#adresseValue");
let submitAdress = document.querySelector("#submitAdress");

// delete dropdown
adresseValue.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        addressArray = [];
        adresseDropDownUl.innerHTML = "";
    }
    if (adresseValue.value.length < 3) {
        addressArray = [];
        adresseDropDownUl.innerHTML = "";
    }
});

adresseValue.addEventListener("input", async (event) => {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(function () {
        let url =
            "https://api-adresse.data.gouv.fr/search/?q=" +
            adresseValue.value +
            "&limit=5&autocomplete=0";
        fetch(url, { method: "get" })
            .then((response) => response.json())
            .then((results) => {
                addressArray = [];
                adresseDropDownUl.innerHTML = "";

                results.features.forEach((element) => {
                    // console.log(element.properties.label);
                    // console.log("--------------");
                    // console.log(element.properties.housenumber);
                    // console.log(element.properties.street);
                    // console.log(element.properties.postcode);
                    // console.log(element.properties.city);
                    // console.log("--------------");

                    let buttonAdress = document.createElement("button");
                    buttonAdress.type = "button";
                    adresseDropDownUl.appendChild(buttonAdress);

                    let li = document.createElement("li");
                    li.textContent = element.properties.label;
                    buttonAdress.appendChild(li);

                    // push value in array
                    let address = {
                        houseNumber: element.properties.housenumber,
                        street: element.properties.street,
                        postcode: element.properties.postcode,
                        city: element.properties.city,
                        label: element.properties.label,
                    };
                    addressArray.push(address);
                });
                let adresseDropDown = document.querySelector(
                    "#adresse .contentDropDown"
                );
                adresseDropDown.classList.add("active");

                let adresseDropDownButtons = document.querySelectorAll(
                    "#adresse .contentDropDown ul button"
                );
                adresseDropDownButtons.forEach((element, index) => {
                    element.addEventListener("click", () => {
                        // set value in input
                        adresseValue.value = addressArray[index].label;

                        // set detail adress
                        let adress_housenumber = document.querySelector(
                            "#adress_housenumber"
                        );
                        let adress_street =
                            document.querySelector("#adress_street");
                        let adress_postcode =
                            document.querySelector("#adress_postcode");
                        let adress_city =
                            document.querySelector("#adress_city");

                        adress_housenumber.value =
                            addressArray[index].houseNumber;
                        adress_street.value = addressArray[index].street;
                        adress_postcode.value = addressArray[index].postcode;
                        adress_city.value = addressArray[index].city;

                        // delete dropdown & array
                        adresseDropDown.classList.remove("active");
                        addressArray = [];
                        adresseDropDownUl.innerHTML = "";

                        submitAdress.classList.remove("blockSubmit");
                        scrollAnimation(10);
                        updateLifeLine(10, "Adresse du bien");
                    });
                });
            })
            .catch((error) => {
                throw error;
            });
    }, 500);
});

//* attr supp
let attrSuppInputs = document.querySelectorAll(
    "#attrSupp .checkboxsContainer input[type=checkbox]"
);
let attrSuppButtons = document.querySelectorAll("#attrSupp .content button");
let attrSuppLabels = document.querySelectorAll("#attrSupp .buttonContent");

attrSuppButtons.forEach((element, index) => {
    element.addEventListener("click", () => {
        if (attrSuppLabels[index].classList.contains("active")) {
            attrSuppLabels[index].classList.remove("active");
            attrSuppInputs[index].checked = false;
        } else {
            attrSuppLabels[index].classList.add("active");
            attrSuppInputs[index].checked = true;
        }
    });
});

let attrSuppButton = document.querySelector("#submitAttrSupp");

attrSuppButton.addEventListener("click", () => {
    scrollAnimation(11);
    updateLifeLine(11, "Attributs supplémentaires");
});
