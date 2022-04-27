<?php

class pieceController extends piece {

    private $sku;
    private $ilosc;
    private $nrregalu;
    private $data;

    public function __construct($sku, $ilosc, $nrregalu){

        $this->sku=$sku;
        $this->ilosc=$ilosc;
        $this->nrregalu=$nrregalu;
        $this->data=date("Y-m-d");

    }

    public function Add(){

        if(!$this->EmptyInput()){

            $this->Add_To_Db($this->sku, $this->ilosc, $this->nrregalu, $this->data);

        } else {

            Echo "Któreś z pól jest puste";
            Echo $this->sku;
            Echo $this->ilosc;
            Echo $this->nrregalu;
            Echo $this->data;


        }

    }

    public function EmptyInput(){

        $result;

        if(empty(($this->sku) || $this->ilosc) || ($this->nrregalu) || ($this->data)){

            $result = false;

        } else {

            $result = true;
        }

        return $result;

    }

}

