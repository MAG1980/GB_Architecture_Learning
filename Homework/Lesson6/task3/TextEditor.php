<?php

//Invoker
class TextEditor
{
    public function submit(ICommand $command)
    {
        $command->execute();
    }
    public function unDo (ICommand $command)
    {
        $command->unDo();
    }
    public function reDo (ICommand $command)
    {
        $command->reDo();
    }
}