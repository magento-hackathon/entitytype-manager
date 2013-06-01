<?php

class Goodahead_Etm_Block_Adminhtml_Entity_Types_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
            'id'            => 'edit_form',
            'action'        => $this->getUrl('*/*/save'),
            'method'        => 'post',
            'enctype'       => 'multipart/form-data',
            'use_container' => true
        ));

        $entityType = Mage::registry('etm_entity_type');

        if ($entityType->getId()) {
            $form->addField('entity_type_id', 'hidden', array(
                'name' => 'entity_type_id',
            ));
            $form->setValues($entityType->getData());
        }

        $fieldSet = $form->addFieldset('entity_type_data', array());

        $fieldSet->addField('entity_type_code', 'text', array(
            'label'     => Mage::helper('goodahead_etm')->__("Entity Type Code"),
            'name'      => 'entity_type_code',
            'class'     => 'required-entry',
            'required'  => true,
        ));


        if ($entityType->getId()) {
            $form->getElement('entity_type_code')->setReadonly('readonly');
        }


        $fieldSet->addField('entity_type_name', 'text', array(
            'label'     => Mage::helper('goodahead_etm')->__("Entity Type Name"),
            'name'      => 'entity_type_name',
            'class'     => 'required-entry',
            'required'  => true,
        ));

        $this->setForm($form);
        return parent::_prepareForm();
    }
}