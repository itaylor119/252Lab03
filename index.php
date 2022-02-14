<?php

// https://www.youtube.com/watch?v=2_dqDpSSpsc

declare ( strict_types =1 );

require_once ('router.php'); // instead of composer 

//use App; 

$router = new router(); 

$router->get("/", function (){

    require_once 'home.html'; 
}); 

$router->get('/about', function (){


    echo 'about page'; 

}); 

$router->get('/ajax', function (){

	require_once 'ajax.html';
});

$router->get('/test1', function(){

	require_once 'test1.php';
});

$router->get('/test', function(){
	require_once 'test.php';
});

$router->get('/getAuthors', function(){
	require_once 'pdo_1_authors.php';
});

$router->get('/author', function (){

	require_once 'author.html';
});

$router->addNotFoundHandler( function ()
{
    require_once '404.html'; 
}
);

$router->post('/authorg', function ($id){
	var_dump($id);
//	require_once 'author.html';
});


$router->run(); 


?>

