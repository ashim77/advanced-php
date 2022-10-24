<?php
$str = '01738-005937';
$pattern = "/^01+[7|3][0-9]{2}+-+[0-9]{6}/i";
if (preg_match($pattern, $str)) {
  echo 'Grameenphone!';
} else {
  echo 'Others';
}
