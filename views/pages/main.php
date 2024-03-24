<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=records_shop", 'root', 'zion1101');

    $res = $pdo->query("SELECT * FROM records WHERE id = 1;");

    $t = $res->fetch();

    // echo ($t['name']);
} catch (PDOException $e) {
    echo "Невозможно установить соединение с базой данных";
}
?>

<!doctype html>
<html lang="en">
<?php include_once 'views/layout/head.php'?>
<body>
<?php include_once 'views/layout/header.php'?>
<main>
    <section>
        <section class="p-4">
            <h3>Добро пожаловать в Records shop!</h3>
            <p>Мы готовы предложить вам огромный выбор виниловых пластинок отечественных и зарубежных исполнителей.</p>
            <p>Вы можете зарегестрироваться, что бы получать специальные предолжения в личном кабинете или прямо на почту</p>
            <button class="btn btn-primary">Зарегестрироваться</button>
        </section>

        <section style="border: red 1px solid;">
            Search
        </section>

        <section style="border: red 1px solid;">
            Filters
        </section>

        <section style="border: red 1px solid;">
            List
        </section>
    </section>
</main>
<?php include_once 'views/layout/footer.php'?>
</body>
</html>