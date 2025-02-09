
<?php


protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'role' => \Spatie\Permission\Middleware\RoleMiddleware::class, 
    'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class, 
];
