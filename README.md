A Magento 2 module that logs admin authentication attempts to /path/to/store/var/log/crankycyclops/adminauthlog/auth.log.

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
