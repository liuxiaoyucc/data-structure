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

			for ($j = $i - 1; $j >= 0; $j--) {
				if ($first_number < $array[$j]) {
					$array[$j + 1] = $array[$j];
					$array[$j] = $first_number;
				} else {
					break;
				}
			}
		}

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
		return $arr;
	}


	/**
	 * TODO
	 * 选择排序
	 * 5 2 (7) 4 6 3 1
	 * 5 2 4 (6) 3 1 	      |     7
	 * (5) 2 4 3 1			  |		6 7
	 * 2 (4) 3 1			  |		5 6 7 
	 * ........
	 *
	 */
	function selectionSort($array)
	{
		
		$sortArray = [];
		while (count($array) > 0) {
			$maxIndex = $this->selectMaxIndex($array);
			array_unshift($sortArray, $array[$maxIndex]);
			unset($array[$maxIndex]);
		}
		return $sortArray;
	}

	private function selectMaxIndex($array)
	{
		$max_index = 0;
		foreach ($array as $key => $number) {
			if ($number > $array[$max_index]) {
				$max_index = $key;
			}
		}

		return $max_index;
	}

}
