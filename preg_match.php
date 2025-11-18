<?php 
$line="vim is the greatest word processor ever created! oh vim,how I love thee!";
// echo preg_match("/\bvim\b/i",$line,$match);
// if (preg_match("/\bvim\b/i",$line,$match))print"Match found!";
if (preg_match_all("/\bvim\b/i",$line,$match))print"Match found!";
print_r($match);




?>