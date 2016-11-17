<?php
class __MAXFLAT{
	static public $project;

	static function init(){
	  if(self::$project===null){
			self::$project = new Smart_Project_Base();
		}
	}



	static function project(){
		if(self::$project===null){
			self::$project = new Smart_Project_Base();
			return self::$project;
		}else{
			return self::$project;
		}
  }
	static function layout(){
		return self::$project->obj_layout;
	}

	static function option($key_option){
		return self::$project->get_project_option($key_option);
	}

	//get theme domain
	static function domain(){
		return self::$project->get_project_domain();
	}

	/**
	 * Check if menu icons is installed
	 * @return bool
	 */

	static function if_menu_icons_is_installed(){

		if(class_exists('Menu_Icons')){

			return true;

		}

		return false;

	}

	/**
	 *
	 * return awesome icon class name from layout_project_class
	 * @static
	 *
	 * @param $key
	 *
	 * @return mixed
	 *
	 */
static function awesome_icon_class($key){
		 return self::$project->obj_layout->get_awesome_icon_class($key);
}


}
