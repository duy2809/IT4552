<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        select {
            width: 60px;
        }
        .name_input {
            width: 180px;
        }
        .container {
            width: 30%;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Enter your name and select date and time for the appointment</p>
        <form>
            <?php
            if (array_key_exists("day", $_GET)) {
                $day = $_GET["day"]; $month = $_GET["month"]; $year = $_GET["year"]; $hour = $_GET["hour"]; $minute = $_GET["minute"]; $second = $_GET["second"];
            }
            ?>
            <table>
                <tr>
                    <td>Your name: </td>
                    <td>
                        <?php
                        if (array_key_exists("day", $_GET)) {
                            $name = $_GET["name"]; 
                            echo "<input class=name_input name=name type=text placeholder=Name... value=$name>";
                        }
                        else echo "<input class=name_input name=name type=text placeholder=Name...>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Date: </td>
                    <td>
                        <select name="day" id="day">
                            <option disabled selected value>Day</option>
                            <?php
                                for ($i = 1; $i <= 31; $i++){
                                    if ($i == $day) {
                                        echo "<option selected value=$i>$i</option>";
                                    }
                                    else echo "<option value=$i>$i</option>";
                                }
                            ?>
                        </select>
                        <select name="month" id="month">
                            <option disabled selected value>Month</option>
                            <?php
                                for ($i = 1; $i <= 12; $i++){
                                    if ($i == $month) {
                                        echo "<option selected value=$i>$i</option>";
                                    } else echo "<option value=$i>$i</option>";
                                }
                            ?>
                        </select>
                        <select name="year" id="year">
                            <option disabled selected value>Year</option>
                            <?php
                                for ($i = 1; $i <= 3000; $i++){
                                    if ($i == $year) {
                                        echo "<option selected value=$i>$i</option>";
                                    } else echo "<option value=$i>$i</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Time: </td>
                    <td>
                        <select name="hour" id="hour">
                            <option disabled selected value>Hour</option>
                            <?php
                                for ($i = 0; $i < 24; $i++){
                                    if ($i == $hour) {
                                        echo "<option selected value=$i>$i</option>";
                                    } else echo "<option value=$i>$i</option>";
                                }
                            ?>
                        </select>
                        <select name="minute" id="minute">
                            <option disabled selected value>Minute</option>
                            <?php
                                for ($i = 0; $i < 60; $i++){
                                    if ($i == $minute) {
                                        echo "<option selected value=$i>$i</option>";
                                    } else echo "<option value=$i>$i</option>";
                                }
                            ?>
                        </select>
                        <select name="second" id="second">
                            <option disabled selected value>Second</option>
                            <?php
                                for ($i = 0; $i < 60; $i++){
                                    if ($i == $second) {
                                        echo "<option selected value=$i>$i</option>";
                                    } else echo "<option value=$i>$i</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <br />
            <input type="submit" value="Submit" />
            <input type="reset" value="Reset" />
        </form>


        <?php

            function checkLeapYear($year)
            {
                if ($year % 400 == 0) return 1;
                if ($year % 4 == 0) return 1;
                else if ($year % 100 == 0) return 0;
                else return 0;
            }              

            if (array_key_exists("day", $_GET)) {
                $date = new DateTime("$hour:$minute:$second $day/$month/$year");
                $date_12hours = $date->format('h:i:s A, m/d/Y');
                $date_24hours = $date->format('H:i:s, m/d/Y');
                
                echo "<p>Hi $name!</p>";
                echo "<p>You have choose to have an appoinment on $date_24hours</p>";
                echo "<p>More information</p>";
                echo "<p>In 12 hour, the time and date is $date_12hours</p>";
                switch($month) {
                    case '4':
                    case '6':
                    case '9':
                    case '11': 
                        echo "<p>This month has 30 days!</p>";
                        break;
                    case '2': {
                        if (checkLeapYear($year) == 1) echo "<p>This month has 29 days!</p>";
                        else echo "<p>This month has 28 days!</p>";
                        break;
                    }
                    default: 
                        echo "<p>This month has 31 days!</p>";
                        break;
                }
            } 
        ?>
        </div>
</body>
</html>