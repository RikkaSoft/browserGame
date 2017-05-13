<?php

function getPage(){
    if (isset($_GET['page'])){ 
        
        $page = str_replace("..\\", "", $_GET['page']);
        
        include("pages/" . $page . ".php");
        /*
        if ($_GET['page'] === "register"){
            include("pages/register.php");
        }
        elseif($_GET['page'] === "login"){
            include("pages/login.php");
        }
        else{
            echo "You requested an invalid link";
        }
         */
    }
    elseif(isset($_GET['bPage'])){
        if ($_GET['bPage'] === "accountOptions"){
            include("..\backend\accountOptions.php");
        }
    }
    else{
        if(isset($_SESSION['loggedIn'])){
            include("pages/loggedIn.php");
        }
        else{
            include("pages/welcome.php");
        }
    }
}

?>