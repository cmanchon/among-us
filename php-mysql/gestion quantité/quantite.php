<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <input type="submit" name="increment" id="incr" value="+1">
        <input type="submit" name="decrement" id="decr" value="-1">
    </form>
    
    <?php
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "among_us");
        function decrementer($link, $table, $id){
            $decr_request = "UPDATE ".$table." SET QUANT = QUANT-1 WHERE ID=".$id;
            mysqli_query($link, $decr_request);
        }
        
        function incrementer($link, $table, $id){
            $incr_request = "UPDATE ".$table." SET QUANT = QUANT+1 WHERE ID=".$id;
            mysqli_query($link, $incr_request);
        }

        function affichage($link, $table){
            $result = mysqli_query($link, "SELECT QUANT FROM ".$table);
            while ($row = mysqli_fetch_assoc($result)){
                echo $row["QUANT"];
            }

        }

        if ($_GET){
            if (isset($_GET['increment'])){
                incrementer($link, "plush", 1);
                affichage($link, "plush");
            }
            elseif (isset($_GET['decrement'])){
                decrementer($link, "plush", 1);
                affichage($link, "plush");
            }
        }

        mysqli_close($link);
    ?>
</body>
</html>

