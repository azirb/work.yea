<?php 
$element_one = 1; //Первое число последовательности 
$element_two = 1; //Второе число последовательности 
$flag= true; //Выход из цикла 
$count=2; //Количество чисел
$temp = 0; //Хранение одного из элементов

echo $element_one . "," . $element_one; 

while ($count != 64)
{
  $temp=$element_two; 
  $element_two=$element_one+$element_two; 
  $element_one=$temp; 
  echo ",". $element_two; 
  $count++; 
}


?> 