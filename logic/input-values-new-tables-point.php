<?php
    session_start();

    include 'Points.php';

    $userId = $_SESSION['id'];
    $month = $_POST['dateMonth'];
    $day = $_POST['day'];
    $firstTime = $_POST['time1'];
    $secondTime = $_POST['time2'];
    $thirdTime = $_POST['time3'];
    $fourthTime = $_POST['time4'];

    $newDate = new Points($userId, $month, $day, $firstTime, $secondTime, $thirdTime, $fourthTime);
    $tryCreate = $newDate->newMonthTime();
    if($tryCreate == 1){
        echo 1;
    }
?>