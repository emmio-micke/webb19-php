<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send form</title>
</head>
<body>
    <h1>Send form</h1>
    <form method="post" action="receive.php">
        Name:<br>
        <input type="text" name="my_name"><br>

        Age:<br>
        <input type="text" name="age"><br>

        Colors:<br>
        <input type="checkbox" name="color[yellow]" value="checked"> Gul<br>
        <input type="checkbox" name="color[red]" value="checked"> Röd<br>
        <input type="checkbox" name="color[green]" value="checked"> Grön<br>

        <input type="submit" name="send">
    </form>
</body>
</html>