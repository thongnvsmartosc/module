<?php

namespace Team1\widgetItem\Block\Widget;

use Magento\Backend\Block\Template\Context as TemplateContext;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Data\Form\Element\Factory as FormElementFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Item extends Template implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = 'widget/item.phtml';

    /**
     * @var FormElementFactory
     */
    protected $elementFactory;

    /**
     * @param TemplateContext $context
     * @param FormElementFactory $elementFactory
     * @param array $data
     */
    public function __construct(
        TemplateContext $context,
        FormElementFactory $elementFactory,
        $data = []
    ) {
        parent::__construct($context, $data);
        $this->elementFactory = $elementFactory;
    }

    /**
     * @param AbstractElement $element Form Element
     * @return AbstractElement
     * @throws LocalizedException
     */
    public function prepareElementHtml(AbstractElement $element)
    {
        $config = $this->_getData('config');
        $sourceUrl = $this->getUrl(
            'cms/wysiwyg_images/index',
            [
                'target_element_id' => $element->getId(),
                'type' => 'file'
            ]
        );

        $chooser = $this->getLayout()->createBlock('Magento\Backend\Block\Widget\Button')
            ->setType('button')
            ->setClass('btn-chooser')
            ->setLabel($config['button']['open'])
            ->setOnClick('MediabrowserUtility.openDialog(\'' . $sourceUrl . '\')')
            ->setDisabled($element->getReadonly());

        /** @var \Magento\Framework\Data\Form\Element\Text $input */
        $input = $this->elementFactory->create("text", ['data' => $element->getData()]);
        $input->setId($element->getId());
        $input->setForm($element->getForm());
        $input->setClass("widget-option input-text admin__control-text");

        if ($element->getRequired()) {
            $input->addClass('required-entry');
        }

        $element->setData('after_element_html', $input->getElementHtml() . $chooser->toHtml());

        return $element;
    }
}
