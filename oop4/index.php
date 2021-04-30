<?php
include_once "Database.php";

$db = new Database("users");

printDb($db);

// $db->insert([
//     'firstname' => 'Arman',
//     'lastname' => 'Grigoryan',
//     'age' => '30',
// ]);
// var_dump($db);


// $db->update([
//     'id' => '1',
//     'firstname' => 'poghos',
//     'lastname' => 'poghosyan',
//     'age' => '22',
// ]);
// var_dump($db);


// $result= $db->select([
//     'firstname' => 'Arman',
//     'age' => '30',
// ]);
// print_r($result);

// $db->delete();


// $result= $db->delete([
//     'firstname' => 'Arman',
//     'age' => '40',
// ]);
// print_r($result);


function printDB($db) {
    $result= $db->select();

    for ($i=0; $i < count($result) ; $i++) { 
        foreach ($result[$i] as $key => $value) {
            echo $key ." - ". $value . "<br>";
        }
        echo"<br>";
    }
}