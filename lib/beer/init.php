<?php

define( 'DS', DIRECTORY_SEPARATOR );
define( 'DIR_BASE', dirname( __DIR__ ).DS );

define( 'DIR_LIB', DIR_BASE.'beer'.DS );
define( 'DIR_PACKAGES', DIR_BASE.'packages'.DS );
define( 'DIR_CONFS', DIR_BASE.'confs'.DS );
define( 'DIR_APP', DIR_BASE.'app'.DS );

define( 'DIR_APP_PACKAGES', DIR_APP.'packages'.DS );

echo DIR_BASE.'<br />';
echo DIR_LIB.'<br />';
echo DIR_PACKAGES.'<br />';
echo DIR_CONFS.'<br />';
echo DIR_APP.'<br />';
echo DIR_APP_PACKAGES.'<br />';