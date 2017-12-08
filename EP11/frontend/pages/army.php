<?php
    include_once(__ROOT__ . "/backend/stownFunctions.php");
    include(__ROOT__."/backend/armyFunctions.php");
    getResources();
    echo "<h3>Your army strength</h3>";
    
    listYourArmy($_SESSION['loggedIn']);
    
    
    echo "<h3>Recruit your army here:</h3>";
    
    listUnitsForPurchase();
?>