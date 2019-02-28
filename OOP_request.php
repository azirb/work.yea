<?php

class Rectangle //Создаем класс прямоугольник
{

 public $lenght ; //Длинна прямоугольника 
 public $wieght ; //Ширина прямоугольника
 public $figure_type = 1 ; //Тип фигуры что бы отличать
 
 public function randRectangleAssigment() //Метод для присваивания случайных значений объекту 
 {
    $this->lenght=rand(1,50);
    $this->weight=rand(1,50); 
 }
 
 public function rectangleSquare()//Метод для подсчета площади
 {
        return $this->lenght*$this->weight; 
 }

}
  
class Circle 
{
  
  public $radius; 
  public $figure_type = 2; 
  
  public function randCircleAssigment()
  {
    $this->radius=rand(1,50); 
  }
  
  public function circleSquare()
  {
    return $this->radius*$this->radius*3.14;
  }
  
}
 
 class Pyromid 
 {

  public $height;
  public $quantity_of_angles;
  public $figure_type=3; 
  
  public function randPyromidAssigment()
  {
    $this->height=rand(1,50); 
    $this->quantity_of_angles=rand(1,50);  
  }
  
  public function pyromidSquare()
  {
     return 0; 
  }

 }

function rand_array_fill() //Функция создания и заполнения массива из фигур 
{
   $count_of_figures=rand(1,15); //Генерируем количество фигур
   $figures=array();//Создаем массив

   for($i=0;$i<$count_of_figures;$i++) {

     $fig_type=rand(1,3);//Генерируем тип фигуры
       
        switch($fig_type) {  //Выбираем его 
           case 1: 
              $figures[$i]=new Rectangle;//создаем объект класса            
              $figures[$i]->randRectangleAssigment();//задаем ему случайные свойства 
              break;
           case 2: 
              $figures[$i]=new Circle; 
              $figures[$i]->randCircleAssigment();
              break;
           case 3: 
              $figures[$i]=new Pyromid;
              $figures[$i]->randPyromidAssigment();
              break;
          }
   }
   return $figures; //возвращаем значения массива  
}

function array_of_figures_sort($mas) //Функция сортировки массива по уменьшению площади (методом пузырька)
{
  for($i=0; $i<count($mas); $i++) {   // Цикл из начала массива 
     for($j=$i+1; $j<count($mas);$j++) { //Цикл из конца массива 
    
       $type=$mas[$i]->figure_type;  //Считываем тип фигуры  для левого элемента 
       
         switch($type) { //Выбираем фигуру и ее площадь
            case 1:
              $left=$mas[$i]->rectangleSquare();
              break;
            case 2: 
              $left=$mas[$i]->circleSquare();
              break;
            case 3: 
              $left=$mas[$i]->pyromidSquare();
              break;
          }
       
       $type=$mas[$j]->figure_type; //Считываем тип фигуры  для правого элемента 
       
         switch($type) {//Выбираем фигуру и ее площадь
            case 1:
              $right=$mas[$j]->rectangleSquare();
              break;
            case 2: 
              $right=$mas[$j]->circleSquare();
              break;
            case 3: 
              $right=$mas[$j]->pyromidSquare();
              break;
         }
         
         if($left<$right) { //Сравниваем и перемещаем элементы методом 3-х стаканов
             $temp=$mas[$j];
             $mas[$j]=$mas[$i];
             $mas[$i]=$temp;
         }
      }
   }
   return $mas; //возвращаем значения массива 
}

function save_in_file($mas) // Функция сохранения массива в файл 
{
   $file_open=fopen("mini db.txt","a+"); //Открываем файл в режими записи 
   $str=""; //Зранее создаем строку 
   foreach($mas as $one_figure) {
     switch($one_figure->figure_type) { //выбираем фигуру по типу
       case 1:
         $str="Type of figure -> ". (string)$one_figure->figure_type."___Lenght =".(string)$one_figure->lenght."___Weight =".(string)$one_figure->weight; //Заполняем строку по шаблону 
         fwrite($file_open,$str."\r\n"); //Записываем строку в файл и переносим указатель 
         break; 
       case 2: 
         $str="Type of figure -> ".(string)$one_figure->figure_type." ___Radius = ".(string)$one_figure->radius; 
         fwrite($file_open,$str."\r\n"); 
         break;
       case 3: 
         $str="Type of figure -> ".(string)$one_figure->figure_type."___Height =".(string)$one_figure->height."___Quantity of angels =".(string)$one_figure->quantity_of_angles;
         fwrite($file_open,$str."\r\n"); 
         break;
     }
   }
  fclose($file_open); //Закрываем файл 
}


