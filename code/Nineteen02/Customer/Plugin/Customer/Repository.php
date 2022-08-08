<?php

/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Nineteen02\Customer\Plugin\Customer;

use Magento\Customer\Api\Data\CustomerExtensionFactory;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\EntityManager\EntityManager;
use Magento\ExternalLinks\Api\Data\ExternalLinkInterface;
use Magento\ExternalLinks\Api\ExternalLinksProviderInterface;

use \Magento\Framework\Api\SearchCriteriaBuilderFactory;
use \Magento\Framework\Api\FilterBuilderFactory;
use \Magento\Framework\Api\SortOrderBuilderFactory;

use \Nineteen02\Customer\Model\ExternalLinkRepository;
use \Nineteen02\Customer\Model\CustomAttributeFactory;

/**
 * Class Repository
 */
class Repository
{
    /** @var CustomerExtensionFactory */
    private $customerExtensionFactory;

    /** @var CustomerInterface  */
    private $currentCustomer;

    /** @var  EntityManager */
    private $entityManager;

    /** @var ExternalLinksProviderInterface */
    private $externalLinksProvider;

    /**
     * @param ExternalLinkRepository
     */
    private $externalLinkRepository;

    /**
     * @param SearchCriteriaBuilderFactory
     */
    private $searchCriteriaBuilderFactory;

    /**
     * @param FilterBuilderFactory
     */
    private $filterBuilderFactory;

    /**
     * @param SortOrderBuilderFactory
     */
    private $sortOrderBuilderFactory;

    /**
     * Repository constructor.
     * @param CustomerExtensionFactory $customerExtensionFactory
     * @param EntityManager $entityManager
     */
    public function __construct(
        CustomerExtensionFactory $customerExtensionFactory,
        EntityManager $entityManager,
        // ExternalLinksProviderInterface $externalLinksProvider,
        ExternalLinkRepository $externalLinkRepository,
        SearchCriteriaBuilderFactory $searchCriteriaBuilderFactory,
        FilterBuilderFactory $filterBuilderFactory,
        SortOrderBuilderFactory $sortOrderBuilderFactory
    ) {
        $this->customerExtensionFactory = $customerExtensionFactory;
        $this->entityManager = $entityManager;
        // $this->externalLinksProvider = $externalLinksProvider;
        $this->externalLinkRepository = $externalLinkRepository;
        $this->searchCriteriaBuilderFactory = $searchCriteriaBuilderFactory;
        $this->filterBuilderFactory = $filterBuilderFactory;
        $this->sortOrderBuilderFactory = $sortOrderBuilderFactory;
    }

    /**
     * Add Social Links to product extension attributes
     *
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $subject
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Framework\Api\SearchResults
     */
    public function afterGetList(
        \Magento\Customer\Api\CustomerRepositoryInterface $subject,
        \Magento\Framework\Api\SearchResults $searchResult
    ) {
        /** @var \Magento\Customer\Api\Data\CustomerInterface $customer */
        foreach ($searchResult->getItems() as $customer) {
            $this->addExternalLinksToProduct($customer);
        }

        return $searchResult;
    }

    /**
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $subject
     * @param CustomerInterface $customer
     * @return void
     */
    public function beforeSave(
        \Magento\Customer\Api\CustomerRepositoryInterface $subject,
        \Magento\Customer\Api\Data\CustomerInterface $customer
    ) {
        $this->currentCustomer = $customer;
    }

    /**
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $subject
     * @param \Magento\Customer\Api\Data\CustomerInterface $customer
     * @return \Magento\Customer\Api\Data\CustomerInterface
     */
    public function afterGet(
        \Magento\Customer\Api\CustomerRepositoryInterface $subject,
        \Magento\Customer\Api\Data\CustomerInterface $customer
    ) {
        $this->addExternalLinksToProduct($customer);
        return $customer;
    }

    /**
     * Compare old and new links. And if old links has the same as new one -> delete them
     *
     * @param array $newLinks
     * @param array $oldLinks
     * @throws \Exception
     */
    private function cleanOldLinks(array $newLinks, array $oldLinks)
    {
        /** @var ExternalLinkInterface $link */
        foreach ($newLinks as $link) {
            /** @var ExternalLinkInterface $oldLink */
            foreach ($oldLinks as $oldLink) {
                if ($oldLink->getLinkType() === $link->getLinkType()) {
                    $this->entityManager->delete($oldLink);
                }
            }
        }
    }

    /**
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $subject
     * @param CustomerInterface $customer
     * @throws \Exception
     * @return self
     */
    public function afterSave(
        \Magento\Customer\Api\CustomerRepositoryInterface $subject,
        \Magento\Customer\Api\Data\CustomerInterface $customer
    ) {
        if ($this->currentCustomer !== null) {
            /** @var CustomerInterface $previosProduct */
            $extensionAttributes = $this->currentCustomer->getExtensionAttributes();

            if ($extensionAttributes && $extensionAttributes->getExternalLinks()) {
                /** @var ExternalLinkInterface $externalLink */
                $externalLinks = $extensionAttributes->getExternalLinks();
                $oldExternalLinks = $customer->getExtensionAttributes()->getExternalLinks();

                if (is_array($externalLinks)) {
                    // $this->cleanOldLinks($externalLinks, $oldExternalLinks);
                    /** @var ExternalLinkInterface $link */
                    foreach ($externalLinks as $link) {
                        $link->setProductId($customer->getId());
                        $this->entityManager->save($link);
                    }
                }
            }

            $this->currentCustomer = null;
        }

        return $customer;
    }

    /**
     * @param \Magento\Customer\Api\Data\CustomerInterface $customer
     * @return self
     */
    private function addExternalLinksToProduct(\Magento\Customer\Api\Data\CustomerInterface $customer)
    {
        $extensionAttributes = $customer->getExtensionAttributes();

        if (empty($extensionAttributes)) {
            $extensionAttributes = $this->customerExtensionFactory->create();
        }

        $searchBuilder = $this->searchCriteriaBuilderFactory->create();
        $filterBuilder = $this->filterBuilderFactory->create();
        $customerIdFilter = $filterBuilder->setField('customer_id')
            ->setConditionType('eq')
            ->setValue($customer->getId())
            ->create();
        $searchBuilder->addFilters([$customerIdFilter]);

        $externalLinks = [];
        $externalLinksList = $this->externalLinkRepository->getList($searchBuilder->create());
        foreach($externalLinksList->getItems() as $externalLink) {
            $externalLinks[] = $externalLink->getLink();
        }

        $extensionAttributes->setExternalLinks($externalLinks);
        $customer->setExtensionAttributes($extensionAttributes);

        return $this;
    }
}
