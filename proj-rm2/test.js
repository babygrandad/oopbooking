function calculate_stay(dayIn, dayOut) {
    var date1 = new Date(dayIn);
    var date2 = new Date(dayOut);
    var diffTime = date2.getTime() - date1.getTime();
    var diffDays = diffTime / (1000 * 3600 * 24);

    console.log(diffDays);
    return diffDays;
}


// Get references to the date inputs
const dateInput1 = document.getElementById('dateInput1');
const dateInput2 = document.getElementById('dateInput2');

// Add an "onchange" event listener to both date inputs
dateInput1.addEventListener('change', function() {
  if (dateInput1.value && dateInput2.value) {
    // Both date inputs are not empty, do something here
  }
});

dateInput2.addEventListener('change', function() {
  if (dateInput1.value && dateInput2.value) {
    // Both date inputs are not empty, do something here
  }
});
