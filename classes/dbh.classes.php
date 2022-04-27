<?php

class dbh{

    protected function connect(){
        try{

            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=dresowka', $username, $password);
            return $dbh;

        }
        catch (PDOexception $e){
            print "Error: ".$e->getMessage()."</br>";
            die();
        }


    }


}