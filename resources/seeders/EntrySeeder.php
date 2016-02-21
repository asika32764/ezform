<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

use Admin\DataMapper\EntryFieldMapper;
use Admin\DataMapper\EntryMapper;
use Admin\DataMapper\FormMapper;
use Admin\Table\Table;
use Faker\Factory;
use Windwalker\Core\DateTime\DateTime;
use Windwalker\Core\Seeder\AbstractSeeder;
use Windwalker\Data\Data;
use Windwalker\Filter\OutputFilter;

/**
 * The EntrySeeder class.
 * 
 * @since  1.0
 */
class EntrySeeder extends AbstractSeeder
{
	/**
	 * doExecute
	 *
	 * @return  void
	 */
	public function doExecute()
	{
		$faker = Factory::create();

		$mapper           = new EntryMapper;
		$entryFieldMapper = new EntryFieldMapper;
		$forms            = (new FormMapper)->findAll();

		foreach ($forms as $form)
		{
			$fields = [];

			foreach (range(3, 7) as $i)
			{
				$data = new Data;

				$data->form_id  = $form->id;
				$data->alias    = trim($faker->word, '.');
				$data->title    = strtolower($data->alias);
				$data->ordering = $i + 1;

				$fields[] = $data->title;

				$entryFieldMapper->createOne($data);
			}

			foreach (range(10, 50) as $k)
			{
				$data = array();

				foreach ($fields as $field)
				{
					$data[$field] = $faker->sentence(rand(1, 3));
				}

				$entry = new Data;
				$entry->form_id = $form->id;
				$entry->data = json_encode($data);
				$entry->created = $faker->dateTime->format(DateTime::FORMAT_SQL);
				$entry->ip = $faker->ipv4;

				$mapper->createOne($entry);

				$this->command->out('.', false);
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
		$this->truncate(Table::ENTRIES);
		$this->truncate(Table::ENTRY_FIELDS);

	}
}
