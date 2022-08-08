<?php

namespace Nineteen02\FreeShippingBar\Plugin\Adminhtml;

use Sparsh\FreeShippingBar\Controller\Adminhtml\Entity;

class WhatToDisplayAchievedFields
{
    /**
     * @var \Magento\Framework\AuthorizationInterface
     */
    protected $_authorization;
    public function __construct(
        \Magento\Framework\AuthorizationInterface $authorizationInterface
    ) {
        $this->_authorization = $authorizationInterface;
    }

    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    public function aroundGetFormHtml(
        \Sparsh\FreeShippingBar\Block\Adminhtml\Entity\Edit\Tab\WhatToDisplay $subject,
        callable $proceed
    ) {
        $form = $subject->getForm();
        if (is_object($form)) {
            $isElementDisabled = !$this->_isAllowedAction(Entity::ADMIN_RESOURCE);
            $model = $subject->getCurrentBar();

            $fieldset = $form->getElement('design_template_fieldset') ?: $form->addFieldset('design_template_fieldset', ['legend' => __('Design Template')]);
            $fieldset->addField(
                'achieved_bar_background_color',
                'text',
                [
                    'label' => __('Achieved Bar Background Color'),
                    'title' => __('Achieved Bar Background Color'),
                    'name' => 'achieved_bar_background_color',
                    'required' => true,
                    'class' => 'jscolor {hash:true}',
                    'disabled' => $isElementDisabled,
                    'value' => $model->getData('achieved_bar_background_color')
                ]
            );

            $fieldset->addField(
                'achieved_bar_text_color',
                'text',
                [
                    'label' => __('Achieved Bar Text Color'),
                    'title' => __('Achieved Bar Text Color'),
                    'name' => 'achieved_bar_text_color',
                    'required' => true,
                    'class' => 'jscolor {hash:true}',
                    'disabled' => $isElementDisabled,
                    'value' => $model->getData('achieved_bar_text_color')
                ]
            );

            $subject->setForm($form);
        }

        $result = $proceed();
        return $result;
    }
}
