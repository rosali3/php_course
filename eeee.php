<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>for educational purposes</title>

</head>
<body>
    <h1> Calculator </h1>

    <form action="eeee.php" method="get">
        first number <input type="number" name="num1"><br><br>
        operator <input type="text" name="op"><br><br>
        second number <input type="number" name="num2"><br><br>

        <input type="submit">
    </form>
    <br>


    <?php
    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];
    $op = $_GET["op"];

    if($op=="+"){
        echo $num1+$num2;}
    elseif($op=="-"){
        echo $num1-$num2;}
    elseif($op=="/"){
        echo $num1/$num2;}
    elseif($op=="*"){
        echo $num1*$num2;}
    else{
        echo "invalid operator";}
    ?>

</body>
</html>
