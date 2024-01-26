<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php') ?>
<div class="body-content" style="min-height: 600px;">
    <div class="login-wrap">
        <div class="login">
            <h1>ĐĂNG KÝ</h1>
            <?php
            //if ($loginMsg != '') {
            ?>
            <div class="alert alert-danger"><?php //echo $loginMsg; 
                                            ?></div>

            <?php
            //}
            ?>

            <form action="<?php echo site_url('user/create'); ?>" method="post" class="login-form">
                <label for="">Họ và Tên: </label>
                <input required type="Text" name="user_name" id="user_name" placeholder="Name..." />
                <label for="">Email: </label>
                <input required type="email" name="user_email" id="user_email" placeholder="Email..." />
                <label for="">Ảnh đại diện: </label>
                <input type="file" name="user_ava" id="user_ava" accept="image/*" />
                <div class="type">
                    <input type="radio" id="user" name="type" value="user" onchange="checkPasswordMatch()">
                    <label>user</label>
                    <input type="radio" id="admin" name="type" value="admin" onchange="checkPasswordMatch()">
                    <label>admin</label>
                </div>
                <label for="">Mật khẩu: </label>
                <input required type="password" name="pass" id="pass" placeholder="Pass Word" />
                <label for="">Xác nhận mật khẩu: </label>
                <input required type="password" id="repass" placeholder="Pass Word" oninput="checkPasswordMatch()" />
                <input type="text" name="status" id="status" value="active" style=" visibility: hidden" />
                <h5 style="color: red;" id="message"></h5>
                <button id="signup" class="signup-btn" disabled>
                    Đăng ký
                </button>

            </form>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer.php') ?>