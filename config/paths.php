<?php

define( 'DS', DIRECTORY_SEPARATOR );

define( 'URL_BASE', dirname( $_SERVER['SCRIPT_NAME'] ) );
define( 'DIR_BASE', $_SERVER['DOCUMENT_ROOT'].URL_BASE.DS );
define( 'URI_BASE', str_replace( URL_BASE, '', $_SERVER['REQUEST_URI'] ) );

define( 'DIR_LIB', DIR_BASE.'lib'.DS );
define( 'DIR_BEER', DIR_LIB.'beer'.DS );
define( 'DIR_PACKAGES', DIR_BASE.'packages'.DS );
define( 'DIR_CONFIG', DIR_BASE.'config'.DS );
define( 'DIR_APP', DIR_BASE.'app'.DS );
define( 'DIR_APP_PACKAGES', DIR_APP.'packages'.DS );

@list( $section, $module, $action ) = explode( '/', trim( URI_BASE, '/' ) );
define( 'DIR_APP_SECTION', DIR_APP.$section.DS );
define( 'DIR_APP_MODULE', DIR_APP_SECTION.$module.DS );