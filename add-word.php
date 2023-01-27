<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Word</title>
</head>

<body>
    <h1>Enter a custom word</h1>

    <div class="select-panel">
        <form action="add-word.php" method="post" id="form">
            <table>
                <tr>
                    <td><input id="inputBox" name="newWord" class="input-box"></td>
                    <td><button id="btnSubmit" class="button" onclick="validateInput">Submit</button></td>
                </tr>
            </table>
        </form>
    </div>

    <div class="display">
        <?php
        if (isset($_POST['newWord'])) {
            $word = $_POST['newWord'];
            $fp = fopen('data/customWords.csv', 'a'); //opens file in append mode  
            fwrite($fp, "$word\r\n");
            fclose($fp);

            echo "You successfully added the word:<br> <span class='added-word'>$word</span>";

            $_POST = array();
        }

        ?>
    </div>

    <script>

        //clear the form data so that it doesn't get sent again
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        const btnSubmit = document.getElementById('btnSubmit')
        const inputBox = document.getElementById('inputBox')
        const form = document.getElementById('form')

        form.addEventListener('submit', validateInput)
        

        function validateInput(event) {
            event.preventDefault()
            if (inputBox.value === '') {
                alert('You can\'t submit empty values')
                return
            }

            form.submit()
        }
    </script>
</body>

</html>