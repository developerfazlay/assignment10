<?php


// messageValidation for message alert
function messageValidation($message, $alertType){
        $alertMessage = "<div class=\"alert alert-{$alertType} alert-dismissible fade show\" role=\"alert\">
        {$message}!
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button> </div>";

    return $alertMessage;
}

// Check Email Validation 
function validateEmail($mail){
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

//  filterEduMail for check Educational Mail
function filterEduMail($mail){
    $validEduMail = ['diu.edu.bd', 'brac.edu.bd', 'nsu.edu.bd', 'green.edu.bd', 'du.edu.bd'];
    $mail_arr  = explode('@', $mail, 2);

    if (in_array($mail_arr[1], $validEduMail)) {
        return true;
    } else {
        return false;
    }
}


if (isset($_POST['submit'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['pass'];
    $phone    = $_POST['phone'];

    if ($name == '' || $email == '' || $password == '' || $phone == '') {
        $validMessage = messageValidation("All fields are required", "danger");
    } elseif (validateEmail($email) == false) {
        $validMessage = messageValidation("Email is not valid", "warning");
    } elseif (filterEduMail($email) == false) {
        $validMessage = messageValidation("Email is not a educational mail", "warning");
    } else {
        $validMessage = messageValidation("Form submission successfull", "success");
    }

   
}


?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registration From</title>
    <style>
    .middle-container {
        width: 550px;
    }
    </style>
</head>

<body>

    <div class="registration-form my-5">

        <div class="d-flex align-items-center justify-content-center">
            <div class="middle-container">
                <div class="row">
                    <div class="col-12">
                        <form class=" shadow p-4" action="" method="POST">

                            <h3 class="title text-center mb-3">Registration Form</h3>

                            <p class="text-center ">
                            <?php
                            if (isset($validMessage)) {
                                echo "$validMessage";
                            }
                            ?>
                            </p>

                            <label class="form-label text-muted" for="name">Name : </label>
                            <input class="form-control" type="text" name="name" id="name">

                            <label class="form-label text-muted" for="email">Email : </label>
                            <input class="form-control" type="email" name="email" id="email">

                            <label class="form-label text-muted" for="pass">Password : </label>
                            <input class="form-control" type="Password" name="pass" id="password">

                            <label class="form-label text-muted" for="phone">Phone : </label>
                            <input class="form-control" type="number" name="phone" id="phone">

                            <input class="btn btn-success mb-3 mt-5" type="submit" name="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>