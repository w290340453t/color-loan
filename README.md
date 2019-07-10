## 贷款计算方式

#### 特点
- 符合 PSR 标准，你可以各种方便的与你的框架集成
- 方法使用更优雅，不必再去研究那些奇怪的的方法名或者类名是做啥用的

#### 运行环境
- PHP 7.0+
- composer

#### 支持的方法
method|备注
---|---:
Interest |等额本息
Principal |等额本金
EqualInterest |等本等息
ComesFirst |先息后本

#### Composer安装

```
composer require color/loan -vvv
```

#### 使用说明
###### 等额本息

```
<?php

use loan\Loan;

include_once 'vendor/autoload.php';
$config = [
    'total_loan' => 730000, //贷款金额
    'month'      => 360,    //贷款期数
    'year_rate'  => 5.635   //利率
];
$res    = Loan::Interest($config)->list();
print_r($res);
```

###### 等额本金

```
<?php

use loan\Loan;

include_once 'vendor/autoload.php';
$config = [
    'total_loan' => 730000, //贷款金额
    'month'      => 360,    //贷款期数
    'year_rate'  => 5.635   //利率
];
$res    = Loan::Principal($config)->list();
print_r($res);
```

###### 等本等息

```
<?php

use loan\Loan;

include_once 'vendor/autoload.php';
$config = [
    'total_loan' => 730000, //贷款金额
    'month'      => 360,    //贷款期数
    'year_rate'  => 5.635   //利率
];
$res    = Loan::EqualInterest($config)->list();
print_r($res);
```


###### 先息后本

```
<?php

use loan\Loan;

include_once 'vendor/autoload.php';
$config = [
    'total_loan' => 730000, //贷款金额
    'month'      => 360,    //贷款期数
    'year_rate'  => 5.635   //利率
];
$res    = Loan::ComesFirst($config)->list();
print_r($res);
```

###### 返回数据说明

```
{
    "total_loan":"730000.00",           //贷款总额
    "month":12,                         //贷款期数
    "year_rate":0.05635,                //年利率
    "month_rate":0.004695833333333333,  //月利率
    "total_rate":"22473.09",            //总还款利息
    "repayment_money":"752473.09",      //总还款金额
    "list":[
        {
            "periods":1,                //当前期数
            "principal":"59278.13",     //当月还款本金
            "interest":"3427.96",       //当月还款利息
            "payment":"62706.09",       //当月还款总额
            "residual":"670721.87"      //剩余本金
        },
        {
            "periods":2,
            "principal":"59556.49",
            "interest":"3149.60",
            "payment":"62706.09",
            "residual":"611165.37"
        },
        {
            "periods":3,
            "principal":"59836.16",
            "interest":"2869.93",
            "payment":"62706.09",
            "residual":"551329.21"
        },
        {
            "periods":4,
            "principal":"60117.14",
            "interest":"2588.95",
            "payment":"62706.09",
            "residual":"491212.07"
        },
        {
            "periods":5,
            "principal":"60399.44",
            "interest":"2306.65",
            "payment":"62706.09",
            "residual":"430812.63"
        },
        {
            "periods":6,
            "principal":"60683.07",
            "interest":"2023.02",
            "payment":"62706.09",
            "residual":"370129.56"
        },
        {
            "periods":7,
            "principal":"60968.02",
            "interest":"1738.07",
            "payment":"62706.09",
            "residual":"309161.54"
        },
        {
            "periods":8,
            "principal":"61254.32",
            "interest":"1451.77",
            "payment":"62706.09",
            "residual":"247907.22"
        },
        {
            "periods":9,
            "principal":"61541.96",
            "interest":"1164.13",
            "payment":"62706.09",
            "residual":"186365.26"
        },
        {
            "periods":10,
            "principal":"61830.95",
            "interest":"875.14",
            "payment":"62706.09",
            "residual":"124534.31"
        },
        {
            "periods":11,
            "principal":"62121.30",
            "interest":"584.79",
            "payment":"62706.09",
            "residual":"62413.01"
        },
        {
            "periods":12,
            "principal":"62413.01",
            "interest":"293.08",
            "payment":"62706.09",
            "residual":"0.00"
        }
    ]
}
```
