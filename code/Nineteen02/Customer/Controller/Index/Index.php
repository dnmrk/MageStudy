<?php

namespace Nineteen02\Customer\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{

    /**
     * @param \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param \Magento\Customer\Model\CustomerFactory
     */
    private $customerFactory;

    /**
     * @param \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;

    /**
     * @param \Magento\Customer\Api\CustomerRepositoryInterface
     */
    private $customerRepository;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->customerFactory = $customerFactory;
        $this->storeManager = $storeManager;
        $this->customerRepository = $customerRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        $store = $this->storeManager->getStore(1);
        $model = $this->customerRepository->get('dnmrk.lmzn@gmail.com', $store->getId());
        if ($model && $model->getId()) {
            echo '<pre>';
            print_r($model->getExtensionAttributes()->getExternalLinks());
            echo '</pre>';
        }
        echo 'done';
        return;
    }
}
