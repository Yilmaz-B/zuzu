<?php
    include("database.php");

    $costKomkommer = 2.50 * $_SESSION['komkommer'];
    $costAvocado = 2.30 * $_SESSION['avocado'];
    $costZalm = 3.00 * $_SESSION['zalm'];
    $costPhila = 3.50 * $_SESSION['phila'];
    $costTuna = 3.50 * $_SESSION['tuna'];
    $costCali = 2.70 * $_SESSION['cali'];
    $totalPrice = $costKomkommer + $costAvocado + $costZalm + $costPhila + $costTuna + $costCali;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bestelling overzicht</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white fs-3" href="index.php">ZUZU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fs-5 text-secondary" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-5" href="klantgegevens.php">Bestellen</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <div class="container-fluid py-5"  style="background: url('img/header.png'); background-size: cover">
            <div class="row py-3"></div>
        </div>
    </header>
    <main>
        <div class="container-lg pt-5 pb-5">
            <div class="row pb-4 pt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title fs-1 fw-bold">Bestelling</div>
                                <div class="card-text fs-5 mb-3" name="bestelling"><?php
                                    if(isset($_SESSION['finish'])) {
                                        if ($_SESSION['komkommer'] > 0) {echo "Maki komkommer: " . $_SESSION['komkommer'] . "<br>";}
                                        if ($_SESSION['avocado'] > 0) {echo "Maki avocado: " . $_SESSION['avocado'] . "<br>";}
                                        if ($_SESSION['zalm'] > 0) {echo "Nigiri zalm: " . $_SESSION['zalm'] . "<br>";}
                                        if ($_SESSION['phila'] > 0) {echo "Philadelphia Roll: " . $_SESSION['phila'] . "<br>";}
                                        if ($_SESSION['tuna'] > 0) {echo "Spicy Tuna Roll: " . $_SESSION['tuna'] . "<br>";}
                                        if ($_SESSION['cali'] > 0) {echo "California Roll: " . $_SESSION['cali'] . "<br>";}
                                    }
                                    ?></div>
                            <div class="card-text fs-5 fw-bold">Totaal: <?php
                                echo "&euro;" . number_format($totalPrice, '2', ',', '.');
                            ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-5 pt-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title fs-1 fw-bold">Klantgegevens</div>
                            <div class="card-text fs-5 mb-2"><?php echo "Naam: " . $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></div>
                            <div class="card-text fs-5 mb-2"><?php echo "E-mail: " . $_SESSION['mail']; ?></div>
                            <div class="card-text fs-5 mb-2"><?php echo "Adres: " . $_SESSION['adress']; ?></div>
                            <div class="card-text fs-5 mb-2"><?php echo "Postcode: " . $_SESSION['zipcode']; ?></div>
                            <div class="card-text fs-5 mb-2"><?php echo "Woonplaats: " . $_SESSION['area']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-dark">
        <div class="container-fluid text-white">
            <div class="row pb-3">
                <div class="col-md-6 mt-4 text-center">
                    <ul class="list-unstyled">
                        <li class="list-group-item fw-bold">Contactgegevens</li>
                        <li class="list-group-item">Restaurant ZuZu</li>
                        <li class="list-group-item">Appelstraat 1</li>
                        <li class="list-group-item">1111AA Fruit</li>
                        <li class="list-group-item">zuzu@gmail.com</li>
                        <li class="list-group-item">06- 12345678</li>
                    </ul>
                </div>
                <div class="col-md-6 mt-4 text-center">
                    <ul class="list-unstyled">
                        <li class="list-group-item fw-bold">Openingstijden</li>
                        <li class="list-group-item">Maandag: Gesloten</li>
                        <li class="list-group-item">Dinsdag: 16:00 - 22:00</li>
                        <li class="list-group-item">Woensdag: 16:00 - 22:00</li>
                        <li class="list-group-item">Donderdag: 16:00 - 22:00</li>
                        <li class="list-group-item">Vrijdag: 15:00 - 22:00</li>
                        <li class="list-group-item">Zaterdag: 15:00 - 22:00</li>
                        <li class="list-group-item">Zondag: Gesloten</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>