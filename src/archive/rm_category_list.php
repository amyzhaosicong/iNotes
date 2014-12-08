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
                <li class="sidebar-brand">
                    <a href="#">
                        SUBJECTS
                    </a>
                </li>

                <?php
					session_start();

					$uid = '1'; //for testing
					if (isset($_SESSION['uid'])) {
						$uid = $_SESSION['uid'];
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


            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <?php

			$uid = '1'; //for testing
			if (isset($_SESSION['uid'])) {
				$uid = $_SESSION['uid'];
			}

			if (!isset($category_id)) {
				$category_id = 2;
			}

			

		?>

        <div id="page-content-wrapper">
    		<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>
                        	<?php
                        		$category_title = "failed";
                        		$res = mysql_query($sql) or die(mysql_error());
                        		while ($row = mysql_fetch_assoc($res)) {
									$id = (int) $row['id'];
									if ($category_id == $id) {
										$category_title = $row['category_title'];
										break;
									}
								}
								echo $category_title;
                        	?>
                        </h1>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<?php
								$sql = "SELECT * FROM notes WHERE category_id=".$category_id." ORDER BY title ASC";
								$res = mysql_query($sql) or die(mysql_error());
								$notes = "";
								while ($row = mysql_fetch_assoc($res)) {
									$id = $row['id'];
									$title = $row['title'];
									$content = $row['content'];
									$notes .= "<div class=\"panel panel-default\">";
									$notes .= "<div class=\"panel-heading\" role=\"tab\" id=\"".$id."\">";
									$notes .= "<h4 class=\"panel-title\">";
									$notes .= "<a class=\"collapsed\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse".$id."\" aria-expanded=\"false\" aria-controls=\"collapseThree\">";
									$notes .= $title;
									$notes .= "</a></h4></div>";

									$notes .= "<div id=\"collapse".$id."\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"headingThree\">";
									$notes .= "<div class=\"panel-body\">";
									$notes .= $content;
									$notes .= "</div></div></div>";
								}

								echo $notes;
							?>
						  
						</div>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- /#page-content-wrapper -->

    </div>
    <hr/>
    <hr/>
    
    <div id="testcontent"> 
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


</html>


