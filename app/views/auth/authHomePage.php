<?php
include "../app/class/App.php";
include "../app/class/Session.php";
include "../app/models/Database.php";
include "../app/models/QCModel.php";

Session::getInstance()->restrictUser("auth");
$db = App::getDatabase();
$qcm = new QCModel();
$listQCM = $qcm->fetchAllQcm($db);
$listLastQcm = $qcm->fetchOnlyLastQCM($db);
?>
<div class="containerHome pb-5">
    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#7451eb" fill-opacity="1" d="M0,128L34.3,106.7C68.6,85,137,43,206,69.3C274.3,96,343,192,411,240C480,288,549,288,617,266.7C685.7,245,754,203,823,176C891.4,149,960,139,1029,154.7C1097.1,171,1166,213,1234,202.7C1302.9,192,1371,128,1406,96L1440,64L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path>
    </svg> -->
    <div class="container containerHome-containerBody">
        <h3 class="row_title pl-3">Trending Now</h3>
        <!--  -->
        <div class="containerHome-containerBody_carousel px-2 mb-2">
            <div class="row">
                <div class="row_posters" onscroll="getScrollVal()">
                    <?php foreach ($listLastQcm as $qcm) : ?>
                        <div class="wrap">
                            <img src="data/img/<?= $qcm->poster_movie ?>" alt="movieImage" class="row_poster" />
                            <h6 class="poster_title"><?= $qcm->title_movie ?></h6>
                            <div class="poster_info">
                                <h5><?= $qcm->title_movie ?></h5>
                                <div class="row">
                                    <p class="font-weight-bold my-1">Réalisateur : </p> <p> <?= $qcm->director_movie ?> </p>
                                </div>
                                <div class="row">
                                    <p class="font-weight-bold my-1">Date de sortie</p>
                                    <p><?= $qcm->release_date ?></p>
                                </div>
                                <div class="block-btn text-center">
                                    <a href="/accueil/qcm?id=<?= $qcm->id_qcm ?>" class="btn btn-custome btn-lg">Comencer</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <div class="wrap">
                        <img src="https://image.tmdb.org/t/p/original///56v2KjBlU4XaOv9rVYEQypROD7P.jpg" alt="movieImage" class="row_poster" />
                        <h5 class="poster_title">Stranger Things</h5>
                        <div class="poster_info">
                            <h4>Stranger Things</h4>
                            <p>When a young boy vanishes, a small town uncovers a mystery involving secret experiments, terrifying supernatural forces, and one strange little girl.</p>
                        </div>
                    </div>
    
                    <div class="space"></div>
                    <div class="left_arrow scroll_button" onclick="scrollL()">
                        <i class="arrow left"></i>
                    </div>
                    <div class="right_arrow scroll_button" onclick="scrollR()">
                        <i class="arrow right"></i>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="row containerHome-containerBody_body p-4 mt-2 mb-4">
            <div class="card-columns">
                <?php foreach ($listQCM as $qcm) : ?>
                    <div class="card border" style="width: 18rem;">
                        <a href="/accueil/qcm?id=<?= $qcm->id_qcm ?>">
                            <img class="card-img-top" src="data/img/<?= $qcm->poster_movie ?> " alt="<?= $qcm->poster_movie ?> " class="containerHome-containerBody_body_poster" style="max-height: 381px; ">
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<script>
    function scrollL() {
        let x = document.getElementsByClassName("row_posters")[0];
        let step = window.outerWidth / 2;
        x.scrollLeft -= step;
    }

    function scrollR() {
        let x = document.getElementsByClassName("row_posters")[0];
        let step = window.outerWidth / 2;
        x.scrollLeft += step;
    }

    function getScrollVal() {
        setTimeout(() => {
            let x = document.getElementsByClassName("row_posters")[0];
            let el = document.getElementsByClassName("left_arrow")[0];
            if (x.scrollLeft == 0) {
                el.style.display = "none";
            } else {
                el.style.display = "flex";
            }
            let el2 = document.getElementsByClassName("right_arrow")[0];
            let right = x.scrollWidth - (x.scrollLeft + x.clientWidth) + 1;
            if (right <= 2) {
                el2.style.display = "none";
            } else {
                el2.style.display = "flex";
            }
        }, 550);
    }

    getScrollVal();
</script>