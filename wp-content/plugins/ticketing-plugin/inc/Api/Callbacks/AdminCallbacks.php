<?php

/**
 * @package TicketingPlugin
 */

namespace Inc\Api\Callbacks;


use Inc\Base\BaseController;



class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/index.php" );
	}

	public function activeTickets()
	{
		return require_once( "$this->plugin_path/templates/user-view.php" );
	}

	public function adminUpdate()
	{
		return require_once( "$this->plugin_path/templates/update.php" );
	}

	public function adminCreate()
	{
		return require_once( "$this->plugin_path/templates/create.php" );
	}

	public function adminEmployee()
	{
		return require_once( "$this->plugin_path/templates/employee.php" );
	}


	public function userCompleted()
	{
		return require_once( "$this->plugin_path/templates/completed.php" );
	}

	public function viewALL()
	{
		return require_once( "$this->plugin_path/templates/alltickets.php" );
	}
}


