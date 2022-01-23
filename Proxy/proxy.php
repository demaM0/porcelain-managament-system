<?php
session_start();
require_once('subject.php');
require_once('real-subject.php');
class Proxy implements subjectproxy
{
    private $user;

    public function __construct( $user)
    {
        $this->user = $user;
    }

    public function ExecuteQuery($Query)
    {
        if ($this->checkAccess()) {
            $this->realSubject->ExecuteQuery($Query);
            //$this->logAccess();
        }
        else 
        {
            echo "prohibited";
        }
    }

    private function checkAccess(): bool
    {
       // for()
       // {
            if($_SESSION["CurrentId"])
            {
                
            }
      //  }
        // Some real checks should go here.
        echo "Proxy: Checking access prior to firing a real request.\n";

        return true;
    }

   // private function logAccess(): void
   // {
   //     echo "Proxy: Logging the time of request.\n";
    //}
}