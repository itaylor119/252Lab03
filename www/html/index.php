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

$router->get('/authors', function(){
	require_once 'authors.html';
});

$router->get('/books', function(){
	require_once 'books.html';
});

$router->addNotFoundHandler( function ()
{
    require_once '404.html'; 
}
);

$router->get('/home', function(){
	require_once 'Template.html';
});

$router->get('/authorg', function ($url){
//	if (isset($router->get['help'])
	if ($url)
{
//	echo 'help passed.' . '</br>';
//	var_dump($url);
	require_once 'test2.php';
}
	else
{
	echo 'help failed.';
}

//	var_dump($id);
});

$router->post('/authorg', function ($id){
//	var_dump($id);
	require_once 'addAu.php';
//	echo 'help';
//	header( 'authors.html';
//	header('Location: testAu.html');
//	exit;
//	require_once 'testAu.php';
});
$router->get('/testAu', function(){
	require_once 'testAu.html';
});


$router->run(); 


?>

