<?php
    class Animal
    {
        public $name = '';
        protected $age = 0;
        private $heartbeat = 0;

        public function __construct()
        {
            $this->age = rand(10, 20);
            $this->name = 'john';
            $this->heartbeat=rand(20,60);
        }
        public function getAge()
        {
            return $this->age;
        }
        public function setAge($num)
        {
            $this->age = $num;
        }
    }

    class Dog extends Animal{
        protected $hair_color="black";

        public function getColor(){
            return $this->hair_color;
        }
        public function setColor($color){
            $this->hair_color=$color;
        }
        public function getAge(){
            echo "年齡:".$this->age;
        }
    }

    $cat =new Animal;
    echo "cat".$cat->getAge();
    $dog =new Dog;
    echo $dog->getAge();
    echo "<br>";
    $dog->setAge(15236);
    echo $dog->getAge();
    echo "<br>";
    echo $dog->getColor();
    echo "<br>";
    echo $dog->setColor("red");
    echo $dog->getColor();
    echo "<br>";
    $dog->getAge();
    echo "cat".$cat->getAge();


?>