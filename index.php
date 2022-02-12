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

    class Army {
        private $warlord;
        private $warriors=[];
        // поля класса Армия -> командующий и массив войнов
        public function __construct(string $warlord, int $infantry, int $knight, int $archer) {
            //прописывается командующий армией и заполняются рода войск
            $this->warlord = $warlord;
            $this->warriors['Infantry'] = [];
            for ($i=0; $i<$infantry; $i++) {
                $this->warriors['Infantry'][$i] = new Infantry();
            }
            $this->warriors['Knight'] = [];
            for ($i=0; $i<$knight; $i++) {
                $this->warriors['Knight'][$i] = new Knight();
            }
            $this->warriors['Archer'] = [];
            for ($i=0; $i<$archer; $i++) {
                $this->warriors['Archer'][$i] = new Archer();
            }
            
        }

        public function getWarlord() {
            // возвращает строку с командующим
            return $this->warlord;
        }
        public function getWariors() {
                // возвращает строку с составом юнитов по армии
                $units ='пехота-'.count($this->warriors['Infantry']).", конница-".count($this->warriors['Knight']).", лучники-".count($this->warriors['Archer']);
                return $units;
        }

        public function getWarior (string  $solder) {
            // возвращает количество войнов одного типа
            return count($this->warriors[$solder]);
        }

        public function getAttackWariors(string $solders) {
            // возвращает общую атаку одного типа юнитов
            $units = count($this->warriors[$solders]);
            $res = $units * ($this->warriors[$solders][0]->getDamage());
            return $res;
        }
        public function getHealthWariors(string $solders) {
            // возвращает общее здоровье + броня одного типа юнитов
            $units = count($this->warriors[$solders]);
            $res = $units * ($this->warriors[$solders][0]->getHealth());
            $res += $units * ($this->warriors[$solders][0]->getArmor());
            return $res;

        }
        public function killSolders(string $solders) {
            // удаляет одного юнита по типу
            // функцию необходимо доработать для вызова из функции randWAR
            if (count($this->warriors[$solders]) > 0) {
            unset($this->warriors[$solders][count($this->warriors[$solders]) - 1]);
            return true;
            }
            else return false;
            }
        }

    // function randWAR($army1, $army2) {
        // функция рандомно выбирает армию которая атакует (другая соответственно обороняется) 
        //и рандомно выбирает типы юнитов которые атакуют и обороняются(по одному на армию), 
        // после выводит результат боестолкновения отрядов
    //     $armiAttac = rand(1, 2);
    //     if ($armiAttac = 1) {
    //         $army1Warrior = array_rand('Infantry', 'Knight', 'Archer');
    //         $damage = $army1->getAttackWariors($army1Warrior);
    //         $army2Warrior = array_rand('Infantry', 'Knight', 'Archer');
    //         $healf = $army2->getHealthWariors($army2Warrior);
    //         if ($healf > $damage) {
    //             if ($army2->killSolders($army2Warrior)) {
    //                 return "Убит ".$army2Warrior;
    //             }
    //         }
    //         else {
    //             $res = $damage - $healf;
    //             while ($res > 0 AND Count($army2->getWarior($army2Warrior)>0) {
    //                 $res -= 
    //             }
    //         }
    //     }
    // }

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