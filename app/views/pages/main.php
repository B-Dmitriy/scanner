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
<main class="container">
    <section>
        <section class="p-4">
            <h3>Добро пожаловать в Records shop!</h3>
            <p>Мы готовы предложить вам огромный выбор виниловых пластинок отечественных и зарубежных исполнителей.</p>
            <p>Вы можете зарегестрироваться, что бы получать специальные предолжения в личном кабинете или прямо на почту</p>
            <button class="btn btn-primary">Зарегестрироваться</button>
        </section>

        <nav class="navbar navbar-light bg-light pb-2">
            <div class="container-fluid">
                <form class="d-flex mb-2">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success me-2" type="submit">Search</button>
                </form>
                <ul class="pagination d-flex mb-2">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container mt-4">
            <div class="row">
                <?php foreach($data as $record){ ?>
                    <div class="col d-flex justify-content-center pb-4">
                        <section class="card" style="width: 18rem;">
                            <img src="https://media.istockphoto.com/id/690066030/photo/red-and-white-siamese-fighting-fish-half-moon-shape-isolated-on-black.jpg?s=612x612&w=0&k=20&c=mFDtldxcFbeC70-feOem0nUjNu8MVHBTwo-2aXIwMUM=" class="card-img-top" alt="logo">
                            <div class="card-body">
                                <h5 class="card-title"><?= $record['name'] ?></h5>
                                <p class="card-text"><?= $record['price'] ?>$</p>
                                <p class="card-text"><?= $record['description'] ?></p>
                                <button href="#" class="btn btn-primary">В корзину</button>
                                <a href="#" class="btn btn-link">Подробнее...</a>
                            </div>
                        </section>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>
<?php include_once __DIR__ . '/../layout/footer.php'?>
<script src="../../../public/js/bootstrap.min.js"></script>
</body>
</html>