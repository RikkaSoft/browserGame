<?php 
    session_start();
    include("..\system\connection.php");
    include("..\system\pager.php");
    
    if(isset($_GET['nonUI'])){
        getPage();
    }else{
        include("design/templates/ui.php");
    }
?>