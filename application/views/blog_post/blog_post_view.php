<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php');
$url_ava = base_url('uploaded/') . $post[0]['user_id'] . '/avata' . '/' . $post[0]['user_ava'];
$url_blog_post = base_url('uploaded/') . $post[0]['user_id'] . '/blog' . '/' . $post[0]['blog_img']; ?>
<div class="body-content" style="min-height: 600px;">
    <div class="blog_header">
        <div class="wrap_header">
            <div class="name_inf">
                <a href="<?php echo site_url('author/') . $post[0]['user_id']; ?>">
                    <div class="author_img">
                        <img src="<?php echo $url_ava ?>" alt="">
                    </div>
                </a>

                <div class="author_inf">
                    <a href="<?php echo site_url('author/') . $post[0]['user_id']; ?>">
                        <div class="author_name">
                            <h3><?php echo $post[0]['user_name'] ?></h3>
                        </div>
                    </a>

                    <div class="blog_date">
                        <p>Posted on <?php echo $post[0]['date'] ?></p>
                    </div>
                </div>
            </div>
            <div class="blog_name">
                <h1><?php echo $post[0]['blog_name'] ?></h1>
            </div>
            <a href="<?php echo site_url('category/') . $post[0]['cate_name']; ?>">
                <div class="category_wrap">
                    <?php echo $post[0]['cate_icon'] ?>
                    <h4><?php echo $post[0]['cate_name'] ?></h4>
                </div>
            </a>
        </div>
    </div>
    <div class="img_blog_post">
        <img src="<?php echo $url_blog_post ?>" alt="">
    </div>
    <div class="blog_content">
        <div class="wrap_content">
            <?php echo $post[0]['blog_content'] ?>
        </div>
    </div>

    <div class="orther_post">
        <h2>What to read next</h2>
        <div class="wrap_other">
            <?php
            foreach ($other_post as $other) {
                $url_post = base_url('uploaded/') . $other['user_id'] . '/blog' . '/' . $other['blog_img'];
                $url_author = site_url('author/') . $other['user_id'];
                $url_orther = site_url('blog_post/') . $other['blog_id'];
                echo '
                        <div class= "item_other">
                            <a href="'.$url_orther.'"><div class ="img">
                                <img src="' . $url_post . '" alt="">
                            </div></a>
                            
                            <div class ="inf_post">
                                <p class ="inf_other">By <a href="'.$url_author.'">' . $other["user_name"] . '</a>   |  ' . $other['date'] . '</p>
                                <a href="' . $url_orther . '"><h2>' . $other['blog_name'] . '</h2>
                                <p>' . $other['blog_summary'] . '</p></a>
                                
                            </div>
                        </div>
                        ';
            }
            ?>
        </div>
<a href=""></a>
    </div>
    <?php $this->load->view('templates/join.php') ?>
</div>
<?php $this->load->view('templates/footer.php') ?>