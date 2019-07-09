<?php


namespace loan;

use Exception;
use loan\busin\Principal;
use loan\busin\Interest;
use loan\busin\EqualInterest;
use loan\busin\ComesFirst;

/**
 * Class Loan
 * @package loan\loan
 * @method Principal Principal(array $config)等额本金
 * @method Interest Interest(array $config)等额本息
 * @method EqualInterest EqualInterest(array $config)等本等息
 * @method ComesFirst ComesFirst(array $config)先息后本
 */
class Loan
{
    protected $config;

    /**
     * Loan constructor.
     * @param $config
     */
    public function __construct($config = [])
    {
        $this->config = $config;
    }

    public static function __callStatic($method, $param): LoanInterface
    {
        $app = new static(...$param);
        return $app->create($method);
    }

    /**
     * @param $method
     * @return LoanInterface
     * @throws Exception
     */
    protected function create($method): LoanInterface
    {
        $method  = $value = ucwords(str_replace(['-', '_'], ' ', $method));
        $gateway = __NAMESPACE__ . '\\busin\\' . $method;
        if (class_exists($gateway))
        {
            return $this->make($gateway);
        }
        throw new Exception('类不存在');
    }

    /**
     * @param $gateway
     * @return LoanInterface
     * @throws Exception
     */
    protected function make($gateway): LoanInterface
    {
        $app = new $gateway($this->config);
        if ($app instanceof LoanInterface)
        {
            return $app;
        }
        throw new Exception("[$gateway]不是LoanInterface的实例");
    }

}
