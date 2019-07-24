<?php
/**
 * 第一章
 */
class C_One
{

    /**
     * 冒泡排序(起泡排序)
     * 异或: 不同即为真,相同即为假
     * 
     * [5, 1, 7, 2], 4
     *
     * 利用flag标记位,当某一趟while循环,$flag没有被改变成false时,说明排序完成
     * 
     * 第一次while
     * $i = 1    5 > 1,交换位置     [1, 5, 7, 2]
     * $i = 2    5 < 7,无变化        [1, 5, 7, 2]
     * $i = 3    7 > 2,交换位置    [1, 5, 2, 7]
     * 
     * @param  array $nums n个整数
     * @param  int $n    $nums长度
     * @return array       返回排序后的数组
     */
    public function bubbleSort($nums, $n)
    {
        $flag = false;
        while (!$flag) {
            for ($i = 1; $i < $n; $i++) {
                $flag = true;
                if ($nums[$i - 1] > $nums[$i]) {
                    $flag = false;
                    //交换位置
                    $nums[$i - 1] = $nums[$i - 1] ^ $nums[$i];
                    $nums[$i]     = $nums[$i - 1] ^ $nums[$i];
                    $nums[$i - 1] = $nums[$i] ^ $nums[$i - 1];
                }
            }
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

}

$c_one = new C_One;
// $sum   = $c_one->sumI([1, 2, 3], 3);

$sort_nums = $c_one->bubbleSort([5, 1, 7, 2], 4);
print_r($sort_nums);
