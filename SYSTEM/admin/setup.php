<?php
session_start();
require_once '../classes/infos.class.php';
require_once '../classes/admin.class.php';
require_once '../tools/clean.php';

$objInfos = new Infos;
$objUser = new User;
$objInfos->user_id = $_SESSION['user']['user_id'];
$objUser->user_id = $_SESSION['user']['user_id'];
$name = $objUser->name();

$lastname = $firstname = $birthday = $contact = $address = $email = $elem = $elemgrad = $high = $juniorgrad = $shs = $seniorgrad =  $college = $collegegrad = '';
$lastnameErr = $firstnameErr = $birthdayErr = $contactErr = $addressErr = $emailErr = $elemErr = $highErr = $shsErr = $collegeErr = $yeargrad = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lastname = isset($_POST['lastname']) ? clean_input($_POST['lastname']) : '';
    $firstname = isset($_POST['firstname']) ? clean_input($_POST['firstname']) : '';
    $birthday = isset($_POST['birthday']) ? clean_input($_POST['birthday']) : '';
    $contact = isset($_POST['contact']) ? clean_input($_POST['contact']) : '';
    $address = isset($_POST['address']) ? clean_input($_POST['address']) : '';
    $email = isset($_POST['email']) ? clean_input($_POST['email']) : '';
    $elem = isset($_POST['elem']) ? clean_input($_POST['elem']) : '';
    $high = isset($_POST['high']) ? clean_input($_POST['high']) : '';
    $shs = isset($_POST['shs']) ? clean_input($_POST['shs']) : '';
    $college = isset($_POST['college']) ? clean_input($_POST['college']) : '';
    $elemgrad = isset($_POST['elemgrad']) ? clean_input($_POST['elemgrad']) : '';
    $juniorgrad = isset($_POST['juniorgrad']) ? clean_input($_POST['juniorgrad']) : '';
    $seniorgrad = isset($_POST['seniorgrad']) ? clean_input($_POST['seniorgrad']) : '';
    $collegegrad = isset($_POST['collegegrad']) ? clean_input($_POST['collegegrad']) : '';

    if (empty($lastname)) {
        $lastnameErr = '*Lastname is Required!';
    }
    if (empty($firstname)) {
        $firstnameErr = '*Firstname is Required!';
    }
    if (empty($contact)) {
        $contactErr = '*Contact is Required!';
    }
    if (empty($email)) {
        $emailErr = '*Email is Required!';
    }
    if (empty($elem)) {
        $elemErr = '*Elementary Education is Required!';
    }
    if (empty($elemgrad)) {
        $yeargrad = '*Year is Required!';
    }
    if (empty($high)) {
        $highErr = '*High School Education is Required!';
    }
    if (empty($juniorgrad)) {
        $yeargrad = '*Year is Required!';
    }
    if (empty($shs)) {
        $shsErr = '*Senior High School Education is Required!';
    }
    if (empty($seniorgrad)) {
        $yeargrad = '*Year is Required!';
    }
    if (empty($college)) {
        $collegeErr = '*College Education is Required!';
    }
    if (empty($collegegrad)) {
        $yeargrad = '*Year is Required!';
    }
    if (empty($lastnameErr) && empty($firstnameErr) && empty($middleiniErr) && empty($contactErr) && empty($sectionErr)) {
        $objInfos->user_id = $_SESSION['user']['user_id'];
       
        $objInfos->birthday = $birthday;
        $objInfos->contact = $contact;
        $objInfos->address = $address;  
        $objInfos->email = $email;
        $objInfos->elem = $elem;
        $objInfos->elemgrad = $elemgrad;
        $objInfos->high = $high;
        $objInfos->juniorgrad = $juniorgrad;
        $objInfos->shs = $shs;
        $objInfos->seniorgrad = $seniorgrad;
        $objInfos->college = $college;
        $objInfos->collegegrad = $collegegrad;

        if ($objInfos->add()) {
            // Redirect to the Location: after successful insertion     
            header('Location: skills.php');
        } else {
            // Display an error message if something went wrong during insertion
            echo 'Something went wrong when adding the new product. ';
        }
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
    <div class="container mt-5">
        <div class="img">
            <img src="../img/null.png" alt="">
        </div>

        <h1 class="text-center">Welcome <?php echo $_SESSION["user"]["username"] ?>!</h1>
        <form action="" method="POST">
            <!-- Personal Information -->
            <h3 class="mt-4">Personal Information</h3>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="firstname" class="form-label">First Name <span class="error"><?= $firstnameErr ?></span></label>
                    <input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo $name['firstname']?>" required>
                </div>
                <div class="col-md-6">
                    <label for="lastname" class="form-label">Last Name <span class="error"><?= $lastnameErr ?></span></label>
                    <input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $name['lastname']?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="birthday" class="form-label">Birthday<span class="error"><?= $birthdayErr ?></span></label>
                    <input type="date" id="birthday" name="birthday" class="form-control" placeholder="Enter your Birthday" required>
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label">Email <span class="error"><?= $emailErr ?></span></label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="col-md-4">
                    <label for="contact" class="form-label">Phone <span class="error"><?= $contactErr ?></span></label>
                    <input type="number" id="contact" name="contact" class="form-control" placeholder="Enter your phone number" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address <span class="error"><?= $addressErr ?></span></label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Enter your address">
            </div>

            <!-- Education -->
            <h3 class="mt-4">Education</h3>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="elem" class="form-label">Grade School <span class="error"><?= $elemErr ?></span></label>
                    <input type="text" id="elem" name="elem" class="form-control" placeholder="Enter your Grade School" required>
                </div>
                <div class="col-md-2">
                    <label for="year" class="form-label">Year Graduated <span class="error"><?= $yeargrad ?></span></label>
                    <select name="elemgrad" id="elemgrad" class="form-select">
                        <option value="" disabled selected>Select Year</option>
                        <?php
                        $currentYear = date('Y');
                        $startYear = 1900;
                        for ($year = $currentYear; $year >= $startYear; $year--) {
                            echo "<option value=\"$year\">$year</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="high" class="form-label">Junior High School <span class="error"><?= $highErr ?></label>
                    <input type="text" id="high" name="high" class="form-control" placeholder="Enter your Junior High School" required>
                </div>
                <div class="col-md-2">
                    <label for="year" class="form-label">Year Graduated <span class="error"><?= $yeargrad ?></label>
                    <select name="juniorgrad" id="juniorgrad" class="form-select">
                        <option value="" disabled selected>Select Year</option>
                        <?php
                        $currentYear = date('Y');
                        $startYear = 1900;
                        for ($year = $currentYear; $year >= $startYear; $year--) {
                            echo "<option value=\"$year\">$year</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="shs" class="form-label">Senior High School <span class="error"><?= $shsErr ?></label>
                    <input type="text" id="shs" name="shs" class="form-control" placeholder="Enter your Senior High School" required>
                </div>
                <div class="col-md-2">
                    <label for="year" class="form-label">Year Graduated <span class="error"><?= $yeargrad ?></label>
                    <select name="seniorgrad" id="seniorgrad" class="form-select">
                        <option value="" disabled selected>Select Year</option>
                        <?php
                        $currentYear = date('Y');
                        $startYear = 1900;
                        for ($year = $currentYear; $year >= $startYear; $year--) {
                            echo "<option value=\"$year\">$year</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="college" class="form-label">College <span class="error"><?= $collegeErr ?></label>
                    <input type="text" id="college" name="college" class="form-control" placeholder="Enter your College/University" required>
                </div>
                <div class="col-md-2">
                    <label for="year" class="form-label">Year Graduated <span class="error"><?= $yeargrad ?></label>
                    <select name="collegegrad" id="collegegrad" class="form-select">
                        <option value="" disabled selected>Select Year</option>
                        <?php
                        $currentYear = date('Y');
                        $startYear = 1900;
                        for ($year = $currentYear; $year >= $startYear; $year--) {
                            echo "<option value=\"$year\">$year</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="text-center mt-4">
                <input type="submit" value="Proceed" name="submit">
            </div>
            <br>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>