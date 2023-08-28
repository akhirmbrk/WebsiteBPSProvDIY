<body class="min-h-fullscreen bg-img center-vh p-20" style="background-image: url(<?= base_url('');
                                                                                    ?>/assets/img/bg/bg_bps.png);" data-overlay="7">

    <div class="card card-round card-shadowed px-50 py-30 w-400px mb-0" style="max-width: 100%">
        <h5 class="text-uppercase">Sign in</h5>
        <br>
        <form class="form-type-material">
            <div class="form-group">
                <input type="text" placeholder="Username" class="form-control" id="username">
                <label for="username"></label>
            </div>

            <div class="form-group">
                <input type="password" placeholder="Password" class="form-control" id="password">
                <label for="password"></label>
            </div>

            <div class="form-group flexbox">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked>
                    <label class="custom-control-label">Remember me</label>
                </div>

                <a class="text-muted hover-primary fs-13" href="#">Forgot password?</a>
            </div>

            <div class="form-group">
                <!-- <button class="btn btn-bold btn-block btn-primary" type="submit">Login</button> -->
                <a class="btn btn-bold btn-block btn-primary" href="<?= base_url('monitoring/index/dashboard') ?>">Login</a>
            </div>
        </form>


        <p class="text-center text-muted fs-13 mt-20">Don't have an account? <a class="text-primary fw-500" href="#">Sign up</a></p>
    </div>

</body>

</html>