<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WAR!!!!</title>
</head>
<body>
   <?php
    class Unit {
        public $health;
        protected $armor;
        protected $damage;
        
    }
    class Infantry extends Unit {
        public $health = 100;
        protected $armor = 10;
        protected $damage =10; 
    }
    class Knight extends Unit {
        public $health = 300;
        protected $armor = 30;
        protected $damage =30; 
    }
    class Archer extends Unit {
        public $health = 300;
        protected $armor = 5;
        protected $damage =20; 
    }


    class Army {
        public $warlord = '';
        public $warriors=[];
        // поля класса Армия -> командующий и массив войнов
        public function __construct($warlord, $infantry, $knight, $archer) {
            $this->warlord = $warlord;
            $this->warriors['infantry'] = [];
            for ($i=0; $i<$infantry; $i++) {
                $warriors['infantry'][$i] = new Unit();
            }
            $this->warriors['knight'] = [];
            for ($i=0; $i<$knight; $i++) {
                $warriors['knight'][$i] = new Knight();
            }
            $this->warriors['archer'] = [];
            for ($i=0; $i<$archer; $i++) {
                $warriors['archer'][$i] = new Archer();
            }
            var_dump($this->warriors);
            echo '<br>';
        }

        public function getWarlord() {
            return $this->warlord;
        }
        public function attack($warrior) {
            var_dump($this->warriors[$warrior]);
        }
    }
    $nevsk = new Army ('Nevskiy', 200, 15, 30);
    $tevtons = new Army('Ульф Фасе', 90, 25, 65);
    //$nevskiy->attack('knight');
    ?>   
<table border="1">
    <tr>
        <th></th>
        <th><?=$nevskiy->getWarlord()?></th>
        <th><?=$tevtons->getWarlord()?></th>
    </tr>
    <tr>
        <th>Army units:</th>
        <td>unit1 (count), unit2(count), ...</td>
        <td>unit1 (count), unit2(count), ...</td>
    </tr>
<?php
$duration = 0;

?> 
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