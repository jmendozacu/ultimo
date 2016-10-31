<?php

class
MageB2B_Sublogin_Block_Admin_Sublogin_Grid
extends
Mage_Adminhtml_Block_Widget_Grid
{
public
function
__construct()
{
parent::__construct();
$this->setId('subloginGrid');
$this->setSaveParametersInSession(true);
}

protected
function
_prepareCollection()
{
$_802db8eeb4afa606bc553e3d52c66660f0654f84
=
Mage::getSingleton('core/resource')->getTableName('customer_entity');
$_205d95c001c842f933e3b55fa4e902d5d2fdd0af
=
Mage::getModel('sublogin/sublogin')->getCollection();
$_205d95c001c842f933e3b55fa4e902d5d2fdd0af->inGrid
=
true;
$_205d95c001c842f933e3b55fa4e902d5d2fdd0af->getSelect()->join(array('customer'=>
$_802db8eeb4afa606bc553e3d52c66660f0654f84),
'main_table.entity_id = customer.entity_id',
array('customer.email AS cemail',
'customer.website_id AS website_id'
));
if
(Mage::helper('core')->isModuleEnabled('MageB2B_CustomerId'))
{
$this->addCustomerAttributeToSelect($_205d95c001c842f933e3b55fa4e902d5d2fdd0af,
'customer_id',
'ccustomer_id');
}



$this->setCollection($_205d95c001c842f933e3b55fa4e902d5d2fdd0af);
return
parent::_prepareCollection();
}

protected
function
addCustomerAttributeToSelect($_205d95c001c842f933e3b55fa4e902d5d2fdd0af,
$_85a0d8e3f20d0f7b4554923196b0730e2f346e38,
$_87390a0df948f4ee670b9a80883042272173aaf9)
{
$_bfa998e7194dfe8d2968b408544e1ccfbf1de2e9
=
Mage::getSingleton('core/resource')->getTableName('customer_entity_varchar');
$_c1f89c0a91590a544bf85e0268c98b0810539746
=
Mage::getModel('eav/entity')->setType('customer')->getTypeId();
$_7580b9ddf3e33cc40c713c4f578c461cf3580591
=
Mage::getModel('eav/entity_attribute')->loadByCode($_c1f89c0a91590a544bf85e0268c98b0810539746,
$_85a0d8e3f20d0f7b4554923196b0730e2f346e38);
$_ac911624987f6fe2af5b010aba3366bc551046e2
=
$_7580b9ddf3e33cc40c713c4f578c461cf3580591->getId();
$_205d95c001c842f933e3b55fa4e902d5d2fdd0af->getSelect()->joinLeft(array($_85a0d8e3f20d0f7b4554923196b0730e2f346e38
.
'_table'=>
$_bfa998e7194dfe8d2968b408544e1ccfbf1de2e9),
'main_table.entity_id = '
.
$_85a0d8e3f20d0f7b4554923196b0730e2f346e38
.
'_table.entity_id AND '
.
$_85a0d8e3f20d0f7b4554923196b0730e2f346e38
.
'_table.attribute_id='.$_ac911624987f6fe2af5b010aba3366bc551046e2,
$_85a0d8e3f20d0f7b4554923196b0730e2f346e38
.
'_table.value AS '.
$_87390a0df948f4ee670b9a80883042272173aaf9);
}

protected
function
_prepareColumns()
{
if
(Mage::helper('core')->isModuleEnabled('MageB2B_CustomerId'))
{
$this->addColumn('ccustomer_id',
array(
'header'
=>
Mage::helper('sublogin')->__('Customer Id'),
'align'
=>'left',
'width'
=>
'50px',
'index'
=>
'ccustomer_id',
));
}
$this->addColumn('cemail',
array(
'header'
=>
Mage::helper('sublogin')->__('Customer Email'),
'align'
=>'left',
'width'
=>
'50px',
'index'
=>
'cemail',
));
$this->addColumn('firstname',
array(
'header'
=>
Mage::helper('sublogin')->__('Firstname'),
'align'
=>'left',
'width'
=>
'60px',
'default'
=>
'',
'index'
=>
'firstname',
));
$this->addColumn('lastname',
array(
'header'
=>
Mage::helper('sublogin')->__('Lastname'),
'align'
=>'left',
'width'
=>
'60px',
'default'
=>
'',
'index'
=>
'lastname',
));
if
(Mage::helper('core')->isModuleEnabled('MageB2B_CustomerId'))
{
$this->addColumn('customer_id',
array(
'header'
=>
Mage::helper('sublogin')->__('Sublogin Customer Id'),
'align'
=>'left',
'width'
=>
'50px',
'index'
=>
'customer_id',
));
}
$this->addColumn('email',
array(
'header'
=>
Mage::helper('sublogin')->__('Sublogin Email'),
'align'
=>'left',
'width'
=>
'50px',
'index'
=>
'email',
));
$_72530a01d7849041dbc696bb2161717764165e5e
=
array();
foreach
(Mage::getModel('core/website')->getCollection()->toOptionArray()
as
$_91a2a43f77d1dc504cd0664864c1dfd4834a8f53)
{
$_72530a01d7849041dbc696bb2161717764165e5e[$_91a2a43f77d1dc504cd0664864c1dfd4834a8f53['value']]
=
$_91a2a43f77d1dc504cd0664864c1dfd4834a8f53['label'];
}
$this->addColumn('website_id',
array(
'header'
=>
Mage::helper('sublogin')->__('Website'),
'align'
=>'left',
'width'
=>
'50px',
'index'
=>
'website_id',
'type'
=>
'options',
'options'
=>
$_72530a01d7849041dbc696bb2161717764165e5e,
));
$this->addColumn('action',
array(
'header'
=>
Mage::helper('catalog')->__('Action'),
'sortable'
=>
true,
'width'
=>
60,
'filter'
=>
false,
'sortable'
=>
false,
'renderer'
=>
'sublogin/admin_sublogin_grid_actionRenderer',
));
return
parent::_prepareColumns();
}
}
