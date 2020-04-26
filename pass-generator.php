<?php
error_reporting(0);
function generatePassword($l = 8, $c = 0, $n = 0, $s = 0,$lc=0) {
    
     $count = $c + $n + $s;
 
    
     if(!is_int($l) || !is_int($c) || !is_int($n) || !is_int($s)) {
          trigger_error('Argument (s) must be an integer', E_USER_WARNING);
          return false;
     }
     elseif($l < 6 || $l > 20 || $c < 0 || $n < 0 || $s < 0 || $lc<0) {
          trigger_error('Argument(s) out of range', E_USER_WARNING);
          return false;
     }
     elseif($c > $l) {
          trigger_error('Number of password capitals required exceeds password length', E_USER_WARNING);
          return false;
     }
     elseif($n > $l) {
          trigger_error('Number of password numerals exceeds password length', E_USER_WARNING);
          return false;
     }
     elseif($s > $l) {
          trigger_error('Number of password capitals exceeds password length', E_USER_WARNING);
          return false;
     }
     elseif($count > $l) {
          trigger_error('Number of password special characters exceeds specified password length', E_USER_WARNING);
          return false;
     }
 
   
 
     // change these strings if you want to include or exclude possible password characters
     $chars = "abcdefghijklmnopqrstuvwxyz";
     $caps = strtoupper($chars);
     $nums = "0123456789";
     $syms = "!@#$%^&*()-+?";
 
     // build the base password of all lower-case letters
     for($i = 0; $i < $lc; $i++) {
          $out .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
     }
 
     // create arrays if special character(s) required
     if($count) {
          // split base password to array; create special chars array
          $tmp1 = str_split($out);
          $tmp2 = array();
 
          // add required special character(s) to second array
          for($i = 0; $i < $c; $i++) {
               array_push($tmp2, substr($caps, mt_rand(0, strlen($caps) - 1), 1));
          }
          for($i = 0; $i < $n; $i++) {
               array_push($tmp2, substr($nums, mt_rand(0, strlen($nums) - 1), 1));
          }
          for($i = 0; $i < $s; $i++) {
               array_push($tmp2, substr($syms, mt_rand(0, strlen($syms) - 1), 1));
          }
 
          // hack off a chunk of the base password array that's as big as the special chars array
          //$tmp1 = array_slice($tmp1);
          // merge special character(s) array with base password array
          $tmp1 = array_merge($tmp1, $tmp2);
          // mix the characters up
          shuffle($tmp1);
          // convert to string for output
          $out = implode('', $tmp1);
     }
 
     return $out;
}
 $length=intval($_POST['length']);
 $lowl=intval($_POST['lowl']);
 $upl=intval($_POST['upl']);
 $numl=intval($_POST['nolen']);
 $syml=intval($_POST['syml']);
     $total = $lowl+$upl+$numl+$syml;
     $bal =$length-$total;
if($total<$length)
{
   if($lowl!=0){$lowl=$lowl+$bal;}
   else if($upl!=0){$upl=$upl+$bal;}
   else if($numl!=0){$numl=$numl+$bal;}
   else if($syml!=0){$syml=$syml+$bal;}
}
echo generatePassword($length, $upl, $numl, $syml,$lowl)."<br /><br />";
// echo generatePassword($length, $upl, $numl, $syml,$lowl)."<br /><br />";
// echo generatePassword($length, $upl, $numl, $syml,$lowl)."<br /><br />";
//echo generatePassword($length, $upl, $numl, $syml,$lowl)."<br /><br />";
//echo generatePassword($length, $upl, $numl, $syml,$lowl)."<br /><br />";

?>