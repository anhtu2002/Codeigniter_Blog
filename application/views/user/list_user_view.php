<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php') ?>
<div class="body-content" style="min-height: 600px;">

    <div class="infor-wrap">
        <div class="list">
            <h1>INFOR USER</h1>
            <a href="<?php echo site_url('user/create'); ?>"><button class="new_user">Create New</button></a>
            <table class="tbl_infor">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>TYPE</th>
                    <th>STATUS</th>

                </tr>
                <?php
                foreach ($results as $result) {
                    global $id;
                    $id = $result['user_id'];
                    echo '<tr>
                    <td>' . $result['user_id'] . '</td>
                    <td>' . $result['user_name'] . '</td>
                    <td>' . $result['user_email'] . '</td>
                    <td>' . $result['type'] . '</td>
                    <td>' . $result['status'] . '</td>
                    <td class="edit_del" >
                        <div class="wrap-btn edit-btn" data-user-id="' . $id . '">
                            <h3 >Edit</h3>
                        </div>
                        
                    </td>
                    </tr>';
                }

                ?>

            </table>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {
        $(".edit-btn").on("click", function() {
            var userId = $(this).data("user-id");
            window.location.href = "<?php echo site_url('user/edit_user/'); ?>" + userId;
        });
    });
</script>
<?php $this->load->view('templates/footer.php') ?>