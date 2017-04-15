<?php

$user = $app['controllers_factory'];

$user->get("/", function(){
	return "Users Admin";
});

return $user;