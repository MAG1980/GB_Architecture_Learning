<?php
include "ICommand.php";
include "CopyCommand.php";
include "PasteCommand.php";
include "CutCommand.php";
include "TextEditor.php";

$invoker = new TextEditor();
$invoker->submit(new CopyCommand());
$invoker->submit(new CutCommand());
$invoker->unDo(new CutCommand());
$invoker->reDo(new CutCommand());
$invoker->submit(new PasteCommand());