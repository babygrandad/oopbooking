const decision = document.getElementsByName('finalDecision')
let confirmForm = document.getElementById('confirm')
let a = 0;

confirmForm.addEventListener('submit', (e) =>{
    for (let i = 0; i < decision.length; i++){
        if(decision[i].checked){
          a = 1;
          break;
          
        }
    }
    if (a==0){
        e.preventDefault();
        alert('please select hotel on the left or right.');  
    }
})