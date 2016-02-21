<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

use Admin\DataMapper\FormMapper;
use Admin\DataMapper\UserFormMapper;
use Admin\Table\Table;
use Faker\Factory;
use Windwalker\Core\DateTime\DateTime;
use Windwalker\Core\Seeder\AbstractSeeder;
use Windwalker\Data\Data;
use Windwalker\Filter\OutputFilter;
use Windwalker\Warder\Admin\DataMapper\UserMapper;

/**
 * The FormSeeder class.
 * 
 * @since  1.0
 */
class FormSeeder extends AbstractSeeder
{
	/**
	 * doExecute
	 *
	 * @return  void
	 */
	public function doExecute()
	{
		$faker = Factory::create();

		$mapper = new FormMapper;
		$userFormMapper = new UserFormMapper;

		$userIdList = (new UserMapper)->findColumn('id');

		foreach (range(1, 50) as $i)
		{
			$data = new Data;

			$data['title']       = $faker->sentence(rand(3, 5));
			$data['alias']       = OutputFilter::stringURLSafe($data['title']);
			$data['key']         = md5(uniqid(rand(0, 999)));
			$data['desc']        = $faker->paragraph(5);
			$data['created']     = $faker->dateTime->format(DateTime::FORMAT_SQL);
			$data['created_by']  = rand(20, 100);
			$data['modified']    = $faker->dateTime->format(DateTime::FORMAT_SQL);
			$data['modified_by'] = rand(20, 100);
			$data['state']       = $faker->randomElement(array(1, 1, 1, 1, 0, 0));
			$data['params']      = '';

			$mapper->createOne($data);

			$this->command->out('.', false);
		}

		$formIds = $mapper->findColumn('id');

		foreach ($userIdList as $userId)
		{
			foreach ($faker->randomElements($formIds, rand(1, 5)) as $k => $formId)
			{
				$map = new Data;
				$map->user_id = $userId;
				$map->form_id = $formId;
				$map->access  = $k == 0 ? 'admin' : $faker->randomElement(['member', 'admin']);

				$userFormMapper->createOne($map);
			}
		}

		$this->command->out();
	}

	/**
	 * doClean
	 *
	 * @return  void
	 */
	public function doClean()
	{
		$this->truncate(Table::FORMS);
		$this->truncate(Table::USER_FORM_MAPS);
	}
}
