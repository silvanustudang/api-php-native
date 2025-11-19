<?php
namespace Src\Middlewares;
use Src\Helpers\Response;
use Src\Helpers\Jwt;

class AuthMiddleware {
    public static function auth(array $cfg) {
        $hdr = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        if (!preg_match('/Bearer\s+(.+)/', $hdr, $m)) 
            Response::jsonError(401, 'Missing token');

        $pl = Jwt::verify($m[1], $cfg['app']['jwt_secret']);
        if (!$pl) 
            Response::jsonError(401, 'Invalid or expired token');

        return $pl;
    }

    public static function admin(array $cfg) {
        $pl = self::auth($cfg);
        if ($pl['role'] != 'admin') 
            Response::jsonError(403, 'Forbidden');
        return $pl;
    }

    public static function user(array $cfg) {
        $pl = self::auth($cfg);
        if (!in_array($pl['role'], ['admin', 'user'])) 
            Response::jsonError(403, 'Forbidden');
        return $pl;
    }
}