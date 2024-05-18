<?php
$vowels=["a", "e", "i","o", "u"];
print_r($vowels);
$vowels=array_reverse($vowels);

foreach($vowels as $item)
{
    echo $item ."\n";
}
// reverse and vowel count

$reverse = array_reverse($vowels);
print_r($reverse);
echo "<br>";
echo $item." "."vowel count is ".count($vowels);
echo "<br>"."\n";



/* Vowel count and reverse */
$strings = ["Hello", "World", "PHP", "Programming"];
// two vowel count and reverse each
foreach($strings as $string)
{
    $count=0;
    $string= strrev($string);
    for($i=0; $i<strlen($string); $i++)
    {
    if($string[$i]=="a" || $string[$i]=="e" || $string[$i]=="i" || $string[$i ]=="o" || $string[$i]=="u")
        {
            $count++;
            }
            }
echo " Vowel has ". $count .  " " . "and It has been Reverswed". " ". $string ;
echo "\n";

 }
            
      







 


 
