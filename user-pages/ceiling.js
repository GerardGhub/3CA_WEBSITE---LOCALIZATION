
// for fluted indoor
document.addEventListener("DOMContentLoaded", function() {
  // Get references to elements
  var productVariety = document.getElementById("productVariety");
  var productImage = document.querySelector(".product-image1");

  // Define the image sources for each option
  var imageSources = {
    "Cedar": "wall-flutted-indoor/WALL_FLUTTED_INDOOR__CEDAR_.png",
    "Golden Oak": "wall-flutted-indoor/WALL_FLUTTED_INDOOR__GOLDEN_OAK_.png",
    "Onyx": "wall-flutted-indoor/WALL_FLUTTED_INDOOR__ONYX_.png",
    "Pebble Grey": "wall-flutted-indoor/WALL_FLUTTED_INDOOR__PEBBLE_GREY_.png",
    "Red Cedar": "wall-flutted-indoor/WALL_FLUTTED_INDOOR__RED_CEDAR_.png",
    "Sand Grey": "wall-flutted-indoor/WALL_FLUTTED_INDOOR__SAND_GREY_-.png",
    "Wallnut": "wall-flutted-indoor/WALL_FLUTTED_INDOOR__WALNUT_.png",
    "White Oak": "wall-flutted-indoor/WALL_FLUTTED_INDOOR__WHITE_OAK.png",
  };

  // Add event listener for change in select option
  productVariety.addEventListener("change", function() {
    // Get the selected option value
    var selectedOption = productVariety.value;

    // Change the product image source based on the selected option
    productImage.src = imageSources[selectedOption];
    
  });
});

// ---------------------------------------------------------------------------------------------

// for fluted outdoor
document.addEventListener("DOMContentLoaded", function() {
  // Get references to elements
  var productVariety = document.getElementById("productVariety2");
  var productImage = document.querySelector(".product-image2");

  // Define the image sources for each option
  var imageSources = {
    "YellowBrown-fluted-outdoor" : "fluted_outdoor/FLUTED OUTDOOR (yellow brown).png",
    "Wallnut-fluted-outdoor" : "fluted_outdoor/FLUTED OUTDOOR (walnut1).jpg.png",
    "Teak-fluted-outdoor" : "fluted_outdoor/FLUTED OUTDOOR (teak1).jpg.png",
    "Mahogany-fluted-outdoor" : "fluted_outdoor/FLUTED OUTDOOR (mahogany1).jpg.png",
    "CharcoalBlack-fluted-outdoor" : "fluted_outdoor/FLUTED_OUTDOOR (charcoal black).png",
    
  };

  // Add event listener for change in select option
  productVariety.addEventListener("change", function() {
    // Get the selected option value
    var selectedOption = productVariety.value;

    // Change the product image source based on the selected option
    productImage.src = imageSources[selectedOption];
    
  });
});

// ---------------------------------------------------------------------------------------------

// for fluted outdoor CE
document.addEventListener("DOMContentLoaded", function() {
  // Get references to elements
  var productVariety = document.getElementById("productVariety3");
  var productImage = document.querySelector(".product-image3");

  // Define the image sources for each option
  var imageSources = {  
    "Espresso-fluted-outdoor-CE" : "fluted_outdoor/ESPRESSO NEW FLUTED OUTDOOR (CO-EXTRUDED).png",
    "Black-fluted-outdoor-CE" : "fluted_outdoor/BLACK NEW FLUTED OUTDOOR (CO-EXTRUDED).png",
    "Caramel-fluted-outdoor-CE" : "fluted_outdoor/CARAMEL NEW FLUTED OUTDOOR (CO-EXTRUDED).png",
    "Chocolate-fluted-outdoor-CE" : "fluted_outdoor/CHOCOLATE NEW FLUTED OUTDOOR (CO-EXTRUDED).png",
  };

  // Add event listener for change in select option
  productVariety.addEventListener("change", function() {
    // Get the selected option value
    var selectedOption = productVariety.value;

    // Change the product image source based on the selected option
    productImage.src = imageSources[selectedOption];
    
  });
});


