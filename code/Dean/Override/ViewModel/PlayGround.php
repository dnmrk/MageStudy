<?php

namespace Dean\Override\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class PlayGround implements ArgumentInterface
{
    public function getMessage()
    {
        return 'Hello ViewModel!';
    }
}
