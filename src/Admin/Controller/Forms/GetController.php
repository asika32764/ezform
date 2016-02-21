<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Forms;

use Admin\Model\FormsModel;
use Admin\View\Forms\FormsHtmlView;
use Phoenix\Controller\Display\ListDisplayController;
use Windwalker\Core\Model\Model;

/**
 * The GetController class.
 * 
 * @since  1.0
 */
class GetController extends ListDisplayController
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'forms';

	/**
	 * Property itemName.
	 *
	 * @var  string
	 */
	protected $itemName = 'form';

	/**
	 * Property listName.
	 *
	 * @var  string
	 */
	protected $listName = 'forms';

	/**
	 * Property model.
	 *
	 * @var  FormsModel
	 */
	protected $model;

	/**
	 * Property view.
	 *
	 * @var  FormsHtmlView
	 */
	protected $view;

	/**
	 * Property ordering.
	 *
	 * @var  string
	 */
	protected $defaultOrdering = null;

	/**
	 * Property direction.
	 *
	 * @var  string
	 */
	protected $defaultDirection = null;

	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		$this->layout = $this->input->get('layout');

		parent::prepareExecute();
	}

	/**
	 * prepareUserState
	 *
	 * @param   Model $model
	 *
	 * @return  void
	 */
	protected function prepareUserState(Model $model)
	{
		parent::prepareUserState($model);
	}
}
