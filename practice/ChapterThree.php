<?php

/**
 * 列表
 *
 *                    .::::.
 *                  .::::::::.
 *                 :::::::::::  Hi!
 *             ..:::::::::::'
 *           '::::::::::::'
 *             .::::::::::
 *        '::::::::::::::..
 *             ..::::::::::::.
 *           ``::::::::::::::::
 *            ::::``:::::::::'        .:::.
 *           ::::'   ':::::'       .::::::::.
 *         .::::'      ::::     .:::::::'::::.
 *        .:::'       :::::  .:::::::::' ':::::.
 *       .::'        :::::.:::::::::'      ':::::.
 *      .::'         ::::::::::::::'         ``::::.
 *  ...:::           ::::::::::::'              ``::.
 * ```` ':.          ':::::::::'                  ::::..
 *                    '.:::::'                    ':'````..
 */

namespace Practice;

class C_Three 
{
	
	public function __construct() {
		
	}

	/**
	 * 插入排序
	 * 将序列视为两部分, 刚开始前缀视为空, 后缀无序, 通过迭代, 将后缀的首元素转移至前缀, 并找到不大于他的最大元素, 插入其后, 始终保持前缀的有序
	 */
	function insertionSort($array) {
		$prev = [];
		$length = count($array);

		for ($i = 1; $i < $length; $i++) {
			$first_number = $array[$i];

			// $this->log->debug('当前待插入元素: ' . $first_number);

			for ($j = $i - 1; $j >= 0; $j--) {
				// $this->log->debug('比较元素: ' . $array[$j]);
				if ($first_number < $array[$j]) {
					$array[$j + 1] = $array[$j];
					$array[$j] = $first_number;
				} else {
					break;
				}
			}
			// $this->log->debug('本次排序结果: ' , $array);
		}

		// $this->log->debug('排序完成: ' , $array);
		return $array;
	}


	function insertSort(array &$arr) {
		$len = count($arr);
		for ($i = 1; $i < $len; $i++) {
			$key = $arr[$i];
			$j = $i - 1;

			while ($j >= 0 && $arr[$j] > $key) {
				$arr[$j + 1] = $arr[$j];
				$j--;
			}
			$arr[$j + 1] = $key;
		}
	}


	/**
	 * TODO
	 * 选择排序
	 */
	function selectionSort($array)
	{
		
	}
}
