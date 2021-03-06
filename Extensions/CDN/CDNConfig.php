<?php
namespace Quark\Extensions\CDN;

use Quark\IQuarkExtension;
use Quark\IQuarkExtensionConfig;

/**
 * Class CDNConfig
 *
 * @package Quark\Extensions\CDN
 */
class CDNConfig implements IQuarkExtensionConfig {
	/**
	 * @var IQuarkCDNProvider $_provider
	 */
	private $_provider;

	/**
	 * @var string $_name = ''
	 */
	private $_name = '';

	/**
	 * @var string $_appId
	 */
	private $_appId = '';

	/**
	 * @var string $_appSecret
	 */
	private $_appSecret = '';

	/**
	 * @param IQuarkCDNProvider $provider
	 * @param string $appId = ''
	 * @param string $appSecret = ''
	 */
	public function __construct (IQuarkCDNProvider $provider, $appId = '', $appSecret = '') {
		$this->_provider = $provider;
		$this->_appId = $appId;
		$this->_appSecret = $appSecret;

		$this->_provider->CDNApplication($this->_appId, $this->_appSecret, null);
	}

	/**
	 * @return string
	 */
	public function &AppID () {
		return $this->_appId;
	}

	/**
	 * @return string
	 */
	public function &AppSecret () {
		return $this->_appSecret;
	}

	/**
	 * @return IQuarkCDNProvider
	 */
	public function &CDNProvider () {
		return $this->_provider;
	}

	/**
	 * @param string $name
	 */
	public function Stacked ($name) {
		$this->_name = $name;
	}

	/**
	 * @return string
	 */
	public function ExtensionName () {
		return $this->_name;
	}

	/**
	 * @param object $ini
	 *
	 * @return void
	 */
	public function ExtensionOptions ($ini) {
		if (isset($ini->AppID))
			$this->_appId = $ini->AppID;

		if (isset($ini->AppSecret))
			$this->_appSecret = $ini->AppSecret;

		$this->_provider->CDNApplication($this->_appId, $this->_appSecret, $ini);
	}

	/**
	 * @return IQuarkExtension
	 */
	public function ExtensionInstance () {
		return new CDNResource($this->_name);
	}
}