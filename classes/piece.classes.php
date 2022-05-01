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
            $stmt = null;
            exit();

        }

         $stmt = null;

   }

   public function Update_in_Db($id, $sku, $ilosc, $nrregalu, $data) {

        $result = $this->connect()->prepare("UPDATE regal SET sku = ?, ilosc = ?, nrregalu = ?, data = ? WHERE id = ?");

        if(!$result->execute([$sku, $ilosc, $nrregalu, $data, $id])){

            return false;
            $result = null;
            exit();

        } else {

            return true;
            $result = null;
            exit();
        }
    }


   public function Find_all() {

        $results = $this->connect()->query('SELECT * FROM regal ORDER BY `nrregalu` ASC');

        if(!$results){

            echo "Błąd wczytywania widoku regałów";
            $results = null;
            exit();

        } else {


            return $results;
            $result = null;
            exit();

        }

   }


    public function Find_specific(){

        $results = $this->connect()->query('SELECT * FROM regal r WHERE sku IN ( SELECT SKU FROM naklejki m WHERE r.ilosc >= m.ilosc ) ORDER BY `r`.`sku` ASC
        ');

        if(!$results){

            echo "Błąd wyświetlania wyników";
            $results = null;
            exit();

        } else {

            return $results;
            $results = null;
            exit();
        }

    }

   

   public static function Import_to_Db($sku, $ilosc){

    $stmt = parent::connect()->prepare('INSERT INTO naklejki (sku, ilosc) VALUES (?,?)');
    
    if($stmt->execute([$sku,$ilosc])){

        return true;
        $stmt = null;
        exit();

    } else {

        return false;
        $stmt = null;
        exit();

    }

   }


   public function Find_specific_piece($id){

        $result = $this->connect()->prepare('SELECT * FROM regal WHERE id = (?)');

        $result->execute([$id]);

        $piece = $result->fetch(PDO::FETCH_ASSOC);

        if(!$piece){

            return false;
            $result = null;
            exit();

        } else {

            return $piece;
            $result = null;
            exit();

        }

    }   

    public static function Delete_this_id($id){

        $result = parent::connect()->prepare('DELETE FROM regal WHERE id = (?)');

        if($result->execute([$id])){

            return true;
            $result = null;
            exit();

        } else {

            return false;
            $result = null;
            exit();

        }

    }

    public static function Truncate_naklejki(){
     
        $result = parent::connect()->prepare('TRUNCATE naklejki');

            if($result->execute()){
        
                return true;
                $result = null;
                exit();
        
            } else {
        
                return false;
                $result = null;
                exit();
        
        }
    }

    public static function Truncate_regal(){
     
        $result = parent::connect()->prepare('TRUNCATE regal');

            if($result->execute()){
        
                return true;
                $result = null;
                exit();
        
            } else {
        
                return false;
                $result = null;
                exit();
        
        }
    }

}

