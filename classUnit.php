<?php
interface Units {
    public function getHealth() :int;
    public function getArmor() :int;
    public function getDamage() :int;
}
abstract class Unit implements Units{
        //базовый класс война
        protected $health;
        protected $armor;
        protected $damage;

        public function getHealth() {
            // функция возвращает показатель здоровья юнита
            return $this->health;
        }
        public function getArmor() {
            // функция возвращает показатель брони юнита
            return $this->armor;
        }
        public function getDamage() {
            // функция возвращает показатель атаки юнита
            return $this->damage;           
        }

        
    }
    class Infantry extends Unit {
        protected $health = 100;
        protected $armor = 10;
        protected $damage =10; 
    }
    class Knight extends Unit {
        protected $health = 300;
        protected $armor = 30;
        protected $damage =30; 
    }
    class Archer extends Unit {
        protected $health = 100;
        protected $armor = 5;
        protected $damage =20; 
    }
?>