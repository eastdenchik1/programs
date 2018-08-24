<?php


$config = array (
    'title' => 'Блог Дениса Свиридова',
    'VK_URL' => 'https://vk.com/badwolf4500',
    'users' => array(
        'login' => 'admin',
        'password' => '1234'
    ),
    'db' => array(
        'server' => 'localhost',
        'user' => 'root',
        'password' => '',
        'dbname' => 'blog_course'
    ),
);

require "db.php";