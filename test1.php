<?php

$handle = require 'pubs_connect.php';

// must add a job first
//$sql = 'SELECT * FROM jobs'; 
$sql = 'SELECT employee.fname, employee.lname, jobs.job_desc FROM employee JOIN jobs ON employee.job_id = jobs.job_id';

$jobId = 16; // job created for testing 

$stmt = $handle->prepare($sql); 

$stmt = $handle->query($sql); // execute SQL

// FETCH_ASSOC = index by column name 
$jobs = $stmt->fetchAll(PDO::FETCH_ASSOC); // get array 

if($jobs)
{
    foreach($jobs as $job)
    {
	echo $job['fname'] . ' ' . $job['lname'] . ' --> ' . $job['job_desc'] . '<br>';
       // echo $job['job_desc'] . '-->' . $job['job_id'] .  '<br>'; 
    }
}

//'<br>'

//'<h1> Author Test </h1>'

$handle = null; // close handle 

?> 
