<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

use Admin\Table\Table;
use Windwalker\Core\Migration\AbstractMigration;
use Windwalker\Core\Migration\Schema;
use Windwalker\Database\Schema\Column;
use Windwalker\Database\Schema\DataType;
use Windwalker\Database\Schema\Key;

/**
 * Migration class of EntryInit.
 */
class EntryInit extends AbstractMigration
{
	/**
	 * Migrate Up.
	 */
	public function up()
	{
		$this->getTable(Table::ENTRIES, function(Schema $sc)
		{
			$sc->addColumn('id',      new Column\Primary)->comment('Primary Key');
			$sc->addColumn('form_id', new Column\Integer)->comment('Form id');
			$sc->addColumn('data',    new Column\Longtext)->comment('Data');
			$sc->addColumn('created', new Column\Datetime)->comment('Created Date');
			$sc->addColumn('ip',      new Column\Varchar)->comment('IP');
			$sc->addColumn('params',  new Column\Text)->comment('Params');

			$sc->addIndex(Key::TYPE_INDEX, 'idx_entries_form_id', 'form_id');
			$sc->addIndex(Key::TYPE_INDEX, 'idx_entries_ip', 'ip');
		})->create(true);

		$this->getTable(Table::ENTRY_FIELDS, function(Schema $sc)
		{
			$sc->addColumn('form_id', new Column\Integer)->comment('Form ID');
			$sc->addColumn('title',    new Column\Varchar)->comment('Title');
			$sc->addColumn('alias',    new Column\Varchar)->comment('Alias');
			$sc->addColumn('ordering', new Column\Integer)->comment('Ordering');

			$sc->addIndex(Key::TYPE_INDEX, 'idx_entries_form_id', 'form_id');
		})->create(true);
	}

	/**
	 * Migrate Down.
	 */
	public function down()
	{
		$this->drop(Table::ENTRIES);
		$this->drop(Table::ENTRY_FIELDS);
	}
}
