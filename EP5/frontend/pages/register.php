<?php
    if(isset($_GET['message'])){
        echo $_GET['message'] . "<br>";
    }
?>

Please register:

<form action="?bPage=accountOptions&action=register&nonUI" method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    Email: <input type="email" name="email"><br> 
    <input type="submit">
</form>