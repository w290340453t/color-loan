<?php

use loan\Loan as LoanAlias;

include_once "vendor/autoload.php";

$list = [];
$type = isset($_GET['type']) ? $_GET['type'] : '';
if (isset($_GET['total_loan']) && isset($_GET['month']) && isset($_GET['year_rate']) && $type)
{
    $config = [
        'total_loan' => $_GET['total_loan'],
        'month'      => $_GET['month'],
        'year_rate'  => $_GET['year_rate']
    ];
    switch ($type)
    {
        case 'interest':
            $list = LoanAlias::Interest($config)->list();
            break;
        case 'principal':
            $list = LoanAlias::Principal($config)->list();
            break;
        case 'equalinterest':
            $list = LoanAlias::EqualInterest($config)->list();
            break;
        case 'comesfirst':
            $list = LoanAlias::ComesFirst($config)->list();
            break;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="">
    <table width="600" style="margin:0 auto 50px;">
        <tr>
            <td>还款类型:</td>
            <td>
                <select name="type">
                    <option value="interest" <?php echo $type == 'interest' ? ' selected' : '' ?>>等额本息</option>
                    <option value="principal" <?php echo $type == 'principal' ? ' selected' : '' ?>>等额本金</option>
                    <option value="equalinterest" <?php echo $type == 'equalinterest' ? ' selected' : '' ?>>等本等息
                    </option>
                    <option value="comesfirst" <?php echo $type == 'comesfirst' ? ' selected' : '' ?>>先息后本</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>贷款金额:</td>
            <td>
                <input type="number" name="total_loan" value="<?php echo $_GET['total_loan'] ?? '' ?>">
            </td>
        </tr>
        <tr>
            <td>贷款期数:</td>
            <td>
                <input type="number" name="month" value="<?php echo $_GET['month'] ?? '' ?>">
            </td>
        </tr>
        <tr>
            <td>利率:</td>
            <td>
                <input type="text" name="year_rate" value="<?php echo $_GET['year_rate'] ?? '' ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button>计算</button>
            </td>
        </tr>
    </table>
</form>
<table width="600" border="1" style="margin:0 auto">
    <thead>
    <tr>
        <th>期次</th>
        <th>偿还本金</th>
        <th>偿还利息</th>
        <th>当期月供</th>
        <th>剩余本金</th>
    </tr>
    </thead>
    <tbody align="center">
    <?php
    if ($list)
        foreach ($list['list'] as $item)
        { ?>
            <tr>
                <td><?php echo $item['periods'] ?></td>
                <td><?php echo $item['principal'] ?></td>
                <td><?php echo $item['interest'] ?></td>
                <td><?php echo $item['payment'] ?></td>
                <td><?php echo $item['residual'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>
