<div class="courses">
    <div class="section_background parallax-window" data-parallax="scroll" data-image-src="images/courses_background.jpg" data-speed="0.8"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">My Profile</h2>
                </div>
            </div>
        </div>

        <?= "Selamat datang " . $data['users']->USERNAME;?>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?= base_url('assets/images/') . $data_user['IMAGE']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $data_user['USERNAME'] ?></h5>
                <p class="card-text"><?= $data_user['AGE'] ?></p>
                <p class="card-text"><?= $data_user['LOCATION'] ?></p>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
</div>