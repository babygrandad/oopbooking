const bookingForm = document.getElementById('bookingForm'); // form element
const checkIn = document.getElementById('check_in_input'); // check in date
const checkOut = document.getElementById('check_out_input'); //check out daye
const durationDisplay = document.getElementById('duration_display'); // readonly text input

let inDateWarning = document.getElementById('inDateWarning'); //span to display checkin errors
let outDateWarning = document.getElementById('outDateWarning'); //span to display checkin errors

bookingForm.addEventListener('submit', (e) =>{
    let hasError = false;

    // Check if check in date is selected
    if (!checkIn.value) {
        inDateWarning.innerHTML = 'Please select a check in date';
        hasError = true;
        e.preventDefault();
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
    if(!validate_check_in(checkIn.value)){
        e.preventDefault();
        hasError = true;
    }

    //validate if checkout date is correct
    if(validate_check_out(checkIn.value, checkOut.value) < 1){
        e.preventDefault();
        hasError = true;
    }
});

function validate_check_in(dayIn) {
    var date1 = new Date(dayIn);
    var date2 = new Date();
    var diffTime = date2.getTime() - date1.getTime();
    var diffDays = Math.floor(diffTime / (1000 * 3600 * 24));

    
    if(diffDays > 0){
        inDateWarning.innerHTML = 'Please select a check-in date from today';
        return false;
    }else{
    // inDateWarning.innerHTML = '';
    return true;
    }
}

function validate_check_out(dayIn,dayOut) {
    var date1 = new Date(dayIn);
    var date2 = new Date(dayOut);
    var diffTime = date2.getTime() - date1.getTime();
    var diffDays = Math.floor(diffTime / (1000 * 3600 * 24));

    if(diffDays < 1){
        outDateWarning.innerHTML = 'Minimum stay is 1 day, please select a checkout 1 day past check in';
    }

    console.log("check out diff: " + diffDays);
    return diffDays;
}

function calculate_stay(dayIn, dayOut) {
    var date1 = new Date(dayIn);
    var date2 = new Date(dayOut);
    var diffTime = date2.getTime() - date1.getTime();
    var diffDays = diffTime / (1000 * 3600 * 24);

    console.log("stay period: " + diffDays);
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
