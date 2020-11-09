<?php
include 'db.php';
if(isset($_POST['submitdetails']))
{
$name=$_FILES['uploadvideo']['name'];
$type=$_FILES['uploadvideo']['type'];
////$size=$_FILES['uploadvideo']['size'];
$cname=str_replace(" ","_",$name);
print_r($cname);
$tmp_name=$_FILES['uploadvideo']['tmp_name'];
$target_path="upload/";
$target_path=$target_path.basename($_FILES['uploadvideo']['tmp_name']);
if(move_uploaded_file($_FILES['uploadvideo']['tmp_name'],$target_path))
{
 $sql="insert into video(file)VALUES('".$cname."')"; 
$result=mysqli_query($conn,$sql);
echo "Your video ".$cname." has been successfully uploaded";
}

}

?>
