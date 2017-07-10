<?php
    include("C:\wamp64\www\BrowserGame\system\connection.php");
    global $db;
    $sql = "SELECT * FROM buildings";
    $stmt = $db->query($sql);
    $allBuildings = $stmt->fetchAll();
    
    $sql = "SELECT * FROM world";
    $stmt = $db->query($sql);
    $playerWorlds = $stmt->fetchAll();
    
    foreach($playerWorlds as $world){
        $woodIncome = 0;
        $stoneIncone = 0;
        $ironIncome = 0;
        $goldIncome = 0;
        
        $playerBuildings = explode(",",$world['buildings']);
        
        foreach($playerBuildings as $building){
            if($building != 0 ){
                foreach($allBuildings as $buildingInfo){
                    if($buildingInfo['id'] == $building){
                        $woodIncome += $buildingInfo['incomewood'];
                        $stoneIncone += $buildingInfo['incomestone'];
                        $ironIncome += $buildingInfo['incomeiron'];
                        $goldIncome += $buildingInfo['incomegold'];
                        break;
                    }
                }
            }
        }
        $sql = "UPDATE resources SET wood=wood+$woodIncome,stone=stone+$stoneIncone,iron=iron+$ironIncome,gold=gold+$goldIncome WHERE id = $world[id]";
        $db->query($sql);
    }

?>