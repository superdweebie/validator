<?php

namespace Sds\Validator\Test\Asset;

use Sds\Common\CreditCard\ExpiryInterface;

class Expiry implements ExpiryInterface {

    protected $month;

    protected $year;

    public function __construct($month, $year) {
        $this->month = $month;
        $this->year = $year;
    }

    public function getMonth() {
        return $this->month;
    }

    public function getYear() {
        return $this->year;
    }
}
