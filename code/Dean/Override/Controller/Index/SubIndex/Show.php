<?php
namespace Dean\Override\Controller\Index\SubIndex;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Show extends \Magento\Framework\App\Action\Action
{

    protected $resultPageFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function execute()
    {
        $test = $this->giveFiveCount();
        
        return $this->resultPageFactory->create();
    }

    public function giveFiveCount()
    {
        $test=[];
        for($i = 1; $i < 5; $i++) {
            $test[] = $i;
        }
        return $test;
    }
}
