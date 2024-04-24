<?php
  include_once("header/header.php");
?>

<!-- Login 1 - Bootstrap Brain Component -->
<div class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
        <div class="bg-white p-4 p-md-5 rounded shadow-sm">
          <div class="row">
            <div class="col-12">
              <div class="text-center mb-5">
                <a href="javascript:void(0);">
                  User Registration
                </a>
              </div>
            </div>
          </div>
          <form action="javascript:void(0);" enctype="multipart/form-data">
            <div class="row gy-3 gy-md-4 overflow-hidden">
              <div class="col-12">
                <label for="full_name" class="form-label">Full Name<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="full_name" class="form-control" name="full_name" id="full_name"  placeholder="Enter Full Name">
                </div>
                <span style="color:#ff0000; font-size:15px; line-height:0;display:none;" id="full_name_error">Please Enter Full Name.</span> 
              </div>
              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email-ID">
                </div>
                <span style="color:#ff0000; font-size:15px; line-height:0;display:none;" id="email_error">Please Enter Email-ID.</span> 
                <span style="color:#ff0000; font-size:15px; line-height:0;display:none;" id="invalid_email">Email-id is invalid.</span> 
                <span style="color:#ff0000; font-size:15px; line-height:0;display:none;" id="email_exists_error">Email-Id already exists try log in.</span> 
              </div>
              <div class="col-12">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" id="password"   placeholder="Enter Password">
                </div>
                <span style="color:#ff0000; font-size:15px; line-height:0;display:none;" id="password_error">Please Enter Password.</span> 
              </div>
              <div class="col-12">
                <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">
                </div>
                <span style="color:#ff0000; font-size:15px; line-height:0;display:none;" id="confirm_password_error">Please Enter Confirm Password.</span> 
                <span style="color:#ff0000; font-size:15px; line-height:0;display:none;" id="conf_pass_not_match_error">Password And Confirm Password Not Matched.</span>
              </div>
              <div class="col-12">
                <label for="mobile_no" class="form-label">Mobile No.<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter Mobile No." maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
                <span style="color:#ff0000; font-size:15px; line-height:0;display:none;" id="mobile_no_error">Please Mobile No.</span> 
                <span style="color:#ff0000; font-size:15px; line-height:0;display:none;" id="phone_no_digit_error">Please Enter 10 Digits Phone no.</span> 
                <span style="color:#ff0000; font-size:15px; line-height:0;display:none;" id="mobile_exists_error">Mobile no. already exists. try different mobile no.</span>
              </div>
              <div class="col-12">
                <label for="mobile_no" class="form-label">Upload Image.<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="file" class="form-control" id="image" name="image"> 
                </div>
                <span style="color:#ff0000; font-size:15px; line-height:0;display:none;" id="image_error">Please Select Upload Image.</span>
                <br>
                <img id="blah" src="#" alt="your image" style="height: 100px; width: 100px;"/>
              </div>
              <div class="col-12">
                <div class="d-grid">
                  <button class="btn btn-primary btn-lg" type="submit" id="btn_user_register">Submit</button>
                </div>
              </div>
            </div>
          </form>
          <div class="row">
            <div class="col-12">
              <hr class="mt-5 mb-4 border-secondary-subtle">
              <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center">
                <a href="index.php">Login In</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include_once("footer/footer.php");
?>