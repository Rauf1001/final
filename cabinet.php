<?php
    //var_dump($_COOKIE);
    if ( !isset($_COOKIE['email']) OR trim($_COOKIE['email']) ==''){
        header("Location: index.html");
        exit; 
    }



    require_once 'core/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сайт-Алиева Рауфа</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>


<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
</style>
<body>
    <h1>Кабинет Пользователя</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>email</th>
            <th>password</th>
            <th>birthday</th>
        </tr>

        <?php

            /*
             * Делаем выборку всех строк из таблицы "products"
             */
            
            
            $users = mysqli_query($connect, "SELECT * FROM `users`");

            /*
             * Преобразовываем полученные данные в нормальный массив
             */

            $users = mysqli_fetch_all($users);

            /*
             * Перебираем массив и рендерим HTML с данными из массива
             * Ключ 0 - id
             * Ключ 1 - title
             * Ключ 2 - price
             * Ключ 3 - description
             */

            foreach ($users as $users) {
                ?>
                    <tr>
                        <td><?= $users[0] ?></td>
                        <td><?= $users[1] ?></td>
                        <td><?= $users[2] ?></td>
                        <td><?= $users[3] ?></td>
                        <td><?= $users[4] ?></td>
                        <td><a href="core\update.php?id=<?= $users[0] ?>">Update</a></td>
                        <td><a style="color: red;" href="core\delete.php?id=<?= $users[0] ?>">Delete</a></td>
                    </tr>
                <?php
            }
        ?>
        <a href="index.html" >LogOUT</a>
        
    </table>

            
</body>

</html>
