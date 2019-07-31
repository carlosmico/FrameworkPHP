<?php

namespace App;

class SessionManager{
    public function put(string $variable, $valor){
        $_SESSION[$variable] = serialize($valor);
    }

    public function get(string $variable){
        if(!isset($_SESSION[$variable])) return null;
        return unserialize($_SESSION[$variable]);
    }

    public function delete(string $variable){
        unset($_SESSION[$variable]);
    }
}