<?php
    global $db;
    $id = $_SESSION['loggedIn'];
    $sql = "SELECT * FROM resources INNER JOIN world ON world.id = resources.id WHERE resources.id='$id'";
    $stmt = $db->query($sql);
    $result = $stmt->fetchAll();

?>

<fieldset>
    <legend style="text-align:center;border: 1px solid black;">Resources</legend>
    <span class="quarterWidth">
        Wood<br>
        <?php echo $result[0]['wood']; ?>
    </span>
    <span class="quarterWidth">
        Stone<br>
        <?php echo $result[0]['stone']; ?>
    </span>
    <span class="quarterWidth">
        Iron<br>
        <?php echo $result[0]['iron']; ?>
    </span>
    <span class="quarterWidth">
        Gold<br>
        <?php echo $result[0]['gold']; ?>
    </span>
</fieldset>
<br><br>


<?php
$ourBuildings = explode(",",$result[0]['buildings']);

$i = 0;
echo "<div id='boxHolder'>";
    for($y = 0; $y < 3;$y++){
        for($x = 0; $x < 3;$x++){
            if ($ourBuildings[$i] === "0"){
                $text = "Nothing";
            }
            else{
                $id = $ourBuildings[$i];
                $sql = "SELECT * FROM buildings WHERE id='$id'";
                $stmt = $db->query($sql);
                $buildingsDB = $stmt->fetchAll();
                $text = $buildingsDB[0]['name'];
            }
            echo "<span class='gridBox'>" . $text . "</span>";
            $i++;
        }
    }
echo "</div>";


?>