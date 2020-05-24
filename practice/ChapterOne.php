<?php
/**
 * 第一章 绪论
 * ┌───┐   ┌───┬───┬───┬───┐ ┌───┬───┬───┬───┐ ┌───┬───┬───┬───┐ ┌───┬───┬───┐
 * │Esc│   │ F1│ F2│ F3│ F4│ │ F5│ F6│ F7│ F8│ │ F9│F10│F11│F12│ │P/S│S L│P/B│  ┌┐    ┌┐    ┌┐
 * └───┘   └───┴───┴───┴───┘ └───┴───┴───┴───┘ └───┴───┴───┴───┘ └───┴───┴───┘  └┘    └┘    └┘
 * ┌───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───────┐ ┌───┬───┬───┐ ┌───┬───┬───┬───┐
 * │~ `│! 1│@ 2│# 3│$ 4│% 5│^ 6│& 7│* 8│( 9│) 0│_ -│+ =│ BacSp │ │Ins│Hom│PUp│ │N L│ / │ * │ - │
 * ├───┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─────┤ ├───┼───┼───┤ ├───┼───┼───┼───┤
 * │ Tab │ Q │ W │ E │ R │ T │ Y │ U │ I │ O │ P │{ [│} ]│ | \ │ │Del│End│PDn│ │ 7 │ 8 │ 9 │   │
 * ├─────┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴─────┤ └───┴───┴───┘ ├───┼───┼───┤ + │
 * │ Caps │ A │ S │ D │ F │ G │ H │ J │ K │ L │: ;│" '│ Enter  │               │ 4 │ 5 │ 6 │   │
 * ├──────┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴────────┤     ┌───┐     ├───┼───┼───┼───┤
 * │ Shift  │ Z │ X │ C │ V │ B │ N │ M │< ,│> .│? /│  Shift   │     │ ↑ │     │ 1 │ 2 │ 3 │   │
 * ├─────┬──┴─┬─┴──┬┴───┴───┴───┴───┴───┴──┬┴───┼───┴┬────┬────┤ ┌───┼───┼───┐ ├───┴───┼───┤ E││
 * │ Ctrl│    │Alt │         Space         │ Alt│    │    │Ctrl│ │ ← │ ↓ │ → │ │   0   │ . │←─┘│
 * └─────┴────┴────┴───────────────────────┴────┴────┴────┴────┘ └───┴───┴───┘ └───────┴───┴───┘
 */

require '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class C_One
{

	public $log;

	public function __construct()
	{
		$this->log = new Logger('c_one');
		$log_file = '../logs/c_one/log_' . date('Y') . '_' . date('m'). '_' . date('d') . '.log';
		$this->log->pushHandler(new StreamHandler($log_file, Logger::DEBUG));
	}

	/**
	 * 斐波那契数 [0, 1, 1, 2, 3, 5, 8, 13, 21, ...]
	 * 返回斐波那契数的第n项值
	 * 动态规划
	 * @param  int $n
	 * @return int 
	 */
	public function fib($n)
	{
		$p = 1;
		$q = 0;
		while (0 < $n--) {
			$p = $p + $q;
			$q = $p - $q;
		}
		return $p;
	}

	/**
	 * 对于非负整数n,计算2的n次幂
	 * @param  int $n
	 * @return int
	 */
	public function power2BF_I($n)
	{
		$power = 1;
		while ($n-- > 0) {
			$power <<= 1; //左移*2
		}
		return $power;
	}

	/**
	 * 实现一个十进制整数转二进制的函数
	 * @param  int $number 十进制整数
	 * @return int $bin+0  字符串转为int
	 */
	public function decToBin($number)
	{
		$bin = '';
		while ($number > 0) {
			$num = $number & 1;
			$number >>= 1;
			$bin = $num.$bin;
		}
		return $bin+0;
	}

	/**
	 * 整数二进制展开中1的个数
	 * 
	 * &		按位与	只有对应的两个二进制位均为1时候，结果位才会是1，否则为0
	 * |		按位或	只要对应的两个二进制位有一个为1时，结果位就位1，否则为0
	 * ^		按位异或	对应二进制位相异(不相同)时，结果位1，否则为0 
	 * ~		按位取反	把每个二进制位取反，它是单目运算符，只操作一个数
	 * << >>	位运算左移或右移n位,实际上是十进制 *2 或 /2
	 *
	 * $n & 1	可用来判断二进制最后一位是否为1
	 * 
	 * 
	 * @param  int $n 整数
	 * @return int $total   1的个数
	 */
	public function countOnes($n)
	{
		$total = 0;//初始化计数器
		while ($n > 0) {
			$total += $n & 1;
			$n >>= 1;
		}
		return $total;
	}

	/**
	 * 冒泡排序(起泡排序)
	 * 异或: 不同即为真,相同即为假
	 * 
	 * [5, 1, 7, 2]
	 *
	 * 利用flag标记位,当某一趟while循环,$flag没有被改变成false时,说明排序完成
	 * 
	 * 第一次while
	 * $i = 1    5 > 1,交换位置     [1, 5, 7, 2]
	 * $i = 2    5 < 7,无变化        [1, 5, 7, 2]
	 * $i = 3    7 > 2,交换位置    [1, 5, 2, 7]
	 * 
	 * @param  array $nums n个整数
	 * @return array $nums 返回排序后的数组
	 */
	public function bubbleSort($nums, $count)
	{

		$flag = false;
		while (!$flag) {
			$flag = true;
			for ($i = 1; $i < $count; $i++) {
				$flag = true;
				if ($nums[$i - 1] > $nums[$i]) {
					//交换位置
					$nums[$i - 1] = $nums[$i - 1] ^ $nums[$i];
					$nums[$i]     = $nums[$i - 1] ^ $nums[$i];
					$nums[$i - 1] = $nums[$i] ^ $nums[$i - 1];
					$flag = false;

				}
			}
			$count --;
			$this->log->debug('当前for循环结果:', $nums);
		}
		return $nums;
	}

	/**
	 * 给定n个数的总和
	 * @param  array $nums n个整数的集合
	 * @param  int $n
	 * @return int $sum 返回n个整数的总和
	 */
	public function sumI($nums, $n)
	{
		$sum = 0; //初始化累加器
		for ($i = 0; $i < $n; $i++) {
			$sum += $nums[$i];
		}
		return $sum;
	}


	/**
	 * 递归版求和
	 * @param  array $nums
	 * @param  int $n 
	 * @return int
	 */
	public function recursionSumI($nums, $n)
	{
		return $n < 1 ? 0 : $this->recursionSumI($nums, $n - 1) + $nums[$n - 1];
	}

}

$c_one = new C_One;
$result = '';
// $result   = $c_one->sumI([1, 2, 3], 3);
// $result = $c_one->bubbleSort([11, 23, 19, 7], 4);
// $result = $c_one->countOnes(15);
// $result = $c_one->decToBin(100);
// $result = $c_one->power2BF_I(0);
// $result = $c_one->recursionSumI([1,2,3,6], 4);
// $result = $c_one->fib(100);

$c_one->log->debug('函数执行结果: ' . $result);
// $c_one->log->debug('函数执行结果: ' , $result);
