
<?php
function open_form_container($form_name){
    return 
    '<div class="form-container m-auto mt-5 col-xs-10 col-md-6 col-lg-4">
    <h3>'.$form_name.'</h3>';
}

function open_table_container($table_name){
    return
    '<div class=" m-auto mt-3 border text-center">
    <h4>'.$table_name.'</h4>';
}

function close_continer(){
    return '</div>';
}

// <div class="position-absolute top-50 start-50 translate-middle col col-md-4 col-lg-3">
?>