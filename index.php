<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    


  <p><br/> </p>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="page-header" style="margin-top:50px;">
              
              <div role="tabpanel">

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab">Existing User</a></li>
                <li role="presentation"><a href="#new_user" aria-controls="profile" role="tab" data-toggle="tab">New User</a></li>
              </ul>

              <!-- login -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active fade in" id="login">

                  <h3 class = "text-center">Welcome Back!</h3>

                  <form action="login_parse.php" method="post" class="form-horizontal" role="form">
                    <div class="form-group">
                      <label for="user_login_input" class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-10">
                        <div class="input-group" >
                          <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                          <input type="text" class="form-control" id="user_login_input" name="username" placeholder="username">
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="password_login_input" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                          <input type="password" class="form-control" id="password_login_input" name="password" placeholder="Password" onblur="login_validate()">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="login_msg" class="col-sm-2 control-label" ></label>
                      <div class="col-sm-10">
                        <div class="input-group" id="login_msg">
                          
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success" onclick="return login_final_validate()">Login</button>
                      </div>
                    </div>
                  </form>

                </div>

                <!-- registration -->
                <div role="tabpanel" class="tab-pane fade" id="new_user">

                  <h3 class = "text-center">Welcome to iNotes!</h3>

                  <form action="registration_parse.php" method="post" class="form-horizontal" role="form">
                    <div class="form-group">
                      <label for="user_register_input" class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-10">
                        <div class="input-group" id="uname_register">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                          <input type="text" class="form-control" id="user_register_input" placeholder="username" name="username" onblur="register_validate('username','#uname_register', '#uname_icon',this.value)">

                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email_register_input" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <div class="input-group" id="email_register">
                          <span class="input-group-addon">@</span>
                          <input type="email" class="form-control" id="email_register_input" placeholder="Email" name="email" onblur="register_validate('email','#email_register', '#email_icon',this.value)">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password_register_input" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <div class="input-group" id="password_register">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                          <input type="password" class="form-control" id="password_register_input" placeholder="Password" name="password" onblur="register_validate('password','#password_register', '#password_icon',this.value)">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="password2_register_input" class="col-sm-2 control-label">Re-type</label>
                      <div class="col-sm-10">
                        <div class="input-group" id="password_register2">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                          <input type="password" class="form-control" id="password2_register_input" placeholder="Retype Password" onblur="retype_validate('#password_register_input',  '#password2_register_input','#password_register2', '#password_icon2')">
                        </div>
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="register_msg" class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                        <div class="input-group" id="register_msg">
                          
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" onclick="return register_final_validate()" >Register</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>


            </div>
          </div>
        </div>

      </div>
      <div class="col-md-2"></div>
    </div>
    



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <script>
    $('#myTab a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
    </script>

    <script>
    function register_validate(field, parentID, iconID,query) {

      var xmlhttp;
      if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else { // for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
          var msg = "validating";
          $('#register_msg').html(msg);
        } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var icon = iconID.substring(1, iconID.length);
          if (xmlhttp.responseText == "Y") {
            if ($(iconID).length) {
              $(iconID).html("<span id=\""+icon+"flagA"+"\" class=\"glyphicon glyphicon-ok-sign\"></span>");
            } else {
              $(parentID).append($('<span class="input-group-addon" id="'+icon+'"><span id="'+icon+'flagA"'+' class="glyphicon glyphicon-ok-sign"></span></span>'));
            }

            $('#register_msg').html("");
            return false;
            
          } else {
            if ($(iconID).length) {
              $(iconID).html("<span id=\""+icon+"flagB\""+" class=\"glyphicon glyphicon-remove-sign\"></span>");
            } else {
              $(parentID).append($('<span class="input-group-addon" id="'+icon+'"><span id="'+icon+'flagB"'+' class="glyphicon glyphicon-remove-sign"></span></span>'));
            }

            $('#register_msg').html(xmlhttp.responseText);
            return true;
          }
        } 

      }
        
      xmlhttp.open("GET", "register_validation.php?field=" + field + "&query=" + query, false);
      xmlhttp.send();
    }

    function retype_validate(originalID, retypeID, parentID, iconID) {
      var icon = iconID.substring(1, iconID.length);
      if ($(originalID).val() == $(retypeID).val() && $("#password_iconflagA").length) {
        if ($(iconID).length) {
          $(iconID).html("<span id=\""+icon+"flagA"+"\" class=\"glyphicon glyphicon-ok-sign\"></span>");
        } else {
          $(parentID).append($('<span class="input-group-addon" id="'+icon+'"><span id="'+icon+'flagA"'+' class="glyphicon glyphicon-ok-sign"></span></span>'));
        }

        $('#register_msg').html("");
        return false;
      } else {
        if ($(iconID).length) {
          $(iconID).html("<span id=\""+icon+"flagB\""+" class=\"glyphicon glyphicon-remove-sign\"></span>");
        } else {
          $(parentID).append($('<span class="input-group-addon" id="'+icon+'"><span id="'+icon+'flagB"'+' class="glyphicon glyphicon-remove-sign"></span></span>'));
        }
        $('#register_msg').html(xmlhttp.responseText);
        return true;
      }

    }

    function register_final_validate() {

       if (!$("#uname_iconflagA").length) {
          return false;
       }

       if (!$("#email_iconflagA").length) {
          return false;
       }


       if (!$("#password_icon2flagA").length) {
          return false;
       }

       if (!$("#password_iconflagA").length) {
          return false;
       }

      return true;
    }

    function login_final_validate() {
      if ($('#login_flag').length) {
        return true;
      } else {
        return false;
      }
       
    }

    function login_validate() {
      var xmlhttp;
      if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else { // for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
          var msg = "validating";
          $('#login_msg').html(msg);
        } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

          if (xmlhttp.responseText == "Y") {

            $('#login_msg').html("<div id=\"login_flag\"> </div>");
            return true;
            
          } else {
            $('#login_msg').html(xmlhttp.responseText);
            return false;
          }
        } 

      }
      
      var uname = $('#user_login_input').val();
      var pass = $('#password_login_input').val();

      xmlhttp.open("GET", "login_validation.php?username=" + uname + "&password=" + pass, false);
      xmlhttp.send();
       
    }


    </script>

    <script>
      $("#user_register_input").on("input", function() {
        register_validate('username','#uname_register', '#uname_icon',$(this).val());
      });

      $("#password_register_input").on("input", function() {
        register_validate('password','#password_register', '#password_icon',$(this).val());
      });

      $("#email_register_input").on("input", function() {
        register_validate('email','#email_register', '#email_icon', $(this).val());
      });

      $("#email_register_input").on("input", function() {
        register_validate('email','#email_register', '#email_icon', $(this).val());
      });

      $("#password2_register_input").on("input", function() {
        retype_validate('#password_register_input',  '#password2_register_input','#password_register2', '#password_icon2');
      });

    </script>


  </body>
</html>