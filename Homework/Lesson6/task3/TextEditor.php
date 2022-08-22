<?php

//Invoker
class TextEditor
{
    public function submit(ICommand $command)
    {
        $command->execute();
    }
}