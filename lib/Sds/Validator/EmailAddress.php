<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace Sds\Validator;

use Zend\Validator\EmailAddress as ZendEmailAddress;

/**
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
class EmailAddress extends AbstractValidator
{

    public function isValid($value){

        $messages = [];

        $result = true;

        $validator = new ZendEmailAddress();
        if ( ! $validator->isValid($value) ){
            $result = false;
            $messages[] = 'Must be a valid email address';
        }

        return new ValidatorResult($result, $messages);
    }
}
