<?php

if(isset($_GET['id'])){
    include(__ROOT__.'/backend/fightFunctions.php');
    
    attackWorld($_GET['id']);
    
    
}
else{
    echo "You need to select a world";
}

?>