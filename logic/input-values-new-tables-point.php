<?php
    session_start();

    include 'Points.php';

    $userId = $_SESSION['id'];
    $month = $_POST['dateMonth'];
    if($month[0] == 0){
        $month = substr($month, 1);
    }
    $day = $_POST['day'];
    $firstTime = $_POST['time1'];
    $secondTime = $_POST['time2'];
    $thirdTime = $_POST['time3'];
    $fourthTime = $_POST['time4'];

    $newDate = new Points($userId);
    $tryCreate = $newDate->newMonthTime($month, $day, $firstTime, $secondTime, $thirdTime, $fourthTime);
    if($tryCreate == 1){
        echo 1;
    }
?>