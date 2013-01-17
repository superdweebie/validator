<?php

namespace Sds\Validator\Test;

use Sds\Validator\Currency;

class CurrencyTest extends \PHPUnit_Framework_TestCase {

    public function testValidator(){

        $validator = new Currency;

        $testArray = [
            [true, 0],
            [true, 0.1],
            [true, 0.11],
            [false, 0.111],
            [true, 1],
            [true, 1.1],
            [true, 1.11],
            [false, 1.111],
            [true, '0'],
            [true, '0.1'],
            [true, '0.11'],
            [false, '0.111'],
            [false, '0.0.111'],
            [false, '1.1.111'],
            [false, '$1.10'],
            [false, '1.a']
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
