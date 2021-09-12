<?php
namespace Bluelogic\CustomProduct\Block\Adminhtml\CustomProduct\Edit\Tab;
 
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;
 
class Info extends Generic implements TabInterface
{
    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_wysiwygConfig;
 
    /**
     * @var \Bluelogic\CustomProduct\Model\System\Config\Status
     */
    protected $_status;
    /**
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param Config $wysiwygConfig
     * @param Status $status
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Config $wysiwygConfig,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }
 
    /**
     * Prepare form fields
     *
     * @return \Magento\Backend\Block\Widget\Form
     */
    protected function _prepareForm()
    {
        /** @var $model \Bluelogic\CustomProduct\Model\CustomProductFactory */
        $model = $this->_coreRegistry->registry('bluelogic_customproduct');
 
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('customproduct_');
        $form->setFieldNameSuffix('customproduct');
        // new filed
 
        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General')]
        );
 
        if ($model->getId()) {
            $fieldset->addField(
                'id',
                'hidden',
                ['name' => 'id']
            );
        }
        $fieldset->addField(
            'sku',
            'text',
            [
                'name'      => 'sku',
                'label'     => __('SKU'),
                'title' => __('SKU'),
                'required' => true
            ]
        );
        $fieldset->addField(
            'vendor_number',
            'text',
            [
                'name'      => 'vendor_number',
                'label'     => __('Vendor Number'),
                'title' => __('Vendor Number'),
                'required' => true
            ]
        );
        
        $fieldset->addField('vendor_note', 'editor', [
            'name'      => 'vendor_note',
            'label'   => 'Vendor Note',
            'config'    => $this->_wysiwygConfig->getConfig(),
            'wysiwyg'   => true,
            'required'  => false
        ]);
        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);
 
        return parent::_prepareForm();
    }
    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Custom Products Info');
    }
 
    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Custom Products Info');
    }
 
    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }
 
    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}