<?php
    include_once 'lib/Session.php';
    Session::session_start();

    if (Session::show_value("verify") == "" || Session::show_value("verify") == NULL) {
        header("Location: 404.php");
    }

    $verify_id = $_GET['verify_id'];

    if ($verify_id != Session::show_value("verify")) {
        header("Location: 404.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Identity</title>
    <link rel="stylesheet" href="css/verify.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
</head>
<body>
    <form action="verify_code.php" method="post" class="verify">
        <h1>Thank for Choose Us</h1>
        <input type="hidden" name="verify_id" value="<?php echo Session::show_value("verify") ?>">
        <input type="submit" value="Verify Identity" class="btn">
    </form>
</body>
</html>

<?php
    Session::set_value("verify", NULL);
?>