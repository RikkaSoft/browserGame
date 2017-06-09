<?php 
    session_start();
    define('__ROOT__', dirname(dirname(__FILE__)));
    include(__ROOT__ . "\system\connection.php");
    include(__ROOT__ . "\system\pager.php");
    
    if(isset($_GET['nonUI'])){
        getPage();
    }else{
        include("design/templates/ui.php");
    }
?>