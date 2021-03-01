<style>
    .container {
        padding: 10px;
    }

    ul li {
        list-style: none;
    }
</style>

<div class="courses">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <br>
                    <h2 class="section_title">SISTEM REKOMENDASI BUKU</h2>
                    <div class="section_subtitle">
                        <p>Menggunakan Item-based Clustering Hybrid Method</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="courses_row">
            <?= $this->session->flashdata("message"); ?>
            <div class="row card-deck" id="myItems">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-3">
                    
                    <div class="card" style="height: 500px;">
                        <img class="card-img-top" src="<?= $book_selected->URL_IMAGE_M; ?>" alt="Card image">
                        
                        <div class="card-body">
                            <h5 class="card-title">Penulis : <?= $book_selected->AUTHOR; ?></h5>
                            <p class="card-text mb-3">Judul : <?= $book_selected->JUDUL; ?></p>
                            <p class="card-text mb-3 font-weight-bold">Rating : <?= $book_rating_selected; ?></p>
                        </div>

                    </div>
                </div>

                <?php if ($this->session->userdata('level') == 1) : ?>
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 mb-9">
                    <div class="card bg-light">
                        <div class="card-body">
                            <p class="mb-3 font-weight-bold">Mean MAE : <?= $mean_MAE; ?></p>
                            <p class="mb-3 font-weight-bold">Time Execution : <?= $time_execution; ?> microsecond</p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <hr>

            <h3 class="section_title text-center mb-3">Hasil Rekomendasi <?= count($book_recommend); ?> Buku</h3>

            <div class="row card-deck" id="myItems">

                <?php foreach ($book_recommend as $book) : ?>
                    <?php if ($book["book"]->ISBN != $book_selected->ISBN) : ?>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-3">
                        
                        <div class="card" style="height: 500px;">
                            <img class="card-img-top" src="<?= $book["book"]->URL_IMAGE_M; ?>" alt="Card image">
                            
                            <div class="card-body">
                                <h5 class="card-title">Penulis : <?= $book["book"]->AUTHOR; ?></h5>
                                <p class="card-text mb-3">Judul : <?= $book["book"]->JUDUL; ?></p>
                                <p class="card-text mb-3 font-weight-bold"><?php if ($this->session->userdata('level') == 1) : ?>Rating Prediction<?php else: ?>Rating<?php endif; ?> : <?= $book["rating_predic"]; ?></p>
                                <?php if ($this->session->userdata('level') == 1) : ?><p class="card-text mb-3 font-weight-bold">Rating Real : <?= $book["rating_real"]; ?></p><?php endif; ?>
                            </div>

                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>