<?php
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
?>