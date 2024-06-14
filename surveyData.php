<?php

include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Calculate the user age form their date of birth
    $dob = $_POST['userDob'];
    $userdob = new DateTime($dob);
    $todaysDate = new DateTime();
    $userAge = $todaysDate->diff($userdob)->y;

    if ($userAge < 5 || $userAge > 120) //Validate the user age
    {
        header("Location: index.php?error=Your age must be greater than 5 and less than 120 to participate in this survey!!!");
        exit();
    } elseif (empty($_POST['foodType'])) //Validate that the user chose their favorite food
    {
        header("Location: index.php?error=Please select at least one favorite food.!");
    } else {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "survey_data";

        $conn = new mysqli($servername, $username, $password, $dbname); //connect to the database

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        /*Collect the user info
        $name = $_POST['userName'];
        $email = $_POST['userEmail'];
        $dob = $userdob->format('Y-m-d');
        $phone = $_POST['userContact'];
        $age = $userAge;
        $fav_food = implode(",", $_POST['foodType']);

        $movies_rate = $_POST['wtchMovie'];
        $radio_rate = $_POST['lstnRadio'];
        $eat_out_rate = $_POST['eatOut'];
        $tv_rate = $_POST['watchTv'];*/

        validateData();

        //Insert the collected data into the database
        $myQuery = $conn->prepare("INSERT INTO survey_users (fullname, email, phone, dob, age, fav_food, movies_rate, radio_rate, eat_out_rate, tv_rate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $myQuery->bind_param("ssssisiiii", $name, $email, $phone, $dob, $age, $fav_food, $movies_rate, $radio_rate, $eat_out_rate, $tv_rate);

        //Confirm if the data is stored into the database
        if ($myQuery->execute()) {
            header("Location: index.php?success=Form submitted successfully!");
        } else {
            header("Location: index.php?error=Error, Failed to Update data to the database!!");
        }

        $stmt->close();
        $conn->close();
        exit();
    }
}
