<?php

require_once "../app/class/App.php";
require_once "../app/models/Database.php";
require_once "../app/models/QCModel.php";

$qcm = new QCModel();
$db = App::getDatabase();
$listQcm = $qcm->fetchAllQcm($db);

// var_dump($listQcm);
?>
<!-- Swiper -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="../../css/homePage.css">

<div class="container-home curved-div pb-5">
    <div class="section">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#7451eb" fill-opacity="1" d="M0,128L34.3,106.7C68.6,85,137,43,206,69.3C274.3,96,343,192,411,240C480,288,549,288,617,266.7C685.7,245,754,203,823,176C891.4,149,960,139,1029,154.7C1097.1,171,1166,213,1234,202.7C1302.9,192,1371,128,1406,96L1440,64L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path>
        </svg> -->
    </div>
    <div class="containerBody">
        <h1 class="display-4 text-uppercase containerBody_title">The QCM Land<i class="fas fa-check-double fa-1x containerBody_title-icon"></i></h1>
        <p class="mb-0 containerBody_text">Outil d'édition de quiz pour créer des quiz en ligne</p>
        <div class="container px-5 py-3  ">
            <div class="card-deck">
                <div class="card blockInfo">
                    <div class="card-body">
                        <h5 class="card-title">Utilisateur</h5>
                        <p class="lead">Testez vos connaissances dans des quiz</p>
                        <p class="lead text-left">
                            <b>-</b> <b>1 point</b> par question.<br>
                            <b>-</b> <b>1 seul</b> réponse possible</b> pour chaque question.<br>
                            <b>-</b> Pas de <b>point négatif</b> pour les mauvaises réponses.
                        </p>
                        <p class="lead">Consulter les résultats sur votre page Profil</p>
                        <a href="/inscription" class="btn px-3">Inscription</a>
                    </div>
                </div>
                <div class="card blockInfo ">
                    <div class="card-body px-5">
                        <h5 class="card-title">Auteur</h5>
                        <p class="lead">Modification des QCM</p>
                        <p class="lead text-left">
                            <b>-</b> changer l'affiche du film<br>
                            <b>-</b> modiffier les questions<br>
                        </p>
                        <p class="lead">Créer de nouveau QCM</p>
                        <a href="/connection" class="btn px-3">Connection</a>
                    </div>
                </div>
                <!-- <div class="card blockInfo">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    </div>
                </div> -->
            </div>
            <div class="containerBody_banner mt-3">
                <a href="#baner-movie" class="btn px-3"><i class="fas fa-align-justify"></i> Voire le cathalogue</a>
            </div>
        </div>
    </div>
</div>
<div class="baner-movie" id="baner-movie">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#4ED8D9" fill-opacity="1" d="M0,96L9.2,96C18.5,96,37,96,55,85.3C73.8,75,92,53,111,64C129.2,75,148,117,166,122.7C184.6,128,203,96,222,74.7C240,53,258,43,277,69.3C295.4,96,314,160,332,176C350.8,192,369,160,388,170.7C406.2,181,425,235,443,266.7C461.5,299,480,309,498,309.3C516.9,309,535,299,554,293.3C572.3,288,591,288,609,245.3C627.7,203,646,117,665,122.7C683.1,128,702,224,720,240C738.5,256,757,192,775,170.7C793.8,149,812,171,831,192C849.2,213,868,235,886,245.3C904.6,256,923,256,942,245.3C960,235,978,213,997,213.3C1015.4,213,1034,235,1052,229.3C1070.8,224,1089,192,1108,197.3C1126.2,203,1145,245,1163,224C1181.5,203,1200,117,1218,96C1236.9,75,1255,117,1274,122.7C1292.3,128,1311,96,1329,90.7C1347.7,85,1366,107,1385,96C1403.1,85,1422,43,1431,21.3L1440,0L1440,0L1430.8,0C1421.5,0,1403,0,1385,0C1366.2,0,1348,0,1329,0C1310.8,0,1292,0,1274,0C1255.4,0,1237,0,1218,0C1200,0,1182,0,1163,0C1144.6,0,1126,0,1108,0C1089.2,0,1071,0,1052,0C1033.8,0,1015,0,997,0C978.5,0,960,0,942,0C923.1,0,905,0,886,0C867.7,0,849,0,831,0C812.3,0,794,0,775,0C756.9,0,738,0,720,0C701.5,0,683,0,665,0C646.2,0,628,0,609,0C590.8,0,572,0,554,0C535.4,0,517,0,498,0C480,0,462,0,443,0C424.6,0,406,0,388,0C369.2,0,351,0,332,0C313.8,0,295,0,277,0C258.5,0,240,0,222,0C203.1,0,185,0,166,0C147.7,0,129,0,111,0C92.3,0,74,0,55,0C36.9,0,18,0,9,0L0,0Z"></path>
    </svg>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php foreach ($listQcm as $qcm) : ?>
                <div class="swiper-slide"><img src="../data/img/<?= $qcm->poster_movie ?>" alt="" class="swiper-slide__img"></div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<!-- Swiper JS -->
<!-- <script src="https://unpkg.com/swiper/js/swiper.min.js"></script> -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 20,
            stretch: 0,
            depth: 200,
            modifier: 1,
            slideShadows: true,
        },
        loop: true,
        autoplay: {
            delay: 1200,
            disableOnInteraction: false,
        }
    });
</script>