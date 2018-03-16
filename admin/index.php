<?php echo
"<br>
<b>Fatal error</b>:  Uncaught exception 'SmartyException' with message 'Unable to load template file 'default.tpl'' in /var/www/sandrosbooks/Smarty/libs/sysplugins/smarty_internal_templatebase.php:127
Stack trace:
#0 /var/www/sandrosbooks/Smarty/libs/sysplugins/smarty_internal_templatebase.php(374): Smarty_Internal_TemplateBase-&gt;fetch('default.tpl', NULL, NULL, NULL, true)
#1 /var/www/sandrosbooks/admin/clases/Base_class.php(95): Smarty_Internal_TemplateBase-&gt;display('default.tpl')
#2 /var/www/sandrosbooks/admin/clases/Base_class.php(73): Base_class-&gt;render('default')
#3 /var/www/sandrosbooks/admin/clases/Base_class.php(23): Base_class-&gt;authorization()
#4 /var/www/sandrosbooks/admin/clases/Get.php(17): Base_class-&gt;__construct()
#5 /var/www/sandrosbooks/admin/view/header.php(33): Get-&gt;__construct()
#6 /var/www/sandrosbooks/admin/index.php(1): require_once('/var/www/sandr...')
#7 {main}
  thrown in <b>/var/www/sandrosbooks/Smarty/libs/sysplugins/smarty_internal_templatebase.php</b> on line <b>127</b><br>
"; ?>