# A Magento 2 module that logs admin authentication attempts to /path/to/store/var/log/crankycyclops/adminauthlog/auth.log.

## Values that get logged include:

* username
* status (whether or not the login attempt succeeded)
* timestamp (Unix timestamp of the login attempt)
* time (time of login attempt in Y-m-d H:i:s format)
* remote_ip (value of $_SERVER['REMOTE_ADDR'])
* real_ip (if the user is behing a proxy, this value is a best attempt at ascertaining that user's true IP. This value shouldn't be relied on, but it might still be nice to have, so I included it)
* user_agent
* url (value of $_SERVER['REQUEST_URI'])
* referrer (value of $_SERVER['HTTP_REFERER'])

## Installing and Enabling AdminAuthLog

```
mkdir -p /path/to/store/thirdparty/Crankycyclops
cd /path/to/store/thirdparty/Crankycyclops
git clone git@github.com:crankycyclops/AdminAuthLog.git
ln -s /path/to/store/app/code/Crankycyclops /path/to/store/thirdparty/Crankycyclops
php bin/magento module:enable Crankycyclops_AdminAuthLog
php bin/magento setup:upgrade
```

Make sure to clear your cache, and also to run di:compile if you're in production mode.

TODO: composer package coming soon!

## Configuring Fail2ban

### 1. Setup filter
```
ln -s /path/to/store/thirdparty/Crankycyclops/AdminAuthLog/fail2ban/filter.d/magento-adminauthlog.conf /etc/fail2ban/filter.d/magento-adminauthlog.conf
```

### 2. Add filter to jail.local

Edit /etc/fail2ban/jail.local and append the following:

```
[magento-adminauthlog]

enabled = true
filter = magento-adminauthlog
logpath = /path/to/store/var/log/crankycyclops/adminauthlog/auth.log
```
