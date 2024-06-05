<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $dob = $_POST['userDob'];
    $userdob = new DateTime($dob);
    $todaysDate = new DateTime();
    $userAge = $todaysDate->diff($userdob)->y;

    if ($userAge < 5 || $userAge > 120)
    {
        header("Location: index.php?error=Your age must be greater than 5 and less than 120 to participate in this survey!!!");
        exit();

    }elseif(empty($_POST['foodType'])) 
    {
        header("Location: index.php?error=Please select at least one favorite food.!");

    }else
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "survey_data";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $_POST['userName'];
        $email = $_POST['userEmail'];
        $dob = $_POST['userDob'];
        $phone = $_POST['userContact'];
        $age = $userAge;
        $fav_food = implode(",", $_POST['foodType']);

        $movies_rate = $_POST['wtchMovie'];
        $radio_rate = $_POST['lstnRadio'];
        $eat_out_rate = $_POST['eatOut'];
        $tv_rate = $_POST['watchTv'];

        $sql = "INSERT INTO survey_users(fullname, email,phone, dob, age, fav_food, movies_rate, radio_rate, eat_out_rate, tv_rate)
        VALUES ('$name', '$email', $phone,  '$dob', $age, '$fav_food', $movies_rate, $radio_rate, $eat_out_rate, $tv_rate)";
        
        $conn->close();

        header("Location: index.php?success=Form submitted successfully!");
        exit();
    }

}
?>
