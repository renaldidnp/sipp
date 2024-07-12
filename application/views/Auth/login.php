<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">

                        <div class="card-body">
                            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                            <?php endif; ?>
                            <form role="form" method="post" action="<?php echo base_url('auth/login'); ?>" class="text-start">
                                <label class="form-label">Email</label>
                                <div class="input-group input-group-outline my-3">
                                    <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
                                </div>
                                <label class="form-label">Password</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <p>email: admin@admin.com <br> password: 123</p>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>