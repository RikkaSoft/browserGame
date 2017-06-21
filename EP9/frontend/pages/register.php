<?php
    if(isset($_GET['message'])){
        echo $_GET['message'] . "<br>";
    }
?>

Please register:

<form action="?bPage=accountOptions&action=register&nonUI" method="post">
    Username: <input type="text" name="username" pattern=".{4,20}" title="min 4 characters, max 20 characters" required><br>
    Password: <input type="password" name="password" pattern=".{8,32}" required><br>
    Email: <input type="email" name="email" required><br> 
    <input type="submit">
</form>