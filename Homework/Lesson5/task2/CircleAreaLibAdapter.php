<?php

class CircleAreaLibAdapter implements ICircle
{
    private CircleAreaLib $circleAreaLib;

    /**
     * @param $circleAreaLib
     */
    public function __construct($circleAreaLib)
    {
        $this->circleAreaLib = $circleAreaLib;
    }

    function circleArea(float $circumference)
    {
        $diagonal = $circumference / M_PI;
        return $this->circleAreaLib->getCircleArea($diagonal);
    }
}