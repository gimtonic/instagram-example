# Приложение для работы с DIRECT instagram с помощью библиотеки mgp25/Instagram-API

# Развертывание

* Копируем файл конфигурации 

    ```
    cp .env.example .env
    ```

* Прописываем в .env подключение к БД

  ```
  DB_CONNECTION=
  DB_HOST=
  DB_PORT=
  DB_DATABASE=
  DB_USERNAME=
  DB_PASSWORD=
  ```
    
    Также указываем там логин и пароль пользователя instagram 
 от которого будете посылать и пронимать сообщения, картинки и аудио в DIRECT instagram
  ```
  NSTAGRAM_USERNAME=
  INSTAGRAM_PASSWORD=
  ```
  
* Устанавливаем пакеты

    ```
    composer install
    npm install
    ```

* Запускаем миграции 
    ```
    php artisan casche:clear
    ```
     
* Генерируем ключ 

    ```
    php artisan key:generate
    ```
     
* Сбрасываем кэш 

    ```
    php artisan cache:clear
    ```
# Важная особенность! 

Cейчас реализовано только отправка сообщений,аудио и фото через DIRECT INSTAGRAM.
Необходимо одобрить запрос в приложении Instagram    