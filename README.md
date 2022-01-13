**Виджет Инстаграма с настройками профиля и количества постов**

1. Создайте файл **_params.php_** в папке _config_ c логином и паролем пользователя

``return [
'instagram_user' => 'testdev330',
'instagram_password' => 'qwaszx123'
];``
2. Поднимите докер контейнеры:

``docker-compose build``

``docker-compose up ``

3. Зайдите в bash контейнера с приложением и накатите миграции:

``php yii migrate``

4. По умолчанию выводится Инстаграм Forbes. Вы можете изменить настройки на странице _/instagram_