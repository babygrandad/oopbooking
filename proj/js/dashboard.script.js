let hotelField = document.getElementById('hotels');
let checkinField = document.getElementById('checkInDate');
let checkoutField = document.getElementById('checkOutDate');
let daysField = document.getElementById('stayDuration');
let form = document.getElementById('compareForm');
let stayDuration;

let hotelWarning = document.getElementById('hotelWarning');
let inDateWarning = document.getElementById('inDateWarning');
let outDateWarning = document.getElementById('outDateWarning');
let stayWarning = document.getElementById('stayWarning');

function calculateStay(a,b){
        let date_1 = new Date(a.value);
        let date_2 = new Date(b.value);
        let difference = date_2.getTime() - date_1.getTime();
        let totalDays = Math.ceil(difference / (1000 * 3600 * 24));
        daysField.value = totalDays;
        stayDuration = totalDays;
        return true;
    
}

form.addEventListener('submit', (e) =>{

    //check if hotel is selected
    if(hotelField.value == ''){
        e.preventDefault();
        hotelWarning.innerText = 'Please select a hotel';
    }else{
        hotelWarning.innerText = ''
    }

    //check if check in date is selected
    if(!checkinField.value){
        e.preventDefault();
        inDateWarning.innerHTML = 'Please select a check in date'
    }else if(checkinField.value && !checkoutField.value){
        e.preventDefault();
        calculateStay(checkinField, checkinField);
        inDateWarning.innerText = ''
        outDateWarning.innerHTML = 'Please select a check out date'
    }else{
        calculateStay(checkinField, checkoutField);
        inDateWarning.innerText = ''
        outDateWarning.innerText = ''
        passStay();
    }

    //check if check out date is selected
    if(!checkoutField.value){
        e.preventDefault();
        outDateWarning.innerHTML = 'Please select a check out date'
    }else if(!checkinField.value && checkoutField.value){
        e.preventDefault();
        calculateStay(checkoutField, checkoutField);
        outDateWarning.innerText = ''
        inDateWarning.innerHTML = 'Please select a check in date'
    }else{
        calculateStay(checkinField, checkoutField);
        inDateWarning.innerText = ''
        outDateWarning.innerText = ''
        passStay();
    }


    //check if check in date is valid
    if(validateCheckInDate() && validateCheckOutDate() != true){
        e.preventDefault();
    }
    
    validateCheckInDate();
    validateCheckOutDate();

})

function validateCheckInDate() {
    let date_1 = new Date();
    let date_2 = new Date(checkinField.value);
    date_1.setUTCHours(0,0,0,0);
    date_2.setUTCHours(0,0,0,0);
    let difference = date_2.getTime() - date_1.getTime();
    let validity;
    
     if(difference < 0){
        inDateWarning.innerHTML = 'Please pick a checkin date from today';
        validity = false
    }else{
        stayWarning.innerHTML = '';
        validity = true
    }

    return validity;

}

function validateCheckOutDate() {
    let date_1 = new Date(checkinField.value);
    let date_2 = new Date(checkoutField.value);
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


// Jqery to pass stay duration to php
function passStay(){
    $.ajax({
        type: "post",
        url:"../proj/stayDuration.php",
        data: {val:stayDuration},
        success: (res) =>{
            console.log(res)
        },
    })
}
