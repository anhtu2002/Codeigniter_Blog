<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php') ?>
<div class="body-content" style="min-height: 600px;">

    <div class="content">
        <div class="wrap">
            <h1>ADD NEW BLOG</h1>
            <?php
            // $name = $results["user_name"];
            // $email = $results["user_email"];
            // $avata = $results["user_ava"];
            // $type = $results["type"];

            ?>
            <div class="new_blog_form">
                <form  method="post" class="form_infor" action="<?php echo site_url('blog/new_blog'); ?>" enctype="multipart/form-data">
                    <div class="inp-head">
                        <div class="img">
                            <img src="" alt="" id="inp-img">
                        </div>

                        <div class="inp-left">
                            <label for="">Tiêu đề:</label>
                            <br>
                            <input name="title_blog" oninvalid="this.setCustomValidity('Bắt buộc')" oninput="setCustomValidity('')" required type="text" placeholder="Tối đa 30 từ...">
                            <br>
                            <label for="">Tóm tắt:</label>
                            <br>
                            <textarea name="sumary" oninvalid="this.setCustomValidity('Bắt buộc')" oninput="setCustomValidity('')" required type="text" placeholder="Tối đa 300 từ..."></textarea>
                            <br>
                            <label for="">Danh mục:</label>
                            <br>
                            <select oninvalid="this.setCustomValidity('Bắt buộc')" oninput="setCustomValidity('')" required name="category" id="">
                                <?php foreach ($list_cates as $cate) {
                                    echo '<option class= "opt" value="' . $cate["cate_id"] . '"> ' . $cate["cate_name"] . '</option>';
                                }

                                ?>

                            </select>
                        </div>
                    </div>
                    <label class="img_blog" for="img_blog">Ảnh</label>
                    <input oninvalid="this.setCustomValidity('Bắt buộc')" oninput="setCustomValidity('')" required type="file" id="img_blog" name="img_blog" onchange="file_input()" accept="image/*">
                    <br>
                    <div class="content_area">
                        <label class="noidung" for="">Nội dung:</label>
                        <br>
                        <br>
                        <textarea class="ckeditor" name="ccccc" id="ccccc" placeholder="Tối đa 3000 từ..."></textarea>

                    </div>


                    <button class="sub_btn">ĐĂNG</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer.php') ?>
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#ccccc'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

</script>