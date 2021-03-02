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
            <form method="post" action="<?= base_url('rating/multiple_create') ?>">
                <button type="submit" class="btn btn-block btn-danger font-weight-bold">Save Rating</button>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3 mt-3">
                        <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Book Name ...">
                    </div>
                </div>
                <div class="row card-deck" id="myItems">

                    <?php foreach ($books as $book) : ?>
                        <div class="col-3 mb-3">
                            <div class="card" style="height: 500px;">
                                <img class="card-img-top" src="<?= $book["URL_IMAGE_M"]; ?>" alt="Card image">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $book["AUTHOR"]; ?></h5>
                                    <p class="card-text mb-3"><?= $book["TITLE"]; ?></p>

                                    <label for="">rating</label>
                                    <br>
                                    <input type="hidden" name="id[]" value="<?= $book["BOOK_ID"]; ?>">

                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" <?php if ($book["RATE"] == 1) : ?>checked<?php endif; ?> name="rating_value_<?= $book["BOOK_ID"]; ?>" value="1">1
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" <?php if ($book["RATE"] == 2) : ?>checked<?php endif; ?> name="rating_value_<?= $book["BOOK_ID"]; ?>" value="2">2
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" <?php if ($book["RATE"] == 3) : ?>checked<?php endif; ?> name="rating_value_<?= $book["BOOK_ID"]; ?>" value="3">3
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" <?php if ($book["RATE"] == 4) : ?>checked<?php endif; ?> name="rating_value_<?= $book["BOOK_ID"]; ?>" value="4">4
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" <?php if ($book["RATE"] == 5) : ?>checked<?php endif; ?> name="rating_value_<?= $book["BOOK_ID"]; ?>" value="5">5
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" <?php if ($book["RATE"] == 6) : ?>checked<?php endif; ?> name="rating_value_<?= $book["BOOK_ID"]; ?>" value="6">6
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" <?php if ($book["RATE"] == 7) : ?>checked<?php endif; ?> name="rating_value_<?= $book["BOOK_ID"]; ?>" value="7">7
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" <?php if ($book["RATE"] == 8) : ?>checked<?php endif; ?> name="rating_value_<?= $book["BOOK_ID"]; ?>" value="8">8
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" <?php if ($book["RATE"] == 9) : ?>checked<?php endif; ?> name="rating_value_<?= $book["BOOK_ID"]; ?>" value="9">9
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" <?php if ($book["RATE"] == 10) : ?>checked<?php endif; ?> name="rating_value_<?= $book["BOOK_ID"]; ?>" value="10">10
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <button type="submit" class="btn btn-block btn-danger font-weight-bold">Save Rating</button>
            </form>
        </div>
    </div>
</div>