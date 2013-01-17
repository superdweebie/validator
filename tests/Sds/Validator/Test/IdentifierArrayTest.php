<?php

namespace Sds\Validator\Test;

use Sds\Validator\IdentifierArray;

class IdentifierArrayTest extends \PHPUnit_Framework_TestCase {

    public function testValidator(){

        $validator = new IdentifierArray;

        $testArray = [
            [true, ['username', 'username1', '1username']],
            [false, ['username1', 'u']]
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
