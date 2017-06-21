<?php


function registerAccount($username,$password,$email){
    global $db;
    if(preg_match("/^[a-zA-Z0-9]+$/", $username) !== 0){
        
        if ($username.length > 20 || $username.length < 4){
            $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
            $sql = "INSERT INTO users (username,password,email) VALUES(?,?,?)";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($username,$hash,$email));
            if ($stmt->rowCount() > 0){
                $_SESSION['loggedIn'] = $username;   
                header("location: ?page=loggedIn&message=Registered");
            }
            else{
                header("location: ?page=register&message=failed");
            }
        }
        else{
            header("location: ?page=register&message=failedTooLongOrShort");
        }
    }
    else{
        header("location: ?page=register&message=failedWeirdCharacters");
    }
}

function login($username,$password){
    global $db;
    
    $sql = "SELECT * FROM users WHERE username=:username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(':username' => $username));
    if ($stmt->rowCount() > 0){
        $result = $stmt->fetchAll();
        $hash = $result[0]['password'];
        if(password_verify($password, $hash)){
            $_SESSION['loggedIn'] = $result[0]['id'];
            header("location: ?page=loggedIn&message=You%20logged%20in");
        }
    }
    else{
        #user not found / password incorrect
        header("location: ?page=register&message=loginFailed");
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