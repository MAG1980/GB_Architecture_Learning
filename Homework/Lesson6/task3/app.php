<?php
include "ICommand.php";
include "CopyCommand.php";
include "PasteCommand.php";
include "CutCommand.php";
include "TextEditor.php";

$invoker = new TextEditor();
$invoker->submit(new CopyCommand());