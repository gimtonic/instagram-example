# Описание

Простая админ-панель для работы с DIRECT instagram

# Технологии

* Laravel 5.7
* Vue 2 

# Установка

* Копируем файл конфигурации 

    ```bash
    cp .env.example .env
    ```

* Прописываем в .env подключение к БД

  ```bash
  DB_CONNECTION=
  DB_HOST=
  DB_PORT=
  DB_DATABASE=
  DB_USERNAME=
  DB_PASSWORD=
  ```
    
    Также указываем там логин и пароль пользователя instagram 
 от которого будете посылать и пронимать сообщения, картинки и аудио в DIRECT instagram

  ```bash
  NSTAGRAM_USERNAME=
  INSTAGRAM_PASSWORD=
  ```
  
* Устанавливаем пакеты

    ```bash
    composer install
    npm install
    ```

* Запускаем миграции 

    ```bash
    php artisan migrate
    ```
     
* Генерируем ключ 

    ```bash
    php artisan key:generate
    ```
     
* Сбрасываем кэш 

    ```bash
    php artisan cache:clear
    ```

# DEMO
Вот [тут](http://instagram.ordersbesma.ml/home) демо, нужно зарегистрироватся там же для входа в админку.

# Важная особенность! 

Cейчас реализовано только отправка сообщений,аудио и фото через DIRECT INSTAGRAM.
Необходимо одобрить запрос в приложении Instagram    