<?php
namespace Lib;

/**
 * php数组 模拟栈结构, 以数组尾部作为栈顶
 */
class Stack
{
	private $cursor; //指针位置
	private $stack; //栈

	public function __construct()
	{
		$this->cursor = -1;
		$this->stack = [];
	}

	// 当前栈规模
	public function size()
	{
		return $this->cursor + 1;
	}

	// 是否为空
	public function empty()
	{
		return $this->cursor === -1 ? true : false;
	}


	// 入栈
	public function push($item)
	{
		$this->cursor ++;
		$this->stack[$this->cursor] = $item;
		return;
	}

	// 出栈
	public function pop()
	{
		if (!$this->empty()) {
			$this->cursor --;
		}
		return;
	}

	// 返回栈顶元素
	public function top()
	{
		if (!$this->empty()) {
			return $this->stack[$this->cursor];
		}
	}

	public function show()
	{
		return $this->stack;
	}

}