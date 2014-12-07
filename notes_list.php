<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>category_list</title>

    
  </head>
  <body>


        <!-- Page Content -->
        <?php
			session_start();

			if (isset($_SESSION['uid'])) {
				$uid = $_SESSION['uid'];
			} else {
				$uid = '-1';
			}

			include_once("connect.php");
			$sql = "SELECT * FROM categories WHERE user_id=".$uid." ORDER BY category_title ASC";
			$res = mysql_query($sql) or die(mysql_error());

			if (isset($_GET['category_id'])) {
				$category_id = (int)$_GET['category_id'];
			} else {
				$category_id = -1; //for empty results
				$res = mysql_query($sql) or die(mysql_error());
				while ($row = mysql_fetch_assoc($res)) {
					$category_id = (int) $row['id'];
					break;
				}
			}

		?>

		<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>
                    	<?php
                    		$category_title = "Notes Titles to be Listed";
                    		$res = mysql_query($sql) or die(mysql_error());
                    		while ($row = mysql_fetch_assoc($res)) {
								$id = (int) $row['id'];
								if ($category_id == $id) {
									$category_title = $row['category_title'];
									break;
								}
							}

							if (isset($_SESSION['search_word'])) {
								echo "Search Result:";
							} else {
								echo $category_title;
								
							}
							
                    	?>
                    </h1>

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<?php
							$_SESSIO['category_id'] = $category_id;
							$sql = "SELECT * FROM notes WHERE category_id=".$category_id." ORDER BY title ASC";

							if (isset($_SESSION['search_word'])) {
								$sql = "SELECT * FROM `notes` n, `categories` c WHERE n.category_id = c.id AND c.user_id = ".$uid;
							}

							$res = mysql_query($sql) or die(mysql_error());
							$notes = "";

							$tmp = "";

							while ($row = mysql_fetch_assoc($res)) {
								$id = $row['id'];
								$title = $row['title'];
								$content = $row['content'];

								if (isset($_SESSION['search_word'])) {
									$word = $_SESSION['search_word'];
									$title_lower = strtolower($title);
									$content_lower = strtolower($content);

									$pos1 = strpos($title_lower, $word);
									$pos2 = strpos($content_lower, $word);

									if ($pos1===false && $pos2===false) {
										continue;
									}
								}

								$notes .= "<div class=\"panel panel-default\">";
								$notes .= "<div class=\"panel-heading\" role=\"tab\" id=\"".$id."\">";
								$notes .= "<h4 class=\"panel-title\">";
								$notes .= "<a class=\"collapsed\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse".$id."\" aria-expanded=\"false\" aria-controls=\"collapseThree\">";
								$notes .= $title;
								$notes .= "</a></h4></div>";

								$notes .= "<div id=\"collapse".$id."\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"headingThree\">";
								$notes .= "<div id=\"notecontent".$id."\" class=\"panel-body notecontent\">";
								$notes .= $content;
								$notes .= "</div></div></div>";

								$tmp .= "<div class=\"modal fade\" id=\"noteEditModal".$id."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">";
								$tmp .= "<div class=\"modal-dialog\">";
								$tmp .= "<div class=\"modal-content\">";
								$tmp .= "<div class=\"modal-body\">";
								$tmp .= "<form action=\"note_edit_parse.php\" method=\"post\" class=\"form-horizontal\" role=\"form\">";
								$tmp .= "<div class=\"form-group\">";        
								$tmp .= "<label for=\"inputfn3\" class=\"col-sm-2 control-label\"  >Note Title</label>";
								$tmp .= "<div class=\"col-sm-10\">";
								$tmp .= "<div class=\"input-group\">";
								$tmp .= "<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-folder-open\"></span></span>";
								$tmp .= "<input type=\"text\" class=\"form-control\" id=\"note_title".$id."\" value=\"".$title."\" name=\"title\">";
								
								$tmp .= "<div class=\"input-group\" style=\"display:none;\" > ";
								$tmp .= "<input type=\"text\" class=\"form-control\" id=\"note_id".$id."\" value=\"".$id."\" name=\"note_id\">";
								$tmp .= "</div>";
								
								$tmp .= "</div></div></div>";
								$tmp .= "<div class=\"form-group\">";
								$tmp .= "<label for=\"inputfn3\" class=\"col-sm-2 control-label\">Content</label>";
								$tmp .= "<div class=\"col-sm-10\">";
								$tmp .= "<div class=\"input-group\">";
								$tmp .= "<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-text-width\"></span></span>";
								$tmp .= "<textarea class=\"form-control\" rows=\"20\" id=\"note_content".$id."\" name=\"content\">".$content."</textarea>";
								$tmp .= "</div></div></div>";
								$tmp .= "<div class=\"form-group\">";
								$tmp .= "<div class=\"col-sm-offset-2 col-sm-10\">";
								$tmp .= "<button type=\"button\" class=\"btn btn-success\" data-dismiss=\"modal\">Close</button>";
								$tmp .= "<button type=\"submit\" value=\"save\" class=\"btn btn-primary\">Save Changes</button>";
								$tmp .= "<button type=\"button\" class=\"btn btn-danger\" onclick=\"deleteNote(".$id.")\" >Delete Note</button>";
								$tmp .= "</div></div></form></div></div></div></div>";

							}

							echo $notes;
							echo $tmp;

							if (isset($_SESSION['search_word'])) {
								unset($_SESSION['search_word']);
							}
						?>


					  
					</div>
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    <a href="#noteCreateModal" class="btn btn-success" data-toggle="modal"  data-target="#noteCreateModal">Create Note</a>
                    <a href="category_delete_parse.php?id=<?php echo $category_id ?>" class="btn btn-danger" >Delete Subject</a>

					<!-- Create Note Modal -->
					<div class="modal fade" id="noteCreateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      
					      <div class="modal-body">
					        
					      	<form action="note_create_parse.php" method="post" class="form-horizontal" role="form">
				                <div class="form-group">
				                  <label for="note_title" class="col-sm-2 control-label">Note Title</label>
				                  <div class="col-sm-10">
				                    <div class="input-group">
				                      <span class="input-group-addon"><span class="glyphicon glyphicon-folder-open"></span></span>
				                      <input type="text" class="form-control" id="note_title" name="title" placeholder="note title">
				                    </div>
				                  </div>
				                </div>

				                <div class="form-group">
				                  <label for="note_content" class="col-sm-2 control-label">Content</label>
				                  <div class="col-sm-10">
				                    <div class="input-group">
				                      <span class="input-group-addon"><span class="glyphicon glyphicon-text-width"></span></span>
				                      <textarea class="form-control" rows="20" id="note_content" name="content" placeholder="note content"></textarea>
				                    </div>
				                  </div>
				                </div>

				                <div class="form-group" style="display:none;">
				                  <label for="note_category" class="col-sm-2 control-label">Content</label>
				                  <div class="col-sm-10">
				                    <div class="input-group">
				                      <span class="input-group-addon"><span class="glyphicon glyphicon-text-width"></span></span>
				                      <input type="text" class="form-control" id="note_category" name="note_category" value="<?php echo $category_id ?>" placeholder="note title">
				                    </div>
				                  </div>
				                </div>

				                <div class="form-group">
				                  <div class="col-sm-offset-2 col-sm-10">
				                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
					        		<button type="submit" class="btn btn-primary">Save Changes</button>
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
        

    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
  </body>
		<!-- Menu Toggle Script -->
	<script>
		$("#menu-toggle").click(function(e) {
		    e.preventDefault();
		    $("#wrapper").toggleClass("toggled");
		});


		$('.notecontent').click(function(){
			var nid = $(this).attr('id');
			nid = nid.substring(11, nid.length);
			var modalID = "#noteEditModal" + nid;
			$(modalID).modal('show');
		} );
	</script>

	<script>
		function deleteNote(noteid) {
	      window.location = "note_delete_parse.php?id="+noteid;
	       
	    }

	</script>

</html>


