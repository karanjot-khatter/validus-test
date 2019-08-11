<?php

define('HST', 'localhost');
define('USR', 'root');
define('PSW', 'root');
define('DBN', 'validus');

$mysqli = null;


//open mysqli connection
function openConnection()
{
    global $mysqli;
    //we connect to the host and select db in one step by creating instance of mysqli
    $mysqli = new mysqli(HST, USR, PSW, DBN);

    if (!isset($mysqli->connect_error)) {
        $dbok = true;
    } else {
        $dbok = false;
    }

    return $dbok;
}

    //close the connection

function closeConnection()
{
    global $mysqli;

    if ($mysqli !== null) {
        $mysqli->close();
    }
}

function getInvestmentFunds()
{
    openConnection();

    global $mysqli;

    //the query below joins to get date information from data call table...

    $q = "SELECT * from data_call";

    $res = $mysqli->query($q);

    if ($res->num_rows > 0)
    {
        //empty array
        $calls = [];

        while ($row = $res->fetch_assoc()) {
            //push rows from database into the array
           $calls[] = $row;
        }
    }
    else {
        echo "0 results";
    }

    closeConnection();

return $calls;
}

function getFundInvestment($callId, $fund) {
    openConnection();

    global $mysqli;

    //the query below joins to get date information from data call table...

    $q = "select dfi.call_id, dc.capital_requirement
from data_call dc
join data_fund_investment dfi on dc.id = dfi.call_id
where dc.call_id = '$callId' and fund_id = '$fund'";

    $res = $mysqli->query($q);

    if ($res->num_rows == 1)
    {

        while ($row = $res->fetch_assoc()) {
            //push rows from database into the array
            closeConnection();
            return $row;
        }
    }

}

function getFundData()
{
    openConnection();

    global $mysqli;

    //the query below joins to get date information from data call table...

    $q = "SELECT * from data_fund";

    $res = $mysqli->query($q);

    if ($res->num_rows > 0)
    {
        //empty array
        $funds = [];

        while ($row = $res->fetch_assoc()) {
            //push rows from database into the array
            $funds[] = $row;
        }
    }
    else {
        echo "0 results";
    }

    closeConnection();

    return $funds;
}



