<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php');
$id = $results["user_id"]; ?>
<div class="body-content" id="body-content" style="min-height: 600px;">
    <div class="contentt">
        <div class="wrap">
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
            <div class="img">
                <img src="<?php echo base_url('uploaded/') . $id . '/avata' . '/' . $avata; ?>" alt="">
            </div>
            <div class="content-author">
                <h2><?php echo $slogan; ?></h2>
                <p><?php echo $my_des ?></p>
                <div class="social-wrap">
                    <a href="<?php echo $url_fb; ?>"><i class="fa-brands fa-facebook"></i></a>
                    <a href="<?php echo $url_tw; ?>"><i class="fa-brands fa-twitter"></i></a>
                    <a href="<?php echo $url_ig; ?>"><i class="fa-brands fa-instagram"></i></a>
                    <a href="<?php echo $url_in; ?>"><i class="fa-brands fa-linkedin"></i></i></a>

                </div>
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
        if (count($posts) == 0) {
            echo "<h3>Author haven't posted anything yet</h3>";
        } else {
            foreach ($posts as $post) {
                if ($post == "*") {
                    break;
                }
                $url_img = base_url("/") . 'uploaded/' . $post['user_id'] . '/blog' . '/' . $post['blog_img'];
                $url_my_blog = site_url('blog_post/') . $post['blog_id'];
                echo '
                <div class="post_wrap">
                    <div class="post_blog">
                    <a href="' . $url_my_blog . '">
                        <div class="post_img">
                            <img src="' . $url_img . '" alt="">
                        </div>
                    </a>
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
                <div class = "page_numb active_page"  data-uid ="'.$uid.'">
                    <h2 class = "index">' . $i . '</h2>
                </div>
            ';
            } else {
                echo
                '
                <div class = "page_numb " data-uid ="' . $uid . '" >
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
        
        $(".page_numb").on("click", function() {
            var index = $(this).find(".index").text();
            document.getElementById('offset').value = index;
            var user_id = $(this).data("uid");

            ///ajax
            $.ajax({
                type: "POST",
                url: "http://localhost/tublog.dev/index.php/author/"+ user_id, // Đường dẫn đến file xử lý form
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