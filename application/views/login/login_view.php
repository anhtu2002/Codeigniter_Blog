<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php') ?>
<div class="login-wrap">
    <div class="login">
        <h1>Đăng nhập</h1>
        <?php
        if ($loginMsg != '') {
        ?>
            <div class="alert alert-danger"><?php echo $loginMsg; ?></div>

        <?php
        }
        ?>
        <form action="<?php echo site_url('login'); ?>" method="post" class="login-form">
            <label for="">Tên đăng nhập: </label>
            <input type="email" name="user_email" id="user_email" placeholder="Email" />
            <label for="">Mật khẩu: </label>
            <input type="password" name="pass" id="pass" placeholder="Pass Word" />
            <h5 style="color: red;" class="error-message"></h5>
            <button type="submit">Đăng nhập</button>

            <a href=" <?php echo site_url('user/create'); ?>">
                <div class="signup-btn">
                    Đăng ký
                </div>
            </a>
        </form>
    </div>
</div>
<?php $this->load->view('templates/footer.php') ?>