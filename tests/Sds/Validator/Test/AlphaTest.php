<?php

namespace Sds\Validator\Test;

use Sds\Validator\Alpha;

class AlphaTest extends \PHPUnit_Framework_TestCase {

    public function testValidator(){

        $validator = new Alpha;

        $testArray = [
            [true, 'abc'],
            [true, 'ABC'],
            [false, 'a1'],
            [false, 'a&']
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
