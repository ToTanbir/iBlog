<?php
include 'includes/header.inc';

$requestUri = $_SERVER['REQUEST_URI'];
$uriSegment = explode('?', $requestUri);
$uri = $uriSegment[0];

$uri = $uri == '/'?'home':$uri;
$uri = $uri == '/'?'login':$uri;
$uri = $uri == '/'?'post':$uri;
$uri = $uri == '/'?'login':$uri;
$uri = $uri == '/'?'profile':$uri;
$uri = $uri == '/'?'comment':$uri;
$uri = $uri == '/'?'logout':$uri;
$uri = $uri == '/'?'edit':$uri;
$uri = $uri == '/'?'delete':$uri;

$page = $uri . '.page.php';

if(file_exists('pages/' . $page)) {
    require 'pages/' . $page;
}



include 'includes/footer.inc';