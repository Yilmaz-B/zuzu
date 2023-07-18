<?php
    include("database.php");
    if(isset($_POST["finish"])) {
        if($_POST["komkommer"] > 0 || $_POST["avocado"] > 0 || $_POST["zalm"] > 0 || $_POST["phila"] > 0 ||
            $_POST["tuna"] > 0 || $_POST["cali"] > 0){
            $_SESSION['komkommer'] = filter_input(INPUT_POST, "komkommer", FILTER_SANITIZE_NUMBER_INT);
            $_SESSION['avocado'] = filter_input(INPUT_POST, "avocado", FILTER_SANITIZE_NUMBER_INT);
            $_SESSION['zalm'] = filter_input(INPUT_POST, "zalm", FILTER_SANITIZE_NUMBER_INT);
            $_SESSION['phila'] = filter_input(INPUT_POST, "phila", FILTER_SANITIZE_NUMBER_INT);
            $_SESSION['tuna'] = filter_input(INPUT_POST, "tuna", FILTER_SANITIZE_NUMBER_INT);
            $_SESSION['cali'] = filter_input(INPUT_POST, "cali", FILTER_SANITIZE_NUMBER_INT);
            $_SESSION['finish'] = filter_input(INPUT_POST, "finish", FILTER_SANITIZE_SPECIAL_CHARS);

            if (!isset($_SESSION['komkommer'])) {
                $komkommerVal = "Vul het juiste aantal in.";
                $komkommer = false;
            } elseif ($_SESSION['komkommer'] !== false && $_SESSION['komkommer'] <= 5 && $_SESSION['komkommer'] >= 0) {
                $komkommer = true;
            }

            if (!isset($_SESSION['avocado'])) {
                $avocadoVal = "Vul het juiste aantal in.";
                $avocado = false;
            } elseif ($_SESSION['avocado'] !== false && $_SESSION['avocado'] <= 10 && $_SESSION['avocado'] >= 0) {
                $avocado = true;
            }

            if (!isset($_SESSION['zalm'])) {
                $zalmVal = "Vul het juiste aantal in.";
                $zalm = false;
            } elseif ($_SESSION['zalm'] !== false && $_SESSION['zalm'] <= 10 && $_SESSION['zalm'] >= 0) {
                $zalm = true;
            }

            if (!isset($_SESSION['phila'])) {
                $philaVal = "Vul het juiste aantal in.";
                $phila = false;
            } elseif ($_SESSION['phila'] !== false && $_SESSION['phila'] <= 5 && $_SESSION['phila'] >= 0) {
                $phila = true;
            }

            if (!isset($_SESSION['tuna'])) {
                $tunaVal = "Vul het juiste aantal in.";
                $tuna = false;
            } elseif ($_SESSION['tuna'] !== false && $_SESSION['tuna'] <= 5 && $_SESSION['tuna'] >= 0) {
                $tuna = true;
            }

            if (!isset($_SESSION['cali'])) {
                $caliVal = "Vul het juiste aantal in.";
                $cali = false;
            }
            if ($_SESSION['cali'] !== false && $_SESSION['cali'] <= 8 && $_SESSION['cali'] >= 0) {
                $cali = true;
            }

            if (isset($komkommer) && isset($avocado) && isset($zalm) && isset($phila) && isset($tuna) && isset($cali)) {
                if ($komkommer === true && $avocado === true && $zalm === true && $phila === true && $tuna === true && $cali === true) {
                    try {
                        $db = new PDO("mysql:host=localhost;dbname=zuzu",
                            "root", "");
                        $query = $db->prepare("INSERT INTO `sushi`(`komkommer`, `avocado`, `zalm`, `philadelphia`, `spicy_tuna`, `california`) 
                                                    VALUES(:komkommer, :avocado, :zalm, :philadelphia, :spicy_tuna, :california)");
                        $query->bindParam(":komkommer", $_SESSION['komkommer']);
                        $query->bindParam(":avocado", $_SESSION['avocado']);
                        $query->bindParam(":zalm", $_SESSION['zalm']);
                        $query->bindParam(":philadelphia", $_SESSION['phila']);
                        $query->bindParam(":spicy_tuna", $_SESSION['tuna']);
                        $query->bindParam(":california", $_SESSION['cali']);
                        $query->execute();
                        header("location: bestelling.php");
                    } catch (PDOException $exception) {
                        die("Error!: " . $exception->getMessage());
                    }
                }
            }} else {
            $empty = "Kies een sushi aub";
            }

        if ($_POST["komkommer"] > 5 || $_POST["komkommer"] < 0) {
            $komkommerVal = "is-invalid";
            $komkommer = false;
        }
        if ($_POST["avocado"] > 10 || $_POST["avocado"] < 0) {
            $avocadoVal = "is-invalid";
            $avocado = false;
        }
        if ($_POST["zalm"] > 10 || $_POST["zalm"] < 0) {
            $zalmVal = "is-invalid";
            $zalm = false;
        }
        if ($_POST["phila"] > 5 || $_POST["phila"] < 0) {
            $philaVal = "is-invalid";
            $phila = false;
        }
        if ($_POST["tuna"] > 5 || $_POST["tuna"] < 0) {
            $tunaVal = "is-invalid";
            $tuna = false;
        }
        if ($_POST["cali"] > 8 || $_POST["cali"] < 0) {
            $caliVal = "is-invalid";
            $cali = false;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bestel hier</title>
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
        <div class="container-lg">
            <form class="row pt-3" method="post">
                <div class="col-lg-12">
                    <p class="display-5 fw-bold">Sushi's bestellen</p>
                    <div class="pb-3">
                        <label for="exampleFormControlInput7" class="form-label"><p class="fw-bold">Maki komkommer <span class="fw-normal fst-italic">(max = 5)</span></p></label>
                        <input type="number" name="komkommer" value="<?php if(isset($_POST['komkommer'])){ echo $_POST['komkommer']; } else {echo 0;} ?>" class="form-control <?php if(isset($komkommer)){echo $komkommerVal;} ?>" id="exampleFormControlInput7">
                        <div class="invalid-feedback">
                            Vul het juiste aantal in.
                        </div>
                    </div>
                    <div class="pb-3">
                        <label for="exampleFormControlInput8" class="form-label"><p class="fw-bold">Maki avocado <span class="fw-normal fst-italic">(max = 10)</span></p></label>
                        <input type="number" name="avocado" value="<?php if(isset($_POST['avocado'])){ echo $_POST['avocado']; } else {echo 0;}  ?>" class="form-control <?php if(isset($avocado)){echo $avocadoVal;} ?>" id="exampleFormControlInput8">
                        <div class="invalid-feedback">
                            Vul het juiste aantal in.
                        </div>
                    </div>
                    <div class="pb-3">
                        <label for="exampleFormControlInput9" class="form-label"><p class="fw-bold">Nigiri zalm <span class="fw-normal fst-italic">(max = 10)</span></p></label>
                        <input type="number" name="zalm" value="<?php if(isset($_POST['zalm'])){ echo $_POST['zalm']; } else {echo 0;} ?>" class="form-control <?php if(isset($zalm)){echo $zalmVal;} ?>" id="exampleFormControlInput9">
                        <div class="invalid-feedback">
                            Vul het juiste aantal in.
                        </div>
                    </div>
                    <div class="pb-3">
                        <label for="exampleFormControlInput10" class="form-label"><p class="fw-bold">Philadelphia Roll <span class="fw-normal fst-italic">(max = 5)</span></p></label>
                        <input type="number" name="phila" value="<?php if(isset($_POST['phila'])){ echo $_POST['phila']; } else {echo 0;} ?>" class="form-control <?php if(isset($phila)){echo $philaVal;} ?>" id="exampleFormControlInput10">
                        <div class="invalid-feedback">
                            Vul het juiste aantal in.
                        </div>
                    </div>
                    <div class="pb-3">
                        <label for="exampleFormControlInput11" class="form-label"><p class="fw-bold">Spicy Tuna Roll <span class="fw-normal fst-italic">(max = 5)</span></p></label>
                        <input type="number" name="tuna" value="<?php if(isset($_POST['tuna'])){ echo $_POST['tuna']; } else {echo 0;} ?>" class="form-control <?php if(isset($tuna)){echo $tunaVal;} ?>" id="exampleFormControlInput11">
                        <div class="invalid-feedback">
                            Vul het juiste aantal in.
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput12" class="form-label"><p class="fw-bold">California Roll <span class="fw-normal fst-italic">(max = 8)</span></p></label>
                        <input type="number" name="cali" value="<?php if(isset($_POST['cali'])){ echo $_POST['cali']; } else {echo 0;} ?>" class="form-control <?php if(isset($cali)){echo $caliVal;} ?>" id="exampleFormControlInput12">
                        <div class="invalid-feedback">
                            Vul het juiste aantal in.
                        </div>
                    </div>
                    <input class="btn btn-md btn-dark text-white mb-5" type="submit" name="finish">
                </div>
            </form>
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