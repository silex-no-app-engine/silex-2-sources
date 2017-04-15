<?php

$post = $app['controllers_factory'];

$post->get("/", function(){
	return "Posts Admin";
});

return $post;