<?php

class pieceView extends piece {

   public function Show_all() {

    $results=$this->Find_all();

    return $results;
    

   }

   public function Show_specific() {

      $results=$this->Find_specific();

      return $results;
   }

   public function Find_by_id($id){

      if(isset($id)){

          if(is_numeric($id)){

            $piece = $this->Find_specific_piece($id);            

              if($piece){

                  $found_piece = new pieceController();
                  $found_piece->id=$piece['id'];
                  $found_piece->sku=$piece['sku'];
                  $found_piece->ilosc=$piece['ilosc'];
                  $found_piece->nrregalu=$piece['nrregalu'];

                  return $found_piece;

              } else {

                  session::set("find_by_id", "Problem przy wyszukiwaniu w Db!");

              }


          } else {

              session::set("find_by_id", "Podany numer nie jest liczbą!");

          }

      } else {

          session::set("find_by_id", "Nie podano numeru kawałka!");

      }

  }


}

