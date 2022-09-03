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
    public ?BinaryNode $node;
    public $array;

    /**
     * @param  BinaryNode  $node
     * @param $array
     */
    public function __construct()
    {
        $this->node = null;
        $this->array = null;
    }

    public function addNode($value)
    {
        $item = new BinaryNode($value);
        if (is_null($this->node)) {
            $this->node = $item;
            return;
        }
        $this->_addNode($this->node, $item);
    }

    private function _addNode(BinaryNode $node, BinaryNode $item)
    {

        if ($item->value < $node->value) {
            if (is_null($node->leftTree)) {
                $node->leftTree = $item;
            } else {
                $this->_addNode($node->leftTree, $item);
            }
        }
        if ($item->value > $node->value) {
            if (is_null($node->rightTree)) {
                $node->rightTree = $item;
            } else {
                $this->_addNode($node->rightTree, $item);
            }
        }
        if ($item->value === $node->value) {
            echo "Ошибка! Такой узел уже присутствует в дереве!";
        }
    }

    public function fromLeftToRight($dataHadler)
    {
        $this->inOrder($this->node, $dataHadler);

    }

    public function dataHandler(BinaryNode $node)
    {
        $this->array[] = $node->value;
    }

    private function inOrder($node, $dataHadler)
    {
        if (is_null($node)) {
            return;
        }
        $this->inOrder($node->leftTree, $dataHadler);
        $dataHadler($node->value);
        $this->inOrder($node->rightTree, $dataHadler);
    }

    public function getNodeList()
    {
        $this->fromLeftToRight((function ($value) {
            var_dump($value);
        }));
    }

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


var_dump($binaryTree->node);
/*$binaryTree->fromLeftToRight(function ($value) {
    var_dump($value);
});*/
//$binaryTree->getNodeList();
//$binaryTree->getNodeArray();
var_dump($binaryTree->getNodeArray());
