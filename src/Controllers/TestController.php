<?php

$test = $app['controllers_factory'];

$test->get("/", function(){
	return "tests Admin";
});

return $test;