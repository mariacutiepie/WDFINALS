<?php
session_start();
require_once '../classes/projects.class.php';
require_once '../classes/infos.class.php';
require_once '../classes/skills.class.php';
require_once '../tools/clean.php';

$objInfos = new Infos;
$objSkills = new Skills;
$objProjects = new Projects;
$objInfos->user_id = $_SESSION['user']['user_id'];
$objSkills->user_id = $_SESSION['user']['user_id'];
$objProjects->user_id = $_SESSION['user']['user_id'];
$infos = $objInfos->account();
$skills = $objSkills->acc();
$projects = $objProjects->ac();

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
    <link rel="stylesheet" href="../style/admin.dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="header">
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </div>
    <section>
        <div class="parent">
            <div class="p-child">
                <img src="../img/null.png" alt="" height="150px">
                <h1><?php echo $_SESSION["user"]["username"] ?>!</h1>
            </div>
            <div class="infos">
            <div class="fulname">
                <span>Name: </span><?php echo $infos ["lastname"] . ", " . $infos ["firstname"] . " " . $infos["middleini"]?>
            </div>
            <div class="birthday">
                    <span>Birthday: </span><?php echo $infos ["birthday"]?>
            </div>
            <div class="section">
                    <span>Section: </span><?php echo $infos ["section"]?>
            </div>
            <div class="bio">
                    <span>Bio: </span><?php echo $infos ["bio"]?>
            </div>
            <div class="email">
                    <span>Email: </span><?php echo $infos ["email"]?>
                </div>
            <div class="contact">
                    <span>Contact Number: </span><?php echo $infos ["contact"]?>
            </div>
            </div>
            <div class="skills">
                <h1>Skills</h1>
                <div class="first">
                    <?php echo $skills ["first"]?>
                </div>
                <div class="second">
                    <?php echo $skills ["second"]?>
                </div>
                <div class="third">
                    <?php echo $skills ["third"]?>
                </div>
                <div class="fourt">
                    <?php echo $skills ["fourt"]?>
                </div>
                <div class="fifth">
                    <?php echo $skills ["fifth"]?>
                </div>
                <div class="sixth">
                    <?php echo $skills ["sixth"]?>
                </div>
            </div>
            <div class="education">
                <h1>Education</h1>
                <div class="elem">
                    <span>Elementary: </span><?php echo $infos ["elem"]?>
                </div>
                <div class="high">
                    <span>Junior High School: </span><?php echo $infos ["high"]?>
                </div>
                <div class="shs">
                    <span>Senior High School: </span><?php echo $infos ["shs"]?>
                </div>
                <div class="college">
                    <span>College: </span><?php echo $infos ["college"]?>
                </div>
            </div>
            <div class="projects">
                <h1>Projects</h1> 
                <a href="addproject.php">Add Project</a>
                <div class="added">
                  
                    <?php foreach($projects as $proj){
                        ?>
                            <a href= <?php echo $proj['projects'] ?>>//description</a>
                    <?php
                    } ?>
                   
                </div>
            </div>
        </div>
        <div class="log"><br><a href="../auth/logout.php">logout</a></div>
    </section>
</body>
</html>