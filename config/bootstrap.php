<?php
require __DIR__ . '/paths.php';
require CORE_PATH . 'config' . DS . 'bootstrap.php';

use Cake\Cache\Cache;
use Cake\Console\ConsoleErrorHandler;
use Cake\Core\App;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Core\Plugin;
use Cake\Database\Type;
use Cake\Datasource\ConnectionManager;
use Cake\Error\ErrorHandler;
use Cake\Http\ServerRequest;
use Cake\Log\Log;
use Cake\Mailer\Email;
use Cake\Utility\Inflector;
use Cake\Utility\Security;

if (!env('APP_NAME') && file_exists(CONFIG . '.env')) {
    $dotenv = new \josegonzalez\Dotenv\Loader([CONFIG . '.env']);
    $dotenv->parse()
        ->putenv()
        ->toEnv()
        ->toServer();
}


try {
    Configure::config('default', new PhpConfig());
    Configure::load('app', 'default', false);
} catch (\Exception $e) {
    exit($e->getMessage() . "\n");
}

if (Configure::read('debug')) {
    Configure::write('Cache._cake_model_.duration', '+2 minutes');
    Configure::write('Cache._cake_core_.duration', '+2 minutes');
}

date_default_timezone_set('UTC');
mb_internal_encoding(Configure::read('App.encoding'));

/*
 * Set the default locale. This controls how dates, number and currency is
 * formatted and sets the default language to use for translations.
 */
ini_set('intl.default_locale', Configure::read('App.defaultLocale'));

/*
 * Register application error and exception handlers.
 */
$isCli = PHP_SAPI === 'cli';
if ($isCli) {
    (new ConsoleErrorHandler(Configure::read('Error')))->register();
} else {
    (new ErrorHandler(Configure::read('Error')))->register();
}

/*
 * Include the CLI bootstrap overrides.
 */
if ($isCli) {
    require __DIR__ . '/bootstrap_cli.php';
}

/*
 * Set the full base URL.
 * This URL is used as the base of all absolute links.
 *
 * If you define fullBaseUrl in your config file you can remove this.
 */
if (!Configure::read('App.fullBaseUrl')) {
    $s = null;
    if (env('HTTPS')) {
        $s = 's';
    }

    $httpHost = env('HTTP_HOST');
    if (isset($httpHost)) {
        Configure::write('App.fullBaseUrl', 'http' . $s . '://' . $httpHost);
    }
    unset($httpHost, $s);
}

Cache::setConfig(Configure::consume('Cache'));
ConnectionManager::setConfig(Configure::consume('Datasources'));
Email::setConfigTransport(Configure::consume('EmailTransport'));
Email::setConfig(Configure::consume('Email'));
Log::setConfig(Configure::consume('Log'));
Security::setSalt(Configure::consume('Security.salt'));

ServerRequest::addDetector('mobile', function ($request) {
    $detector = new \Detection\MobileDetect();

    return $detector->isMobile();
});
ServerRequest::addDetector('tablet', function ($request) {
    $detector = new \Detection\MobileDetect();

    return $detector->isTablet();
});

if (Configure::read('App.defaultLocale') == 'pl_PL') { setlocale(LC_MONETARY, 'pl_PL.UTF-8'); }
if (Configure::read('App.defaultLocale') == 'en_US') { setlocale(LC_MONETARY, 'en_US.UTF-8'); }


\Cake\Database\Type::build('time')->useImmutable();
\Cake\Database\Type::build('date')->useImmutable();
\Cake\Database\Type::build('datetime')->useImmutable();
\Cake\Database\Type::build('timestamp')->useImmutable();
\Cake\I18n\Time::setToStringFormat([IntlDateFormatter::MEDIUM, IntlDateFormatter::SHORT]);
\Cake\I18n\Time::setToStringFormat('yyyy-MM-dd HH:mm');
\Cake\I18n\Date::setToStringFormat('yyyy-MM-dd');
\Cake\I18n\FrozenTime::setToStringFormat('HH:mm');
\Cake\I18n\FrozenDate::setToStringFormat('yyyy-MM-dd');
\Cake\Database\Type::build('date')->useLocaleParser()->setLocaleFormat('yyyy-MM-dd');
\Cake\Database\Type::build('time')->useLocaleParser()->setLocaleFormat('HH:mm');
\Cake\Database\Type::build('datetime')->useLocaleParser()->setLocaleFormat('yyyy-MM-dd HH:mm');
\Cake\Database\Type::build('timestamp')->useLocaleParser()->setLocaleFormat('yyyy-MM-dd HH:mm');
\Cake\Database\Type::build('decimal')->useLocaleParser();
\Cake\Database\Type::build('float')->useLocaleParser();


if (Configure::read('debug')) {
    Plugin::load('DebugKit', ['bootstrap' => true]);
}
