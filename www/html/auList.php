<?php

$handle = require 'pubs_connect.php';

// must add a job first
//$sql = 'SELECT * FROM jobs'; 
$sql = 'SELECT * FROM authors';

$jobId = 16; // job created for testing 

$stmt = $handle->prepare($sql); 

$stmt = $handle->query($sql); // execute SQL

// FETCH_ASSOC = index by column name 
$author = $stmt->fetchAll(PDO::FETCH_ASSOC); // get array 

//if($author)
//{
  //  foreach($author as $au)
   // {
     //   $query_string = '?help=' . urlencode('true') . '&emp_id=' . urlencode($job['emp_id']);
       // echo $job['fname'] . ' ' . $job['lname'] . ' --> ' . $job['job_desc'] . $job['emp_id'] .  '<br>'
       // . '<a href = "http://127.0.0.1/authorg' . htmlentities($query_string) . '"> About me  </a>' . '<br>';
       // echo $job['job_desc'] . '-->' . $job['job_id'] .  '<br>'; 
   // }
//}

//'<br>'

//'<h1> Author Test </h1>'

$handle = null; // close handle 

?> 
