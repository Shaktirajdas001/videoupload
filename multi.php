<?php
include 'db.php'; 
if(isset($_POST['submit'])){
 // Count total files
 $countfiles = count($_FILES['file']['name']);
 $name=$_FILES['uploadvideo']['name'];
$type=$_FILES['uploadvideo']['type'];
////$size=$_FILES['uploadvideo']['size'];
$cname=str_replace(" ","_",$name);
print_r($cname);
$tmp_name=$_FILES['uploadvideo']['tmp_name'];
$target_path="upload/";
$target_path=$target_path.basename($_FILES['uploadvideo']['tmp_name']);
 //$targetpath='upload/';
// $tmp_name=$_FILES['file']['name'];
// $targetpath=$targetpath.basename($_FILES['file']['name']);
 // Looping all files

 for($i=0;$i<$countfiles;$i++)
 {
   $filename = $_FILES['file']['name'][$i];
   $sql="insert into image(image)values('$filename')";
   if($conn->query($sql)===TRUE)
   {
   	echo "sucess";
   }
   else
   {
   	echo "failed";
   }

   
   // Upload file
  move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$filename);

  	
  }
  if(move_uploaded_file($_FILES['uploadvideo']['tmp_name'],$target_path))
{
 $sql="insert into video(file)VALUES('".$cname."')"; 
$result=mysqli_query($conn,$sql);
echo "Your video ".$cname." has been successfully uploaded";
}

    
 }
?>
