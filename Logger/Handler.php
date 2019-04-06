<?php
/**
 * @category  Crankycyclops
 * @package   Crankycyclops_AdminAuthLog
 * @author    James Colannino
 * @copyright Copyright (c) 2019 James Colannino
 * @license   https://opensource.org/licenses/OSL-3.0 OSL v3
 */

namespace Crankycyclops\AdminAuthLog\Logger;

use Monolog\Logger;
use Magento\Framework\Logger\Handler\Base;

class Handler extends Base {

	protected $fileName = '/var/log/crankycyclops/adminauthlog/auth.log';
	protected $loggerType = Logger::INFO;
}

