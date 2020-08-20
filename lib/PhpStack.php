<?php
namespace PhpStack;

class PhpStack 
{
    public $top = -1;
    public $size = 5;
    public $stack = array();

    public function __construct($size){
        $this->size = $size;
    }

    public function push($item){
        if($this->isFull()){
            return ;
        }
        $this->top++;
        $this->stack[$this->top]=$item;
    }

    public function pop(){
        if($this->isEmpty()){
            return ;
        }
        $ret = $this->stack[$this->top];
        $this->top--;
        return $ret;
    }

    public function isFull(){
        if(($this->top+1)>=$this->size){
            echo "The stack is full!";
            return true;
        }
    }
    public function isEmpty(){
        if($this->top==-1){
            echo "The stack is empty";
            return true;
        }
    }
    public function show(){
        for($i=$this->top;$i>-1;$i--){
            echo $i."元素为：".$this->stack[$i]."<br/>";
        }
    }
}
?>