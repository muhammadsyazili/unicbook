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
            <form method="post" action="<?= base_url('recommend/show') ?>">
                <button type="submit" class="btn btn-block btn-danger font-weight-bold">Search Recommendation</button>
  
                <div class="row card-deck" id="myItems">

                    <?php foreach ($books as $book) : ?>
                        <div class="col-3 mb-3 mt-3">
                            
                            <div class="card" style="height: 500px;">
                                <img class="card-img-top" src="<?= $book->URL_IMAGE_M; ?>" alt="Card image">
                                
                                <div class="card-body">

                                    <h5 class="card-title"><?= $book->AUTHOR; ?></h5>
                                    <p class="card-text mb-3"><?= $book->JUDUL; ?></p>
                                    
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="filter" value="<?= $book->ISBN; ?>">Select
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                <button type="submit" class="btn btn-block btn-danger font-weight-bold">Search Recommendation</button>
                                            
            </form>
        </div>
    </div>
</div>