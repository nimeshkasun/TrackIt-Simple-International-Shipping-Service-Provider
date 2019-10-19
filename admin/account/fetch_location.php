<?php
//fetch.php
require_once "../../db/conn.php";

if(isset($_POST["query"]))
{
 //$connect = mysqli_connect("localhost", "root", "", "courierdb");
 $request = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "SELECT * FROM tblocation WHERE lname LIKE '%".$request."%' ";
 $result = mysqli_query($conn, $query);
 $data =array();
 $html = '';

 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["lname"];
  }
 }
 else
 {
  $data = 'No Data Found';
 }
 if(isset($_POST['typehead_search']))
 {
  echo $html;
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}

?>