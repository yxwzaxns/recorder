<?php
function replace_base64_char($value='',$flag='1',$source='+',$dest='_')
{
  # code...
  if($flag == '1'){
    return str_replace($source,$dest,$value);
  }else{
    return str_replace($dest,$source,$value);
  }
};
 ?>
