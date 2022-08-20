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

    function circleArea(int $circumference)
    {
        $diagonal = $circumference / M_PI;
        echo $diagonal."\n";
        return $this->circleAreaLib->getCircleArea($diagonal);
    }
}