<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace Sds\Validator;

use Zend\Validator\CreditCard as ZendCreditCard;

/**
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
class CreditCard extends AbstractValidator
{

    public function isValid($value){

        $messages = [];

        $result = true;

        $validator = new ZendCreditCard();
        if ( ! $validator->isValid($value) ){
            $result = false;
            $messages[] = 'Must be a valid credit card';
        }

        return new ValidatorResult($result, $messages);
    }
}
