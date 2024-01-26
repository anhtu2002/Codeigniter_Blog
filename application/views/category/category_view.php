<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php') ?>
<div class="body-content" style="min-height: 600px;">
    <div class="blog-cate-hero">
        <div class="header">
            <h1><?php echo $result['cate_name'] ?> </h1>
            <p><?php echo $result['cate_desc'] ?></p>
            <h3>Blog > <?php echo $result['cate_name'] ?></h3>
        </div>
    </div>
    <div class="category-content">
        <div class="content-right">
            <?php
            if (count($list_blog) == 0) {
                echo "<h3>This category haven't posted anything yet</h3>";
            } else {
                foreach ($list_blog as $blog) {
                    $url_img = base_url("/") . 'uploaded/' . $blog['user_id'] . '/blog' . '/' . $blog['blog_img'];
                    $url_cate_blog = site_url('blog_post/').$blog['blog_id'];
                    echo '
                <div class="post_wrap">
                    <div class="post_blog">
                        <a href="'.$url_cate_blog.'"><div class="post_img">
                            <img src="' . $url_img . '" alt="">
                        </div></a>
                        
                        <div class="post_content">
                            <h3>' . $blog['cate_name'] . '</h3>
                            <a href="' . $url_cate_blog . '"><h2>' . $blog['blog_name'] . '</h2>
                            <p>' . $blog['blog_summary'] . '</p></a>
                            
                        </div>
                    </div>
                </div>           
            ';
                }
            }

            ?>
        </div>
        <div class="content-left">
            <h2>Categories</h2>
            <div class="list-cate">
                <ul>
                    <?php
                    foreach ($list_cate as $cate) {
                        $url_cate = site_url('/category').'/'.lcfirst($cate['cate_name']);
                        echo '<a href="'.$url_cate.'"><li>'.$cate["cate_icon"].'
                            <h3>'.$cate["cate_name"].'</h3>
                            </li></a>';
                    }
                    ?>
                </ul>

            </div>
            <div class="all-tag"></div>
        </div>
    </div>

</div>

<?php $this->load->view('templates/footer.php') ?>