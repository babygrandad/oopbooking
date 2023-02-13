const profile_form = document.getElementById("profile_form") 
const profile_Fname_input = document.getElementById('profile_first_name');
const profile_Lname_input = document.getElementById('profile_last_name');
const profile_Fname_warning = document.getElementById('profileWarningFname');
const profile_Lname_warning = document.getElementById('profileWarningLname');

profile_form.addEventListener('submit', (e) => {

    if(!profile_Fname_input.value){
        profile_Fname_warning.innerHTML = "Enter First Name";
        e.preventDefault();
    }else{
        profile_Fname_warning.innerHTML = ""
    }

    if(!profile_Lname_input.value){
        profile_Lname_warning .innerHTML = "Enter Last Name";
        e.preventDefault();
    }else{
        profile_Lname_warning .innerHTML = ""
    }
})