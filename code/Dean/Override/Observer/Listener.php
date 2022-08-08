<?php

namespace Dean\Override\Observer;

/**
 * Class Listener
 */
class Listener implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $test = 1;
        // exit(__FILE__);
        // die('test');
    }
}
