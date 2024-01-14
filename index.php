<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Лабораторная работа №4</title>
</head>

<body>

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Лабораторная работа №4</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">

                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Поиск" aria-label="Поиск">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                </form>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
        <h1 class="mt-5">Вычислить значение оплаты за товар</h1>

        <form action="" method="post">
            <div class="form-group">
                <label for="pricePerItem">Цена товара, руб:</label>
                <input type="text" class="form-control" id="pricePerItem" name="pricePerItem" required>
            </div>
            <div class="form-group">
                <label for="quantity">Количество товаров:</label>
                <input type="text" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="availableMoney">Доступные деньги, руб:</label>
                <input type="text" class="form-control" id="availableMoney" name="availableMoney" required>
            </div>
            <button type="submit" class="btn btn-primary">Рассчитать</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем значения из формы
            $pricePerItem = floatval($_POST['pricePerItem']);
            $quantity = intval($_POST['quantity']);
            $availableMoney = floatval($_POST['availableMoney']);

            // Рассчитываем общую стоимость товаров
            $totalCost = $pricePerItem * $quantity;

            // Проверяем, хватит ли имеющейся суммы
            $isEnough = $availableMoney >= $totalCost;

            // Выводим результат
            echo '<div class="mt-3 alert ' . ($isEnough ? 'alert-success' : 'alert-danger') . '" role="alert">';
            if ($isEnough) {
                echo 'Достаточно средств для оплаты товаров. Остаток: ' . number_format($availableMoney - $totalCost, 2) . ' руб.';
            } else {
                echo 'Недостаточно средств для оплаты товаров.';
            }
            echo '</div>';
        }
        ?>

    </main>

    <footer class="footer">

    </footer>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
