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

            return true;

        }

         $stmt = null;

   }

   public function Update_in_Db($id, $sku, $ilosc, $nrregalu, $data) {

        $result = $this->connect()->prepare("UPDATE regal SET sku = ?, ilosc = ?, nrregalu = ?, data = ? WHERE id = ?");
        $result->execute([$sku, $ilosc, $nrregalu, $data, $id]);

        if(!$result){

            echo "Kawałek nie został zaktualizowany";

        } else {


            return true;

        }
    }


   public function Find_all() {

        $results = $this->connect()->query('SELECT * FROM regal');

        if(!$results){

            echo "Błąd wczytywania widoku regałów";

        } else {


            return $results;

        }

   }


    public function Find_specific(){

        $results = $this->connect()->query('SELECT * FROM regal r WHERE sku IN ( SELECT SKU FROM naklejki m WHERE r.ilosc >= m.ilosc ) ORDER BY `r`.`sku` ASC
        ');

        if(!$results){

            echo "Błąd wyświetlania wyników";

        } else {

            return $results;
        }

    }

   

   public static function Import_to_Db($sku, $ilosc){

    $stmt = parent::connect()->prepare('INSERT INTO naklejki (sku, ilosc) VALUES (?,?)');
    $stmt->execute([$sku,$ilosc]);

   }

}

