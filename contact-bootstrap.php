<?php
session_start();


$alertEmail = '';
$alertMessage = '';
$alertPolicy = '';
$messageValue = '';
$emailValue = '';
$checked = '';
$alertRecaptcha = '';
#$recaptchaValue = '';
if (isset($_SESSION['alertEmail'])) {
    $alertEmail = $_SESSION['alertEmail'];
}

if (isset($_SESSION['alertMessage'])) {
    $alertMessage = $_SESSION['alertMessage'];
}

if (!isset($_POST['privacyPolicy'])) {
    $alertPolicy = $_SESSION['alertPolicy'];
}
if (isset($_SESSION['privacyPolicy'])) {
    $checked = $_SESSION['privacyPolicy'];
}
if (isset($_SESSION['emailValue'])) {
    $emailValue = $_SESSION['emailValue'];
}
if (isset($_SESSION['messageValue'])) {
    $messageValue = $_SESSION['messageValue'];
}
if (isset($_SESSION['alertRecaptcha'])) {
    $alertRecaptcha = $_SESSION['alertRecaptcha'];
}
/*if (isset($_SESSION['recaptchaValue'])) {
    $recaptchaValue = $_SESSION['recaptchaValue'];
}*/
session_unset();
$_SESSION['alertPolicy'] = '';

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap_uebungen.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Lobster&family=Mouse+Memoirs&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Pacifico&family=Quicksand:wght@300..700&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Tangerine:wght@400;700&display=swap"
        rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <?php include 'navbar.php';

    ?>
    <div class="container-fluid banner-contact">
        <div class="row">
            <h1 class="text-center speisen display-1">Kontakt</h1>
        </div>
    </div>
    <div class="container ">
        <div class="row mt-4 mb-4 fs-5 form-text  mx-1 ">
            <div class="col-12 linie">
                <form action="send-mail.php" method="POST" id="contactForm" class="p-2">



                    <div class="mb-3">
                        <label for="email" class="form-label">Email-addresse*</label>
                        <input type="email" class="form-control */is-valid*/ " id="email" aria-describedby="emailHelp" name="email" value=<?= $emailValue; ?>>
                        <?= $alertEmail; ?>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Betreff</label>
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">

                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Nachricht*</label>
                        <textarea class="form-control" id="message" rows="3" name="message"><?= $messageValue; ?></textarea>
                        <?= $alertMessage; ?>

                        <div class="form-text" id="basic-addon4"><small>(*)Pflichtfelder</small></div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input " id="privacyPolicy" name="privacyPolicy" <?= $checked; ?>>
                        <label class="form-check-label text-break mb-2" for="privacyPolicy">*Ich stimme der <a class="policy" style="color: white; text-decoration : none;" href="policy.php">Datenschutzerklärung</a>
                            zu</label>
                        <?= $alertPolicy; ?>
                        <!-- <div class="g-recaptcha" data-sitekey="6Ld1V7YqAAAAADTEc1VYSHMFpX_IAC4DjLfXEus4"></div>
                        <?= $alertRecaptcha; ?>
                        <div id="recaptcha"></div>-->
                    </div>

                    <button type="submit" class="btn btn-primary " name="submit" id="submit">senden</button>

                </form>



            </div>

        </div>
        <div class="row ">
            <div class=" col-12 col-lg-6 ">
                <img src="images/map-bild.png" class="w-100 h-100" alt="">
                <!-- <iframe class="w-100  "
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2628.6163689331675!2d9.19317431141729!3d48.78921380545337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4799c5865efb1da3%3A0xf43c13f2c9483f3b!2sFoodstation!5e0!3m2!1sde!2sde!4v1699149590797!5m2!1sde!2sde"
                    style="border:0; height: 100%;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>-->
            </div>
            <div class="col-lg-6 ps-4 mt-3 mt-sm-3 mt-md-3 mt-lg-0 mt-xl-0 mt-xxl-0  lh-lg contact-text text-break  ">
                <div class="row">
                    <div class="col-12 col-md-6 me-md-5 ">
                        <div class="row fw-bold"> ÖPNV</div>
                        <div class="row">mit der U-Bahn: U1, U2, U3, U4, U14.</div>
                        <div class="row">mit dem Bus: 43, SEV2, U1B, N5, N7.</div>
                        <div class="row">mit der S-Bahn: S5, RE, RE3.</div>
                        <div class="row">mit der Straßenbahn: U8. </div>




                    </div>
                    <div class="col ">
                        <div class="row fw-bold mt-4 mt-md-0"> Email</div>
                        <div class="row"> Maxmustermann
                            @gmail.com</div>


                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12  col-md-6 me-md-5 ">
                        <div class="row fw-bold">Öffnungszeiten</div>

                        <div class="row">Montag 24 Stunden geöffnet </div>

                        <div class="row">Dienstag 00:00 – 03:00, 10:00 – 03:00</div>
                        <div class="row">Mittwoch 10:00 – 03:00</div>
                        <div class="row"> Donnerstag 10:00 – 03:00</div>
                        <div class="row"> Freitag 10:00 – 03:00</div>

                        <div class="row">Samstag 15:00 – 23:00</div>
                        <div class="row">Sonntag 15:00 – 23:00</div>
                    </div>
                    <div class="col">
                        <div class="row fw-bold mt-4 mt-md-0">Telefon</div>
                        <div class="row">0711 329832</div>
                    </div>
                </div>


            </div>

        </div>





    </div>


    <?php include 'footer.php'; ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $("#contactForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                message: {
                    required: true,
                },
                privacyPolicy: {
                    required: true,
                }
            },
            messages: {
                email: "Bitte eine gültige Email eingeben.",
                message: "Nachricht darf nicht leer sein.",
                privacyPolicy: "Bitte akzeptieren Sie die Datenschutzerklärung."
            },
            submitHandler: function(form) {
                /*alert("Formular wurde erfolgreich validiert!");*/
                form.submit(); // Optional: Standardformular senden
            }
        });
    </script>
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            let form = document.getElementById("contactForm");

            form.addEventListener("submit", function(event) {

                let captchaResponse = document.getElementById("g-recaptcha-response");

                
               
                // ... [weitere Validierungslogik hier] ...

                if (!captchaResponse.value) {
                    event.preventDefault();
                    document.getElementById("recaptcha").innerHTML= "Recaptcha ist ein Pflichtfeld!";
                    document.getElementById("recaptcha").style.color = "yellow";
                    
                }

          
                else{
                    document.getElementById("recaptcha").innerHTML = "";
                    console.log("geh weg");
                }
            });
        });
    </script>-->
    <!--<script>
            let jsToogler = document.getElementById("jsToggler");
            let js = true;
            jsToggler.onclick = function(){
                js = !js;
                if (js == true) {
                    $("#contactForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                message: {
                    required: true,
                },
                privacyPolicy: {
                    required: true,
                }
            },
            messages: {
                email: "Bitte eine gültige Email eingeben.",
                message: "Nachricht darf nicht leer sein.",
                privacyPolicy: "Bitte akzeptieren Sie die Datenschutzerklärung."
            },
            submitHandler: function(form) {
                /*alert("Formular wurde erfolgreich validiert!");*/
                form.submit(); // Optional: Standardformular senden
            }
        });
                }else {
                    jsToggler.value = "PHP is active";
            }
            }
            
        </script>-->
</body>

</html>