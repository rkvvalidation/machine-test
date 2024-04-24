$(document).ready(function(){
  
  //User regration code - start
  var form_data = new FormData();

  $("#btn_user_register").click(function(){

    var full_name        = $("#full_name").val();
    var email            = $("#email").val();
    var password         = $("#password").val();
    var confirm_password = $("#confirm_password").val();
    var mobile_no        = $("#mobile_no").val();

    var image     = $('#image').prop('files')[0];  
    var image_val = $('#image').val(); 

    function IsEmail(email) { 
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
      if (!regex.test(email)) { 
          return false; 
      } else { 
          return true; 
      }
    } 

    var phone_digit_count = mobile_no.length;

    if(full_name==""){
      $("#full_name_error").show().delay(5000).fadeOut();
      $("#full_name").focus();
      return false;
    }

    if(email==""){
      $("#email_error").show().delay(5000).fadeOut();
      $("#email").focus();
      return false;
    }

    if (!email.trimStart()) { 
      $("#email_error").show().delay(5000).fadeOut(); 
      $("#email").focus(); 
      return false; 
    } 

    if (IsEmail(email) == false) { 
      $('#invalid_email').show().delay(5000).fadeOut(); 
      return false; 
    } 

    if(password==""){
      $("#password_error").show().delay(5000).fadeOut();
      $("#password").focus();
      return false;
    }

    if(confirm_password==""){
      $("#confirm_password_error").show().delay(5000).fadeOut();
      $("#confirm_password").focus();
      return false;
    }

    if(password != confirm_password){ 
      $("#conf_pass_not_match_error").show().delay(5000).fadeOut(); 
      $("#confirm_password").focus(); 
      return false;
    } 

    if(mobile_no==""){
      $("#mobile_no_error").show().delay(5000).fadeOut();
      $("#mobile_no").focus();
      return false;
    }

    if(phone_digit_count!=10)  
    {  
      $("#phone_no_digit_error").show().delay(5000).fadeOut();  
      $("#phone_no").focus();  
      return false; 
    } 

    if (image_val == "") { 
      $("#image_error").show().delay(5000).fadeOut(); 
      $("#image").focus(); 
      return false;
    } 

    form_data.append('full_name', full_name);
    form_data.append('email', email);
    form_data.append('password', password);
    form_data.append('confirm_password', confirm_password);
    form_data.append('mobile_no', mobile_no);
    form_data.append('image', image);

    $.ajax({
      type:"POST",
      url:"action/user_register_action.php",
      data:form_data,
      cache: false,
      contentType: false,
      processData: false,
      success:function(response){

        // console.log(response); return false;
        
        if(response == 1){
          alert('New user created successfully. You can Log In now.');
          $('#full_name').val(''); 
          $('#email').val(''); 
          $('#password').val('');
          $('#confirm_password').val(''); 
          $('#mobile_no').val(''); 
          window.location.href="index.php";
        }

        if(response == 2){
          alert('something went wrong.');
        }

        if(response == 3){
          $("#email_exists_error").show().delay(5000).fadeOut(); 
          $("#email").focus(); 
          return false; 
        }

        if(response == 4){
          $("#mobile_exists_error").show().delay(5000).fadeOut(); 
          $("#mobile_no").focus(); 
          return false; 
        }

      }
    });

  });
  //User regration code - end

  
  //User login code - start
  $("#btn_user_login").click(function(){

    var email    = $("#email").val();
    var password = $("#password").val();

    function IsEmail(email) { 
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
      if (!regex.test(email)) { 
          return false; 
      } else { 
          return true; 
      }
    } 

    if(email==""){
      $("#email_error").show().delay(5000).fadeOut();
      $("#email").focus();
      return false;
    }

    if (!email.trimStart()) { 
      $("#email_error").show().delay(5000).fadeOut(); 
      $("#email").focus(); 
      return false; 
    } 

    if (IsEmail(email) == false) { 
      $('#invalid_email').show().delay(5000).fadeOut(); 
      return false; 
    } 

    if(password==""){
      $("#password_error").show().delay(5000).fadeOut();
      $("#password").focus();
      return false;
    }

    var dataStore = "email="+email+"&password="+password;

    $.ajax({
      type:"POST",
      url:"action/user_login_action.php",
      data:dataStore,
      success:function(response){

        if(response == 1){
          $('#email').val(''); 
          $('#password').val(''); 
          alert('Login done successfully.'); 
          window.location.href="dashboard.php"; 
        } 

        if(response == 2){ 
          $("#login_failed_error").show().delay(5000).fadeOut();
          return false;   
        }
      }

    });

  });
  //User login code - end

  //upload img preview - start
  $('#blah').hide();
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }

  $("#image").change(function(){
    $('#blah').show();
    readURL(this);
  });
  //upload img preview - end

});