function load_from_file() //Функция выгрузки информации из файла в массив 
{
	$figures=array(); //создаем массив 
	$file_open=fopen("mini db.txt","r+"); //Открываем файл в режиме чтения 
    $i=0; //счетчик кол-ва элементов 

	while(!feof($file_open)) { //Цикл длиться пока файл не кончиться 
		 
		$text=fgetc($file_open); 

		if ($text == '1' || $text == '2' || $text == '3' || $text == '4' || $text == '5' || $text == '6' || $text == '7' || $text == '8' || $text == '9' ||   $text == '0' ) { //Перемещаемся по файлу пока не встретим первую цифру 
               switch ((int)$text) //т.к первая цифра всегда означает тип объекта выбираем его 
               {
                 case 1: 
                  $temp= new Rectangle(); //создаем переменную класса Прямоугольник 
                  $text=fgetc($file_open); //Переставляем указатель пока не встретим равно 
                  while ($text != "=")
                  {
                  	$text=fgetc($file_open);
                  }
                  $text=fgetc($file_open); //заного передвигаем указатель что бы попасть на число 
                  $first=(int)$text; //записываем первую часть числа 
                  $text=fgetc($file_open); // проверяем слудующий символ
                  if($text == '1' || $text == '2' || $text == '3' || $text == '4' || $text == '5' || $text == '6' || $text == '7' || $text == '8' || $text == '9' ||   $text == '0' )
                  //т.к функция rand выдает максимум двузначные числа в заданном мной диапазоне проверяем только один символ, в ином случае нужно запускать цикл while для подсчета чисел
                  {
                  	$lenght=$first*10+(int)$text;
                  }
                  else {
                     $lenght=$first;
                  }
                  while ($text != "=")// повторяем махинацию с пробелами 
                  {
                  	$text=fgetc($file_open); 
                  }
                  $text=fgets($file_open);// используем gets т.к после равно может находиться только число 
                  $weight=(int)$text;//конвертируем 
                  $temp->lenght=$lenght; //заполняем значения 
                  $temp->weight=$weight; 
                  $figures[$i]=$temp; //заносим в массив 
                  break;
                 case 2: 
                  $temp= new Circle (); 
                  $text=fgetc($file_open);
                  while ($text != "=")
                  {
                  	$text=fgetc($file_open);
                  }
                  $text=fgetc($file_open);
                  $radius=(int)fgets($file_open); //т.к после равно стоит пробел который мы пропустили прошлой командой можем опять де испотльзовать gets и конвертировать его в int 
                  $temp->radius=$radius; 
                  $figures[$i]=$temp; //заполняем массив 
                  break; 
                 case 3: 
                  $temp= new Pyromid(); //так же ситуация что и у прямоугольника 
                  $text=fgetc($file_open);
                  while ($text != "=")
                  {
                  	$text=fgetc($file_open);
                  }
                  $text=fgetc($file_open); 
                  $first=(int)$text; 
                  $text=fgetc($file_open); 
                  if($text == '1' || $text == '2' || $text == '3' || $text == '4' || $text == '5' || $text == '6' || $text == '7' || $text == '8' || $text == '9' ||   $text == '0' )
                  {
                  	$height=$first*10+(int)$text; 
                  }
                  else {
                     $height=$first;
                  }
                  while ($text != "=")
                  {
                  	$text=fgetc($file_open);
                  }
                  $text=fgetc($file_open);
                  $first=(int)$text; 
                  $text=fgetc($file_open); 
                  if($text == '1' || $text == '2' || $text == '3' || $text == '4' || $text == '5' || $text == '6' || $text == '7' || $text == '8' || $text == '9' ||   $text == '0' ) {
                  	$quantity_of_angles=$first*10+(int)$text; 
                  }
                  else {
                     $quantity_of_angles=$first;
                  }
                  $temp->height=$height; 
                  $temp->quantity_of_angles=$quantity_of_angles; 
                  $figures[$i]=$temp;  
		}
	}
	else { 
         continue; //в случае если стоит не число а буква в строке прохожим по циклу дальше 
         }
             $i++;  //прибавляем счетчик при заполнении элемента 
		}
  fclose($file_open); //закрываем файл 
  return $figures; //возвращаем значение массива 
}
?>