<?php

define('HST', 'localhost');
define('USR', 'root');
define('PSW', 'root');
define('DBN', 'validus');

$mysqli = null;


//open mysqli connection
//used as a private function...
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
//used as a private function...
function closeConnection()
{
    global $mysqli;

    if ($mysqli !== null) {
        $mysqli->close();
    }
}

/*
 * @desc - The query gets all data from the data_call table
 *  Used globally in call.phtml
 * @return - array of data_call data
 */
function getDataCall()
{
    openConnection();

    global $mysqli;

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

/*
 * @desc - The query below gets call ID and investment_amount from data fund investment table...
 *  Used globally in call.phtml
 * @return - one array of information, if data exists... otherwise returns null
 * @params - $callId & $fund
 */
function getFundInvestment($callId, $fund) {
    openConnection();

    global $mysqli;

    $q = "select dfi.call_id, dfi.investment_amount
from data_fund_investment dfi
where dfi.call_id = '$callId' and dfi.fund_id = '$fund'";

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

/*
 * @desc -  The query gets all data from the data_fund table.
  *  Used globally in call.phtml
 * @return - The 4 arrays populated in the data_fund table...
 */
function getFundData()
{
    openConnection();

    global $mysqli;

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

/*
 * @desc -  The query gets all data from the data_commitment table.
 * Used globally in call.phtml
 * @return - The 5 arrays populated in the data_fund table...
 */
function getCommitmentData()
{
    openConnection();

    global $mysqli;

    $q = "SELECT * from data_commitment";

    $res = $mysqli->query($q);

    if ($res->num_rows > 0)
    {
        //empty array
        $commitment = [];

        while ($row = $res->fetch_assoc()) {
            //push rows from database into the array
            $commitment[] = $row;
        }
    }
    else {
        echo "0 results";
    }

    closeConnection();

    return $commitment;
}

/*
 * @desc - The query below gets info from data fund investment table, if a match in commitment id..
 *  Used globally in call.phtml
 * @return - array of info... null if not exists
 * @params -$commitmentId
 */
function getCommitmentInvestment($commitmentId) {
    openConnection();

    global $mysqli;

    $q = "SELECT * from data_fund_investment dfi
where dfi.commitment_id = '$commitmentId'";

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

    closeConnection();

    return $investment;

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

function insertInvestmentData() {

    $notice = $_POST['notice'];
    $commitmentId = $_POST['commitmentId'];
    $fundId = $_POST['fundId'];
    $callId = $_POST['cId'];

    $mysqli = new mysqli(HST, USR, PSW, DBN);

    $q = "INSERT INTO data_fund_investment (id, call_id, commitment_id, fund_id, investment_amount)
VALUES ('', '$callId', '$commitmentId', '$fundId','$notice')";

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

function getLastDataCall()
{
    openConnection();

    global $mysqli;

    $q = "SELECT * from data_call ORDER BY id DESC LIMIT 1 ";

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




