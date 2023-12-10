
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
    "CharcoalBlack-fluted-outdoor" : "fluted_outdoor/FLUTED OUTDOOR (charcoal black).png",
    
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
    "Expresso-fluted-outdoor-CE" : "fluted_outdoor/FLUTED OUTDOOR (CO-EXTRUDED ESPRESSO).jpg.png",
    "Black-fluted-outdoor-CE" : "fluted_outdoor/FLUTED OUTDOOR (CO-EXTRUDED BLACK).png",
    "Caramel-fluted-outdoor-CE" : "fluted_outdoor/FLUTED OUTDOOR (CO-EXTRUDED CARAMEL).jpg.png",
    "Chocolate-fluted-outdoor-CE" : "fluted_outdoor/FLUTED OUTDOOR (CO-EXTRUDED CHOCOLATE).jpg.png",
  };

  // Add event listener for change in select option
  productVariety.addEventListener("change", function() {
    // Get the selected option value
    var selectedOption = productVariety.value;

    // Change the product image source based on the selected option
    productImage.src = imageSources[selectedOption];
    
  });
});