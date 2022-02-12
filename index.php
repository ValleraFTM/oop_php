<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WAR!!!!</title>
</head>
<body>
    <pre>
   <?php
require_once './classUnit.php';
require_once "./classArmy.php";
    

    function war(Army $army1, Army $army2) {
        // функция боя, принимает 2 армии и считает показатели здоровья и атаки на каждую армию
        global $damage1, $damage2, $health1, $health2;
        $damage1 = $army1->getAttackWariors('Infantry') + $army1->getAttackWariors('Knight') + $army1->getAttackWariors('Archer');
        $health1 = $army1->getHealthWariors('Infantry') + $army1->getHealthWariors('Knight') + $army1->getHealthWariors('Archer');
        echo "<br>";
        echo $damage1;
        echo "<br>";
        echo $health1;
        $damage2 = $army2->getAttackWariors('Infantry') + $army2->getAttackWariors('Knight') + $army2->getAttackWariors('Archer');
        $health2 = $army2->getHealthWariors('Infantry') + $army2->getHealthWariors('Knight') + $army2->getHealthWariors('Archer');
        echo "<br>";
        echo $damage2;
        echo "<br>";
        echo $health2;
    }

    $nevsk = new Army('Nevskiy', 200, 15, 30);
    $tevtons = new Army('Ульф Фасе', 90, 25, 65);
    echo $nevsk->getWarlord();
    echo '<br>';
    print_r ($nevsk->getAttackWariors('Knight'));
    ?>   
<table border="1">
    <tr>
        <th></th>
        <th><?=$nevsk->getWarlord()?></th>
        <th><?=$tevtons->getWarlord()?></th>
    </tr>
    <tr>
        <th>Army units:</th>
        <td><?=$nevsk->getWariors()?></td>
        <td><?=$tevtons->getWariors()?></td>
    </tr>
<?php
war($nevsk, $tevtons);
$duration = 0;
while ($health1 >= 0 && $health2 >= 0) {
    $health1 -= $damage2;
    $health2 -= $damage1;
    $duration++;
}
?>
    <tr>

    <tr>
        <th>Health after <?=$duration?> hits:</th>
        <td><?=$health1?></td>
        <td><?=$health2?></td>
    </tr>
    <tr>
        <th>Result</th>
        <td><?=$health1 > $health2 ? 'WINNER' : 'LOOSER'?></td>
        <td><?=$health2 > $health1 ? 'WINNER' : 'LOOSER'?></td>
    </tr>
</table> 
</body>
</html>