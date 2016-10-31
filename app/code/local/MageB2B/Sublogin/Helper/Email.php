<?php

class
MageB2B_Sublogin_Helper_Email
extends
Mage_Core_Helper_Abstract
{

public
function
sendAccountExpiredMail($_4e45fa4f3249d9c3cc1314ed89922593008cf117)
{
if
(!$_4e45fa4f3249d9c3cc1314ed89922593008cf117->getData('rp_token'))
{
$_4e45fa4f3249d9c3cc1314ed89922593008cf117->setData('rp_token',
mt_rand(0,
PHP_INT_MAX));
}
$_4e45fa4f3249d9c3cc1314ed89922593008cf117->save();
$_6b0361ca199f403b6f7eb781b83d507641544828
=
'sublogin/email/expire_refresh';
$this->_sendNewEmail($_6b0361ca199f403b6f7eb781b83d507641544828,
$_4e45fa4f3249d9c3cc1314ed89922593008cf117);
}

public
function
sendNewSubloginEmail($_4e45fa4f3249d9c3cc1314ed89922593008cf117)
{
$_6b0361ca199f403b6f7eb781b83d507641544828
=
'sublogin/email/new';
$this->_sendNewEmail($_6b0361ca199f403b6f7eb781b83d507641544828,
$_4e45fa4f3249d9c3cc1314ed89922593008cf117);
}

public
function
sendNewPasswordEmail($_4e45fa4f3249d9c3cc1314ed89922593008cf117)
{
$_6b0361ca199f403b6f7eb781b83d507641544828
=
'sublogin/email/reset_password';
$this->_sendNewEmail($_6b0361ca199f403b6f7eb781b83d507641544828,
$_4e45fa4f3249d9c3cc1314ed89922593008cf117);
}

public
function
sendMainLoginOrderAlert($_4e45fa4f3249d9c3cc1314ed89922593008cf117)
{
$_6b0361ca199f403b6f7eb781b83d507641544828
=
'sublogin/email/mainlogin_orderalert';
$_b803c43bc8b3ef64b7d19b78f670cdbd11dacf8c
=
$_4e45fa4f3249d9c3cc1314ed89922593008cf117->getCustomer();
if
($_b803c43bc8b3ef64b7d19b78f670cdbd11dacf8c)
{

$_4e45fa4f3249d9c3cc1314ed89922593008cf117->setAlterEmail($_b803c43bc8b3ef64b7d19b78f670cdbd11dacf8c->getOrigEmail());
$_4e45fa4f3249d9c3cc1314ed89922593008cf117->setCustomerName($_b803c43bc8b3ef64b7d19b78f670cdbd11dacf8c->getOrigFirstname().' '.$_b803c43bc8b3ef64b7d19b78f670cdbd11dacf8c->getOrigLastname());
}
$this->_sendNewEmail($_6b0361ca199f403b6f7eb781b83d507641544828,
$_4e45fa4f3249d9c3cc1314ed89922593008cf117);

$_4e45fa4f3249d9c3cc1314ed89922593008cf117->setAlterEmail(null);
$_4e45fa4f3249d9c3cc1314ed89922593008cf117->setCustomerName(null);
}

public
function
sendSubloginOrderRequireApproval($_4e45fa4f3249d9c3cc1314ed89922593008cf117)
{
$_6b0361ca199f403b6f7eb781b83d507641544828
=
'sublogin/email/order_require_approval';
$this->_sendNewEmail($_6b0361ca199f403b6f7eb781b83d507641544828,
$_4e45fa4f3249d9c3cc1314ed89922593008cf117);
}

public
function
sendOrderDeclinedEmailAlert($_4e45fa4f3249d9c3cc1314ed89922593008cf117)
{
$_6b0361ca199f403b6f7eb781b83d507641544828
=
'sublogin/email/order_declined';
$this->_sendNewEmail($_6b0361ca199f403b6f7eb781b83d507641544828,
$_4e45fa4f3249d9c3cc1314ed89922593008cf117);
}

protected
function
_sendNewEmail($_6b0361ca199f403b6f7eb781b83d507641544828,
$_4e45fa4f3249d9c3cc1314ed89922593008cf117)
{
try
{
$_44f8b790a939f0b9202f65d2e050f16b3cd0fbd6
=
Mage::getSingleton('core/translate');
$_44f8b790a939f0b9202f65d2e050f16b3cd0fbd6->setTranslateInline(false);
$_8015116b3aae056a390c38ae34678b5abed6d252
=
Mage::getModel('core/email_template');
$_8015116b3aae056a390c38ae34678b5abed6d252->setDesignConfig(array('area'
=>
'frontend',
'store'=>$_4e45fa4f3249d9c3cc1314ed89922593008cf117->getStoreId()));
$_8015116b3aae056a390c38ae34678b5abed6d252->addBcc($this->_prepareBcc($_4e45fa4f3249d9c3cc1314ed89922593008cf117->getStoreId()));
$_80e9f53c89ea8843430714bfcb1a99292d02cef9
=
($_4e45fa4f3249d9c3cc1314ed89922593008cf117->getAlterEmail())
?
$_4e45fa4f3249d9c3cc1314ed89922593008cf117->getAlterEmail()
:
$_4e45fa4f3249d9c3cc1314ed89922593008cf117->getEmail();
$_8015116b3aae056a390c38ae34678b5abed6d252->sendTransactional(
Mage::getStoreConfig($_6b0361ca199f403b6f7eb781b83d507641544828,
$_4e45fa4f3249d9c3cc1314ed89922593008cf117->getStoreId()),
array(
'name'
=>
Mage::getStoreConfig('sublogin/email/send_from_name',
$_4e45fa4f3249d9c3cc1314ed89922593008cf117->getStoreId()),
'email'
=>
Mage::getStoreConfig('sublogin/email/send_from_email',
$_4e45fa4f3249d9c3cc1314ed89922593008cf117->getStoreId())
),
$_80e9f53c89ea8843430714bfcb1a99292d02cef9,
null,
array('sublogin'
=>
$_4e45fa4f3249d9c3cc1314ed89922593008cf117),
$_4e45fa4f3249d9c3cc1314ed89922593008cf117->getStoreId()
);
if
(!$_8015116b3aae056a390c38ae34678b5abed6d252->getSentSuccess())
{
if
($_4e45fa4f3249d9c3cc1314ed89922593008cf117->getAlterEmail())
{
throw
new
Exception(Mage::helper('sublogin')->__('Problem with sending email to customer %s',
$_4e45fa4f3249d9c3cc1314ed89922593008cf117->getAlterEmail()));
}
else
{
throw
new
Exception(Mage::helper('sublogin')->__('Problem with sending sublogin email to %s',
$_4e45fa4f3249d9c3cc1314ed89922593008cf117->getEmail()));
}
}
}
catch
(Exception
$_68dc3926fdadefc4ea3e5e09bf1dd6f6e1785aa5)
{
Mage::logException($_68dc3926fdadefc4ea3e5e09bf1dd6f6e1785aa5);
}
}

protected
function
_prepareBcc($_e79f42cd6fb01fb1483aa880b524a8d65c7b6081)
{
$_11ba77016ab1985b3211d707f2f2c144269d7091
=
trim(Mage::getStoreConfig('sublogin/email/send_bcc',
$_e79f42cd6fb01fb1483aa880b524a8d65c7b6081));
$_bc509a4207fe4d326675bc926dc569be241779c2
=
explode(";",
$_11ba77016ab1985b3211d707f2f2c144269d7091);
$_85b73c34e466d0c344b7dbb8bdcebf348b76724b
=
array();
if
(!empty($_bc509a4207fe4d326675bc926dc569be241779c2))
{

foreach
($_bc509a4207fe4d326675bc926dc569be241779c2
as
$_3f8de01169eabbb582c7c5ffb762d5f7d1f1bf07
=>
$_101966cc6117772941ef274d5dfb132cb8452d0a)
{
if
(trim($_101966cc6117772941ef274d5dfb132cb8452d0a))
{
$_85b73c34e466d0c344b7dbb8bdcebf348b76724b[$_3f8de01169eabbb582c7c5ffb762d5f7d1f1bf07]
=
trim($_101966cc6117772941ef274d5dfb132cb8452d0a);
}
}
return
$_85b73c34e466d0c344b7dbb8bdcebf348b76724b;
}
return
null;
}
}
