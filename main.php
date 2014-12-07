<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>category_list</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

	<div id="wrapper">


        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">	

            	<li >
                	<input id="searchInput" class="form-control" placeholder="Search with note titles" STYLE="color: #FFFFFF; font-family: Verdana; font-size: 12px; background-color: #000000; width:180px; margin-left:20px; margin-top:30px" > 

                	</input>
                </li>

                <h3><li class="sidebar-brand"><a href='#subject'  >Subjects</a></li></h3>

                <?php
					session_start();

					$uid = '1'; //for testing
					if (isset($_SESSION['uid'])) {
						$uid = $_SESSION['uid'];
					} else {
						header("Location: index.php");
					}

					include_once("connect.php");
					$sql = "SELECT * FROM categories WHERE user_id=".$uid." ORDER BY category_title ASC";
					$res = mysql_query($sql) or die(mysql_error());

					$categories = "";

					if (mysql_num_rows($res)>0) {
						while ($row = mysql_fetch_assoc($res)) {
							$id = $row['id'];
							$title = $row['category_title'];
							$description = $row['category_description'];
							$categories .= "<li>";
							$categories .= "<a href='".$id."' >".$title."</a>";
							$categories .= "</li>";
						}

						echo $categories;

					} 
				?>

				<li>
					<a href="#subjectModal" data-toggle="modal"  data-target="#subjectModal">
						ADD SUBJECT<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
					</a>

					<!-- Modal -->
					<div class="modal fade" id="subjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      
					      <div class="modal-body">
					        
					      	<form action="subject_create_parse.php" method="post" class="form-horizontal" role="form">
				                <div class="form-group">
				                  <label for="inputfn3" class="col-sm-2 control-label">SUBJECT</label>
				                  <div class="col-sm-10">
				                    <div class="input-group">
				                      <span class="input-group-addon"><span class="glyphicon glyphicon-folder-open"></span></span>
				                      <input type="text" class="form-control" id="subject_name" name="category_title" placeholder="subject name">
				                    </div>
				                  </div>
				                </div>

				                <div class="form-group">
				                  <div class="col-sm-offset-2 col-sm-10">
				                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        		<button type="submit" class="btn btn-primary">Save changes</button>
				                  </div>
				                </div>
				            </form>

					      </div>
					    
					    </div>
					  </div>
					</div>
				</li>


				<li>
					
					<a href="logout_parse.php" id="#logout">
						Log Out<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
					</a>
				</li>

				


            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <?php

			$uid = '1'; //for testing
			if (isset($_SESSION['uid'])) {
				$uid = $_SESSION['uid'];
			} else {
				header("Location: index.php");
			}
			

		?>
		
        <div id="page-content-wrapper">
    		
            
        </div>

        <!-- /#page-content-wrapper -->
    </div>
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="general.js"></script>
  </body>
		<!-- Menu Toggle Script -->
<script>
	$("#menu-toggle").click(function(e) {
	    e.preventDefault();
	    $("#wrapper").toggleClass("toggled");
	});
</script>

<script>
	$("#searchInput").on("input", function() {
		var word = $(this).val();
		if (word.length == 0) {
			return;
		}
	    $('#page-content-wrapper').load('note_search_parse.php?word='+word);
	});

</script>

</html>


