<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace Sds\Validator;

use Sds\Common\CreditCard\ExpiryInterface;

/**
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
class CreditCardExpiry extends AbstractValidator
{

    public function isValid($value){

        $messages = [];

        $result = true;

        if ( ! $value instanceof ExpiryInterface){
            throw new \InvalidArgumentException;
        }

        if (
            ! preg_match('/^\d{1,2}$/', $value->getMonth()) ||
            ! preg_match('/^\d\d\d\d$/', $value->getYear())
        ){
            $result = false;
            $messages[] = 'Credit card expiry not valid format';
        }

        $month = (int) $value->getMonth();
        $year = (int) $value->getYear();

        $compareYear = date('Y');
        $compareMonth = date('n');

        if (
            $month < 1 ||
            $month > 12 ||
            $year < $compareYear ||
            ($year == $compareYear && $month < $compareMonth)
        ) {
            $result = false;
            $messages[] = 'Credit card expiry not valid format';
        }

        return new ValidatorResult($result, $messages);
    }
}
