<?php

class pieceController extends piece {

    public $id;
    public $sku;
    public $ilosc;
    public $nrregalu;
    public $data;
    public $production_pieces=array();

       public function __construct(){

        $this->data=date("Y-m-d");

    }

    public function Add(){

            if(!$this->EmptyInput()){
    
                $this->Add_To_Db($this->sku, $this->ilosc, $this->nrregalu, $this->data);
    
            } else {
    
                return false;
    
            }
    
        }

    public function Update(){

         if(!$this->EmptyInput()){
    
             $this->Update_in_Db($this->id ,$this->sku, $this->ilosc, $this->nrregalu, $this->data);
    
         } else {
    
              Echo "Któreś z pól jest puste";
    
         }
    
    }
    

    public function EmptyInput(){

        $result;

        if(empty(($this->sku) || $this->ilosc) || ($this->nrregalu) || ($this->data)){

            return false;

        } else {

            return true;
        }

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

    public static function Delete($id){

        if(parent::Delete_this_id($id)){

            return true;

        } else {

            return false;

        }

    }

    public static function Truncate($table){

        switch($table){

            case 'naklejki':

                if(parent::Truncate_naklejki()){

                    return true;

                } else {

                    return false;
                }

            case 'regal':

                if(parent::Truncate_regal()){

                    return true;

                } else {

                    return false;
                }

            default:

                return false;

        }

    }        

}

