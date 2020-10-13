<?php
namespace Team1\CartPriceRule\Observer;

class CartRuleObserver implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * Execute observer.
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $additional = $observer->getAdditional();
        $conditions = (array) $additional->getConditions();

        // Merging the old condition with our condition.
        $conditions = array_merge_recursive($conditions, [
            [
                'value'=> [
                    [
                        'value' => \Team1\CartPriceRule\Model\Rule\Condition\Customer\Email::class,
                        'label' => __('Email')
                    ]
                ],
                'label'=> __('Customer Condition')
            ]
        ]);

        $additional->setConditions($conditions);
        return $this;
    }
}
