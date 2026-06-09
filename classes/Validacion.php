<?php
class Validacion
{
    public static function limpiar($dato)
    {
        return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
    }

    public static function correo($correo)
    {
        return filter_var($correo, FILTER_VALIDATE_EMAIL);
    }

    public static function password($password)
    {
        return strlen($password) >= 8;
    }

    public static function texto($texto)
    {
        return !empty(trim($texto)) && strlen(trim($texto)) >= 3;
    }

    public static function captcha($respuesta)
    {
        return trim($respuesta) === "7";
    }
}
?>