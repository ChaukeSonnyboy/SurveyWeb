<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Survey Form</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <form action="surveyData.php" method="POST">

        <div class="heading">
            <div class="left_heading">_Surveys</div>
            <div class="right_heading">
                <a href="index.php">FILL OUT SURVEY</a>
                <a href="surveyResults.php">VIEW SURVEY RESULTS</a>
            </div>
        </div>

        <?php if (isset($_GET['error'])) { ?>
            <div class="error visible">
                <?php echo htmlspecialchars($_GET['error']); ?>
                <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
            <div class="success visible">
                <?php echo htmlspecialchars($_GET['success']); ?>
                <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        <?php } ?>


        <div class="formContent">

            <div class="userDetails">

                <div>
                    <p>Personal Details:</p>
                </div>

                <div class="userInfo">
                    <label for="userName">Full Names</label><br>
                    <input type="text" id="userName" name="userName" required><br>
                    <label for="userEmail">Email</label><br>
                    <input type="email" id="userEmail" name="userEmail" required><br>
                    <label for="userDob">Date of Birth</label><br>
                    <input type="date" id="userDob" name="userDob" required><br>
                    <label for="userContact">Contact Number</label><br>
                    <input type="tel" id="userContact" name="userContact" required><br>
                </div>

            </div>

            <div class="foodType">

                <div class="favFood">
                    <p>What is your favorite food?</p>
                </div>

                <div class="userFavFood">
                    <input type="checkbox" id="pizza" name="foodType[]" value="Pizza">
                    <label for="pizza">Pizza</label>
                    <input type="checkbox" id="pasta" name="foodType[]" value="Pasta">
                    <label for="pasta">Pasta</label>
                    <input type="checkbox" id="papWors" name="foodType[]" value="PapWors">
                    <label for="papWors">Pap and Wors</label>
                    <input type="checkbox" id="other" name="foodType[]" value="Other">
                    <label for="other">Other</label>
                </div>
            </div>

            <div class="rateAgreement">
                <p>Please rate your level of agreement on a scale from 1 to 5, with 1 being "strongly agree" and 5 being "strongly disagree."</p>
                <table>
                    <tr>
                        <th class="h1"></th>
                        <th class="otherh">Strongly Agree</th>
                        <th class="otherh">Agree</th>
                        <th class="otherh">Neutral</th>
                        <th class="otherh">Disagree</th>
                        <th class="otherh ">Strongly Disagree</th>
                    </tr>
                    <tr>
                        <td class="rateType">I like to watch movies</td>
                        <td><input type="radio" name="wtchMovie" value="1" required></td>
                        <td><input type="radio" name="wtchMovie" value="2"></td>
                        <td><input type="radio" name="wtchMovie" value="3"></td>
                        <td><input type="radio" name="wtchMovie" value="4"></td>
                        <td><input type="radio" name="wtchMovie" value="5"></td>
                    </tr>
                    <tr>
                        <td class="rateType">I like to listen to radio</td>
                        <td><input type="radio" name="lstnRadio" value="1" required></td>
                        <td><input type="radio" name="lstnRadio" value="2"></td>
                        <td><input type="radio" name="lstnRadio" value="3"></td>
                        <td><input type="radio" name="lstnRadio" value="4"></td>
                        <td><input type="radio" name="lstnRadio" value="5"></td>
                    </tr>
                    <tr>
                        <td class="rateType">I like to eat out</td>
                        <td><input type="radio" name="eatOut" value="1" required></td>
                        <td><input type="radio" name="eatOut" value="2"></td>
                        <td><input type="radio" name="eatOut" value="3"></td>
                        <td><input type="radio" name="eatOut" value="4"></td>
                        <td><input type="radio" name="eatOut" value="5"></td>
                    </tr>
                    <tr>
                        <td class="rateType">I like to watch TV</td>
                        <td><input type="radio" name="watchTv" value="1" required></td>
                        <td><input type="radio" name="watchTv" value="2"></td>
                        <td><input type="radio" name="watchTv" value="3"></td>
                        <td><input type="radio" name="watchTv" value="4"></td>
                        <td><input type="radio" name="watchTv" value="5"></td>
                    </tr>
                </table>
            </div>
        </div>

        <button type="submit">SUBMIT</button>

    </form>

</body>

</html>