<?php
    if (isset($_POST['newWord'])) {
        $word = $_POST['newWord'];
        
        if(isDuplicate($word)){
            //returns result to the calling page
            echo json_encode(array("success"=>false, "word"=>$word));
            exit();
        }
        
        $fp = fopen('data/customWords.csv', 'a'); //opens file in append mode  
        fwrite($fp, "$word\r\n");
        fclose($fp);

        //returns result to the calling page
        echo json_encode(array("success"=>true, "word"=>$word));
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