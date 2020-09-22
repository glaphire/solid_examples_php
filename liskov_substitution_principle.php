<?php

/**
 * Оbjects should be replaceable by their subtypes without altering how the program works.
 * Derived classes must be substitutable for their base classes without causing errors.
 */

/**
 * Bad example.
 * Square1 may have it's own logic that is incompatible with Rectangle1,
 * so it won't be replaceable in code
 */
class Rectangle1
{
    private $height;
    private $width;

    public function setWidth($w) {
        $this->width = $w;
    }

    public function setHeight($h) {
        $this->height = $h;
    }

    public function getArea() {
        return $this->height * $this->width;
    }
}

class Square1 extends Rectangle1
{
    private $height;
    private $width;

    public function setWidth($w) {
        $this->width = $w;
        $this->height = $w;
    }

    public function setHeight($h) {
        $this->height = $h;
        $this->width = $h;
    }
}

/**
 * Good example.
 * Rectangle and Square have similarities but are independent and replaceable
 */
interface Quadrilateral {
    public function setHeight($h);

    public function setWidth($w);

    public function getArea();
}

class Rectangle2 implements Quadrilateral
{
    public function setHeight($h)
    {
        // TODO: Implement setHeight() method.
    }

    public function setWidth($w)
    {
        // TODO: Implement setWidth() method.
    }

    public function getArea()
    {
        // TODO: Implement getArea() method.
    }
}

class Square2 implements Quadrilateral
{
    public function setHeight($h)
    {
        // TODO: Implement setHeight() method.
    }

    public function setWidth($w)
    {
        // TODO: Implement setWidth() method.
    }

    public function getArea()
    {
        // TODO: Implement getArea() method.
    }
}