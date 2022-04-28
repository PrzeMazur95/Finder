<?php

class pieceController extends piece {

    private $sku;
    private $ilosc;
    private $nrregalu;
    private $data;
    public $production_pieces=array();

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


    public static function Import($file){

        $pieces=array();

        if(empty($file)){

            session::set("file","Uwaga !. Plik nie został zaimportowany!");
        }

        while(($row = fgetcsv($file, 0, ";")) !==false){

            $pieces['sku']=$row[0];
            $pieces['ilosc']=$row[1];

            parent::Import_to_Db($pieces['sku'], $pieces['ilosc']);

        }

        session::set("file", "Plik poprawnie zaimportowany!");
        

    }


}

