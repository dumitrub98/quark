<?php
namespace Quark\Extensions\SocialNetwork;

use Quark\IQuarkExtension;
use Quark\IQuarkExtensionConfig;

/**
 * Class SocialNetworkConfig
 *
 * @package Quark\Extensions\SocialNetwork
 */
class SocialNetworkConfig implements IQuarkExtensionConfig {
	/**
	 * @var IQuarkSocialNetworkProvider $social
	 */
	public $social;
	public $appId;
	public $appSecret;

	/**
	 * @var string $_name
	 */
	private $_name = '';

	/**
	 * @param IQuarkSocialNetworkProvider $social
	 * @param string $id
	 * @param string $secret
	 */
	public function __construct (IQuarkSocialNetworkProvider $social, $id, $secret) {
		$this->social = $social;
		$this->appId = $id;
		$this->appSecret = $secret;

		$this->social->Init($this->appId, $this->appSecret);
	}

	/**
	 * @return array
	 */
	public function Credentials () {
		return array(
			'appId' => $this->appId,
			'secret' => $this->appSecret
		);
	}

	/**
	 * @return IQuarkSocialNetworkProvider
	 */
	public function SocialNetwork () {
		return $this->social;
	}

	/**
	 * @param string $name
	 *
	 * @return string
	 */
	public function Name ($name = '') {
		if (func_num_args() != 0)
			$this->_name = $name;

		return $this->_name;
	}

	/**
	 * @return IQuarkExtension
	 */
	public function ExtensionInstance () {
		return new SocialNetwork($this->_name);
	}
}