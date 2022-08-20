<?php

class SquareAreaLibAdapter implements ISquare
{
    private SquareAreaLib $squareAreaLib;

    /**
     * @param  SquareAreaLib  $squareAreaLib
     */
    public function __construct(SquareAreaLib $squareAreaLib)
    {
        $this->squareAreaLib = $squareAreaLib;
    }


    function squareArea(int $sideSquare)
    {
        $diagonal = sqrt(2) * $sideSquare;
        return $this->squareAreaLib->getSquareArea($diagonal);
    }
}