<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php');
$id = $results["user_id"]; ?>
<div id="layer1" class="layer1">

</div>
<div id="wrap_change" class="wrap_change">
    <div onclick="cancel()" id="cancel_icon"><i class="fa-solid fa-xmark"></i></div>
    <h2>ĐỔI MẬT KHẨU</h2>
    <form id="form_change" action="<?php echo site_url('user/change_pas/') . $id ?>">
        <input oninput="check_pas()" required id="old_pass" name="old_pas" type="password" placeholder="Mật khẩu hiện tại">
        <input onchange="check_pas()" required id="new_pass" name="new_pas" type="password" placeholder="Mật khẩu mới">
        <input oninput="check_pas()" required id="re_pass" type="password" placeholder="Xác nhận mật khẩu">
        <h5 id="check_pass" style="color:red;">Mật khẩu xác nhận không trùng khớp</h5>
        <h5 id="mess_pass"></h5>
        <input disabled type="button" id="btn_submit" value="Cập nhật">
    </form>
</div>
<div class="body-content" id="body-content" style="min-height: 600px;">
    <div class="contentt">
        <div class="wrap">
            <h1>THÔNG TIN CÁ NHÂN</h1>
            <?php
            $name = $results["user_name"];
            $email = $results["user_email"];
            $avata = $results["user_ava"];
            $type = $results["type"];
            $slogan = $results["slogan"];
            $my_des = $results["my_des"];
            $url_fb = $results["url_fb"];
            $url_tw = $results["url_tw"];
            $url_ig = $results["url_ig"];
            $url_in = $results["url_in"];

            ?>
            <div class="my-info">
                <form method="post" class="form_infor" action="<?php echo site_url('user/infor'); ?>" enctype="multipart/form-data">
                    <div class="form_header">
                        <div class="avata">
                            <div class="img">
                                <img id="avata-img" src="<?php echo base_url('/') . 'uploaded/' . $id . '/avata' . '/' . $avata ?>" alt="">
                            </div>
                            <label id="label-file" for="upload-photo">Chọn ảnh</label>
                            <input type="file" id="upload-photo" onchange="update_btn_display()" name="user_ava" accept="image/*">
                        </div>

                        <div class=" info">
                            <div class="wrap-content">
                                <label for="">Họ và Tên: </label>
                                <input type="text" oninput="update_btn_display()" name="user_name" value="<?php echo $name ?>">
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
                        </div>
                    </div>
                    <div class="form_footer">
                        <div class="infor_detail">
                            <div class="detail-left">
                                <div class="wrap-text">
                                    <label for="">Slogan: </label>
                                    <br>
                                    <textarea oninput="update_btn_display()" name="slogan" type="text"><?php echo $slogan ?></textarea>
                                </div>
                                <div class="wrap-text">
                                    <label for="">Mô tả bản thân: </label>
                                    <br>
                                    <textarea oninput="update_btn_display()" name="my_des" type="text"><?php echo $my_des ?></textarea>
                                </div>
                            </div>
                            <div class="detail-right">
                                <div class="wrap-text">
                                    <label for=""><i class="fa-brands fa-facebook"></i></label>
                                    <input name="url_fb" oninput="update_btn_display()" type="text" value="<?php echo $url_fb ?>">
                                </div>
                                <div class="wrap-text">
                                    <label for=""><i class="fa-brands fa-twitter"></i></label>
                                    <input name="url_tw" oninput="update_btn_display()" type="text" value="<?php echo $url_tw ?>">
                                </div>
                                <div class="wrap-text">
                                    <label for=""><i class="fa-brands fa-instagram"></i></label>
                                    <input name="url_ig" oninput="update_btn_display()" type="text" value="<?php echo $url_ig ?>">
                                </div>
                                <div class="wrap-text">
                                    <label for=""><i class="fa-brands fa-linkedin"></i></label>
                                    <input name="url_in" oninput="update_btn_display()" type="text" value="<?php echo $url_in ?>">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="wrap_btn">
                        <button id="btn_update" disabled>Cập nhật</button>
                        <h3 id="change_pas_btn" onclick=" display_change()">Đổi mật khẩu</h3i>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="partent">
        <div class="par_left"></div>
        <div class="par_right"></div>
    </div>

    <!-- my post -->

    <div class="my_post_wrap">
        <h1>My Posts</h1>
        <?php
        if (count($posts) <= 2) {
            echo "<h3>You haven't posted anything yet</h3>";
        } else {
            foreach ($posts as $post) {
                if ($post == "*") {
                    break;
                }
                $url_img = base_url("/") . 'uploaded/' . $post['user_id'] . '/blog' . '/' . $post['blog_img'];
                $url_my_blog = site_url('blog_post/').$post['blog_id'];
                echo '
                <div class="post_wrap">
                    <div class="post_blog">
                        <a href="'.$url_my_blog.'"><div class="post_img">
                            <img src="' . $url_img . '" alt="">
                        </div></a>
                        
                        <div class="post_content">
                            <h3>' . $post['cate_name'] . '</h3>
                            <h2>' . $post['blog_name'] . '</h2>
                            <p>' . $post['blog_summary'] . '</p>
                        </div>
                    </div>
                </div>           
            ';
            }
        }
        ?>

    </div>
    <div class="pages_numb">
        <?php

        $offet_blog = 5;
        $lenght = count($posts);
        $numb_blog = $posts[$lenght - 1][0]['count'];
        $numb_page = ceil($numb_blog / $offet_blog);
        for ($i = 1; $i <= $numb_page; $i++) {
            if ($i == $active) {
                echo
                '
                <div class = "page_numb active_page"  >
                    <h2 class = "index">' . $i . '</h2>
                </div>
            ';
            } else {
                echo
                '
                <div class = "page_numb "  >
                    <h2 class = "index">' . $i . '</h2>
                </div>
            ';
            }
        };




        ?>
    </div>

</div>
<form id="hidden-form-page" style="display: none">
    <input id="offset" name="offset" type="text">
</form>

<script>
    $(document).ready(function() {
        $("#btn_submit").on("click", function() {
            var formData = $('#form_change').serialize();
            ///ajax
            $.ajax({
                type: "POST",
                url: $('#form_change').attr('action'), // Đường dẫn đến file xử lý form
                data: formData,
                success: function(response) {
                    if (response == "ok") {
                        $("#mess_pass").text('Đổi mật khẩu thành công').css("color", "green");
                    } else if (response == "false") {
                        $("#mess_pass").text('Mật khẩu hiện tại không đúng!').css("color", "red");
                    }
                },
                // Kiểm tra và thêm lớp khi opacity là 0

                error: function() {
                    alert("Error submitting the form");
                }
            });

        });
        $(".page_numb").on("click", function() {
            var index = $(this).find(".index").text();
            document.getElementById('offset').value = index;

            ///ajax
            $.ajax({
                type: "POST",
                url: "http://localhost/tublog.dev/index.php/user/infor", // Đường dẫn đến file xử lý form
                data: {
                    offset: index,
                },
                success: function(response) {

                    $(".body").html(response);
                    $(this).addClass("active_page");
                },
                error: function() {
                    alert("Error submitting the form");
                }
            });

        });
    });
    ///
</script>
<?php $this->load->view('templates/footer.php') ?>