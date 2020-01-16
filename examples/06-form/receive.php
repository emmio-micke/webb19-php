<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receive form</title>
</head>
<body>
    <h1>Receive form</h1>
    <pre>
    <?php
        print_r($_POST);
        echo $_POST['my_name'];

    ?>
    </pre>
</body>
</html>