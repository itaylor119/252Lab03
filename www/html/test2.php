<?php

$sql = 'SELECT * FROM employee WHERE emp_id = :auid'; 

$user = 'student';
$password = 'nhti'; 
$target = 'mysql:host=localhost;port=3306;dbname=pubs'; 


$authorID = $url['emp_id']; 

// open database connection
$handle = new PDO($target, $user, $password); 

$stmt = $handle->prepare($sql); 

$stmt->bindParam(':auid', $authorID, PDO::PARAM_STR); 

$stmt->execute(); 

// FETCH_ASSOC = index by column name 
$authors = $stmt->fetchAll(PDO::FETCH_ASSOC); // get array 

if($authors) // we have an array 
{
    foreach($authors as $au) // note array on left and object on right
    {
        echo $au['fname'] . '<br>'; 
	var_dump($url);
    }
}

$handle = null; // close handle 

?> 
