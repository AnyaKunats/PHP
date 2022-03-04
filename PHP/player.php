<?php
class Player{
    private $name, $city;

    public function __construct($name) {
        $this->name = $name;
    }

    public function setCity($city){
        $this->city = $city;
        return $this;
    }
    public function getName(){
        return $this->name;

    }
    public function getCity(){
        return $this->city;
    }
    public function __toString(){
        if($this->city==NULL)
            return $this->name;
        else
            return $this->name . ' (' . $this->city . ')';
    }
}


