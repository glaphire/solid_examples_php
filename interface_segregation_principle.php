<?php

/**
 * Many client-specific interfaces are better than one general-purpose interface.
 * Classes should not be forced to implement interfaces they do not use.
 */

/**
 * Bad example.
 * VehicleInterface is compatible only to one class - FutureCar.
 */
interface VehicleInterface {
    public function drive();
    public function fly();
}

class FutureCar1 implements VehicleInterface {

    public function drive() {
        echo 'Driving a future car!';
    }

    public function fly() {
        echo 'Flying a future car!';
    }
}

class Car1 implements VehicleInterface {

    public function drive() {
        echo 'Driving a car!';
    }

    public function fly() {
        throw new Exception('Not implemented method');
    }
}

class Airplane1 implements VehicleInterface {

    public function drive() {
        throw new Exception('Not implemented method');
    }

    public function fly() {
        echo 'Flying an airplane!';
    }
}

/**
 * Good example.
 * Interface are narrow-purposed and can be easily implemented.
 */
interface FlyingInterface {
    public function fly();
}

interface DrivingInterface {
    public function drive();
}

class FutureCar2 implements FlyingInterface, DrivingInterface {

    public function drive() {
        echo 'Driving a future car!';
    }

    public function fly() {
        echo 'Flying a future car!';
    }
}

class Car2 implements DrivingInterface {
    public function drive() {
        echo 'Driving a car!';
    }
}

class Airplane2 implements FlyingInterface {
    public function fly() {
        echo 'Flying an airplane!';
    }
}
