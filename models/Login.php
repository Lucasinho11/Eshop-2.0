<?php
function login($email, $password){
    $db = dbConnect();
    
    $query = $db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
    $query->execute(
        [
            'email' => $email,
            'password' => md5($password),
        ]
    );
    $user = $query->fetch();
    return $user;
}
