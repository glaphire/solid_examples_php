<?php

/**
 * Objects or entities should be open for extension but closed for modification.
 * A software entity must be easily extensible
 * with new features without having to modify its existing code in use.
 */

/**
 * Example of wrong design.
 * To calculate area, you should calculate area of each shape manually
 */
class Rectangle1 {

    public $width;
    public $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }
}

class Square1 {

    public $length;

    public function __construct($length) {
        $this->length = $length;
    }
}

class AreaCalculator1 {

    protected $shapes;

    public function __construct($shapes = array()) {
        $this->shapes = $shapes;
    }

    public function sum() {
        $area = [];

        //painful to expand with new shapes
        foreach($this->shapes as $shape) {
            if($shape instanceof Square1) {
                $area[] = pow($shape->length, 2);
            } else if($shape instanceof Rectangle1) {
                $area[] = $shape->width * $shape->height;
            }
        }

        return array_sum($area);
    }
}

/**
 * Example of good design.
 * Each shape class implements Shape interface.
 * There's no need to modify AreaCalculator to calculate shapes' sum.
 */
interface ShapeInterface
{
    public function area();
}

class Rectangle implements ShapeInterface
{
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function area()
    {
        return $this->width * $this->height;
    }
}

class Square implements ShapeInterface
{
    private $length;

    public function __construct($length)
    {
        $this->length = $length;
    }

    public function area()
    {
        return pow($this->length, 2);
    }
}

class AreaCalculator
{
    /**
     * @var ShapeInterface[] $shapes
     */
    protected $shapes;

    public function __construct(ShapeInterface ...$shapes) {
        $this->shapes = $shapes;
    }

    public function sum() {
        $area = [];

        //each shape has implemented "area" method so it's easy co call it
        foreach($this->shapes as $shape) {
            $area[] = $shape->area();
        }

        return array_sum($area);
    }
}