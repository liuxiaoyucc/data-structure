<?php
namespace Practice;

require 'lib/Stack.php';

use Lib\Stack;


/**
 * 第四章
 *
 *	       cccccc
 *	    cccc     cc
 *	  cc          c
 *	 c            c          c
 *	c             c        ccccc
 *	c            cc      cc     c
 *	 c          cc      c      cc
 *	  ccc      cc       c     c
 *	     ccccccc        cccccc
 *
 *	               c
 *	               cc
 *	                c
 *	                cc
 *	                 c
 *	            cccccc
 *
 *
 *	     ccccc cccc
 *	       cccccc
 *
 *
 *	栈混洗
 *		catalan
 *		
 *		**规则**: 栈A, B, C, 只允许 $S->push($A->pop()) 或者 $B->push($S->pop()); 
 *		通过栈S中转, 直到A中的元素均进入B中, 则称B为A的一组混洗
 *	  	
 * 		*彩虹表
 * 		*火车进出站		
 * 
 * 	括号匹配
 * 		
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


	/**
	 * 栈混洗
	 * 随机混洗一次
	 */
	public function stack_permutation()
	{
		$A = new Stack(3, 2, 1);
		$B = new Stack();
		$S = new Stack();

		print_r($A->show());
		do {
			
			$seed = mt_rand(0, 1);

			if ($A->empty()) {
				$B->push($S->pop());
				continue;
			}
			if($S->empty()) {
				$S->push($A->pop());
				continue;
			}

			$seed ? $S->push($A->pop()) : $B->push($S->pop());


			
		}while (!$A->empty() || !$S->empty());

		
		return $B->show();
	}

	/**
	 * 栈混洗
	 * 随机混洗一次
	 */
	public function stack_permutation_process()
	{
		$B = new Stack(3, 1, 5);
		$A = new Stack(5, 3, 1);
		$S = new Stack();
		$rb = new Stack();

		while (!$B->empty()) {
			$rb->push($B->pop());
		}
		while (!$A->empty()) {
			$S->push($A->pop());

			print_r($S->show()); echo "<br>";

			if ($S->top() === $rb->top()) {
				$S->pop();
				$rb->pop();
			}
		}

		print_r($S->show());
	}

}