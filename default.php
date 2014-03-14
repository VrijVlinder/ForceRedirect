<?php
if(!defined('APPLICATION')) die();


$PluginInfo['ForceRedirect'] = array(
   'Name' => 'ForceRedirect',
   'Description' => 'Redirects all Guest users to the Signin page and keeps the parts you don\'t want to show, private.',
   'Version' => '1.3',
   'Author' => 'VrijVlinder',
   
);

class ForceRedirectPlugin extends Gdn_Plugin {

	public function Base_Render_Before($Sender) {
$Session = GDN::Session();
		
// Get the controller name
 $Controller = $Sender->ControllerName;
$ShowOnController = array('discussioncontroller','discussionscontroller','categoriescontroller','plugincontroller','entrycontroller','activitycontroller');
// force sign in if we aren't in an approved controller
if (!InArrayI($Controller, $ShowOnController)) {
    if(strpos($_SERVER['REQUEST_URI'],'termsofservice') == true || strpos($_SERVER['REQUEST_URI'],'emailavailable') || strpos($_SERVER['REQUEST_URI'],'usernameavailable')) { 
    }
    else if(Gdn::Session()->UserID == 0 && strpos($_SERVER['REQUEST_URI'],'entry/signin') == false) {
        //change this to match your set up,if it is in the root change to /entry/signin, if it has another name other than forum, change the forum part only.
        header('location:/forum/entry/signin');
    }
}
	}
 public function Setup(){

 }
  
 }

   


