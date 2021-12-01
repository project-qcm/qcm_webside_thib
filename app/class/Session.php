<?php

class Session
{
    static $instance;

    // disigne pater singleton
    static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Session();
        }

        return self::$instance;
    }

    public function __construct()
    {
        session_start();
    }

    public function setFlash($key, $message)
    {
        $_SESSION['flash'][$key] = $message;
    }

    public function hasFlash()
    {
        return isset($_SESSION['flash']);
    }

    public function getFlash()
    {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        unset($_SESSION['flash']);
        
        return $flash;
    }

    public function write($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function read($key, $value = null)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } elseif (isset($_SESSION[$key]) && isset($value)){
            return $_SESSION[$key]->$value;
        } else {
            return $_SESSION[$key] = null;   
        }

        
        // return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * 
     */
    public function restrictUser($user)
    {
        if (!$this->read($user)) {
            $this->setFlash('danger', "Vous n'avez pas le droit d'accéder à cette page");
            App::redirect("/");
            exit();
        }
    }
    
    public function delelet($key)
    {
        unset($_SESSION[$key]);
    }
}
