# SneakerStore

Предварительные условия

Перед началом работы убедитесь, что у вас установлены следующие инструменты:

    PHP версии 7.3 или выше
    Composer
    Node.js и npm
    СУБД MySQL

Установка

Следуйте этим шагам, чтобы запустить проект на вашей локальной машине:

    Клонируйте репозиторий:

git clone https://github.com/Redsow/SneakerStore.git

    Перейдите в каталог проекта:

cd SneakerStore

    Установите зависимости Composer:

composer install

    Установите зависимости NPM:

npm install

    Создайте файл .env из .env.example и настройте параметры подключения к базе данных:

cp .env.example .env

    Сгенерируйте ключ приложения:

php artisan key:generate

    Запустите миграции базы данных:

php artisan migrate

    Запустите локальный сервер разработки:

php artisan serve

Теперь вы можете открыть браузер и перейти по адресу http://localhost:8000 для доступа к вашему проекту Laravel.
