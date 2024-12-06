<?php
session_start();
require_once '../classes/skills.class.php';
require_once '../classes/infos.class.php';
require_once '../tools/clean.php';

$objSkills = new Skills;
$first = $second = $third = $fourt = $fifth = $sixth = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first = isset($_POST['first']) ? clean_input($_POST['first']) : '';
    $second = isset($_POST['second']) ? clean_input($_POST['second']) : '';
    $third = isset($_POST['third']) ? clean_input($_POST['third']) : '';
    $fourt = isset($_POST['fourt']) ? clean_input($_POST['fourt']) : '';
    $fifth = isset($_POST['fifth']) ? clean_input($_POST['fifth']) : '';
    $sixth = isset($_POST['sixth']) ? clean_input($_POST['sixth']) : '';

    $objSkills->user_id = $_SESSION['user']['user_id'];
    $objSkills->first = $first;
    $objSkills->second = $second;
    $objSkills->third = $third;
    $objSkills->fourt = $fourt;
    $objSkills->fifth = $fifth;
    $objSkills->sixth = $sixth;

    if ($objSkills->skills()) {
        // Redirect to the Location: after successful insertion
        header('Location: dashboard.php');
    } else {
        // Display an error message if something went wrong during insertion
        echo 'Something went wrong when adding the new product. ';
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/setup.css">
    <title>Profiling</title>
</head>

<body>
    <div class="parent">
        <div class="p-child">
            <img src="../img/null.png" alt="">
            <h1><?php echo $_SESSION["user"]["username"] ?>!</h1>
        </div>
        <div class="form">
            <h1>Technical Skills</h1>
            <p>Share us your at least 6 personal skills or talent!</p>
            <form action="" method="POST">
                <input type="text" name="first" id="first">
                <input type="text" name="second" id="second">
                <input type="text" name="third" id="third">
                <input type="text" name="fourt" id="fourt">
                <input type="text" name="fifth" id="fifth">
                <input type="text" name="sixth" id="sixth">
                <br>
                <br>
                <input type="submit" value="Proceed" name="submit">
            </form>
            <br>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>