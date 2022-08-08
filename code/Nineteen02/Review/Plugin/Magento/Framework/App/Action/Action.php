<?php
namespace Nineteen02\Review\Plugin\Magento\Framework\App\Action;
use Magento\Framework\App\RequestInterface;

/**
 * Class Action
 */
class Action
{
    //function beforeMETHOD($subject, $arg1, $arg2){}
    //function aroundMETHOD($subject, $proceed, $arg1, $arg2){return $proceed($arg1, $arg2);}
    //function afterMETHOD($subject, $result){return $result;}

    public function beforeMETHOD(
        \Magento\Framework\App\Action\Action $subject,
        RequestInterface $request
        ) {
            
    }
}
