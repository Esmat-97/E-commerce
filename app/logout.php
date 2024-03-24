<?php
 setcookie("usertitle","",time()-30 ,'/');
 setcookie("userid","",time()-30,'/');
 setcookie("userrole","",time()-30 ,'/');
 setcookie("useremail","",time()-30 ,'/');
header("location:log.php");

?>