<?php


namespace loan\busin;


use loan\LoanInterface;

/**
 * 等额本息
 * Class Principal
 * @package loan\busin
 */
class Interest implements LoanInterface
{
    protected $totalLoan      = 0; //贷款总额
    protected $month          = 0; //贷款期数
    protected $yearRate       = 0; //年化利率
    protected $monthRate      = 0; //月利率
    protected $totalRate      = 0; //总利息
    protected $repaymentMoney = 0; //还款总额、本金+利息
    protected $list           = [];

    /**
     * Interest constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->repaymentMoney = $this->totalLoan = isset($config['total_loan']) ? $config['total_loan'] : 0;
        $this->month          = isset($config['month']) ? $config['month'] : 0;
        $this->yearRate       = isset($config['year_rate']) ? $config['year_rate'] / 100 : 0;
        $this->monthRate      = $this->yearRate / 12;
    }

    /**
     *
     */
    public function list()
    {
        $emTotal = $this->totalLoan * $this->monthRate * pow(1 + $this->monthRate, $this->month) / (pow(1 + $this->monthRate, $this->month) - 1); //每月还款金额
        for ($i = 1; $i <= $this->month; $i++)
        {
            $lx = $this->totalLoan * $this->monthRate;  //每月还款利息
            $em = $emTotal - $lx; //每月还款本金

            $this->totalLoan -= $em;
            $this->totalRate += $lx;
            $this->list[]    = [
                'periods'   => $i,
                'principal' => number_format($em, 2, '.', ''),
                'interest'  => number_format($lx, 2, '.', ''),
                'payment'   => number_format($emTotal, 2, '.', ''),
                'residual'  => number_format($this->totalLoan, 2, '.', '')
            ];
        }
        $array = [
            'total_loan'      => number_format($this->repaymentMoney, 2, '.', ''),//贷款总额
            'month'           => $this->month,
            'year_rate'       => $this->yearRate,
            'month_rate'      => $this->monthRate,
            'total_rate'      => number_format($this->totalRate, 2, '.', ''),
            'repayment_money' => number_format($this->repaymentMoney + $this->totalRate, 2, '.', ''),
            'list'            => $this->list
        ];
        return $array;
    }

}
