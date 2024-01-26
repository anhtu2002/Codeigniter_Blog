<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php $this->load->view('templates/header.php') ?>
<div class="body-content" style="min-height: 600px;">
    <div class="contact-wrap">
        <div class="wrap">
            <div class="contact-heading">
                <h5>CONTACT US</h5>
                <h1>Let’s Start a Conversation</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
                </p>
            </div>
            <div class="contact-us">
                <div class="working">
                    <p class="head-con">Working hours</p>
                    <h6>Monday To Friday</h6>
                    <h6>9:00 AM to 8:00 PM</h6>
                    <p>Our Support Team is available 24/7</p>
                </div>
                <div class="working">
                    <p class="head-con">Contact Us</p>
                    <h6>020 7993 2905</h6>

                    <p>hello@finsweet.com</p>
                </div>
            </div>
            <div class="contact-form">
                <form id="form-contact">
                    <input required id="name" name="name" type="text" placeholder="Full Name" />
                    <input required id="email" name="email" type="text" placeholder="Your Email" />
                    <input required id="phone" name="phone" type="number" placeholder="Your Phone" />
                    <input required id="msg" name="msg" type="text" placeholder="Message" />
                    <button id="btn-send">Send Message</button>
                </form>
                <h4 id="mesg" style="color: green; visibility: hidden;">Gửi thành công</h4>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#btn-send").on("click", function() {
            event.preventDefault();
            var formData = $("#form-contact").serialize();
            console.log(formData);
            ///ajax
            $.ajax({
                type: "POST",
                url: "http://localhost/tublog.dev/index.php/contact", // Đường dẫn đến file xử lý form
                data: formData,
                success: function(response) {

                    document.getElementById('mesg').style.visibility = 'visible';
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