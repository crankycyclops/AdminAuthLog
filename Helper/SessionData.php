<?php
/**
 * @category  Crankycyclops
 * @package   Crankycyclops_AdminAuthLog
 * @author    James Colannino
 * @copyright Copyright (c) 2019 James Colannino
 * @license   https://opensource.org/licenses/OSL-3.0 OSL v3
 */

namespace Crankycyclops\AdminAuthLog\Helper;

class SessionData {

	/**
	 * If the user is behind a proxy, return what is hopefully the client's
	 * original IP address. This value can be easily spoofed, so don't rely on it.
	 *
	 * @return string
	 */
	public function getRealIp() {

		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			return $_SERVER['HTTP_CLIENT_IP'];
		} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			return trim($ips[count($ips) - 1]);
		} else {
			return $_SERVER['REMOTE_ADDR'];
		}
	}

	/**
	 * Returns an array of data related to an admin login event.
	 *
	 * @param string $username
	 * @param string $loginStatus
	 * @return array
	 */
	public function getData($username, $loginStatus) {

		$timestamp = time();

		return [
			'username'   => $username,
			'status'     => $loginStatus,
			'timestamp'  => $timestamp,
			'time'       => date('Y-m-d H:i:s', $timestamp),
			'remote_ip'  => $_SERVER['REMOTE_ADDR'],
			'real_ip'    => $this->getRealIp(),
			'user_agent' => $_SERVER['HTTP_USER_AGENT'],
			'url'        => $_SERVER['REQUEST_URI'],
			'referrer'   => $_SERVER['HTTP_REFERER']
		];
	}
};

