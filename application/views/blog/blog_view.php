<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php')
?>
<div class="body-content" style="min-height: 600px;">
    <div class="blog_header">
        <div class="header_content_wrap">
            <div class="header_content">
                <h3>Featured Post</h3>
                <?php
                $url_feature = site_url('blog_post/') . $results[0]["blog_id"];
                $url_user = site_url('author/') . $results[0]["user_id"];
                echo '
                <h2>' . $results[0]['blog_name'] . '</h2>
                <h4>By <a href="'.$url_user.'">' . $results[0]["user_name"] . ' </a> | ' . $results[0]["date"] . '</h4>
                <p>' . $results[0]["blog_summary"] . '</p>
                <a href="'.$url_feature.'">
                    <div class="btn_read">
                        <h3>Read More ></h3>
                    </div>
                </a>
                
                ';
                ?>

                

            </div>
            <div class="header_img">
                <img src="<?php
                            $url_header = base_url("uploaded/") . $results[0]['user_id'] . '/' . 'blog/' . $results[0]["blog_img"];
                            echo  $url_header ?>" alt="">
            </div>
        </div>


    </div>
    <h1 class="all_post">All posts</h1>
    <div class="wrap_all_post">
        <?php
        foreach ($results as $result) {
            if ($result == "*") break;
            $url_blog = site_url('blog_post/') . $result["blog_id"];
            $url_cate = site_url('category/') . $result["cate_name"];
            $url_img_post = base_url("uploaded/") . $result['user_id'] . '/' . 'blog/' . $result["blog_img"];
            echo '
        <div class="post">
            <a href="'.$url_blog.'">
                <div class = "img_post">
                    <img src="' . $url_img_post . '" alt="">
                </div>
            </a>
            
            <div class="post_content">
                <a href="'.$url_cate.'"><h3>' . $result["cate_name"] . '</h3> </a>
                <a href="'.$url_blog.'">
                <h2>' . $result["blog_name"] . '</h2>
                <p>' . $result["blog_summary"] . '</p>
                </a>
                
            </div>
        </div>';
        }
        ?>
    </div>
    <a href=""></a>
    <div class="pages_numb">

        <?php
        if ($results != "Unauthorized") {
            $offet_blog = 5;
            $lenght = count($results);
            $numb_blog = $results[$lenght - 1][0]['count'];
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
        }



        ?>
    </div>
    <h1 class="all_cate">All Categories</h1>
    <div class="all_cate_list">
        <?php 
        $url_cate = site_url("/category").'/';
        foreach ($list_cate as $cate){
            echo '
            
            <div class="cate">
                <div class = "wrap_cate">
                <a href="'.$url_cate.$cate['cate_name'].'">
                    <div class="cate_icon">'.$cate['cate_icon']. '

                    </div>
                    <h2>' . $cate['cate_name'] . '</h2>
                    <p>' . $cate['cate_desc'] . '</p>
                </a>
                </div>
            </div>
            
        ';
        }?>
    </div>
</div>
<form id="hidden-form-page" style="display: none">
    <input id="offset" name="offset_blog" type="text">
</form>
<!-- xử lý submit -->


<script>
    $(document).ready(function() {
        $(".page_numb").on("click", function() {
            var index = $(this).find(".index").text();
            document.getElementById('offset').value = index;

            ///ajax
            $.ajax({
                type: "POST",
                url: "http://localhost/tublog.dev/index.php/blog/all_blog", // Đường dẫn đến file xử lý form
                data: {
                    offset_blog: index,
                },
                success: function(response) {

                    $(".body").html(response);
                },
                error: function() {
                    alert("Error submitting the form");
                }
            });

        });

    });
    ///
</script>
<?php $this->load->view('templates/join.php') ?>
<?php $this->load->view('templates/footer.php') ?>