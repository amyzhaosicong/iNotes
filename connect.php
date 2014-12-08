<?php
$host="localhost";
$username="root";
$password="";
$db="inotes";

mysql_connect($host, $username, $password) or die(mysql_error());
mysql_select_db($db);

class NoteDB{
	public static function Instance() {
		static $inst = null;
		if ($inst == null) {
			$inst = new NoteDB();
		}

		return $inst;
	}

	function all_notes() {
		$sql = "SELECT * FROM users";

		$res = mysql_query($sql) or die(mysql_error());

		return $res;
	}

	function category_per_user($uid) {
		$sql = "SELECT * FROM categories WHERE user_id=".$uid." ORDER BY category_title ASC";
		$res = mysql_query($sql) or die(mysql_error());
		return $res;
	}

	function notes_per_category($category_id) {
		$sql = "SELECT * FROM notes WHERE category_id=".$category_id." ORDER BY title ASC";
		$res = mysql_query($sql) or die(mysql_error());
		return $res;
	}

	function notes_per_user($uid) {
		$sql = "SELECT * FROM `notes` n, `categories` c WHERE n.category_id = c.id AND c.user_id = ".$uid;
		$res = mysql_query($sql) or die(mysql_error());
		return $res;
	}

	function user_create($uname, $pass, $email) {
		$sql = "INSERT INTO users (username, password, email) VALUES ('".$uname."', '".$pass."', '".$email."')";
		$res = mysql_query($sql) or die(mysql_error());
		$id = mysql_insert_id();
		return $id;
	}

	function user_per_id_pass($uname, $pass) {
		$sql = "SELECT * FROM users WHERE username='".$uname."' AND password='".$pass."'";
		$res = mysql_query($sql) or die(mysql_error());
		return $res;
	}

	function note_delete($id){
		$sql = "DELETE FROM notes WHERE id='".$id."'";
		$res = mysql_query($sql) or die(mysql_error());
	}

	function subject_create($category_title, $uid){
		$sql = "INSERT INTO categories (category_title, user_id, last_post_date) VALUES ('".$category_title."', '".$uid."', now())";
		$res = mysql_query($sql) or die(mysql_error());
	}

	function user_per_username($value) {
		$sql = "SELECT * FROM users WHERE username='".$value."'";
		$res = mysql_query($sql) or die(mysql_error());
	}

	function update_notes_per_user($title, $content, $id){
		$sql = "UPDATE notes SET title='".$title."', content='".$content."' WHERE id='".$id."' ";
		$res = mysql_query($sql) or die(mysql_error());
		return $res;
	}

	function note_create($content, $title, $category_id) {
		$sql = "INSERT INTO notes (content, title, category_id) VALUES ('".$content."', '".$title."', '".$category_id."')";
		$res = mysql_query($sql) or die(mysql_error());
	}

	function delete_notes_per_category($id){
		$sql = "DELETE FROM notes WHERE category_id='".$id."'";
		$res = mysql_query($sql) or die(mysql_error());
	}

	function delete_category_per_id($id) {
		$sql = "DELETE FROM categories WHERE id='".$id."'";
		$res = mysql_query($sql) or die(mysql_error());
	}
}

?>