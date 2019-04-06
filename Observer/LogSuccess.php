<?php
/**
 * @category  Crankycyclops
 * @package   Crankycyclops_AdminAuthLog
 * @author    James Colannino
 * @copyright Copyright (c) 2019 James Colannino
 * @license   https://opensource.org/licenses/OSL-3.0 OSL v3
 */

namespace Crankycyclops\AdminAuthLog\Observer;

class LogSuccess implements \Magento\Framework\Event\ObserverInterface {

	/**
	 * Logger class.
	 *
	 * @var \Crankycyclops\AdminAuthLog\Logger\Logger
	 */
	protected $logger;

	/**
	 * Admin auth session, used to get the currently logged in admin user.
	 *
	 * @var \Magento\Backend\Model\Auth\Session
	 */
	protected $authSession;

	/**
	 * Library of functions to return data about the session.
	 *
	 * @var \Crankycyclops\AdminAuthLog\Helper\SessionData
	 */
	protected $sessionData;

	/**
	 * @param \Crankycyclops\AdminAuthLog\Logger\Logger $logger
	 * @param \Magento\Backend\Model\Auth\Session $authSession
	 */
	public function __construct(
		\Crankycyclops\AdminAuthLog\Logger\Logger $logger,
		\Magento\Backend\Model\Auth\Session $authSession,
		\Crankycyclops\AdminAuthLog\Helper\SessionData $sessionData
	) {
		$this->logger = $logger;
		$this->authSession = $authSession;
		$this->sessionData = $sessionData;
	}

	/**
	 * Logs successful admin login attempts.
	 *
	 * @param \Magento\Framework\Event\Observer $observer
	 * @return void
	 */
	public function execute(\Magento\Framework\Event\Observer $observer) {

		$this->logger->info('ADMIN LOGIN SUCCEEDED', $this->sessionData->getData($this->authSession->getUser()->getUsername(), 'SUCCESS'));
	}
}

