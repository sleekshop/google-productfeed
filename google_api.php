<?php
error_reporting(0);
include("./conf.inc.php");
include("./vendor/sleekcommerce/init.inc.php");
include("./vendor/google/google.inc.php");
$constraint=array("name"=>array("LIKE",""),"category.id_shopcategory"=>intval(GOOGLE_CATEGORY_ID));
$res=ShopobjectsCtl::SearchProducts($constraint,0,0);
$log=date("Y-m-d H-i-s")."\n";
file_put_contents('./logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
$txt=GoogleCtl::CreateTXT($res);
$filename="feed.txt";
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"$filename\";" );
header("Content-Transfer-Encoding: binary");
die($txt);
 ?>
