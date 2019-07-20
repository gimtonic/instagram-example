<?php

namespace App\Traits;

/**
 * Трейт для авторизации с помощью библиотеки mgp25/Instagram-API
 */
trait ConsoleTrait
{
    /**
     * Метод для авторизации с помощью библиотеки mgp25/Instagram-API
     * @return \InstagramAPI\Instagram
     */
    private function login() {
        /** @var  bool allowDangerousWebUsageAtMyOwnRisk Даём разрешение на запуск библиотеки через веб-страницу,
         * по-умолчанию можем запускать только с помощью консоли
         */
        \InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;

        $ig = new \InstagramAPI\Instagram();

        $ig->login(
            env('INSTAGRAM_USERNAME'),
            env('INSTAGRAM_PASSWORD')
        );

        return $ig;
    }
}
