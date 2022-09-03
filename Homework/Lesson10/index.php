<?php

class BinaryNode
{
    public $value;
    public $leftTree = null;
    public $rightTree = null;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }
}

class BinaryTree
{
    public ?BinaryNode $root;
    public $array;

    /**
     * @param  BinaryNode  $root
     * @param $array
     */
    public function __construct()
    {
        $this->root = null;
        $this->array = null;
    }

    public function addNode($value)
    {
        //Создаём новый узел бинарного дерева из полученного значения
        $newNode = new BinaryNode($value);

        //Если корневой узел текущего дерева ещё не существует, то помещаем в него новый узел
        if (is_null($this->root)) {
            $this->root = $newNode;
            return;
        }

     /* Если корневой узел текущего дерева уже занят, то вызываем метод, который  рекурсивно пытается добавить новый узел в поддеревья текущего дерева */
        $this->_addNode($this->root, $newNode);
    }

    private function _addNode(BinaryNode $root, BinaryNode $newNode)
    {
        //Если значение нового узла меньше, чем значение корневого, то пытаемся поместить новый узел в левое поддерево
        if ($newNode->value < $root->value) {
            //Если корневой узел левого дерева не занят, то помещаем в него новый узел
            if (is_null($root->leftTree)) {
                $root->leftTree = $newNode;
            } else {
                //Рекурсивно пытаемся добавить новый узел в левое поддерево
                $this->_addNode($root->leftTree, $newNode);
            }
        }

        //Если значение нового узла больше, чем значение корневого, то пытаемся поместить новый узел в правое поддерево
        if ($newNode->value > $root->value) {
            //Если корневой узел правого дерева не занят, то помещаем в него новый узел
            if (is_null($root->rightTree)) {
                $root->rightTree = $newNode;
            } else {
                //Рекурсивно пытаемся добавить новый узел в правое поддерево
                $this->_addNode($root->rightTree, $newNode);
            }
        }

        //Препятствуем добавлению в дерево дубликатов узлов
        if ($newNode->value === $root->value) {
            echo "Ошибка! Такой узел уже присутствует в дереве!";
        }
    }

    //Перебираем узлы дерева в глубину слева направо
    public function fromLeftToRight($dataHadler)
    {
        $this->inOrder($this->root, $dataHadler);

    }

    //Добавляем узлы дерева в массив (при переборе)
    public function dataHandler(BinaryNode $node)
    {
        $this->array[] = $node->value;
    }

    //Задаём порядок обхода узлов дерева при переборе
    private function inOrder($root, $dataHadler)
    {
        //Условие выхода из рекурсии - корневой узел не существует
        if (is_null($root)) {
            return;
        }
        $this->inOrder($root->leftTree, $dataHadler);
        $dataHadler($root->value);
        $this->inOrder($root->rightTree, $dataHadler);
    }

    //Выводим список значений узлов дерева, полученный в результате перебора
    public function getNodeList()
    {
        $this->fromLeftToRight((function ($value) {
            var_dump($value);
        }));
    }

    //Возвращаем массив значений узлов дерева, полученный в результате перебора
    public function getNodeArray()
    {
        $this->array=[];
        //Выполняем обход дерева и добавляем значения его узлов в массив в порядке возрастания
        $this->fromLeftToRight((function ($value) {
            $this->array[] = $value;
        }));

        return $this->array;
    }
}



$binaryTree = new BinaryTree();
$binaryTree->addNode(10);
$binaryTree->addNode(9);
$binaryTree->addNode(7);
$binaryTree->addNode(14);
$binaryTree->addNode(11);
$binaryTree->addNode(12);
$binaryTree->addNode(15);


var_dump($binaryTree->root);
/*$binaryTree->fromLeftToRight(function ($value) {
    var_dump($value);
});*/
//$binaryTree->getNodeList();
//$binaryTree->getNodeArray();
var_dump($binaryTree->getNodeArray());

$mathOperations = [
    "+" => 3, "-" => 3, "*" => 2, "/" => 2, "^" => 1
];

$str = 'some + text - new';
$str = '236 + 1 - 32/ 678';
$lecArr = [];
$offset = -1;
for ($i = 0; $i <= strlen($str); $i++) {

    if (array_key_exists($str[$i], $mathOperations)) {
        $subStrLength = $i - 1 - $offset;
        $lec = trim(substr($str, $offset + 1, $subStrLength));
        var_dump("i: $i", "offset: $offset");
        var_dump($lec);
        $lecArr[] = $lec;
        $offset = $i;
        $lecArr[] = $str[$i];
        $lengthToEnd = strlen($str) - $i - 1;
    }
    if ($i === strlen($str)) {
        $lec = trim(substr($str, -$lengthToEnd));
        $lecArr[] = $lec;
    }
}
print_r($lecArr);