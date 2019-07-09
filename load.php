<?php
/**
 * 等额本息
 */
function debx()
{
    $dkm     = 120; //贷款月数，20年就是240个月
    $dkTotal = 1000000; //贷款总额
    $dknl    = 6 / 100; //贷款年利率
    $emTotal = $dkTotal * $dknl / 12 * pow(1 + $dknl / 12, $dkm) / (pow(1 + $dknl / 12, $dkm) - 1); //每月还款金额
    $lxTotal = 0; //总利息
    for ($i = 1; $i <= $dkm; $i++)
    {
        $lx = $dkTotal * $dknl / 12;  //每月还款利息
        $em = $emTotal - $lx; //每月还款本金

        $dkTotal -= $em;
        $lxTotal += $lx;

        echo "第{$i}期" . " 本金:" . $em . "  利息:" . $lx . " 总额:" . $emTotal . " 本金余额：{$dkTotal}\n";

    }
    echo "利率：{$dknl}，总利息:" . $lxTotal;
}

/**
 * 等额本金
 */
function debj()
{
    $dkm     = 120; //贷款月数，20年就是240个月
    $dkTotal = 1000000; //贷款总额
    $dknl    = 6 / 100; //贷款年利率

    $em      = $dkTotal / $dkm; //每个月还款本金
    $lxTotal = 0; //总利息

    for ($i = 1; $i <= $dkm; $i++)
    {
        $lx = $dkTotal * $dknl / 12; //每月还款利息
        echo "第{$i}期", " 本金:", $em, " 利息:" . $lx, " 总额:" . ($em + $lx), "\n";
        $dkTotal -= $em;
        $lxTotal += $lx;
    }
    echo "总利息:" . $lxTotal;
}

/**
 * 等本等息
 */
function dbdx()
{
    $total = 1200000;//贷款总额
    $month = 120;//贷款期数
    $yerLx = 10;//年利率

    $totalLx = 0;//总利息

    $repaymentB = $total / $month;//每个月还本金
    $repaymentX = $total * $yerLx / 100 / 12;//每个月还利息
    $all        = $repaymentB + $repaymentX;//每个月共还本息

    for ($i = 1; $i <= $month; $i++)
    {
        $totalLx += $repaymentX;
        $date    = date('Y-m-d', strtotime("+{$i} month"));
        echo "第{$i}期 时间：{$date} 本金：{$repaymentB} 利息：{$repaymentX} 总额：{$all}\n";
    }
    echo "总利息：{$totalLx}";
}

/**
 * 先息后本
 */
function xxhb()
{
    $total = 1200000;//贷款总额
    $month = 120;//贷款期数
    $yerLx = 10;//年利率

    $totalLx    = 0;//总利息
    $repaymentX = $total * $yerLx / 100 / 12;//每个月还利息
    for ($i = 1; $i <= $month; $i++)
    {
        $repaymentB = $i == $month ? $total : 0;
        $totalLx    += $repaymentX;
        $all        = $repaymentB + $repaymentX;//每个月共还本息
        echo "第{$i}期 本金：{$repaymentB} 利息：{$repaymentX} 总额：{$all}\n";
    }
    echo "总利息：{$totalLx}";
}

//debx();
//debj();
//dbdx();
xxhb();
