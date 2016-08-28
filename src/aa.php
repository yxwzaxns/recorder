<?php
/**
 *
 */
//
// function replace_base64_char($value='',$flag='1',$source='+',$dest='_')
// {
//   # code...
//   if($flag == '1'){
//     return str_replace($source,$dest,$value);
//   }else{
//     return str_replace($dest,$source,$value);
//   }
// };
//
// $config = '通信原理';
// echo $config."\n";
// echo base64_encode($config)."\n\t";
// echo replace_base64_char(base64_encode($config));
// echo replace_base64_char(replace_base64_char(base64_encode($config)),$a='+',$b='_',$c='0')

// var_dump(preg_match('/^['.$config.']+$/i'.(UTF8_ENABLED ? 'u' : ''),$_GET['a']));
$i = '第十二周星期四第四大节第十023批';
$ii = 'nihao123nihao';
// echo mb_substr($i,0,10,'UTF-8');

preg_match_all('/(.*)第(.*)批/iu',$i,$arr);
// var_dump(preg_split('/nihao/',$ii));
var_dump($arr);
?>
