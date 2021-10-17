<?php
// Singelton Pattern 
// Erstellen einer Klasse mit dem Singelton Pattern

class Logger{

    private static $instance = null;

    private function __construct(){}

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new Logger();
        }
        return self::$instance;
    }

    public function dateTime() : string{
        date_default_timezone_set('Europe/Berlin');
        $timestamp = time();
        return date('d.m.y H:i', $timestamp);
    }

    public function log(string $message)
    {
        $date = $this->dateTime();
        printf('New Log at %s , %s<hr>', $date, $message);
    }
}

// Benutzer des Singelton Patterns
Logger::getInstance()->log('Benutzer hat sich Regestriert');
Logger::getInstance()->log('Benutzer hat sich Abgemeldet');