<?php

//header of document - displayed on every page, due to consistency..
include_once("includes/header.html");

include_once("includes/dashboard.phtml");

if (isset($_POST['cId'])) {
    insertCallData();
}


function insertCallData() {

    $callID = $_POST['cId'];
    $capital = $_POST['capital'];
    $date = $_POST['date'];
    $investmentName = $_POST['name'];

    $mysqli = new mysqli(HST, USR, PSW, DBN);

    $q = "INSERT INTO data_call (id, call_id, `date`, investment_name, capital_requirement)
VALUES ('$callID', '$callID', '$date', '$investmentName','$capital')";

        $res = $mysqli->query($q);

        if ($res->num_rows > 0)
        {
            //empty array
            $investment = [];

            while ($row = $res->fetch_assoc()) {
                //push rows from database into the array
                $investment[] = $row;
            }
        }

        $mysqli->close();

        return $investment;

}

?>


