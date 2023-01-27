<?php
    if (isset($_POST['newWord'])) {
        $word = $_POST['newWord'];
        $fp = fopen('data/customWords.csv', 'a'); //opens file in append mode  
        fwrite($fp, "$word\r\n");
        fclose($fp);

        echo json_encode(array("msg" => "$word"));
    }

?>