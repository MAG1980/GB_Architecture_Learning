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
    protected BinaryNode $node;

    public function addNode(BinaryNode $value)
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
        if($item->value === $node->value){
            echo "Ошибка! Такой узел уже присутствует в дереве!";
        }
    }
}