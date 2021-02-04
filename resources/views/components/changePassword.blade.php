<div class="mt-4">
    <label for="ChangeP" class="text-black px-2 font-semibold">Change Password</label>
     <input type="checkbox" name="ChangeP" id="ChangeP" class="ml-2" onclick="ChangePassword()">
     <p id="text" style="display:none">Checkbox is CHECKED!</p>
<!--New Password -->

     <div class="mt-4">
        <label for="NewPassword" id="NP" style="display:none" class="text-black px-2 font-semibold">New Password</label>
        <input value="" id="NPbx" name="newPassword" size="50" style="display:none" class="block mt-1 w-full border-gray-400" type="password" >
    </div>
<!--Confirm Password -->
<div class="mt-4">
    <label for="CPassword" id="NP1" style="display:none" class="text-black px-2 font-semibold">Confirm Password</label>
    <input value="" id="NPbx1" name="confirmPassword" size="50" style="display:none" class="block mt-1 w-full border-gray-400" type="password" >
</div>


     <script>
        function ChangePassword() {
          var checkBox = document.getElementById("ChangeP");

          var label = document.getElementById("NP");
          var inputbox = document.getElementById("NPbx");

          var label1 = document.getElementById("NP1");
          var inputbox1 = document.getElementById("NPbx1");

          if (checkBox.checked == true){

            label.style.display = "block";
            inputbox.style.display = "block";

            label1.style.display = "block";
            inputbox1.style.display = "block";
          } else {

             label.style.display = "none";
             inputbox.style.display = "none";

             label1.style.display = "none";
             inputbox1.style.display = "none";
          }
        }
        </script>
</div>
