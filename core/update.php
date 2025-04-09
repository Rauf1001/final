<?php

    /*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */

require_once 'connect.php';

    /*
     * Получаем ID продукта из адресной строки - /product.php?id=1
     */

    $users_id = $_GET['id'];

    /*
     * Делаем выборку строки с полученным ID выше
     */

    $users = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$users_id'");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $users = mysqli_fetch_assoc($users);
?>


<body>
    <h3>Изменение Данных Пользователя</h3>
    <form action="change.php" method="post">
        <input type="hidden" name="id" value="<?= $users['id'] ?>">
        <p>Name</p>
        <input type="text" name="name" value="<?= $users['name'] ?>">
        <p>Email</p>
        <input type="text" name="email" value="<?= $users['email'] ?>">
        <p>Password</p>
        <input type="text" name="pass" value="<?= $users['password'] ?>">
        <p>Birthday</p>
        <input type="text" name="birthday" value="<?= $users['birthday'] ?>"> <br> <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>