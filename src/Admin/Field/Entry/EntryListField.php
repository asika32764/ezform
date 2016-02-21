<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Field\Entry;

use Admin\Table\Table;
use Phoenix\Field\ItemListField;

/**
 * The EntryField class.
 *
 * @since  1.0
 */
class EntryListField extends ItemListField
{
	/**
	 * Property table.
	 *
	 * @var  string
	 */
	protected $table = Table::ENTRIES;

	/**
	 * Property ordering.
	 *
	 * @var  string
	 */
	protected $ordering = null;
}
