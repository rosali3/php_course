<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Card Validator</title>

</head>
<body>
<h1> Type card number</h1>

<form action="validate.php" method="get">
    card number <input type="string" name="card"><br><br>

    <input type="submit"> <br>
</form>

<?php
$card = $_GET["card"];


class Validator
{
// функция для определения валидности по Луну
    private static function isValidLuhn(string $card): bool
    {
        $sum = 0;
        $alt = false;
        for ($i = strlen($card) - 1; $i >= 0; $i--) {
            $num = intval($card[$i]);
            if ($alt) {
                $num *= 2;
                if ($num > 9) {
                    $num = $num % 10 + 1;
                }
            }
            $sum += $num;
            $alt = !$alt;
        }
        return $sum % 10 == 0;
    }
// определение эмитента
    private static function getEmitent(string $card)
    {
        if (preg_match('/^(4[0-9]{1}|14)/', $card)) {
            return 'Visa';
        }

        if (preg_match('/^(5[1-5]{1}|62|67)/', $card)) {
            return 'Mastercard';
        }
        //if (preg_match('/^220(0|4)$/', $card)) {
        //    return 'Mir';
        //}

        else{
            return "idk what's emitent it is";

        }
    }
    
    public static function validate(string $card)
    {
        $card = preg_replace('/\D/', '', $card); //убираем пробелы

        // применяем алгоритм Луна
        if (!self::isValidLuhn($card)) {
            return 'Invalid';
        }
        if (strlen($card) < 16){
            return 'Invalid';
        }
        // эмитент
        $emitent = self::getEmitent($card);
        return 'Valid, ' . $emitent;
    }

}

// $card = $argv[1];
$overallresult = Validator::validate($card);
echo $overallresult;
?>
        </body>
</html>