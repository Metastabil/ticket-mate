<?php

$routes[] = ['BaseController', 'welcome'];

$routes['users'] = ['Users', 'index'];
$routes['create-user'] = ['Users', 'create'];
$routes['show-user/:id'] = ['Users', 'show'];
$routes['update-user/:id'] = ['Users', 'update'];
$routes['delete-user/:id'] = ['Users', 'delete'];

return $routes;