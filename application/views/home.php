<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php') ?>
<div class="body-content" style="min-height: 600px;">
    <div class="slider">
        <?php
        for ($i = 0; $i < $numb_cate; $i++) {
            $cate_blog = "cate_" . $i;
            $url_head = base_url('/') . 'uploaded/' . ${$cate_blog}[0]["user_id"] . '/blog' . '/' . ${$cate_blog}[0]["blog_img"];
            $url_blog = site_url('blog_post/'). ${$cate_blog}[0]["blog_id"];
            echo '<div class="home-hero" >
                    <div class="img-wrap">
                        <img src="' . $url_head . '" alt="">
                    </div>

                    <div class="home-info ">
                        <h4>Posted on ' . ${$cate_blog}[0]['cate_name'] . '</h4>
                        <h1>' . ${$cate_blog}[0]["blog_name"] . '</h1>
                        <h5>By ' . ${$cate_blog}[0]["user_name"] . ' | ' . ${$cate_blog}[0]["date"] . '</h5>
                        <p>' . ${$cate_blog}[0]["blog_summary"] . '</p>
                        <a href="'.$url_blog.'"><button>Read More ></button></a>
                        

                        
                    </div>
                </div>';
        }

        ?>
<a href=""></a>
    </div>
    <div class="about_us">
        <div class="pattend">
            <div class="pattend1">
            </div>
            <div class="pattend2">

            </div>
        </div>
        <div class="about_wrap">
            <div class="about_left">
                <h3>ABOUT US</h3>
                <h2>We are a community of content writers who share their learnings</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <a href="">Read More ></a>
            </div>
            <div class="about_left">
                <h3>Our mision</h3>
                <h2>Creating valuable content for creatives all around the world</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </div>
    <h1 class="all_cate">Choose A Catagory</h1>
    <div class="all_cate_list">
        <?php
        $url_cate = site_url("/category") . '/';
        foreach ($list_cate as $cate) {
            echo '
            
            <div class="cate">
                <div class = "wrap_cate">
                <a href="' . $url_cate . $cate['cate_name'] . '">
                    <div class="cate_icon">' . $cate['cate_icon'] . '

                    </div>
                    <h2>' . $cate['cate_name'] . '</h2>
                    <p>' . $cate['cate_desc'] . '</p>
                </a>
                </div>
            </div>
            
        ';
        } ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const slides = document.querySelectorAll(".home-hero");
        let currentIndex = 0;

        function showNextBox() {
            slides[currentIndex].style.display = "block";

            setTimeout(function() {
                slides[currentIndex].style.display = "none";
                currentIndex = (currentIndex + 1) % slides.length;
                showNextBox();
            }, 3000); // 3 seconds
        }

        showNextBox();
    });
</script>

<?php $this->load->view('templates/join.php') ?>
<?php $this->load->view('templates/footer.php') ?>