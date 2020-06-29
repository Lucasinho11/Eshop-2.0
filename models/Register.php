<?php
function emailExist(){
    $db = dbConnect();
    $query = $db->prepare('SELECT email FROM users WHERE email = ?');
        $query->execute(
            [
                $_POST['email']
            ]
        );
        
        return $emailExist = $query->fetch();
}
function register($informations){
    $db = dbConnect();
    $query = $db->prepare('INSERT INTO users (email, password, first_name, last_name, address) VALUES (?, ?, ?, ?, ?)');
            $result = $query->execute(
                [
                    $informations['email'],
                    hash('md5',$informations['password']),
                    $informations['first_name'],
                    $informations['last_name'],
                    $informations['address'],


                ]
            );
            
}
