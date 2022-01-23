<?php
session_start();
require_once('../Models/userjobtitle-model.php');
require_once('subject.php');
require_once('real-subject.php');

class Proxy implements subjectproxy
{
    private $realSubject;

    public function __construct( $realSubject)
    {
        $this->realSubject = $realSubject;
    }
    
    public function ExecuteQuery($usertobedel)
    {
        if ($this->checkAccess()) {
            $this->realSubject->ExecuteQuery($usertobedel);
            //$this->logAccess();
        }
        else 
        {
            echo "prohibited";
        }
    }

    private function checkAccess(): bool
    {

        $Id=$_SESSION["CurrentId"];
        //$this->userjobtitle->selectjobtitle($Id);
        $jobId=userjobtitle::selectjobtitle($Id);
        if($jobId==3)
        {
            return true;
        }
        else
        {
            return false;
        }

        echo "Proxy: Checking access prior to firing a real request.\n";
    }

   // private function logAccess(): void
   // {
   //     echo "Proxy: Logging the time of request.\n";
    //}
}