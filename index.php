<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZuZu Home</title>
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
                        <a class="nav-link active fs-5 text-white" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary fs-5" href="klantgegevens.php">Bestellen</a>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center pt-3">
                    <p class="fw-bold display-4"><?php
                        $currentTime = date('H:i');
                        switch ($currentTime){
                            case date("H") >= "6" && date("H") < "12": echo "Goedemorgen, welkom bij ZuZu";
                            break;
                            case date("H") >= "12" && date("H") < "18": echo "Goedemiddag, welkom bij ZuZu";
                            break;
                            case  date("H") >= "18" && date("H") < "24": echo "Goede avond, welkom bij ZuZu";
                            break;
                            default: echo "Goedenacht, welkom bij ZuZu";
                        }
                        ?></p>
                    <p class="fs-4">Wij zijn gespecialiseerd in de Japanse keuken.</p>
                    <p class="fs-4 fst-italic">Het woord "sushi" is afkomstig van "su", wat azijn betekend, en "shi" - rijst.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center pt-2">
                    <p class="fw-bold fs-4">
                        <?php
                        setlocale(LC_ALL, 'dutch');

                        echo "Vandaag " . strftime("%A %e %B %Y <br>");
                        $open_to = "";
                        $open_from = "";
                        $weekday = date('l');

                        if ($weekday == "Friday" || $weekday == "Saturday") {
                            $open_from = "15:00";
                            $open_to = "22:00";
                        } else {
                            $open_from = "16:00";
                            $open_to = "22:00";
                        }

                        if (date("H:i") < $open_from || date("H:i") > $open_to || $weekday == "Monday" || $weekday == "Sunday") {
                            echo "We zijn momenteel gesloten!";
                        } else {echo "Bezorgtijd vanaf nu: " . date('H:i', strtotime('1 hour'));}
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="card w-100">
                        <a href="klantgegevens.php"><img src="img/home1.png" class="card-img-top" style="object-fit: cover; height: 24rem"></a>
                        <div class="card-body">
                            <a class="card-link text-dark text-decoration-none" href="klantgegevens.php">Bestel bij ons je sushi's</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="card w-100">
                        <a href="klantgegevens.php"><img src="img/home2.png" class="card-img-top" style="object-fit: cover; height: 24rem"></a>
                        <div class="card-body">
                            <a class="card-link text-dark text-decoration-none" href="klantgegevens.php">Keuze uit verschillende soorten sushi's</a>
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