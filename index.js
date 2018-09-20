var currentSection="none";

$(document).ready(function(){
  
  
    $("button").click(function(){
      var newSection = "none";
      var buttonPressed = "#" + $(this).attr("id");
      
      switch(buttonPressed){
        case "#b1":
          newSection = "#artist-content";
          break;
        case "#b2":
          newSection = "#anat-content";
          break;
        case "#b3":
          newSection = "#writ-content";
          break;
        case "#b4":
          newSection = "#invent-content";
          break;
        case "#b5":
          newSection = "#music-content";
          break;
      }
      
      if (currentSection != "none" && currentSection != newSection){
        $(currentSection).css("display","none");
      }
      
      if (currentSection != newSection) {
        $(newSection).fadeIn();
        currentSection = newSection;
      }
     
      $('html, body').animate({
            scrollTop: $(currentSection).offset().top
      }, 850);

    });
  
});