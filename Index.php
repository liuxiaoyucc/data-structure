<?php

require 'vendor/autoload.php';
require 'helper/TimeKeeper.php';

require 'practice/ChapterOne.php';
require 'practice/ChapterTwo.php';
require 'practice/ChapterThree.php';
require 'practice/ChapterFour.php';



use Monolog\Handler\StreamHandler;
use Monolog\Logger;

use Helper\TimeKeeper;
use Practice\C_One;
use Practice\C_Two;
use Practice\C_Three;
use Practice\C_Four;


$log = new Logger('DS');
$log_file = 'logs/log_' . date('Y') . '_' . date('m') . '_' . date('d') . '.log';
$log->pushHandler(new StreamHandler($log_file, Logger::DEBUG));

$timeKeeper = new TimeKeeper;

$cThree = new C_Three;
$cTwo = new C_Two;
$cFour = new C_Four;


set_time_limit(0);

$sort_array = range(1, 5); // 生成指定范围内有序数组
shuffle($sort_array); //洗牌

// $log->debug('排序前: ', $sort_array);

$timeKeeper->start();

// $result = $cFour->convert_recursion(1024, 16);
// $result = $cFour->convert_iteration(754156, 2);
$result = $cFour->stack_permutation_process();

// $result = $cThree->selectionSort($sort_array);
// $result = $cTwo->mergeSort($sort_array);
// $result = $cThree->insertSort($sort_array);

// $log->debug('用时: ' . $timeKeeper->consumeTime() . 'ms');

// $log->debug('处理后: ', $result);


echo "hello world";