<?php

function listYourArmy(){
    global $db;
    
    $sql = "SELECT * FROM armyunits";
    $stmt = $db->query($sql);
    $armyUnits = $stmt->fetchAll();
    
    $userId = $_SESSION['loggedIn'];
    $sql = "SELECT army,armyStrength FROM resources WHERE id='$userId'";
    $stmt = $db->query($sql);
    $result = $stmt->fetch();
    
    $armyArray = explode(",",$result['army']);
    
    foreach($armyArray as $unit){
        $ex = explode(":",$unit);
        #$ex[0] - id of the unit
        #$ex[1] - amount of said unit

        foreach($armyUnits as $armyUnit){
            if($ex[0] === $armyUnit['id']){
                #FOUND
                $unitName = $armyUnit['name'];
                break;
            }
        }
        
        echo "<br>You have " . $ex[1] . " " . $unitName;

    }
    
}





function listUnitsForPurchase(){
    global $db;
    $sql = "SELECT * FROM armyunits";
    $stmt = $db->query($sql);
    echo "<form action=?bPage=armyFunctions&recruit method=POST>";
    while($result = $stmt->fetch()){
    echo "<input name='" . $result['id'] . "' type=number value=0 min=0>" . $result['name'] . "(" . $result['armyStrength'] . "str) - " . $result['cost'] . "gold" . "<br>";
    }    
    echo "<input type=submit>";
    echo "</form>";
}

function buyUnits(){
    global $db;
    
    $sql = "SELECT * FROM armyunits";
    $stmt = $db->query($sql);
    $armyUnits = $stmt->fetchAll();
    #var_dump($armyUnits);
    $nicerArmyUnits = array();
    foreach($armyUnits as $data){
        $nicerArmyUnits[$data['id']] = $data;
    }
    
    $userId = $_SESSION['loggedIn'];
    $sql = "SELECT * FROM resources WHERE id='$userId'";
    $stmt = $db->query($sql);
    $userResources = $stmt->fetch();
    $myArmyArray = array();
    $armyArray = explode(",",$userResources['army']);
    foreach($armyArray as $unit){
        $ex = explode(":",$unit);
        $myArmyArray[$ex[0]] = $ex[1];
    }
    
    $totalCost = 0;
    $addedArmyStrength = 0;
    
    foreach($_POST as $id => $amount){
        if($amount > 0){
            if (isset($nicerArmyUnits[$id])){
                $totalCost += $nicerArmyUnits[$id]['cost'] * $amount;
                $addedArmyStrength += $nicerArmyUnits[$id]['armyStrength'] * $amount;
                if(isset($myArmyArray[$id])){
                    $myArmyArray[$id] += $amount;
                }
                else{
                    $myArmyArray[$id] = $amount;
                }
            }
            else{
                exit;
            }
        }
    }
    
    
    var_dump($myArmyArray);
    
    
    if($userResources['gold'] >= $totalCost){
        echo "you can afford your units";
        
        $insertNewArmy = "";
        foreach($myArmyArray as $id => $amount){
            $insertNewArmy .= $id . ":" . $amount . ",";
        }
        
        if (substr($insertNewArmy, -1) == ","){
            $insertNewArmy = substr($insertNewArmy, 0,-1);
        }
        
        echo $insertNewArmy;
        
        $sql = "UPDATE resources SET gold=gold-'$totalCost' WHERE id='$userId'";
        $db->query($sql);
        $sql = "UPDATE resources SET army='$insertNewArmy', armyStrength=armyStrength+'$addedArmyStrength' WHERE id='$userId'";
        echo $sql;
        $db->query($sql);
    }
}


 if(isset($_GET['recruit'])){
     buyUnits();
 }

?>