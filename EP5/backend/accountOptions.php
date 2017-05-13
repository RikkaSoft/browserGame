<?php


function registerAccount($username,$password,$email){
    global $db;
    
    $sql = "INSERT INTO users (username,password,email) VALUES(?,?,?)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array($username,$password,$email));
    if ($stmt->rowCount() > 0){
        $_SESSION['loggedIn'] = $username;   
        header("location: ?page=loggedIn&message=Registered");
    }
    else{
        header("location: ?page=register&message=failed");
    }
    
}

function login($username,$password){
    global $db;
    
    $sql = "SELECT * FROM users WHERE username=:username AND password=:password";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(':username' => $username, ':password' => $password));
    if ($stmt->rowCount() > 0){
        $_SESSION['loggedIn'] = $username;
        header("location: ?page=loggedIn&message=You%20logged%20in");
    }
    else{
        echo "User/Password not found";
    }
}

function logout(){
    session_destroy();
    header("location: ?");
}



if($_GET['action'] === "register"){
    registerAccount($_POST['username'],$_POST['password'],$_POST['email']);
}
elseif($_GET['action'] === "login"){
    login($_POST['username'],$_POST['password']);
}
elseif($_GET['action'] === "logout"){
    logout();
}



?>