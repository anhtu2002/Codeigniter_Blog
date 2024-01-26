<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php') ?>
<div class="body-content" style="min-height: 600px;">
    <div class="contentt">
        <div class="wrap">
            <h1>CHỈNH SỬA THÔNG TIN NGƯỜI DÙNG</h1>
            <?php
            $id = $results["user_id"];
            $name = $results["user_name"];
            $email = $results["user_email"];
            $type = $results["type"];
            $status = $results["status"];

            ?>
            <div class="my-info">
                <form method="post" class="form_infor" action="<?php echo site_url('user/edit_user/') . $id; ?>">
                    <div class=" info">
                        <div class="wrap-content">
                            <label for="">Họ và Tên: </label>
                            <input type="text" disabled  name="user_name" value="<?php echo $name ?>">
                        </div>
                        <div class="wrap-content">
                            <label for="">Email: </label>
                            <input type="text" disabled value="<?php echo $email ?>">
                        </div>

                        <div class="wrap-content">
                            <label for="">Type: </label>
                            <select name="type" id="" onchange="update_btn_display()">
                                <option value="<?php echo $type ?>"><?php echo $type ?></option>
                                <option value="<?php
                                                if ($type == 'user') {
                                                    echo "admin";
                                                }
                                                if ($type == 'admin') {
                                                    echo "user";
                                                }
                                                ?>"><?php
                                                    if ($type == 'user') {
                                                        echo "admin";
                                                    }
                                                    if ($type == 'admin') {
                                                        echo "user";
                                                    }
                                                    ?></option>
                            </select>
                        </div>
                        <div class="wrap-content">
                            <label for="">Status: </label>
                            <select name="status" id="" onchange="update_btn_display()">
                                <option value="<?php echo $status ?>"><?php echo $status ?></option>
                                <option value="<?php
                                                if ($status == 'active') {
                                                    echo "block";
                                                }
                                                if ($status == 'block') {
                                                    echo "active";
                                                }
                                                ?>"><?php
                                                    if ($status == 'active') {
                                                        echo "block";
                                                    }
                                                    if ($status == 'block') {
                                                        echo "active";
                                                    }
                                                    ?>
                                </option>
                            </select>
                        </div>
                        <button type=" submit" id="btn_update" disabled>Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer.php') ?>