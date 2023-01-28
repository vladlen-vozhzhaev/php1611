<?php
/* Здоровье (hp) персонажа не может превышать 100ед.*/
    class Person{
        private $name;
        private $lastname;
        private $age;
        private $hp;
        private $mother;
        private $father;

        public function __construct($name, $lastname, $age, $mother=null, $father=null){
            $this->name = $name;
            $this->lastname = $lastname;
            $this->age = $age;
            $this->hp = 100;
            $this->mother = $mother;
            $this->father = $father;
        }
        public function sayHi(){
            return "Привет, меня зовут ".$this->name." у меня ".$this->hp." здоровья";
        }
        public function getHp(){
            return $this->hp;
        }
        public function getName(){
            return $this->name;
        }
        public function getLastname(){
            return $this->lastname;
        }
        public function getAge(){
            return $this->age;
        }
        public function getMother(){
            return $this->mother;
        }

        public function getFather(){
            return $this->father;
        }

        public function setHp($hp){
            if($this->hp+$hp > 100) $this->hp = 100;
            else $this->hp = $this->hp + $hp;
        }
        public function info(){
            $result = "Имя: ".$this->name."<br>";
            if($this->getMother() != null){
                $result .= "Имя матери: ".$this->getMother()->getName()."<br>";
                if($this->getMother()->getFather != null){
                    $result .= "Имя дедушки по маминой линии: ".$this->getMother()->getFather()->getName();
                }
            }
            if($this->getFather() != null){
                $result .= "Имя отца: ".$this->getFather()->getName()."<br>";
            }

            return $result;
        }
    }
    $medKit = 50;
    $person4 = new Person("Igor", "Petrov", 70);
    $person3 = new Person("Ivan", "Ivanov", 35);
    $person2 = new Person("Olga", "Ivanov", 40, null, $person4);
    $person1 = new Person("Alex", "Ivanov", 10, $person2, $person3);
    echo $person2->info();
    /*echo $person1->getHp()."<br>"; // 100
    $person1->setHp(-30);
    echo $person1->getHp()."<br>"; // 70
    $person1->setHp($medKit);
    echo $person1->getHp()."<br>"; // 100*/