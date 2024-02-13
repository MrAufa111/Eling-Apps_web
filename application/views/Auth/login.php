<div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
<div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <form action="<?= base_url('Auth') ?>" method="POST">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4  justify-content-center align-items-center d-flex">
                                    <img src="<?= base_url('assets/image/Logo.png') ?>" class="rounded w-50 " alt="">
                                </div>
                                <div class="pt-1 pb-2 ">
                                    <h5 class="card-title text-center pb-0 fs-4">Login Your Account</h5>
                                </div>
                                <form class="row g-3 needs-validation" novalidate>
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="username" class="form-control" id="yourUsername" required placeholder="Username">
                                            <div class="invalid-feedback">Please enter your username.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required placeholder="Password">
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit" onclick="submitLoginForm()">Login</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>