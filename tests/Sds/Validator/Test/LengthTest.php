<?php

namespace Sds\Validator\Test;

use Sds\Validator\Length;

class LengthTest extends \PHPUnit_Framework_TestCase {

    public function testValidator(){

        $validator = new Length(1, 5);

        $testArray = [
            [true, '1'],
            [true, '12345'],
            [false, ''],
            [false, '123456']
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
