<?php

//Data Cleaning
function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Data Validation

function validateData()
{
    if (empty($_POST["userName"])) {
        header("Location: index.php?error=Please enter your Name!");
    } else {
        $name = cleanData($_POST["userName"]);
    }

    if (empty($_POST["userEmail"])) {
        header("Location: index.php?error=Please enter your email!");
    } else {
        $email = cleanData($_POST["userEmail"]);
    }

    if (empty($_POST["userContact"])) {
        header("Location: index.php?error=Please enter your cellphone!");
    } else {
        $phone = cleanData($_POST["userContact"]);
    }

    if (empty($_POST["foodType"])) {
        header("Location: index.php?error=Please select at least one favorite food!");
    } else {
        //$fav_food = cleanData($_POST["foodType"]);
        $fav_food = implode(cleanData(",", $_POST['foodType']));
    }

    if (empty($_POST["wtchMovie"])) {
        header("Location: index.php?error=Movies rate is Required!");
    } else {
        $movies_rate = cleanData($_POST["wtchMovie"]);
    }

    if (empty($_POST["lstnRadio"])) {
        header("Location: index.php?error=Radio rate is Required!");
    } else {
        $radio_rate = cleanData($_POST["lstnRadio"]);
    }
    if (empty($_POST["eatOut"])) {
        header("Location: index.php?error=Eat out rate is Required!");
    } else {
        $eat_out_rate = cleanData($_POST["eatOut"]);
    }
    if (empty($_POST["watchTv"])) {
        header("Location: index.php?error=Watching TV rate is Required!");
    } else {
        $tv_rate = cleanData($_POST["watchTv"]);
    }
}
