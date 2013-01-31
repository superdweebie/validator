<?php

namespace Sds\Validator\Test;

use Sds\Validator\CreditCardExpiry;
use Sds\Validator\Test\Asset\Expiry;

class CreditCardExpiryTest extends \PHPUnit_Framework_TestCase {

    public function testValidator(){

        $validator = new CreditCardExpiry;

        $thisYear = date('Y');
        $thisMonth = date('n');

        $lastMonth = $thisMonth - 1;
        $lastMonthYear = $thisYear;
        if ($lastMonth == 0){
            $lastMonth = 12;
            $lastMonthYear = $thisYear - 1;
        }
        $testArray = [
            [false, new Expiry('a', '2020')],
            [true, new Expiry('1', '2020')],
            [false, new Expiry('001', '2013')],
            [false, new Expiry('00', '2013')],
            [false, new Expiry('13', '2013')],
            [true, new Expiry('1', '2013')],
            [false, new Expiry('1', '2010')],
            [true, new Expiry($thisMonth, $thisYear)],
            [false, new Expiry($lastMonth, $lastMonthYear)],
        ];

        foreach ($testArray as $item) {
            if ($item[0]){
                $this->assertTrue($validator->isValid($item[1])->getResult());
            } else {
                $this->assertFalse($validator->isValid($item[1])->getResult());
            }
        }
    }
}
