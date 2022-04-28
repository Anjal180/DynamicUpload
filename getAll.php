<?php
include 'connection.php';
// error_reporting(0);
 $prod=$_POST['prod_id'];
$prod= trim($prod);
$ql="SELECT `file_id`, `prod_id`, `doc_type`, `file_name`, `doc_name`, `ext` from up_doc_dtls where prod_id='{$prod}'";
$res=mysqli_query($conn,$ql);
$num=mysqli_num_rows($res);
if($num>0){
	while($rows=mysqli_fetch_assoc($res)){
		echo ' <tr id="delete('.$rows['file_id'].')">
		 
		<td id="td" class="col">'.$rows['doc_type'].'</td>
		<td id="td" class="col">'. $rows['file_name'].'</td>
		<td id="td" class="col">'. $rows['doc_name'].'</td>
		<td id="td"><button type="button" file-id="'.$rows['file_id'].'" prod-id="'.$rows['prod_id'].'" class="delete btn btn-primary"><i class="bi bi-trash3-fill"></i></button></td> 
		</tr>';
			
		}
}
?>

<!--<td id="td"><a class=" btn btn-primary" href="delete.php?ids='.$rows['file_id'].'&prodid='.$rows['prod_id'].'"><i class="bi bi-trash3-fill"></i></a></td> -->
<!-- <td id="td"><button class="btn btn-primary delete" data-id='.$rows['file_id'].'><i class="bi bi-trash3-fill"></i></button></td> -->