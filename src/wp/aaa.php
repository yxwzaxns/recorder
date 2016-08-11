<?php
// $flag="1234";
session_start();
//
// if($_SESSION['time'] && time() - $_SESSION['time'] > 60) {
//     session_destroy();
//     die('timeout');
// } else {
//     $_SESSION['time'] = time();
// }
//
// echo rand()."</br>";
// if (isset($_GET['go'])) {
//     $_SESSION['rand'] = array();
//     $i = 5;
//     $d = '';
//     while($i--){
//         $r = (string)rand();
//         $_SESSION['rand'][] = $r;
//         $d .= $r;
//     }
//     echo md5($d)."</br>";
//     var_dump($_SESSION);
//     echo "</br>aaa";
//
// } elseif (isset($_GET['check'])) {
//
//     if ($_GET['check'] === $_SESSION['rand']) {
//         echo $flag;
//     } else {
//         echo "</br>aaaa";
//         session_destroy();
//     }
//
// } else {
//     show_source(__FILE__);
// }

//var.php?GLOBALS[a]=aaaa&b=111
// var_dump($_SESSION['id']);
echo phpinfo();
?>
