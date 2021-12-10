<?php
        interface Animal{
            const type='animal'; 
            public function run();
        }
    



        class Girl implements Animal
        {   
            public $var = 'a default value';
            public function __constructor(){
            }
            public function run(){  
                echo "13213";
             }
        }
        $girl = new Girl();
        echo $girl->var;
        echo "<br>";
        $girl->run();
    ?>
