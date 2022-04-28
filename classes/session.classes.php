<?php

class session {


    private static $sessionStarted = false;

    public static function start(){

        if(self::$sessionStarted == false){

            session_start();
            self::$sessionStarted = true;

        }

    }

    public static function set($key, $value) {

        $_SESSION[$key] = $value;

    }

    public static function get($key){

        if(isset($_SESSION[$key])){

            return $_SESSION[$key];

        } else {

            return false;

        }

    }

    public static function unset($key){

        return $_SESSION[$key]="";

    }



}