 // Get the height of the navbar
 var navbarHeight = $("nav").height();

 // Set the height of dashboard-columns-wrap class
 $(".dashboard-columns-wrap").css("height", "calc(100vh - " + navbarHeight + "px)");

const bookingForm = document.getElementById('bookingForm');
const checkIn = document.getElementById('check_in_input');
const checkOut = document.getElementById('check_out_input');
const durationDisplay = document.getElementById('duration_display');

let inDateWarning = document.getElementById('inDateWarning');
let outDateWarning = document.getElementById('outDateWarning');


bookingForm.addEventListener('submit', function (e){
    let hasError = false;

    // Check if check in date is selected
    if (!checkIn.value) {
        e.preventDefault();
        inDateWarning.innerHTML = 'Please select a check in date';
        hasError = true;
    } else {
        inDateWarning.innerText = '';
    }

    // Check if check out date is selected
    if (!checkOut.value) {
        e.preventDefault();
        outDateWarning.innerHTML = 'Please select a check out date';
        hasError = true;
    } else {
        outDateWarning.innerText = '';
    }

    //check if check in date is valid
    if(validateCheckInDate() === false && validateCheckOutDate() === false ){
        e.preventDefault();
    }
    
    validateCheckInDate();
    validateCheckOutDate();
});

function validateCheckInDate() {
    let date_1 = new Date();
    let date_2 = new Date(checkIn.value);
    date_1.setUTCHours(0,0,0,0);
    date_2.setUTCHours(0,0,0,0);
    let difference = date_2.getTime() - date_1.getTime();
    let validity;
    
     if(difference < 0){
        inDateWarning.innerHTML = 'Please pick a checkin date from today';
        validity = false;
    }else{
        stayWarning.innerHTML = '';
        validity = true;
    }

    return validity;

}

function validateCheckOutDate() {
    let date_1 = new Date(checkIn.value);
    let date_2 = new Date(checkOut.value);
    date_1.setUTCHours(0,0,0,0);
    date_2.setUTCHours(0,0,0,0);
    let difference = date_2.getTime() - date_1.getTime();
    let validity;
    
    if(difference <= 0){
        outDateWarning.innerHTML = 'Minimum stay is 1 day, please select a checkout 1 day past check in';
        validity = false
    }else{
        stayWarning.innerHTML = '';
        validity = true
    }

    return validity;
}


function calculate_stay(dayIn, dayOut) {
    var date1 = new Date(dayIn);
    var date2 = new Date(dayOut);
    var diffTime = date2.getTime() - date1.getTime();
    var diffDays = diffTime / (1000 * 3600 * 24);

    console.log(diffDays);
    return diffDays;
}

function validate_check_in(dayIn) {
    var date1 = new Date(dayIn);
    var date2 = new Date();
    var diffTime = date2.getTime() - date1.getTime();
    var diffDays = Math.floor(diffTime / (1000 * 3600 * 24));

    console.log(diffDays);
    return diffDays;
}

function validate_check_out(dayIn,dayOut) {
    var date1 = new Date(dayIn);
    var date2 = new Date(dayOut);
    var diffTime = date2.getTime() - date1.getTime();
    var diffDays = Math.floor(diffTime / (1000 * 3600 * 24));

    console.log(diffDays);
    return diffDays;
}

checkIn.addEventListener('change', function() {
    if (checkIn.value && checkOut.value) {
      // Both date inputs are not empty, display the staying duration
        durationDisplay.value =  calculate_stay(checkIn.value,checkOut.value);
    }
  });
  
  checkOut.addEventListener('change', function() {
    if (checkIn.value && checkOut.value) {
      // Both date inputs are not empty, display the staying duration
      durationDisplay.value =  calculate_stay(checkIn.value,checkOut.value);
    }
  });


// checkIn.onchange = console.log(checkIn.value);