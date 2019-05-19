<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Traits\ConsoleTrait;

/**
 * Контроллер для отображения дашборда
 * По умолчанию будут выводится сообщения
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    use ConsoleTrait { login as protected traitlogin; }

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
        $ig = $this->traitlogin();
        $inbox = $ig->direct->getInbox();

        $threads = $inbox->getInbox()->getThreads();

        return view('home/index', [
            'threads' => $threads
        ]);
    }

    /**
     * Метод для отображения списка сообщений конкретного пользователя
     * @param Request $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $id)
    {
        return view('home/show');
    }
}
