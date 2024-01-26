<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php') 
?>
<div class="body-content" style="min-height: 600px;">
    <div class="list">
        <h1>LIST BLOG</h1>
        <table class="tbl_infor">
            <tr>
                <th>ID</th>
                <th>BLOG_NAME</th>
                <th>BLOG_SUMMARY</th>
                <th>BLOG_IMG</th>
                <th>DATE</th>
                <th>USER_NAME</th>
                <th>STATUS</th>
                <th>CATE_NAME</th>
            </tr>
            <?php
            if($results != "Unauthorized"){
                foreach ($results as $result) {
                if ($result == "*") break;
                global $id;
                $id = $result['blog_id'];
                $url_img = base_url("/uploaded") . '/' . $result['user_id'] . '/blog' . '/' . $result['blog_img'];
                echo '<tr>
                    <td class="other_td">' . $result['blog_id'] . '</td>
                    <td class="other_td">' . $result['blog_name'] . '</td>
                    <td class="other_td">' . $result['blog_summary'] . '</td>
                    <td class ="img_blog"><img src="' . $url_img . '" alt=""></td>
                    <td class="other_td">' . $result['date'] . '</td>
                    <td class="other_td">' . $result['user_name'] . '</td>
                    <td class="other_td"> ' . $result['blog_status'] . '</td>
                    <td class="other_td">' . $result['cate_name'] . '</td>';
                if ($result['blog_status'] == "pending") {
                    echo   '<td class="accept" >
                                    <div class="wrap-btn acc accept-btn" data-blog-id="' . $id . '">
                                        <h3 class = "blog_action" >Accept</h3>
                                    </div>
                                    
                                </td>
                                
                                </tr>';
                } else {
                    echo   '<td class="accept" >
                                    <div class="wrap-btn blk accept-btn" data-blog-id="' . $id . '">
                                        <h3 class = "blog_action" >Block</h3>
                                    </div>
                                    
                                </td>
                                
                                </tr>';
                }
            }
            }else{
                echo '<h1>Bạn không có quyền truy cập vào trang này</h1>';
            }
            

            ?>

        </table>

    </div>



</div>
<div class="pages_numb">
    <?php
    if($results != "Unauthorized"){
    $offet_blog = 3;
    $lenght = count($results);
    $numb_blog = $results[$lenght - 1][0]['count'];
    $numb_page = ceil($numb_blog / $offet_blog) ;
    for ($i = 1; $i <= $numb_page; $i++) {
        if($i == $active){
            echo
            '
                <div class = "page_numb active_page"  >
                    <h2 class = "index">' . $i . '</h2>
                </div>
            ';
        }else{
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
<form id="hidden-form-page" style="display: none">
    <input id="offset" name="offset" type="text">
</form>
<form id="hidden-form-blog" style="display: none">
    <input id="inp" name="id" type="text">
    <input id="status_blog" name="status" type="text">
</form>


<!-- xử lý submit -->


<script>
    $(document).ready(function() {
        $(".accept-btn").on("click", function() {

            var id = $(this).data("blog-id");
            document.getElementById('inp').value = id;
            var status = $(this).find(".blog_action").text();
            console.log(status);
            document.getElementById('status_blog').value = status;
            ///ajax
            if (confirm("Are you sure you want to " + status + " this Blog?")) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/tublog.dev/index.php/blog/list_blog", // Đường dẫn đến file xử lý form
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(response) {
                        $(".body").html(response);
                    },
                    error: function() {
                        alert("Error submitting the form");
                    }
                });

            }

        });
        $(".page_numb").on("click", function() {
            var index = $(this).find(".index").text();
            document.getElementById('offset').value = index;
            var active = "active_" + index;

            ///ajax
            $.ajax({
                type: "POST",
                url: "http://localhost/tublog.dev/index.php/blog/list_blog", // Đường dẫn đến file xử lý form
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