    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "survey_data";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM survey_users";


    $result = $conn->query($sql);

    if ($result->num_rows > 0) //Check if our database is not empty
    {
        $surveys_tot = $result->num_rows;
        $age_tot = 0;
        $oldest_user = 0;
        $youngest_user = 120;
        $pizza_count = 0;
        $pasta_count = 0;
        $pap_wors_count = 0;
        $movies_rate_count = 0;
        $radio_rate_count = 0;
        $eat_out_rate_count = 0;
        $tv_rate_count = 0;

        while ($row = $result->fetch_assoc()) {
            $age_tot += $row["age"];

            if ($row["age"] > $oldest_user) {
                $oldest_user = $row["age"];
            }

            if ($row["age"] < $youngest_user) {
                $youngest_user = $row["age"];
            }

            if (strpos($row["fav_food"], "Pizza") !== false) {
                $pizza_count++;
            }

            if (strpos($row["fav_food"], "Pasta") !== false) {
                $pasta_count++;
            }

            if (strpos($row["fav_food"], "PapWors") !== false) {
                $pap_wors_count++;
            }

            if ($row["movies_rate"] < 4) {
                $movies_rate_count++;
            }

            if ($row["radio_rate"] < 4) {
                $radio_rate_count++;
            }
            if ($row["eat_out_rate"] < 4) {
                $eat_out_rate_count++;
            }
            if ($row["tv_rate"] < 4) {
                $tv_rate_count++;
            }
        }

        $pizza_perc = ($pizza_count / $surveys_tot) * 100;
        $pasta_perc = ($pasta_count / $surveys_tot) * 100;
        $pap_wors_perc = ($pap_wors_count / $surveys_tot) * 100;

        $age_avg = $age_tot / $surveys_tot;
        $movies_rate_avg = $movies_rate_count / $surveys_tot;
        $radio_rate_avg = $radio_rate_count / $surveys_tot;
        $eat_out_avg = $eat_out_rate_count / $surveys_tot;
        $tv_rate_avg = $tv_rate_count / $surveys_tot;


    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title>Survey Results</title>
            <link rel="stylesheet" href="style.css">

        </head>

        <body>
            <form>

                <div class="resultsContent">

                    <div class="heading">
                        <div class="left_heading">_Surveys</div>
                        <div class="right_heading">
                            <a href="index.php">FILL OUT SURVEY</a>
                            <a href="surveyResults.php">VIEW SURVEY RESULTS</a>
                        </div>
                    </div>

                    <div class="resultsHeading">
                        <h1>Survey Results</h1>
                    </div>

                </div>

                <!-- Displaying our results from the database -->

                <div class="tables">

                    <div class="surveyStats">
                        <table>
                            <tr>
                                <td>Total number of surveys : </td>
                                <td> <?php echo $surveys_tot ?></td>
                            </tr>
                            <tr>
                                <td>Average age: </td>
                                <td><?php echo round($age_avg, 1) ?></td>
                            </tr>
                            <tr>
                                <td>Oldest person who participated in survey : </td>
                                <td><?php echo $oldest_user ?></td>
                            </tr>
                            <tr>
                                <td>Youngest person who participated in survey : </td>
                                <td><?php echo $youngest_user ?></td>
                            </tr>
                        </table>
                    </div>

                    <div class="favFoodStats">
                        <table>
                            <tr>
                                <td>Percentage of people who like Pizza : </td>
                                <td><?php echo round($pizza_perc, 1) ?> % </td>
                            </tr>
                            <tr>
                                <td> Percentage of people who like Pasta : </td>
                                <td> <?php echo round($pasta_perc, 1) ?> %</td>
                            </tr>
                            <tr>
                                <td>Percentage of people who like Pap and Wors : </td>
                                <td><?php echo round($pap_wors_perc, 1) ?> %</td>
                            </tr>

                        </table>
                    </div>

                    <div class="ratingStats">
                        <table>
                            <tr>
                                <td>People who like to watch movies : </td>
                                <td><?php echo round($movies_rate_avg, 1) ?></td>
                            </tr>
                            <tr>
                                <td> People who like to listen to radio : </td>
                                <td><?php echo round($radio_rate_avg, 1) ?></td>
                            </tr>
                            <tr>
                                <td>People who like to eat out : </td>
                                <td><?php echo round($eat_out_avg, 1) ?></td>
                            </tr>
                            <tr>
                                <td>People who like to watch TV : </td>
                                <td><?php echo round($tv_rate_avg, 1) ?></td>
                            </tr>

                        </table>
                    </div>
                </div>

            </form>

        </body>

        </html>

    <?php


    } else { ?>

        <head>
            <meta charset="UTF-8">
            <title>Survey Results</title>
            <link rel="stylesheet" href="style.css">

        </head>

        <body>
            <form>

                <div class="resultsContent">

                    <div class="heading">
                        <div class="left_heading">_Surveys</div>
                        <div class="right_heading">
                            <a href="index.php">FILL OUT SURVEY</a>
                            <a href="surveyResults.php">VIEW SURVEY RESULTS</a>
                        </div>
                    </div>

                    <div class="resultsHeading">
                        <h1>Survey Results</h1>
                    </div>

                </div>

                <h3>No Surveys Available</h3>

            </form>

        </body>

        </html>


    <?php
    }

    $conn->close();
    ?>