<?php
class EmailsActivation {
	
	/**
	 * onActivate will be called if this returns true
	 *
	 * @param  object $controller Controller
	 * @return boolean
	 */
    public function beforeActivation(&$controller) {
		//return $controller->General->initPluginDB('Attachmentable');
		return true;
    }
    
	/**
	 * Called after activating the plugin in ExtensionsPluginsController::admin_toggle()
	 *
	 * @param object $controller Controller
	 * @return void
	 */
    public function onActivation(&$controller) {
        // ACL: set ACOs with permissions  
    }
    
	/**
	 * onDeactivate will be called if this returns true
	 *
	 * @param  object $controller Controller
	 * @return boolean
	 */
    public function beforeDeactivation(&$controller) {
    	//return $controller->General->removePluginDB('Attachmentable');
    	return true;
    }
    
	/**
	 * Called after deactivating the plugin in ExtensionsPluginsController::admin_toggle()
	 *
	 * @param object $controller Controller
	 * @return void
	 */
    public function onDeactivation(&$controller) {
        // ACL: remove ACOs with permissions
//         $controller->General->removeAco('Animals');
        //$controller->Setting->deleteAll(array('key LIKE' => 'Blog.%'));
    }
}
?>