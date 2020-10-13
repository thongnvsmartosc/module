<?php


namespace Team1\CartPriceRule\Model\Rule\Condition\Customer;

class Email extends \Magento\Rule\Model\Condition\AbstractCondition
{
    /**
     * @var \Magento\Customer\Api\CustomerMetadataInterface
     */
    protected $customerMetadata;

    /**
     * @var \Magento\Customer\Model\CustomerFactory
     */
    protected $customerFactory;

    /**
     * @param \Magento\Rule\Model\Condition\Context $context
     * @param \Magento\Customer\Api\CustomerMetadataInterface $customerMetadata
     * @param \Magento\Customer\Model\CustomerFactory $customerFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Rule\Model\Condition\Context $context,
        \Magento\Customer\Api\CustomerMetadataInterface $customerMetadata,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customerMetadata = $customerMetadata;
        $this->customerFactory = $customerFactory;
    }

    /**
     * Load attribute options
     *
     * @return $this
     */
    public function loadAttributeOptions()
    {
        $attributes = [
            'customer_email' => __('Customer Email')
        ];

        $this->setAttributeOption($attributes);

        return $this;
    }

    /**
     * Get input type
     * Possible values are: string, numeric, date, select, multiselect, grid, boolean
     *
     * @return string
     */
    public function getInputType()
    {
        return 'string';
    }

    /**
     * Get value element type
     *
     * We have the value element types as select, text
     * @return string
     */
    public function getValueElementType()
    {
        return 'text';
    }

    /**
     * Get value select options
     *
     * @return array|mixed
     */
    public function getValueSelectOptions()
    {
        if (!$this->hasData('value_select_options')) {
            $this->setData('value_select_options', $this->getEmailOptions());
        }
        return $this->getData('value_select_options');
    }

    /**
     * Retrieve customer gender options
     *
     * @return array
     */
    protected function getEmailOptions()
    {
        try {
            // Get the options of the email, such as Male, Female, Not Specified
            $genderCustomerAttribute = $this->customerMetadata->getAttributeMetadata('email')->getOptions();
            $emailtions = [];
            foreach ($genderCustomerAttribute as $email) {
                if ($email->getValue()) {
                    $emailtions[] = [
                        'label' => $email->getLabel(),
                        'value' => $email->getValue()
                    ];
                }
            }
            return $emailtions;
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
            return ['label' => '', 'value' => ''];
        }
    }

    /**
     * Validate Customer Rule Condition
     *
     * @param \Magento\Framework\Model\AbstractModel $model
     * @return bool
     */
    public function validate(\Magento\Framework\Model\AbstractModel $model)
    {
        // Get the customer id of the current customer
        $customerId = (int)$model->getCustomerId();
        // Loading the customer information via the customer id
        $customer = $this->customerFactory->create()->load($customerId);
        // Set the customer_email by the current customer email
        $model->setData('customer_email', $customer->getEmail());
        return parent::validate($model);
    }
}
