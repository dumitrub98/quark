<?php
namespace Quark\Extensions\OAuth;

use Quark\Extensions\OAuth\Flows\AuthorizationCodeFlow;
use Quark\Extensions\OAuth\Flows\ClientCredentialsFlow;
use Quark\Extensions\OAuth\Flows\DeviceCodeFlow;
use Quark\Extensions\OAuth\Flows\ImplicitFlow;
use Quark\Extensions\OAuth\Flows\InternalSessionFlow;
use Quark\Extensions\OAuth\Flows\PasswordCredentialsFlow;
use Quark\Extensions\OAuth\Flows\RefreshTokenFlow;

/**
 * Interface IQuarkOAuthAuthorizableModelWithDefaultFlowsProcess
 *
 * @package Quark\Extensions\OAuth
 */
interface IQuarkOAuthAuthorizableModelWithDefaultFlowsProcess extends IQuarkOAuthAuthorizableModel {
	/**
	 * @param AuthorizationCodeFlow $flow
	 *
	 * @return mixed
	 */
	public function OAuthFlowAuthorizationCode(AuthorizationCodeFlow $flow);

	/**
	 * @param ImplicitFlow $flow
	 *
	 * @return mixed
	 */
	public function OAuthFlowImplicit(ImplicitFlow $flow);

	/**
	 * @param PasswordCredentialsFlow $flow
	 *
	 * @return mixed
	 */
	public function OAuthFlowPasswordCredentials(PasswordCredentialsFlow $flow);

	/**
	 * @param ClientCredentialsFlow $flow
	 *
	 * @return mixed
	 */
	public function OAuthFlowClientCredentials(ClientCredentialsFlow $flow);

	/**
	 * @param RefreshTokenFlow $flow
	 *
	 * @return mixed
	 */
	public function OAuthFlowRefreshToken(RefreshTokenFlow $flow);

	/**
	 * @param DeviceCodeFlow $flow
	 *
	 * @return mixed
	 */
	public function OAuthFlowDeviceCode(DeviceCodeFlow $flow);

	/**
	 * @param InternalSessionFlow $flow
	 *
	 * @return mixed
	 */
	public function OAuthFlowInternalSession(InternalSessionFlow $flow);
}