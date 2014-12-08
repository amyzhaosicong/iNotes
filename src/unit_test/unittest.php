<?php
include_once("../connect.php");
class UnitTest 
{

    public function test_all_notes()
    {   
        $db = NoteDB::Instance();
        $res = $db->all_notes();
        $num = mysql_num_rows($res);
        assert($num > 2);
    }

    public function test_category_per_user()
    {   
        $db = NoteDB::Instance();
        $res = $db->category_per_user(1);

        $find = false;
        while ($row = mysql_fetch_assoc($res)) {
            $category_id = (int) $row['id'];
            if ($category_id == 1) {
                $find = true;
                break;
            }
        }

        assert($find == true);
    }

    public function test_notes_per_category(){
        $db = NoteDB::Instance();
        $res = $db->notes_per_category(2);

        $find = false;
        while ($row = mysql_fetch_assoc($res)) {
            $id = (int) $row['id'];
            if ($id == 1) {
                $find = true;
                break;
            }
        }

        assert($find == true);
    }

    public function test_notes_per_user(){
        $db = NoteDB::Instance();
        $res = $db->notes_per_user(1);

        $find = false;
        while ($row = mysql_fetch_assoc($res)) {
            $id = (int) $row['id'];
            if ($id == 1) {
                $find = true;
                break;
            }
        }

        assert($find == true);
    }

    public function test_user_per_id_pass(){
        $db = NoteDB::Instance();
        $res = $db->user_per_id_pass("test", "test");

        $num = mysql_num_rows($res);
        assert($num == 1);

    }

    public function test_user_per_username(){
        $db = NoteDB::Instance();
        $uname = "tli5";
        $res = $db->user_per_username($uname);

        assert($res != null);

    }
}


$test = new UnitTest();
$test -> test_all_notes();
$test -> test_category_per_user();
$test -> test_notes_per_category();
$test -> test_notes_per_user();
$test -> test_user_per_id_pass();
$test -> test_user_per_username();

echo "success";

?>