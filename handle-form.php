<?php

require 'Post.php';
require 'PostLoad.php';
$loader = new PostLoader();
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']))
{
    $loader->addPosts(new Post($_POST['author'], $_POST['message-content'], $_POST['title']));
    $loader->saveMessages();
}