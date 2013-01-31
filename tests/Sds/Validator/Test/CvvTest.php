<?php

namespace Sds\Validator\Test;

use Sds\Validator\Cvv;

class CvvTest extends \PHPUnit_Framework_TestCase {

    public function testValidator(){

        $validator = new Cvv;

        $testArray = [
            [true, '123'],
            [false, '5AA'],
            [true, 723],
            [false, 7234],
            [true, 612],
            [true, 421],
            [true, 543]
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
