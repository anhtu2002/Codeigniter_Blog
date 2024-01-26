
        
        // use CKEditor
        
        function checkPasswordMatch() {
            var password = document.getElementById("pass").value;
            var confirmPassword = document.getElementById("repass").value;
            var message = document.getElementById("message");
            var submitButton = document.getElementById("signup");
            var user = document.getElementById("user");
            var admin = document.getElementById("admin");
           

            if (password != "" && password === confirmPassword && (user.checked || admin.checked)) {
                submitButton.disabled = false; // Kích hoạt nút Submit
                message.style.visibility = "hidden";
                
            } 
            if (password != confirmPassword || (!user.checked && !admin.checked)) {
              message.innerHTML = "Mật khẩu không khớp hoặc chưa chọn kiểu người dùng";
              submitButton.disabled = true; // Vô hiệu hóa nút Submit
              
            }
           
        }
        function logout(){
          document.getElementById("logoutForm").submit();
        }

        function update_btn_display(){
          document.getElementById("btn_update").disabled = false;
          var input = document.getElementById("upload-photo");
          var file = input.files[0];
          if (file) {
            var reader = new FileReader();

            reader.onload = function (e) {
              document.getElementById("avata-img").src = e.target.result;
            };
           
            reader.readAsDataURL(file);
          }
        }

        function menuClick(){
          var menu = document.getElementById("hidden_menu");
          if (menu.style.display == "none"){
            menu.style.display = "block";
          }
          else{
            menu.style.display ="none";
          }

        }
        function file_input() {
          var input = document.getElementById("img_blog");
          var file = input.files[0];
          if (file) {
            var reader = new FileReader();

            reader.onload = function (e) {
              document.getElementById("inp-img").src = e.target.result;
            };

            reader.readAsDataURL(file);
          }
        }

        function check_pas(){
          var password = document.getElementById("new_pass").value;
          var old_password = document.getElementById("old_pass").value;;
          var confirmPassword = document.getElementById("re_pass").value;
          var message = document.getElementById("check_pass");
          var submitButton = document.getElementById("btn_submit");

          if ( old_password !="" && password != "" &&password === confirmPassword ) {
            message.style.opacity = 0;
            submitButton.disabled = false;
          }
          else{
            if (password != confirmPassword ) {
            message.style.opacity = 1;
            }
            else{
              message.style.opacity = 0;
            }
            submitButton.disabled = true;
          }
          
          // if(old_password ===""){
          //   submitButton.disabled = true;
          // }
        }
        function cancel(){
          var layer1 = document.getElementById("layer1");
          var wrap_change = document.getElementById("wrap_change");
          var body_content = document.getElementById("body-content");
          layer1.style.display = "none";
          wrap_change.style.display = "none";
          body_content.classList.remove("'no-pointer'");
        }
        function display_change() {
          var layer1 = document.getElementById("layer1");
          var wrap_change = document.getElementById("wrap_change");
          var body_content = document.getElementById("body-content");
          layer1.style.display = "block";
          wrap_change.style.display = "block";
          body_content.classList.add("'no-pointer'");
        }
        
        // page_numd


      
      
