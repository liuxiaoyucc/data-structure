<?php
/**
 * 第二章 向量
 * 所谓的向量,实质上是高级语言中对数组的一个推广和泛化
 * 秩rank相当于数组下标
 * 在PHP中, 可以用数值数组来表示向量, 数值数组, 即以数字（从0 开始）作为数组下标
 *                   .-~~~~~~~~~-._       _.-~~~~~~~~~-.
              __.'              ~.   .~              `.__
            .'//                  \./                  \\`.
          .'//                     |                     \\`.
        .'// .-~"""""""~~~~-._     |     _,-~~~~"""""""~-. \\`.
      .'//.-"                 `-.  |  .-'                 "-.\\`.
    .'/H______.============-..   \ | /   ..-============.______\C`.
  .'______________________________\|/______________________________`.

 * 读书使我快乐
 */
namespace Practice;


class C_Two
{

	/**
	 * 构造函数
	 */
	public function __construct() 
	{

	}

	
	/**
	 * 析构函数
	 */
	function __destruct() {}

	/**
	 * 二分查找A
	 * 在有序向量中查找元素e
	 * @param  ARRAY $sort_vector 有序数组
	 * @param  INT $e           需查找的元素
	 * @return INT              e所在的rank
	 */
	function binSearch_A($sort_vector, $e)
	{
		$lo = 0; // left 
		$hi = count($sort_vector); // right

		while ($lo < $hi) {
			$mi = ($lo + $hi) >> 1; // 中心位rank
			
			if ($sort_vector[$mi] > $e) {
				$hi = $mi;
			}elseif ($sort_vector[$mi] < $e) {
				$lo = $mi + 1;
			}else { // 命中
				return $mi;
			}
		}
		return -1;
	}

	/**
	 * 二分查找B
	 * 每次循环判断一次, 命中后不能提前退出
	 */
	function binSearch_B($sort_vector, $e)
	{
		$lo = 0; // left 
		$hi = count($sort_vector); // right

		while ($lo + 1 < $hi) {
			$mi = ($lo + $hi) >> 1; // 中心位rank
			
			$sort_vector[$mi] > $e ? $hi = $mi : $lo = $mi;
		}
		return $e == $sort_vector[$lo] ? $lo : -1;
	}

	/**
	 * 二分查找C
	 * 查找失败时返回位置
	 * @param  [type] $sort_vector [description]
	 * @param  [type] $e           [description]
	 * @return [type]              [description]
	 */
	function binSearch_C($sort_vector, $e)
	{
		$lo = 0; // left 
		$hi = count($sort_vector); // right

		while ($lo < $hi) {
			$mi = ($lo + $hi) >> 1; // 中心位rank
			
			$sort_vector[$mi] > $e ? $hi = $mi : $lo = $mi + 1;
		}
		return --$lo;
	}

	/**
	 * 归并排序入口
	 * 递归
	 * 1. 第一个在最坏情况下, 可以保持O(nlogn)运行时间的确定性排序算法
	 * @param ARRAY $array 带排序的数组
	 * @return ARRAY 排序后的结果
	 */
	function mergeSort($array)
	{
		
		$length = count($array);

		if ($length <= 1) { // 递归结束, 当array只有一个元素时, 结束分割
			return $array;
		}

		$mi = intval($length / 2); // 中心为rank
		// 将数组分成两部分, mi左边的给left, 右边的给right, 递归继续分割
		$left = array_slice($array, 0, $mi);
		$right = array_slice($array, $mi);

		$left = $this->mergeSort($left);
		$right = $this->mergeSort($right);

		// $this->log->debug('左: ' , $left);
		// $this->log->debug('右: ' , $right);

		$array = $this->merge($left, $right);

		return $array;

	}

	/**
	 * 合并两个有序数组并排序
	 */
	function merge($left, $right)
	{
		$result = [];

		while (count($left) && count($right)) { // 一直比较两个数组第一项, 比较后将删除小值一方的数组第一项, 直到数组
			$result[] = $left[0] < $right[0] ? array_shift($left) : array_shift($right);
			// $this->log->debug('result: ' , $result);
		}

		$merge = array_merge($result, $left, $right);
		// $this->log->debug('merge: ' , $merge);

		return $merge;
	}

	

}
