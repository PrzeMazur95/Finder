<?php

class piece extends dbh {

    public function Add_To_Db($sku, $ilosc, $nrregalu, $data) {

        $stmt = $this->connect()->prepare('INSERT INTO regal (sku, ilosc, nrregalu, data) VALUES (?,?,?,?);');

        if(!$stmt->execute(array($sku, $ilosc, $nrregalu, $data))){

            echo "Bład : "; 
            print_r($stmt->errorInfo());
            $stmt = null;
            exit();

         } else {

            echo "Kawałek dodany poprawnie";

        }

         $stmt = null;

   }

   public function Find_all() {

        $results = $this->connect()->query('SELECT * FROM regal');

        if(!$results){

            echo "Błąd wczytywania widoku regałów";

        } else {


            return $results;

        }

   }

}

