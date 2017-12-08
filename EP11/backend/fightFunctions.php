<?php


function listAllPlayers(){
    global $db;
    
    $sql = "SELECT * FROM world";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    $results = $stmt->fetchAll();
    #var_dump($results);
    foreach($results as $row){
        echo "<a href='?page=world&id=" . $row['id'] . "'>" . $row['name'] . "</a><br>";
    }
    
    
}

function listWorld($id){
    global $db;
    include(__ROOT__."/backend/armyFunctions.php");
    echo "<h4>Worlds army strength</h4>";
    listYourArmy($id);
    echo "<h4>Worlds resources</h4>";
    getWorldResources($id);
    
    echo "<a href='?page=attack&id=" . $id . "'><button>Attack</button></a>";
    
    
}

function getWorldResources($id){
global $db;
    
    $sql = "SELECT * FROM resources WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->execute(array($id));
    $result = $stmt->fetchAll();

    echo "Wood: " .$result[0]['wood'] . "<br>";
    echo "Stone: " .$result[0]['stone'] . "<br>";
    
    $iron = $result[0]['iron'];
    if($iron < 50){
        $ironText = "low";
    }
    elseif($iron >= 50 && $iron < 150){
        $ironText = "medium";
    }
    elseif($iron >= 150 && $iron < 500){
        $ironText = "high";
    }
    elseif($iron >= 500){
        $ironText = "ultra high";
    }
    echo "Iron: " . $ironText . "<br>";
    
    #echo "Iron: " .$result[0]['iron'] . "<br>";
    
    echo "Gold: " .$result[0]['gold'] . "<br>";
    
}

function attackWorld($id){

    $opponentResult = getResourceRow($id);
    $yourResult = getResourceRow($_SESSION['loggedIn']);
    
    if($yourResult[0]['armyStrength'] > $opponentResult[0]['armyStrength']){
        echo "You win";
    }
    else{
        echo "You lose";
    }
    
}

function getResourceRow($id){
    global $db;
    $sql = "SELECT * FROM resources WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->execute(array($id));
    return $stmt->fetchAll();
    
}

?>