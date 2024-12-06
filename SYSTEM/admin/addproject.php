<?php
session_start();
require_once '../classes/projects.class.php';
require_once '../tools/clean.php';


$objProjects = new Projects;
$projects = $title =  $description =  "";
$objProjects->user_id = $_SESSION['user']['user_id'];
$projects = $objProjects->ac();




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $proj = ($_POST['projects']);
    $title = isset($_POST['title']) ? clean_input($_POST['title']) : '';
    $description = isset($_POST['description']) ? clean_input($_POST['description']) : '';
    

    $objProjects->user_id = $_SESSION['user']['user_id'];
    $objProjects->projects = $proj;
    $objProjects->projects = $title;
    $objProjects->projects = $description;

    if ($objProjects->addprojects()) {
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
<a href="dashboard.php">Back</a>
<div class="parent">
        <div class="form">
            <h1>Projects</h1>
            <p>Share us your at least 6 personal skills or talent!</p>
            <form action="" method="POST">
                <span>Link: </span><input type="text" name="projects" id="projects">
                <br>
                <br>
                <span>Title: </span><input type="text" name="title" id="title">
                <br>
                <br>
                <span>Description: </span><input type="text" name="description" id="description">
                <br>
                <br>
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