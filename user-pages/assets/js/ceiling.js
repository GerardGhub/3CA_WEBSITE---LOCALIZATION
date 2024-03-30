
//  for Ceiling tubes
document.addEventListener("DOMContentLoaded", function() {
    // Get references to elements
    var productVariety = document.getElementById("productVariety1");
    var productImage = document.querySelector(".product-image1");

    // Define the image sources for each option
    var imageSources = {
        "Cedar-CeilingTubes" : "ceiling tubes/CEILING TUBE (CEDAR) BG REMOVED.png",
        "Red_Cedar-CeilingTubes" : "ceiling tubes/CEILING TUBE(RED CEDAR) BG REMOVED.png",
        "Coffee-CeilingTubes" : "ceiling tubes/CEILING TUBE (COFFEE) BG REMOVED.png",
        "Cypress-CeilingTubes" : "ceiling tubes/CEILING TUBE (CYPRESS) BG REMOVED.png",
    };

    // Add event listener for change in select option
    productVariety.addEventListener("change", function() {
        // Get the selected option value
        var selectedOption = productVariety.value;

        // Change the product image source based on the selected option
        productImage.src = imageSources[selectedOption];

    });
});

//=============================================================================================================

// for PVC Panels
document.addEventListener("DOMContentLoaded", function() {
    // Get references to elements
    var productVariety = document.getElementById("productVariety2");
    var productImage = document.querySelector(".product-image2");

    // Define the image sources for each option
    var imageSources = {
        "Cacao-PVC" : "PVC Panels/PVC CEILING PANEL (cacao).jpg",
        "Cypress-PVC" : "PVC Panels/PVC CEILING PANEL (cypress).jpg",
        "Drift_Wood-PVC" : "PVC Panels/PVC CEILING PANEL (driftwood).jpg",
        "Glossy_White-PVC" : "PVC Panels/PVC CEILING PANEL (glossy white).jpg",
        "Golden_Maple-PVC" : "PVC Panels/PVC CEILING PANEL (goldenmaple).jpg",
        "Narra-PVC" : "PVC Panels/PVC CEILING PANEL (narra).jpg",
        "Oak-PVC" : "PVC Panels/PVC CEILING PANEL (oak).jpg",
        "Rose_Wood-PVC" : "PVC Panels/PVC CEILING PANEL (rosewood).jpg",
        "Wenge-PVC" : "PVC Panels/PVC CEILING PANEL (wenge).jpg",
        "White-PVC" : "PVC Panels/PVC CEILING PANEL (white).jpg",
    };

    // Add event listener for change in select option
    productVariety.addEventListener("change", function() {
        // Get the selected option value
        var selectedOption = productVariety.value;

        // Change the product image source based on the selected option
        productImage.src = imageSources[selectedOption];

    });
});


//=============================================================================================================

// for Column Indoors
document.addEventListener("DOMContentLoaded", function() {
    // Get references to elements
    var productVariety = document.getElementById("productVariety3");
    var productImage = document.querySelector(".product-image3");

    // Define the image sources for each option
    var imageSources = {
        "Cedar-Column_Indoor" : "Column_Indoor/COLUMN INDOOR (CEDAR).jpg.png",
        "Cypress-Column_Indoor" : "Column_Indoor/COLUMN INDOOR (CYPRESS).jpg.png",
        "RedCedar-Column_Indoor" : "Column_Indoor/COLUMN INDOOR (RED CEDAR).jpg.png",
    };

    // Add event listener for change in select option
    productVariety.addEventListener("change", function() {
        // Get the selected option value
        var selectedOption = productVariety.value;

        // Change the product image source based on the selected option
        productImage.src = imageSources[selectedOption];

    });
});

