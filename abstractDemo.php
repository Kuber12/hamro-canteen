<?php

abstract class Shape{

    abstract public function area();
}

class Rect extends Shape {

    public function area() {

        return  "area of rect" ;
    }
}

class Circle extends Shape {

    public function area(){

        return "area of circle";
    }
    
}
class Triangle extends Shape{

    public function area(){
        return "area of the traignle";
    }
}

$shape = $_POST['shape'];



if($shape === "rectangle"){

    $rectangle = new Rect();
    echo  $rectangle->area();

}
else if($shape === "circle"){
    $circle = new circle();
    echo $circle->area();
    
}
else if($shape === "triangle"){
    
    $triangle = new Triangle();
   echo $triangle->area();
}
else{
    echo "invalid input";
}


