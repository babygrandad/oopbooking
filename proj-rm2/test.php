<?php
require_once('logic/fetchJSON.php');

// Decode the JSON data
$data = get_users();

// Find the index of the item you want to update
$index = -1;
for ($i = 0; $i < count($data); $i++) {
    if ($data[$i]['Email'] == 'a@b.com') {
        $index = $i;
        break;
    }
}

// Update the data
if ($index != -1) {
    $data[$index]['First_Name'] = 'Adolf';
    $data[$index]['Last_Name'] = 'BoB';
}

// Encode the data back to JSON
$json = json_encode($data);

// Write the data back to the file
file_put_contents('json/users.json', $json);
?>
