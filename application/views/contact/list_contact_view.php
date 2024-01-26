<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php') ?>
<div class="body-content" style="min-height: 600px;">
    <div class="list">
        <h1>LIST CONTACT</h1>
        <table class="tbl_infor">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th class="td-mess">MESSAGE</th>
                <th>STATUS</th>
            </tr>
            <?php

            foreach ($results as $result) {
                global $id;
                $id = $result['contact_id'];
                echo '<tr>
                    <td>' . $result['contact_id'] . '</td>
                    <td>' . $result['name'] . '</td>
                    <td>' . $result['email'] . '</td>
                    <td>' . $result['phone'] . '</td>
                    <td class="td-mess">' . $result['mess'] . '</td>
                    <td>' . $result['status'] . '</td>';
                if ($result['status'] === "pending") {
                    echo   '<td class="accept" >
                                <div class="wrap-btn accept-btn" data-contact-id="' . $id . '">
                                    <h3 >Accept</h3>
                                </div>
                                
                            </td>
                            
                            </tr>';
                } else {
                    echo   '
                            
                            </tr>';
                }
            }

            ?>

        </table>

    </div>
</div>
<form id="hidden-form-contact" style="display: none">
    <input id="inp" name="id" type="text">
</form>


<!-- xử lý submit -->


<script>
    $(document).ready(function() {
        $(".accept-btn").on("click", function() {
            if (confirm("Are you sure you want to accept this contact?")) {
                var id = $(this).data("contact-id");
                document.getElementById('inp').value = id;
                ///ajax
                $.ajax({
                    type: "POST",
                    url: "http://localhost/tublog.dev/index.php/contact/list_contact", // Đường dẫn đến file xử lý form
                    data: {
                        id: id
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
    });
    ///
</script>

<?php $this->load->view('templates/footer.php') ?>