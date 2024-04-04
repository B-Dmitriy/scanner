<?php 
/**
 * @var Array $data
 */
?>
<!doctype html>
<html lang="en">
<?php include_once __DIR__ . '/../layout/head.php'?>
<body>
<?php include_once __DIR__ . '/../layout/header.php'?>
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
            <ul>
                <?php foreach($data as $record){ ?>
                <li>
                    <b><?= $record['name'] ?></b>
                    <span><?= $record['price'] ?>$</span>
                </li>
                <?php } ?>
            </ul>
        </section>
    </section>
</main>
<?php include_once __DIR__ . '/../layout/footer.php'?>
</body>
</html>