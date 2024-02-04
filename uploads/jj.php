<?php

class Main{
    public $an;
    public function f(){
        return $this->an = 'ff';
    }
}

$main = new Main();
echo $main->f();
?>