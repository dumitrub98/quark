<?php
namespace Quark\ViewResources\Quark\QuarkPresence;

use Quark\IQuarkViewResource;
use Quark\IQuarkLocalViewResource;
use Quark\IQuarkViewResourceWithDependencies;

use Quark\QuarkCSSViewResourceType;

use Quark\ViewResources\Quark\QuarkResponsiveUI;
use Quark\ViewResources\Quark\QuarkUI;

/**
 * Class QuarkPresence
 *
 * @package Quark\ViewResources\Quark\QuarkPresence
 */
class QuarkPresence implements IQuarkViewResource, IQuarkLocalViewResource, IQuarkViewResourceWithDependencies {
	/**
	 * @return string
	 */
	public function Type () {
		return new QuarkCSSViewResourceType();
	}

	/**
	 * @return string
	 */
	public function Location () {
		return __DIR__ . '/QuarkPresence.css';
	}

	/**
	 * @return bool
	 */
	public function CacheControl () {
		return true;
	}

	/**
	 * @return IQuarkViewResource[]
	 */
	public function Dependencies () {
		return array(
			new QuarkUI(),
			new QuarkResponsiveUI()
		);
	}
}