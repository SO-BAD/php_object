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


    $animal = new Animal();
    echo $animal->getAge();
    echo "<br>";
    $animal->setAge(11500);
    echo $animal->getAge();
    echo "<br>";
?>