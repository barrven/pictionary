<?php
    if (isset($_POST['newWord'])) {
        $word = $_POST['newWord'];
        
        if(isDuplicate($word)){
            echo json_encode(array("msg" => "Could not add '$word'. This entry is already on the list."));
            exit();
        }
        
        $fp = fopen('data/customWords.csv', 'a'); //opens file in append mode  
        fwrite($fp, "$word\r\n");
        fclose($fp);

        echo json_encode(array("msg" => "$word"));
    }

    function isDuplicate($word){
        $file = 'data/customWords.csv';
        $lines = file($file);
        foreach($lines as $line){
            if(trim($line) == $word){
                return true;
            }
        }
        return false;
    }

?>