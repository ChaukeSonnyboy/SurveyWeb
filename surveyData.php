<?php

include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form data
    $validationResult = validateData();

    if ($validationResult === true) {

        // If validation succeeds, proceed to insert data into the database

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "survey_data";

        // Connect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Assign values from $_POST to variables
        $name = cleanData($_POST["userName"]);
        $email = cleanData($_POST["userEmail"]);
        $phone = cleanData($_POST["userContact"]);

        //date validation
        $dob = $_POST["userDob"];
        $age = calcAge();
        $fav_food = cleanData(implode(",", $_POST['foodType']));
        $movies_rate = cleanData($_POST["wtchMovie"]);
        $radio_rate = cleanData($_POST["lstnRadio"]);
        $eat_out_rate = cleanData($_POST["eatOut"]);
        $tv_rate = cleanData($_POST["watchTv"]);

        // Prepare SQL statement for inserting data
        $myQuery  = $conn->prepare("INSERT INTO survey_users (fullname, email, phone, dob, age, fav_food, movies_rate, radio_rate, eat_out_rate, tv_rate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters to the prepared statement
        $myQuery->bind_param("ssssisiiii", $name, $email, $phone, $dob, $age, $fav_food, $movies_rate, $radio_rate, $eat_out_rate, $tv_rate);

        // Execute the statement to insert data
        if ($myQuery->execute()) {
            header("Location: index.php?success=Form submitted successfully!");
            exit();
        } else {
            header("Location: index.php?error=Error, Failed to update data to the database!!");
            exit();
        }

        // Close query and database connection
        $myQuery->close();
        $conn->close();
    } else {

        header("Location: index.php?error=" . urlencode($validationResult));
        exit();
    }
}
