<?php

class pieceView extends piece {

   public function Show_all() {

    $results=$this->Find_all();

    return $results;
    

   }

}

