<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Контроллер для отображения дашборда
 * По умолчанию будут выводится сообщения
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Конструктор
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Метод для отображения списка сообщений пользователей
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home/index');
    }
}
