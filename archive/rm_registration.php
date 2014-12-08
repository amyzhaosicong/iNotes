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
              <h3>Welcome to iNotes!</h3>

              <form class="form-horizontal" role="form">
                <div class="form-group">
                  <label for="inputfn3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                      <input type="text" class="form-control" id="inputText3" placeholder="username">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputfn3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon">@</span>
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <button type="button" class="btn btn-success">Back to Login</button>
                  </div>
                </div>
              </form>

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
  </body>
</html>