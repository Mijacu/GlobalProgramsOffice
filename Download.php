<?php
/**
 * Created by PhpStorm.
 * User: Ubaldo
 * Date: 22/11/2018
 * Time: 01:29 PM
 */

include("session.php");
$id=$_GET['id'];
echo $id;
$sql = "SELECT up_id,up_filetype,up_data,up_filename FROM upload WHERE up_id=$id";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$data = $row["up_data"];
$name = $row["up_filename"];
$type =$row["up_filetype"];

//echo '<img src="data:image/png;base64,' . base64_encode( $data ) . '" />';

header("Content-type: $type");
//header("Content-length: $size");
header("Content-Disposition: attachment; filename=$name");
header("Content-Description: PHP Generated Data");
echo $data;

?>
