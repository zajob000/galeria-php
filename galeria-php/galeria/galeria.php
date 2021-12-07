<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://static.wosp.org.pl/trunk/assets/d591ceba/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" type="text/css">
        <title>Galeria zdjęć</title>
    </head>
    <body>
        <?php
            $imgDir = "images/";
            
            if(isset($_GET['imgid'])){
                
                $imgId = (int) $_GET['imgid'];
            }
            else {
                $imgId = 0;
            }
            $dir = scandir($imgDir);
            array_shift($dir);
            array_shift($dir);
            
            $count = count($dir);
            
            if($imgId < 0 || $imgId>=$count){
                $imgId = 0;
            }
            $imgName = $dir["$imgId"];
            $first = 0;
            $last  = $count - 1;
            if($imgId < $count - 1){
                
                $next = $imgId + 1;
            }
            else {
                
                $next = $count - 1;
            }
            if($imgId > 0){
                
                $prev = $imgId - 1;
            }
            else {
                
                $prev = 0;
            }
        ?>
        <div id="calosc">
            <div id="obraz">
                <?php
                    echo "<img src=\"$imgDir/$imgName\" alt=\"$imgName\">";
                ?>
            </div>
            <div id="opis">
                <table width="800px" height="30px" cellspacing="0" cellpadding="0">
                <tr>
                <td bgcolor="#006699">
                <?php
                    echo "<font class=\"title\">";
                    $imgId++;
                    echo "Obraz $imgName ($imgId z $count)";
                    echo "</font>";
                ?>
                </td>
                <?php
                echo "<td bgcolor=\"#006699\"><a href=\"index.php?imgid=$first\" alt=\"Pierwszy\"><i class=\"fa fa-step-backward\"></i></a></td>";
                echo "<td bgcolor=\"#006699\"><a href=\"index.php?imgid=$prev\" alt=\"Następny\"><i class=\"fa fa-chevron-left\"></i></a></td>";
                echo "<td bgcolor=\"#006699\"><a href=\"index.php?imgid=$next\" alt=\"Następny\"><i class=\"fa fa-chevron-right\"></i></a></td>";
                echo "<td bgcolor=\"#006699\"><a href=\"index.php?imgid=$last\" alt=\"Ostatni\"><i class=\"fa fa-step-forward\"></i></a></td>";
                echo "<td bgcolor=\"#006699\"><a href=\"javascript: \" onclick=\"document.getElementById('calosc').style.display = 'none'\" alt=\"Zamknij okno\"><i class=\"fa fa-times\"></i></a></td>";
                ?>
                </tr></table>
            </div>
        </div>
    </body>
</html>