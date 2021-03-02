<div class="container"><br><br><br>

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-12 col-md-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <hr>
                                <?= $this->session->flashdata("message"); ?>
                                <form method="post" class="user" action="<?= base_url('auth');  ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<div class="text-danger small ml-3">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" placeholder="Password" name="password">
                                        <?= form_error('password', '<div class="text-danger small ml-3">', '</div>'); ?>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                </form>
                                <hr>
                                <br>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/register'); ?>">Create a new account!</a>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>