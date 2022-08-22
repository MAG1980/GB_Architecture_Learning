<?php

interface ICommand
{
public function execute();
public function unDo();
public function reDo();
}