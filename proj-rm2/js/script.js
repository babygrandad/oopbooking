 // Get the height of the navbar
 var navbarHeight = $("nav").height();

 // Set the height of dashboard-columns-wrap class
 $(".dashboard-columns-wrap").css("height", "calc(100vh - " + navbarHeight + "px)");

// checkIn.onchange = console.log(checkIn.value);