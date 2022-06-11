<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'AuthFilter'    => \App\Filters\AuthFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'AuthFilter' => ['except' => [
                'Auth/Login', 'Auth/Login/*',
                'home', 'home/*',
                'ppdb', 'ppdb/*',
                '/'
            ]],
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'AuthFilter' => ['except' => [
                'Admin_smanar', 'Admin_smanar/*',
                'Admin_smanar/blog', 'Admin_smanar/blog/*',
                'Admin_smanar/dashboard', 'Admin_smanar/dashboard/*',
                'Admin_smanar/profile', 'Admin_smanar/profile/*',
                'Admin_smanar/tampilan', 'Admin_smanar/tampilan/*',
                'Admin_smanar/feedback', 'Admin_smanar/feedback/*',
            ]],
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