// ---------------------------------------------------------------------------------------------

// for modified clay materials (Granite)
document.addEventListener("DOMContentLoaded", function() {
  // Get references to elements
  var productVariety = document.getElementById("productVariety8");
  var productImage = document.querySelector(".product-image8");

  // Define the image sources for each option
  var imageSources = {
    "Dark-Grey-Granite" : "Granite/WALL_GRANITE_DARK_GREY-removebg-preview.png",
    "Off-White-Granite" : "Granite/WALL_GRANITE_OFF-WHITE-removebg-preview.png",
  };

  // Add event listener for change in select option
  productVariety.addEventListener("change", function() {
    // Get the selected option value
    var selectedOption = productVariety.value;

    // Change the product image source based on the selected option
    productImage.src = imageSources[selectedOption];

  });
});


// ---------------------------------------------------------------------------------------------

// for modified clay materials (Mark Of Saipan)
document.addEventListener("DOMContentLoaded", function() {
  // Get references to elements
  var productVariety = document.getElementById("productVariety9");
  var productImage = document.querySelector(".product-image9");

  // Define the image sources for each option
  var imageSources = {
    "Grey-MarkOfSaipan" : "mark-of-sipain/WALL_MARK_OF_SAIPAN_DARK-removebg-preview.png",
    "Off-White-MarkOfSaipan" : "mark-of-sipain/WALL_MARK_OF_SAIPAN__OFF-WHITE__2_-removebg-preview.png",
  };

  // Add event listener for change in select option
  productVariety.addEventListener("change", function() {
    // Get the selected option value
    var selectedOption = productVariety.value;

    // Change the product image source based on the selected option
    productImage.src = imageSources[selectedOption];

  });
});


// ---------------------------------------------------------------------------------------------

// for modified clay materials (Sandal Wood)
document.addEventListener("DOMContentLoaded", function() {
  // Get references to elements
  var productVariety = document.getElementById("productVariety10");
  var productImage = document.querySelector(".product-image10");

  // Define the image sources for each option
  var imageSources = {
    "Brown-SandalWood" : "sandal wood/WALL_SANDAL_WOOD___BROWN_-removebg-preview.png",
    "Grey-SandalWood" : "sandal wood/WALL_SANDAL_WOOD___GREY_-removebg-preview.png",
  };

  // Add event listener for change in select option
  productVariety.addEventListener("change", function() {
    // Get the selected option value
    var selectedOption = productVariety.value;

    // Change the product image source based on the selected option
    productImage.src = imageSources[selectedOption];

  });
});


// ---------------------------------------------------------------------------------------------

// for modified clay materials (Slate)
document.addEventListener("DOMContentLoaded", function() {
  // Get references to elements
  var productVariety = document.getElementById("productVariety11");
  var productImage = document.querySelector(".product-image11");

  // Define the image sources for each option
  var imageSources = {
    "Dark-Slate" : "slate/WALL_SLATE_DARK-removebg-preview.png",
    "Grey-Slate" : "slate/WALL_SLATE_GREY-removebg-preview.png",
  };

  // Add event listener for change in select option
  productVariety.addEventListener("change", function() {
    // Get the selected option value
    var selectedOption = productVariety.value;

    // Change the product image source based on the selected option
    productImage.src = imageSources[selectedOption];

  });
});

// ---------------------------------------------------------------------------------------------

// for modified clay materials (Travertine)
document.addEventListener("DOMContentLoaded", function() {
  // Get references to elements
  var productVariety = document.getElementById("productVariety12");
  var productImage = document.querySelector(".product-image12");

  // Define the image sources for each option
  var imageSources = {
    "White-Travertine" : "travertine/WALL(TRAVERTINE2)WHITE.jpg",
    "Grey-Travertine" : "travertine/WALL(TRAVERTINE)GREY2.jpg.png",
  };

  // Add event listener for change in select option
  productVariety.addEventListener("change", function() {
    // Get the selected option value
    var selectedOption = productVariety.value;

    // Change the product image source based on the selected option
    productImage.src = imageSources[selectedOption];

  });
});