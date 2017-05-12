<html>
    <?php
        include("design/templates/head.php");
    ?>
    <body>
        <div id="wrapper">
            <?php 
                include("design/templates/top.php");
            ?>
            <div id="main">
                <?php
                
                if (isset($_GET['page'])){
                    if ($_GET['page'] === "register"){
                        include("pages/register.php");
                    }
                    elseif($_GET['page'] === "login"){
                        include("pages/login.php");
                    }
                    else{
                        echo "You requested an invalid link";
                    }
                }
                else{
                    echo "You need to specify a page";
                }
                
                ?>
            </div>
            <?php 
                include("design/templates/footer.php");
            ?>
        </div>
    </body>
</html>