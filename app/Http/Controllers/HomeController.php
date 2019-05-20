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
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {

        $ig = $this->traitlogin();

        $people = $ig->people->getInfoById($id);
        //Проверяем что пользователь с таким id сушествует
        if ($people->getStatus() == 'ok') {
            $answerUser = $people->getUser();

            $threads = $ig->direct->getThreadByParticipants([$id]);
            $items = $threads->getThread()->getItems();

            $currentUser = $ig->account->getCurrentUser()->getUser();
            $currentUserPk = $currentUser->getPk();


            return view('home/show', [
                'items' => $items,
                'currentUserPk' => $currentUserPk,
                'answerUser' => $answerUser
            ]);
        }
    }
}
