<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');



function message($type,$msg)
{
    $CI =& get_instance();
   if($type=='success') 
   {
        $result_msg = '<div class="success-msg"><i class="fa fa-check"></i>'.$msg.'</div>';
   }
   elseif($type== 'warning')
   {
        $result_msg = '<div class="warning-msg"><i class="fa fa-warning"></i>'.$msg.'</div>';
   }else
   {
        $result_msg = '<div class="error-msg"><i class="fa fa-times-circle">'.$msg.'</i></div>';
   }
   return $result_msg;
}


?>