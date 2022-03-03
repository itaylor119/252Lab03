<?php

// https://www.youtube.com/watch?v=2_dqDpSSpsc

declare ( strict_types =1 );

require_once ('router.php'); // instead of composer 

//use App; 

$router = new router(); 

$router->get("/", function (){

    require_once 'template.html'; 
}); 

$router->get('/about', function (){


    echo 'about page'; 

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

$router->get('/authord', function($url){
	require_once 'authorDetail.html';
});

$router->get('/authorg', function ($url){
	if ($url)
{

	require_once 'test2.php';
}
	else
{
	echo 'help failed.';
}

});

$router->post('/authorg', function ($data){
	$action = 2;
	require_once 'repo.php';
});

$router->get('/addauthor', function(){
	require_once 'addAuthor.html';
});

$router->run(); 


?>

