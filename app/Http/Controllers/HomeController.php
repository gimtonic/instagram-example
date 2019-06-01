<?php

namespace App\Http\Controllers;

use App\Traits\ConsoleTrait;
use InstagramAPI\Response\Model\DirectThread;
use InstagramAPI\Response\Model\DirectThreadItem;

/**
 * Контроллер для отображения дашборда
 * По умолчанию будут выводится сообщения
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Трейт для авторизации с помощью библиотеки mgp25/Instagram-API
     */
    use ConsoleTrait { login as protected traitlogin; }

    /**
     * Конструктор
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Метод для отображения списка сообщений пользователей
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        /** @var  \InstagramAPI\Instagram $ig Создаем объект и авторизуемся в трейде*/
        $ig = $this->traitlogin();

        /** @var \InstagramAPI\Response\DirectInboxResponse $incomingMessageFromDirect
         * Получаем все входящие сообщения из Direct для нашего аккаунта
         */
        $incomingMessageFromDirect = $ig->direct->getInbox();

        /** @var  DirectThread[] $threads Получаем все многопоточные сообщения пользователей*/
        $threads = $incomingMessageFromDirect->getInbox()->getThreads();

        return view('home/index', [
            'threads' => $threads
        ]);
    }

    /**
     * Метод для отображения списка сообщений конкретного пользователя
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(int $id)
    {
        /** @var  \InstagramAPI\Instagram $ig Создаем объект и авторизуемся в трейде*/
        $ig = $this->traitlogin();

        /** @var  \InstagramAPI\Response\UserInfoResponse $userInfo Получаем информацию о пользователе с id */
        $answerUser = $ig->people->getInfoById($id)->getUser();

        /** @var  DirectThreadItem[] $items Получение все сообщений пользователя с id */
        $items = $ig->direct->getThreadByParticipants([$id])->getThread()->getItems();

        /** @var string $currentUserPk Получение pk текущего пользователя */
        $currentUserPk = $ig->account->getCurrentUser()->getUser()->getPk();

        return view('home/show', [
            'items' => $items,
            'currentUserPk' => $currentUserPk,
            'answerUser' => $answerUser
        ]);
    }
}