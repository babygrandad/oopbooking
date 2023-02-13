const final_choice_form = document.getElementById('final_choice');

final_choice_form.addEventListener('submit', (e) => {
    const radioButtons = document.getElementsByName('final_choice');
    let selected = false;

    // Loop through the radio buttons and see if one is selected
    for (let i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
            selected = true;
            break;
        }
    }

    // If no radio button is selected, prevent form submission
    if (!selected) {
        alert('Please select one of the two options');
        e.preventDefault();
    }
});