<?php

class
MageB2B_Sublogin_Model_Api_SubloginAcl_Api
extends
Mage_Api_Model_Resource_Abstract
{
protected
$_mapAttributes
=
array();

protected
function
_prepareData($_461e9bac5c124e13e943d74294b5b3c23e91e59a)
{
foreach
($this->_mapAttributes
as
$_2ed5f0109552e92bc858f4e8511f93948304f527=>$_cb342167c458839a3bb75867845dc6ce2415a0b6)
{
if(isset($_461e9bac5c124e13e943d74294b5b3c23e91e59a[$_2ed5f0109552e92bc858f4e8511f93948304f527]))
{
$_461e9bac5c124e13e943d74294b5b3c23e91e59a[$_cb342167c458839a3bb75867845dc6ce2415a0b6]
=
$_461e9bac5c124e13e943d74294b5b3c23e91e59a[$_2ed5f0109552e92bc858f4e8511f93948304f527];
unset($_461e9bac5c124e13e943d74294b5b3c23e91e59a[$_2ed5f0109552e92bc858f4e8511f93948304f527]);
}
}
return
$_461e9bac5c124e13e943d74294b5b3c23e91e59a;
}

public
function
items($_7dfd852b719adcc978f552ee9bc900d71af184ea)
{
$_205d95c001c842f933e3b55fa4e902d5d2fdd0af
=
Mage::getModel('sublogin/acl')->getCollection();
$_32e6ef86368f02acc1254a1fd82a8f23f06d50c0
=
Mage::helper('api');
$_7dfd852b719adcc978f552ee9bc900d71af184ea
=
$_32e6ef86368f02acc1254a1fd82a8f23f06d50c0->parseFilters($_7dfd852b719adcc978f552ee9bc900d71af184ea,
$this->_mapAttributes);
try
{
foreach
($_7dfd852b719adcc978f552ee9bc900d71af184ea
as
$_54323be853e934686a9fca46e2f91c8ead26624e
=>
$_101966cc6117772941ef274d5dfb132cb8452d0a)
{
$_205d95c001c842f933e3b55fa4e902d5d2fdd0af->addFieldToFilter($_54323be853e934686a9fca46e2f91c8ead26624e,
$_101966cc6117772941ef274d5dfb132cb8452d0a);
}
}
catch
(Mage_Core_Exception
$_68dc3926fdadefc4ea3e5e09bf1dd6f6e1785aa5)
{
$this->_fault('filters_invalid',
$_68dc3926fdadefc4ea3e5e09bf1dd6f6e1785aa5->getMessage());
}
$_eccc631c31ee867e24cd5aa85e63b9fe61956a92
=
array();
foreach
($_205d95c001c842f933e3b55fa4e902d5d2fdd0af
as
$_1f7b5688fc79a5deb4147b4f7162db9bca9f0ac3)
{
$_eccc631c31ee867e24cd5aa85e63b9fe61956a92[]
=
$_1f7b5688fc79a5deb4147b4f7162db9bca9f0ac3->toArray();
}
return
$_eccc631c31ee867e24cd5aa85e63b9fe61956a92;
}

public
function
info($_ce376578098cf70af7021fca72fe4e15a4a98365)
{
$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8
=
Mage::getModel('sublogin/acl')->load($_ce376578098cf70af7021fca72fe4e15a4a98365);
if
(!$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8->getId())
{
$this->_fault('not_exists');
}
return
$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8->getData();
}

public
function
create($_461e9bac5c124e13e943d74294b5b3c23e91e59a)
{
$_461e9bac5c124e13e943d74294b5b3c23e91e59a
=
$this->_prepareData($_461e9bac5c124e13e943d74294b5b3c23e91e59a);
try
{
$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8
=
Mage::getModel('sublogin/acl');
foreach($_461e9bac5c124e13e943d74294b5b3c23e91e59a
as
$_23b0ad1cc40c95ea2b47d495a9168ed229aecf88=>$_080c67f9b4e0fa2795ac6258b05f7280be9b7d96)
{
$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8->setData($_23b0ad1cc40c95ea2b47d495a9168ed229aecf88,
$_080c67f9b4e0fa2795ac6258b05f7280be9b7d96);
}
$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8->save();
}
catch
(Mage_Core_Exception
$_68dc3926fdadefc4ea3e5e09bf1dd6f6e1785aa5)
{
$this->_fault('data_invalid',
$_68dc3926fdadefc4ea3e5e09bf1dd6f6e1785aa5->getMessage());
}
return
$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8->getId();
}

public
function
update($_ce376578098cf70af7021fca72fe4e15a4a98365,
$_461e9bac5c124e13e943d74294b5b3c23e91e59a)
{
$_461e9bac5c124e13e943d74294b5b3c23e91e59a
=
$this->_prepareData($_461e9bac5c124e13e943d74294b5b3c23e91e59a);
$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8
=
Mage::getModel('sublogin/acl')->load($_ce376578098cf70af7021fca72fe4e15a4a98365);
if
(!$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8->getId())
{
$this->_fault('not_exists');
}
foreach
($_461e9bac5c124e13e943d74294b5b3c23e91e59a
as
$_23b0ad1cc40c95ea2b47d495a9168ed229aecf88=>$_080c67f9b4e0fa2795ac6258b05f7280be9b7d96)
{
$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8->setData($_23b0ad1cc40c95ea2b47d495a9168ed229aecf88,
$_080c67f9b4e0fa2795ac6258b05f7280be9b7d96);
}
$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8->save();
return
$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8->getId();
}

public
function
delete($_ce376578098cf70af7021fca72fe4e15a4a98365)
{
$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8
=
Mage::getModel('sublogin/acl')->load($_ce376578098cf70af7021fca72fe4e15a4a98365);
if
(!$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8->getId())
{
$this->_fault('not_exists');
}
try
{
$_2624ca4132164fb92f4a7fea79a7939cecaf6ff8->delete();
}
catch
(Mage_Core_Exception
$_68dc3926fdadefc4ea3e5e09bf1dd6f6e1785aa5)
{
$this->_fault('not_deleted',
$_68dc3926fdadefc4ea3e5e09bf1dd6f6e1785aa5->getMessage());
}
return
true;
}
}
