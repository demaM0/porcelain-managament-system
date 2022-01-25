<?php
require_once("SingleTon.php");
class Translate{
    public function translate($lang_code, $trans_key)
    {
        
        $con = DbConnection::getInstance();
        if (!$con) {
            die('could not connect: ' . mysqli_error($con));
        }
        

        $sql = "select word from translationdetails inner join translation on translation.TranslationName = '$trans_key' where translationdetails.LangId = $lang_code and translationdetails.TransId=translation.Id ";
        $result = mysqli_query($con, $sql);

        if ($result->num_rows > 0) {
            if ($row = mysqli_fetch_array($result)) {
                return $row["word"];
            } else
                return "row no results";
        } else
            return "no results";
    }
}
?>
