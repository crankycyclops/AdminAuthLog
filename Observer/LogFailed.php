<?php
/**
 * @category  Crankycyclops
 * @package   Crankycyclops_AdminAuthLog
 * @author    James Colannino
 * @copyright Copyright (c) 2019 James Colannino
 * @license   https://opensource.org/licenses/OSL-3.0 OSL v3
 */

namespace Crankycyclops\AdminAuthLog\Observer;

class LogFailed implements \Magento\Framework\Event\ObserverInterface {

	/**
	 * Logger class.
	 *
	 * @var \Crankycyclops\AdminAuthLog\Logger\Logger
	 */
	protected $logger;

	/**
	 * Library of functions to return data about the session.
	 *
	 * @var \Crankycyclops\AdminAuthLog\Helper\SessionData
	 */
	protected $sessionData;

	/**
	 * @param \Crankycyclops\AdminAuthLog\Logger\Logger $logger
	 * @param \Crankycyclops\AdminAuthLog\Helper\SessionData $sessionData
	 */
	public function __construct(
		\Crankycyclops\AdminAuthLog\Logger\Logger $logger,
		\Crankycyclops\AdminAuthLog\Helper\SessionData $sessionData
	) {
		$this->logger = $logger;
		$this->sessionData = $sessionData;
	}

	/**
	 * Logs failed admin login attempts.
	 *
	 * @param \Magento\Framework\Event\Observer $observer
	 * @return void
	 */
	public function execute(\Magento\Framework\Event\Observer $observer) {

		$this->logger->info('ADMIN LOGIN FAILED', $this->sessionData->getData($observer->getUserName(), 'FAILED'));
	}
}

