<?php
/*
Cheesy action variable to quickly decide which function to use:
Action 0 --> get all
Action 1 --> get one
Action 2 --> add
Action 3 --> delete
*/
$handle = require 'pubs_connect.php';
//$action = 0;

//var_dump($handle);
//var_dump($data);
//var_dump($action);

if ($action == 1)
{
    $au = getAu($url, $handle);
}
if ($action == 2) 
{
    addAu($data, $handle);
}
if ($action == 3)
{
    delAu($data, $handle);
}
if ($action == 0)
{
    $author = getAus($handle);
}


$handle = null; // close handle 

function getAus($h)
{
    $sql = 'SELECT * FROM authors';

    $stmt = $h->prepare($sql); 

    $stmt = $h->query($sql); // execute SQL

    // FETCH_ASSOC = index by column name 
    $allAu = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $allAu;
}

function getAu($a, $h)
{
    $sql = 'SELECT * FROM authors WHERE au_lname = :lname AND au_fname = :fname';

    $stmt = $h->prepare($sql); 

    $stmt->bindParam(':lname', $a["lname"], PDO::PARAM_STR);
    $stmt->bindParam(':fname', $a["fname"], PDO::PARAM_STR);

    $stmt->execute();

    // FETCH_ASSOC = index by column name 
    $allAu = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $allAu;   
}


function addAu($au, $h)
{
    //var_dump($au);
    //var_dump($h);
    //Cheesey code to make contract work whether true or false
    
    if ($au["contract"] == '1')
    {    
        $sql = 'INSERT INTO authors ' . 
        'VALUES(:id, :lnm, :fnm, :phn, :addr, :cit, :stt, :zp, 1)'; 
    }
    else
    {
        $sql = 'INSERT INTO authors ' . 
        'VALUES(:id, :lnm, :fnm, :phn, :addr, :cit, :stt, :zp, 0)'; 
    }

    //values to be injected
    $stmt = $h->prepare($sql); 

    $stmt->execute(

        [
            ':id' => $au["id"],
            ':lnm' => $au["lname"],
            ':fnm' => $au["fname"],
            ':phn' => $au["phone"],
            ':addr' => $au["address"],
            ':cit' => $au["city"],
            ':stt' => $au["state"],
            ':zp' => $au["zip"]
        ]

    ); 
}

function delAu($au, $h)
{
    $sql = 'DELETE FROM authors WHERE au_id = :id';

    $stmt = $h->prepare($sql); 

    $stmt->bindParam(':id', $au["id"], PDO::PARAM_STR);

    $stmt = $h->query($sql); // execute SQL

    $stmt->execute(

        [
            ':id' => $au["id"]
        ]
    );  
}
?> 