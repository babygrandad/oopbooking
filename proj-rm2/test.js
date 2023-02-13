const profile_form = ("profile_form")
const profile_Fname_input = ('profile_first_name');
const profile_Lname_input = ('profile_last_name');
const profile_Fname_warning = ('profileWarningLname');
const profile_Lname_warning = ('profileWarningFname');

profile_form.addEventListener('submit', e =>{

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