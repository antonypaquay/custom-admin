$(document).ready(function() {
  (function($) {
    //Sorry IE :(
    outdatedBrowser({
      bgColor: "#00A0E6",
      color: "#ffffff",
      lowerThan: "transform",
      languagePath: ""
    });
  })(jQuery);
});

var getImages = document.getElementsByTagName("img");

if (getImages[0] !== undefined) {
  imagesLoaded(document.body, function(instance) {
    getImages[0].style.opacity = "1";
    getImages[0].style.transition = "opacity .3s ease-in-out";
    console.log("All images are loaded");
  });
} else {
  console.log("No image to load");
}


