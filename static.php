
<?php

class Calculation {
   public static $a =10;
   public static $b = 20; 

   public static function add(){
      return  self::$a + self::$b;
      // return $this->a + $this->b;
   }
   
}
echo Calculation::add();
