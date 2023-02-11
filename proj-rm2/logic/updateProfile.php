<?php
require_once('logic/fetchJSON.php');

function update_user($email,$fName,$lName){
    // Decode the JSON data
    $data = get_users();

    // Find the index of the item you want to update
    $index = -1;
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i]['Email'] == $email) {
            $index = $i;
            break;
        }
    }

    // Update the data
    if ($index != -1) {
        $data[$index]['First_Name'] = $fName;
        $data[$index]['Last_Name'] = $lName;
    }

    // Encode the data back to JSON
    $json = json_encode($data);

    // Write the data back to the file
    file_put_contents('json/users.json', $json, JSON_PRETTY_PRINT);
}
