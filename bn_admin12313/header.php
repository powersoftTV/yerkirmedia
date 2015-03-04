<?
$id = $_GET['id'];
$act = $_GET['act'];
$lan = $_GET['lan'];

if($id && $act && $lan) header("Location: index.php?act=$act&id=$id&lan=$lan&u=1");
elseif($act && !$id) header("Location: index.php?act=$act&u=1");
elseif($act && $id) header("Location: index.php?act=$act&id=$id&u=1");
?>