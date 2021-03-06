<?php
namespace Quark\Extensions\Payment\Providers\PayPal\PaymentScenarios;

use Quark\QuarkDTO;

use Quark\Extensions\Payment\IQuarkPaymentProvider;
use Quark\Extensions\Payment\IQuarkPaymentInstrument;
use Quark\Extensions\Payment\IQuarkPaymentScenario;

use Quark\Extensions\Payment\Providers\PayPal\PayPal;

/**
 * Class PaymentExecuteScenario
 *
 * @package Quark\Extensions\Payment\Providers\PayPal\PaymentScenarios
 */
class PaymentExecuteScenario implements IQuarkPaymentScenario {
	/**
	 * @var QuarkDTO $_response
	 */
	private $_response;

	/**
	 * @var string $_payment = ''
	 */
	private $_payment = '';

	/**
	 * @var string $_payer = ''
	 */
	private $_payer = '';

	/**
	 * @param string $payment = ''
	 * @param string $payer = ''
	 */
	public function __construct ($payment = '', $payer = '') {
		$this->Payment($payment);
		$this->Payer($payer);
	}

	/**
	 * @param string $payment = ''
	 *
	 * @return string
	 */
	public function Payment ($payment = '') {
		if (func_num_args() != 0)
			$this->_payment = $payment;

		return $this->_payment;
	}

	/**
	 * @param string $payer = ''
	 *
	 * @return string
	 */
	public function Payer ($payer = '') {
		if (func_num_args() != 0)
			$this->_payer = $payer;

		return $this->_payer;
	}

	/**
	 * @param IQuarkPaymentProvider|PayPal $provider
	 * @param IQuarkPaymentInstrument $instrument = null
	 *
	 * @return bool
	 */
	public function Proceed (IQuarkPaymentProvider $provider, IQuarkPaymentInstrument $instrument = null) {
		$request = array(
			'payer_id' => $this->_payer
		);

		$this->_response = $provider->API(
			QuarkDTO::METHOD_POST,
			'/v1/payments/payment/' . $this->_payment . '/execute',
			$request
		);

		return isset($this->_response->state) && $this->_response->state == PayPal::PAYMENT_STATE_APPROVED;
	}

	/**
	 * @return QuarkDTO
	 */
	public function Response () {
		return $this->_response;
	}

	/**
	 * @param QuarkDTO $request
	 *
	 * @return PaymentExecuteScenario
	 */
	public static function FromRedirect (QuarkDTO $request) {
		return new self($request->paymentId, $request->PayerID);
	}
}