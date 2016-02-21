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
 * Migration class of FormInit.
 */
class FormInit extends AbstractMigration
{
	/**
	 * Migrate Up.
	 */
	public function up()
	{
		$this->getTable(Table::FORMS, function(Schema $sc)
		{
			$sc->addColumn('id',          new Column\Primary)->comment('Primary Key');
			$sc->addColumn('title',       new Column\Varchar)->comment('Title');
			$sc->addColumn('alias',       new Column\Varchar)->comment('Alias');
			$sc->addColumn('key',         new Column\Varchar)->comment('Key');
			$sc->addColumn('desc',        new Column\Text)->comment('Intro Text');
			$sc->addColumn('state',       new Column\Tinyint)->signed(true)->comment('0: unpublished, 1:published');
			$sc->addColumn('created',     new Column\Datetime)->comment('Created Date');
			$sc->addColumn('created_by',  new Column\Integer)->comment('Author');
			$sc->addColumn('modified',    new Column\Datetime)->comment('Modified Date');
			$sc->addColumn('modified_by', new Column\Integer)->comment('Modified User');
			$sc->addColumn('params',      new Column\Text)->comment('Params');

			$sc->addIndex(Key::TYPE_INDEX, 'idx_forms_key', 'key');
			$sc->addIndex(Key::TYPE_INDEX, 'idx_forms_alias', 'alias');
			$sc->addIndex(Key::TYPE_INDEX, 'idx_forms_created_by', 'created_by');
		})->create(true);

		$this->getTable(Table::USER_FORM_MAPS, function(Schema $sc)
		{
			$sc->addColumn('user_id', new Column\Integer)->comment('User id');
			$sc->addColumn('form_id', new Column\Integer)->comment('Form id');
			$sc->addColumn('access',  new Column\Char)->comment('Access');

			$sc->addIndex(Key::TYPE_PRIMARY, 'idx_forms_primary', ['user_id', 'form_id']);
		})->create(true);
	}

	/**
	 * Migrate Down.
	 */
	public function down()
	{
		$this->drop(Table::FORMS);
		$this->drop(Table::USER_FORM_MAPS);
	}
}
