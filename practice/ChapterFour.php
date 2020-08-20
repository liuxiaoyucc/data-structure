<?php
namespace Practice;

require 'lib/Stack.php';

use Lib\Stack;


/**
 * 第四章
 */

class C_Four
{
	public $stack = NULL;
	public function __construct()
	{
		$this->stack = new Stack();
	}

	/**
	 * 递归版
	 * 将十进制数$decim转成$base进制数
	 */
	public function convert_recursion($decim, $base)
	{
		$digit = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'];

		
		
		if ($decim > 0) {
			$remainder = $decim % $base;
			$answer = intdiv($decim, $base);
			$this->stack->push($digit[$remainder]);

			$this->convert_recursion($answer, $base);
		}
		return $this->stack->show();
	}

	/**
	 * 迭代版, 避免栈操作导致的空间和时间消耗
	 * 将十进制数$decim转成$base进制数
	 */
	public function convert_iteration($decim, $base)
	{
		$digit = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'];

		while ($decim > 0) {
			$remainder = $decim % $base;
			$this->stack->push($digit[$remainder]);
			$decim = intdiv($decim, $base);
		}
		return $this->stack->show();
	}
}