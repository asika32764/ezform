<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Form;

use Admin\Model\FormModel;
use Admin\View\Form\FormHtmlView;
use Phoenix\Controller\Display\EditDisplayController;
use Windwalker\Core\Model\Model;

/**
 * The GetController class.
 * 
 * @since  1.0
 */
class GetController extends EditDisplayController
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'form';

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
	 * @var  FormModel
	 */
	protected $model;

	/**
	 * Property view.
	 *
	 * @var  FormHtmlView
	 */
	protected $view;

	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		parent::prepareExecute();
	}

	/**
	 * prepareExecute
	 *
	 * @param Model $model
	 *
	 * @return void
	 */
	protected function prepareUserState(Model $model)
	{
		parent::prepareUserState($model);
	}

	/**
	 * postExecute
	 *
	 * @param mixed $result
	 *
	 * @return  mixed
	 */
	protected function postExecute($result = null)
	{
		return parent::postExecute($result);
	}
}
