<?php
    include("database.php");
    if(isset($_POST['send'])){
        if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['mail']) && !empty($_POST['adress']) && !empty($_POST['zipcode']) && !empty($_POST['area'])) {
            $_SESSION['firstName'] = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_SPECIAL_CHARS);
            $_SESSION['lastName'] = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_SPECIAL_CHARS);
            $_SESSION['mail'] = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);
            $_SESSION['adress'] = filter_input(INPUT_POST, "adress", FILTER_SANITIZE_SPECIAL_CHARS);
            $_SESSION['zipcode'] = filter_input(INPUT_POST, "zipcode", FILTER_SANITIZE_SPECIAL_CHARS);
            $_SESSION['area'] = filter_input(INPUT_POST, "area", FILTER_SANITIZE_SPECIAL_CHARS);
            if(!$_SESSION['mail']){
                $mail = "is-invalid";
            } else{
            try {
                $db = new PDO("mysql:host=localhost;dbname=zuzu",
                    "root", "");
                $adressInput = $db->prepare("INSERT INTO `adress`(`adress`, `zipcode`, `area`) VALUES(:a_adress, :a_zipcode, :a_area)");
                $customerInput = $db->prepare("INSERT INTO `customer`(`first_name`, `last_name`, `mail`, adress_id) VALUES(:c_first_name, :c_last_name, :c_mail, :c_adress_id)");
                $adressQuerry = $db->prepare("SELECT `adress_id` FROM `adress` WHERE `adress` = :a_adress AND `zipcode` = :a_zipcode AND `area` = :a_area");
                $customerQuerry = $db->prepare("SELECT `customer_id` FROM `customer` WHERE `first_name` = :c_first_name AND `last_name` = :c_last_name AND `mail` = :c_mail");
                $adressQuerry->bindParam(":a_adress", $_SESSION['adress']);
                $adressQuerry->bindParam(":a_zipcode", $_SESSION['zipcode']);
                $adressQuerry->bindParam(":a_area", $_SESSION['area']);
                $adressQuerry->execute();
                $adress = $adressQuerry->fetchAll(PDO::FETCH_ASSOC);
                if(!$adress) {
                    $adressInput->bindParam(":a_adress", $_SESSION['adress']);
                    $adressInput->bindParam(":a_zipcode", $_SESSION['zipcode']);
                    $adressInput->bindParam(":a_area", $_SESSION['area']);
                    $adressInput->execute();
                    $adress = $adressQuerry->fetchAll(PDO::FETCH_ASSOC);
                }
                $customerQuerry->bindParam(":c_first_name", $_SESSION['firstName']);
                $customerQuerry->bindParam(":c_last_name", $_SESSION['lastName']);
                $customerQuerry->bindParam(":c_mail", $_SESSION['mail']);
                $customerQuerry->execute();
                if($adress[0]['adress_id']){
                    $customerInput->bindParam(":c_first_name", $_SESSION['firstName']);
                    $customerInput->bindParam(":c_last_name", $_SESSION['lastName']);
                    $customerInput->bindParam(":c_mail", $_SESSION['mail']);
                    $customerInput->bindParam(":c_adress_id", $adress[0]['adress_id']);
                    $customerInput->execute();
                    $customer = $customerQuerry->fetchAll(PDO::FETCH_ASSOC);
                }
                header("location: bestellen.php");
            } catch (PDOException $exception) {
                die("Error!: " . $exception->getMessage());
            }
            }}
        $_SESSION['mail'] = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);
        if(!$_SESSION['mail']){
            $mail = "is-invalid";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Klantgegevens</title>
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
        <div class="container-lg">
            <form class="row pt-3" method="post" class="needs-validation" novalidate>
                <div class="col-lg-12">
                    <p class="display-5 fw-bold mb-4">Klantgegevens</p>
                    <div class="mb-4 col-lg-12">
                        <label for="exampleFormControlInput1" class="form-label">Voornaam</label>
                        <input type="name" value="<?php if(isset($_POST['firstName'])){ echo $_POST['firstName']; } ?>" class="form-control <?php if(isset($_POST['firstName'])){
                            if(empty($_POST['firstName'])){
                                echo "is-invalid";
                            } else {echo "is-valid";}
                        } ?>" name="firstName" id="exampleFormControlInput1" required>
                        <div class="invalid-feedback">
                            Voer een voornaam in aub.
                        </div>
                    <div class="mb-4 mt-4 col-lg-12">
                        <label for="exampleFormControlInput2" class="form-label">Achternaam</label>
                        <input type="name" value="<?php if(isset($_POST['lastName'])){ echo $_POST['lastName']; } ?>" class="form-control <?php if(isset($_POST['lastName'])){
                            if(empty($_POST['lastName'])){
                                echo "is-invalid";
                            } else {echo "is-valid";}
                        } ?>" name="lastName" id="exampleFormControlInput2" required>
                        <div class="invalid-feedback">
                            Voer een achternaam in aub.
                        </div>
                    </div>
                    <div class="mb-4 col-lg-12">
                        <label for="exampleFormControlInput3" class="form-label">Email</label>
                        <input type="email" value="<?php if(isset($_POST['mail'])){ echo $_POST['mail']; } ?>" class="form-control <?php if(isset($mail)){
                            if(empty($_POST['mail'])){
                                echo "is-invalid";
                            } elseif($_SESSION['mail'] === false) {
                                echo "is-invalid";
                            } else {echo "is-valid";}
                        }?>" name="mail" id="exampleFormControlInput3" required>
                        <div class="invalid-feedback">
                            Voer een e-mail adres in aub.
                        </div>
                    </div>
                    <div class="mb-4 col-lg-12">
                        <label for="exampleFormControlInput4" class="form-label">Adres</label>
                        <input type="text" value="<?php if(isset($_POST['adress'])){ echo $_POST['adress']; } ?>" class="form-control <?php if(isset($_POST['adress'])){
                            if(empty($_POST['adress'])){
                                echo "is-invalid";
                            } else {echo "is-valid";}
                        } ?>" name="adress" id="exampleFormControlInput4" required>
                        <div class="invalid-feedback">
                            Voer een adres in aub.
                        </div>
                    </div>
                    <div class="mb-4 col-lg-12">
                        <label for="exampleFormControlInput5" class="form-label">Postcode</label>
                        <input type="text" value="<?php if(isset($_POST['zipcode'])){ echo $_POST['zipcode']; } ?>" class="form-control <?php if(isset($_POST['zipcode'])){
                            if(empty($_POST['zipcode'])){
                                echo "is-invalid";
                            } else {echo "is-valid";}
                        } ?>" name="zipcode" id="exampleFormControlInput5" required>
                        <div class="invalid-feedback">
                            Voer een postcode in aub.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-12">
                        <label for="exampleFormControlInput6" class="form-label">Woonplaats</label>
                        <input type="name" value="<?php if(isset($_POST['area'])){ echo $_POST['area']; } ?>" class="form-control <?php if(isset($_POST['area'])){
                            if(empty($_POST['area'])){
                                echo "is-invalid";
                            } else {echo "is-valid";}} ?>" name="area" id="exampleFormControlInput6" required>
                        <div class="invalid-feedback">
                            Voer een woonplaats in aub.
                        </div>
                    </div>
                    <input type="submit" name="send" class="btn btn-md btn-dark text-white mb-5" value="Ga naar sushi's">
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
<script>
    (function () {
        'use strict'
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
</html>