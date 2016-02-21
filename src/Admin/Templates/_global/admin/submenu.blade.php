<?php
/**
 * @var $helper \Admin\Helper\MenuHelper
 * @var $router \Windwalker\Core\Router\PackageRouter
 */
?>

<h3 class="visible-xs-block">
    @translate('phoenix.title.submenu')
</h3>

<ul class="nav nav-stacked nav-pills">
    <li class="{{ $helper->menu->active('categories') }}">
        <a href="#">
            @translate('admin.categories.title')
        </a>
    </li>

    <li class="{{ $helper->menu->active('forms') }}">
        <a href="{{ $router->html('forms') }}">
            @translate('admin.forms.title')
        </a>
    </li>

	<li class="{{ $helper->menu->active('entries') }}">
		<a href="{{ $router->html('entries') }}">
			@translate('admin.entries.title')
		</a>
	</li>

    {{-- @muse-placeholder  submenu  Do not remove this line --}}
</ul>
