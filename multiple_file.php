<?php
include 'db.php'; 
if(isset($_POST['submit'])){
 // Count total files
 $countfiles = count($_FILES['file']['name']);
 //$targetpath='upload/';
// $tmp_name=$_FILES['file']['name'];
// $targetpath=$targetpath.basename($_FILES['file']['name']);
 
 // Looping all files
 for($i=0;$i<$countfiles==1;$i++){
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
    
 }
?>
