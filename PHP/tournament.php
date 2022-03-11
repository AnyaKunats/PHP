<?php

require_once "player.php";

class Tournament extends Player{
    private $tournaments, $date, $arr_player=[];

    public function __construct($tournaments, $date=NULL)
    {
        $this->tournaments = $tournaments;
        $this->date = $date;
    }
    public function addPlayer($player){
        $this->arr_player[count($this->arr_player)] = $player;
        return $this;
    }
    public function createPairs(){
        $arr = $this->arr_player;
        if(count($arr)%2!==0){
            array_push($arr, NULL);
        }
        $arr_length = count($arr);
        $arr_r = array_reverse(array_splice($arr, -($arr_length/2)));
        $arr_l = $arr;
        $dt =$this->date;

        if($dt!==NULL)
            $dt = DateTime::createFromFormat("Y.m.d", $dt)->format("d.m.Y");
        else
            $dt=date("d.m.Y");

        for($i=1; $i<$arr_length; $i++){
            $dt=date("d.m.Y",strtotime("+1 day",strtotime($dt)));
            echo $this->tournaments .' '. $dt . "\n";
            if($i==1) {
                for ($j = 0; $j < $arr_length / 2; $j++) {
                    if ($arr_l[$j] !== NULL && $arr_r[$j] !== NULL)
                        echo $arr_l[$j] .' - '. $arr_r[$j]. "\n";
                    else
                        continue;
                }
            }
            else{
                array_push($arr_r, array_pop($arr_l));
                $item = array_shift($arr_l);
                array_unshift($arr_l, array_shift($arr_r));
                array_unshift($arr_l, $item);
                for ($j = 0; $j < $arr_length / 2; $j++) {
                    if ($arr_l[$j] !== NULL && $arr_r[$j] !== NULL)
                        echo $arr_l[$j] .' - '. $arr_r[$j]. "\n";
                    else
                        continue;
                }
            }
        }
    }
}

