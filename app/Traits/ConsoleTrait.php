<?php
namespace App\Traits;

/**
 * Трейт для авторизации
 * @return \InstagramAPI\Instagram
 */
trait ConsoleTrait
{
    function login() {

        /** @var  bool $debug Логическое. Режим отладки (необязательно)*/
        $debug = false;
        /** @var  bool $truncatedDebug Конфигурация для желаемой пользовательской настройки хранилища настроек. (Необязательный)*/
        $truncatedDebug=false;

        //$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug, $storageConfig = []);

        \InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;

        $ig = new \InstagramAPI\Instagram();

        //$ig = new \InstagramAPI\Instagram(true, true, [
        //    'storage'    => env('DB_CONNECTION'),
        //    'dbhost'     => env('DB_HOST'),
        //    'dbname'     => env('DB_DATABASE'),
        //    'dbusername' => env('DB_USERNAME'),
        //    'dbpassword' => env('DB_PASSWORD'),
        //]);

        $ig->login(
            env('INSTAGRAM_USERNAME'),
            env('INSTAGRAM_PASSWORD')
        );

        return $ig;
    }
}
