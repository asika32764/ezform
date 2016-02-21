<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

use Windwalker\Core\Seeder\AbstractSeeder;

/**
 * The DatabaseSeeder class.
 * 
 * @since  1.0
 */
class DatabaseSeeder extends AbstractSeeder
{
	/**
	 * doExecute
	 *
	 * @return  void
	 */
	public function doExecute()
	{
		$this->execute(new UserSeeder);

		$this->execute(new FormSeeder);

		$this->execute(new EntrySeeder);

		// @muse-placeholder  seeder-execute  Do not remove this.
	}

	/**
	 * doClean
	 *
	 * @return  void
	 */
	public function doClean()
	{
		$this->clean(new UserSeeder);

		$this->clean(new FormSeeder);

		$this->clean(new EntrySeeder);

		// @muse-placeholder  seeder-clean  Do not remove this.
	}
}
