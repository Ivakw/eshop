<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/core/dbConnect.php");

function insert_user($user) {
    $userName = $user['user_name'];
    $email = $user['email'];
    $firstName = $user['first_name'];
    $lastName = $user['last_name'];
    $password = $user['password'];
    //$userName = $user[''];
    
    $query = "
        INSERT INTO users
            (userName,email,firstName,lastName,password)
        VALUES 
            ('{$userName}','{$email}','{$firstName}','{$lastName}','{$password}')";
    
    $result = insert($query);
    return $result;
}

?>
