<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="pass.css">
    <title>Show/Hide Password</title>
    <style>
        .parent {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-template-rows: repeat(5, 1fr);
    gap: 8px;
}
    
.div1 {
    grid-column: span 2 / span 2;
    grid-row: span 4 / span 4;
    background-color: red;
}

.div2 {
    grid-column: span 3 / span 3;
    grid-column-start: 1;
    grid-row-start: 5;
    background-color: blue;
}

.div3 {
    grid-column: span 2 / span 2;
    grid-row: span 2 / span 2;
    grid-column-start: 3;
    grid-row-start: 1;
    background-color: violet;
}

.div4 {
    grid-column: span 2 / span 2;
    grid-row: span 2 / span 2;
    grid-column-start: 3;
    grid-row-start: 3;
    background-color: orange;
}

.div5 {
    grid-row: span 3 / span 3;
    grid-column-start: 5;
    grid-row-start: 1;
    background-color: green;
}

.div6 {
    grid-column-start: 5;
    grid-row-start: 4;
    background-color: yellow;
}

.div7 {
    grid-column-start: 5;
    grid-row-start: 5;
    background-color: indigo;
}

.div8 {
    grid-column-start: 4;
    grid-row-start: 5;
    background-color: aqua;
}
        
    </style>
</head>
<body>
<div data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">
</div>
    

<div class="parent">
    <div class="div1">1</div>
    <div class="div2">2</div>
    <div class="div3">3</div>
    <div class="div4">4</div>
    <div class="div5">5</div>
    <div class="div6">6</div>
    <div class="div7">7</div>
    <div class="div8">8</div>
</div>

<br>
<br>
    <label for="password">Password:</label>
    <input type="password" id="password" placeholder="Enter your password">
    <button onclick="togglePassword()">Show</button>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const toggleButton = document.querySelector("button");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.textContent = "Hide";
            } else {
                passwordField.type = "password";
                toggleButton.textContent = "Show";
            }
        }
    </script>
</body>
</html>

 -->
<!-- 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ease-Out Animation</title>
    <style>
        /* Keyframes for the animation */
        @keyframes slideIn {
            from {
                transform: translateY(100%);
                opacity: 10;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Animated box */
        .box {
            width: 100px;
            height: 100px;
            background-color: royalblue;
            animation: slideIn 1.5s ease-out;
        }
    </style>
</head>
<body>
    <div class="box"></div>
</body>
</html> -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Resume Form</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Resume Form</h1>
        <form action="submit_resume.php" method="POST">
           
            <h3 class="mt-4">Personal Information</h3>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter your first name" required>
                </div>
                <div class="col-md-6">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter your last name" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="date" id="birthday" name="birthday" class="form-control" placeholder="Enter your Birthday" required>
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="col-md-4">
                    <label for="contact" class="form-label">Phone</label>
                    <input type="number" id="contact" name="contact" class="form-control" placeholder="Enter your phone number" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Enter your address">
            </div>


            <h3 class="mt-4">Education</h3>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="elem" class="form-label">Grade School</label>
                    <input type="text" id="elem" name="elem" class="form-control" placeholder="Enter your Grade School" required>
                </div>
                <div class="col-md-2">
                    <label for="school" class="form-label">Year Graduated</label>
                    <input type="date" id="school" name="school" class="form-control" placeholder="Enter your school/university" required>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="high" class="form-label">Junior High School</label>
                    <input type="text" id="high" name="high" class="form-control" placeholder="Enter your Junior High School" required>
                </div>
                <div class="col-md-2">
                    <label for="high" class="form-label">Year Graduated</label>
                    <input type="date" id="school" name="school" class="form-control" placeholder="Enter your school/university" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="shs" class="form-label">Senior High School</label>
                    <input type="text" id="shs" name="shs" class="form-control" placeholder="Enter your Senior High School" required>
                </div>
                <div class="col-md-2">
                    <label for="high" class="form-label">Year Graduated</label>
                    <input type="date" id="school" name="school" class="form-control" placeholder="Enter your school/university" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="college" class="form-label">College</label>
                    <input type="text" id="college" name="college" class="form-control" placeholder="Enter your College/University" required>
                </div>
                <div class="col-md-2">
                    <label for="high" class="form-label">Year Graduated</label>
                    <input type="date" id="school" name="school" class="form-control" placeholder="Enter your school/university" required>
                </div>
            </div>


           
            <h3 class="mt-4">Work Experience</h3>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="jobtitle" class="form-label">Job Title</label>
                    <input type="text" id="jobtitle" name="jobtitle" class="form-control" placeholder="Enter your job title">
                </div>
                <div class="col-md-6">
                    <label for="company" class="form-label">Company</label>
                    <input type="text" id="company" name="company" class="form-control" placeholder="Enter your company">
                </div>
            </div>
            <div class="mb-3">
                <label for="jobdesc" class="form-label">Job Description</label>
                <textarea id="jobdesc" name="jobdesc" class="form-control" rows="3" placeholder="Describe your responsibilities"></textarea>
            </div>

     
            <h3 class="mt-4">Skills</h3>
            <div class="mb-3">
                <label for="skills" class="form-label">List your skills (separated by commas)</label>
                <input type="text" id="skills" name="skills" class="form-control" placeholder="e.g., HTML, CSS, JavaScript, Photoshop">
            </div>


            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Submit Resume</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Year</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Select Year</h1>
        <form action="submit_year.php" method="POST">
            <div class="mb-3">
                <label for="year" class="form-label">Choose a Year</label>
                <select name="year" id="year" class="form-select">
                    <option value="" disabled selected>Select Year</option>
                    <?php
                    $currentYear = date('Y'); // Get current year
                    $startYear = 1900;       // Define the starting year
                    for ($year = $currentYear; $year >= $startYear; $year--) {
                        echo "<option value=\"$year\">$year</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
                    