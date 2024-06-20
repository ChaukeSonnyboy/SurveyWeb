<?php

//Data Cleaning
function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function calcAge()
{
    $dob = $_POST['userDob'];
    $userdob = new DateTime($dob);
    $todaysDate = new DateTime();
    $userAge = $todaysDate->diff($userdob)->y;

    return $userAge;
}

//Data Validation
function validateData()
{
    // Check Date of Birth
    if (empty($_POST["userDob"])) {
        return "Please enter your Date of Birth!";
    } else {

        $age = calcAge();


        if ($age < 5 || $age > 120) {
            return "Your age is restricted in this survey!";
        }
    }

    // Check Name
    if (empty($_POST["userName"])) {
        return "Please enter your Name!";
    }

    // Check Email
    if (empty($_POST["userEmail"])) {
        return "Please enter your email!";
    }
    // Check Contact Number
    if (empty($_POST["userContact"])) {
        return "Please enter your cellphone!";
    }

    // Check Favorite Food
    if (empty($_POST["foodType"])) {
        return "Please select at least one favorite food!";
    }

    // Check Movie Rating
    if (empty($_POST["wtchMovie"])) {
        return "Movies rate is Required!";
    }

    // Check Radio Rating
    if (empty($_POST["lstnRadio"])) {
        return "Radio rate is Required!";
    }

    // Check Eat Out Rating
    if (empty($_POST["eatOut"])) {
        return "Eat out rate is Required!";
    }

    // Check TV Rating
    if (empty($_POST["watchTv"])) {
        return "Watching TV rate is Required!";
    }

    // If all validations pass
    return true;
}
