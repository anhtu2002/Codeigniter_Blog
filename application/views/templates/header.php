<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sen|Inter">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/header.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/footer.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url('fontawesome-free-6.4.0-web/css/all.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . $css ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url() . $js ?>"></script>

</head>

<body class="body">
    <div class="navbar">
        <div class="right-left navbar-container">
            <h2 class="text">{Finsweet</h2>
            <div class="navbar-right">
                <ul class="menu">
                    <li><a href="<?php echo site_url(''); ?>">Home</a></li>
                    <li><a href="<?php echo site_url('blog/all_blog'); ?>">Blog</a></li>
                    <li>About Us</li>
                    <li><a href="<?php echo site_url('contact'); ?>">Contact Us</a></li>
                </ul>

                <button class="button_navbar">Subscribe</button>
                <?php
                $url = site_url('user/infor');
                $url_login = site_url('login');
                $url_list = site_url('user/list_user');
                $url_contact = site_url('contact/list_contact');
                $url_new_blog = site_url('blog/new_blog');
                $url_list_blog = site_url('blog/list_blog');
                if ($login) {
                    if ($admin === 'admin') {
                        echo '<i id="menu-m" class="fa-solid fa-bars" onclick="menuClick()"></i>
                        <div id="hidden_menu" style="display: none;">
                            <ul>
                                <a href="' . $url . '"><li class="menu-list">Thông tin</li></a>
                                <a id="listbtn" href="' . $url_list . '"><li class="menu-list">List User</li></a>
                                <a id="contactbtn" href="' . $url_contact . '"><li class="menu-list">List Contact</li></a>
                                <a id="contactbtn" href="' . $url_new_blog . '"><li class="menu-list">New Blog</li></a>
                                <a id="contactbtn" href="' . $url_list_blog . '"><li class="menu-list">List Blog</li></a>
                                <li class="menu-list-btn" id="logoutbtn" onclick="logout()">Đăng xuất</li>
                            </ul>
                            
                        </div>';
                    } else {
                        echo '<i id="menu-m" class="fa-solid fa-bars" onclick="menuClick()"></i>
                        <div id="hidden_menu" style="display: none;">
                            <ul>
                                <a href="' . $url . '"><li class="menu-list">Thông tin</li></a>
                                <a id="contactbtn" href="' . $url_new_blog . '"><li class="menu-list">New Blog</li></a>
                                <li class="menu-list-btn" id="logoutbtn" onclick="logout()">Đăng xuất</li>
                            </ul>
                            
                        </div>';
                    }
                } else {
                    echo '<div class="login-header">
                              <a href="' . $url_login . '">Đăng nhập</a>
                          </div>';
                }
                ?>



                <form id="logoutForm" action="<?php echo base_url('logout'); ?>" method="post">
                    <!-- Các trường input có thể thêm vào nếu cần -->
                </form>
            </div>


        </div>
    </div>