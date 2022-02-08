<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WAR!!!!</title>
</head>
<body>
    <pre>
   <?php
    class Unit {
        protected $health;
        protected $armor;
        public $damage;

        static function getHealth() {
            return self::health;
        }
        static function getArmor() {
            return self::armor;
        }
        static function getDamage() {
            return self::damage;           
        }

        
    }
    class Infantry extends Unit {
        protected $health = 100;
        protected $armor = 10;
        public $damage =10; 
    }
    class Knight extends Unit {
        protected $health = 300;
        protected $armor = 30;
        public $damage =30; 
    }
    class Archer extends Unit {
        protected $health = 100;
        protected $armor = 5;
        public $damage =20; 
    }
echo Archer::getHealth();
    class Army {
        private $warlord;
        private $warriors=[];
        // поля класса Армия -> командующий и массив войнов
        public function __construct($warlord, $infantry, $knight, $archer) {
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
            return $this->warlord;
        }
        public function getWariors() {
                $units ='пехота-'.count($this->warriors['Infantry']).", конница-".count($this->warriors['Knight']).", лучники-".count($this->warriors['Archer']);
                return $units;
        }
        public function getAttackWariors($solders) {
            $units = count($this->warriors[$solders]);
            echo $units;
            echo '<br>';
            echo $solders::getDamage();
            $res = $units * $solders::getDamage();
            return $res;
        }
    }
    $nevsk = new Army ('Nevskiy', 200, 15, 30);
    $tevtons = new Army('Ульф Фасе', 90, 25, 65);
    $nevsk->getWarlord();
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