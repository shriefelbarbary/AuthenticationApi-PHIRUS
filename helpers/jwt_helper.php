<?php
require_once '../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTHandler {
    private static $secret_key = "your_secret_key";

    private static $algorithm = "HS256";

    public static function generateToken($payload) {
        return JWT::encode($payload, self::$secret_key, self::$algorithm);
    }

    public static function verifyToken($token) {
        try {
            return JWT::decode($token, new Key(self::$secret_key, self::$algorithm));
        } catch (Exception $e) {
            return false;
        }
    }
}
?>
