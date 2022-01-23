<?php

require_once('subject.php');
class RealSubject  implements subjectproxy{

    public function ExecuteQuery($Query)
    {
        echo "RealSubject: Handling request.\n";
    }
}
?>