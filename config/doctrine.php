<?php return [
    /*
     * Metadata Driver Configuration
     */
    'metadata' => [
        'driver' => 'config',
        //
        // Alternatively, if you want to use a chain, specify multiple drivers as nested arrays.
        //
        [
            'driver' => 'config'
        ],
        [
            'driver' => 'annotation',
            // 'paths' => glob(__DIR__ . '/../app/Entity', GLOB_ONLYDIR),
            // 'simple' => false,
            // 'namespace' => 'App',
            // 'alias' => 'DoctrineModel'
        ],
        [
            'driver' => 'yaml',
        ],
        [
            'driver' => 'xml'
        ],
        [
            'driver' => 'static'
        ]
        //
        // ...accepting PRs for more!
    ],
    /*
    'mappings' => [
        'App\MyModel' => [
            'table' => 'my_model',
            'abstract' => false,
            'repository' => 'App\Repository\MyModel',
            'fields' => [
                'id' => [
                    'type' => 'integer',
                    'strategy' => 'identity'
                ],
                'name' => [
                    'type' => 'string',
                    'nullable' => false,
                ]
            ],
            'indexes' => [
                'name'
            ],
        ],
    ],
    */
    /*
     * By default, this package mimics the database configuration from Laravel.
     *
     * You can override it in whole or in part here. The 'database' and 'username'
     * laravel settings will be automatically converted to the proper doctrine 'dbname'
     * and 'user' settings. Other custom laravel to doctrine mappings can be added on
     * a per configuration basis by including a 'mappings' entry with 'laravel'=>'doctrine'
     * mappings (see the sqlite configuration for an example).
     *
     * This array passes right through to the EntityManager factory.
     * For example, here you can set additional connection details like "charset".
     *
     * http://doctrine-dbal.readthedocs.org/en/latest/reference/configuration.html#connection-details
     */
    'connection' => [
        'prefix' => ''
    ],
    'connections' => [
        // Override your laravel environment database selection here if desired
        'default' => 'mysql',
        // Override your laravel values here if desired.
        'mysql' => [
            'driver' => 'pdo_mysql',
            'host' => env('DB_HOST', 'localhost'),
            'dbname' => env('DB_DATABASE'),
            'user' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD', ''),
            'prefix' => '',
            'charset' => 'utf8',
            'driverOptions' => array(
                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
            )
        ],
        // Some preset configurations to map laravel sqlite configs to doctrine
        'sqlite' => [
            'driver' => 'pdo_sqlite',
            'mappings' => [
                'database' => 'path'
            ]
        ]
    ],
    /*
     * By default, this package mimics the cache configuration from Laravel.
     *
     * You can create your own cache provider by extending the
     * Atrauzzi\LaravelDoctrine\CacheProvider\CacheProvider class.
     * Each provider requires a like named section with an array of configuration options
     */
    'cache' => [
        // Remove or set to null for no cache
        'provider' => env('CACHE_DRIVER'),
        'file' => [
            'directory' => storage_path('framework/cache'),
            'extension' => '.doctrinecache.data'
        ],
        'redis' => [
            'host' => '127.0.0.1',
            'port' => 6379,
            'database' => 1
        ],
        'memcache' => [
            'host' => '127.0.0.1',
            'port' => 11211
        ],
        'providers' => [
            'memcache' => 'Atrauzzi\LaravelDoctrine\CacheProvider\MemcacheProvider',
            'memcached' => 'Atrauzzi\LaravelDoctrine\CacheProvider\MemcachedProvider',
            'couchbase' => 'Atrauzzi\LaravelDoctrine\CacheProvider\CouchbaseProvider',
            'redis' => 'Atrauzzi\LaravelDoctrine\CacheProvider\RedisProvider',
            'apc' => 'Atrauzzi\LaravelDoctrine\CacheProvider\ApcCacheProvider',
            'xcache' => 'Atrauzzi\LaravelDoctrine\CacheProvider\XcacheProvider',
            'array' => 'Atrauzzi\LaravelDoctrine\CacheProvider\ArrayCacheProvider',
            'file' => 'Atrauzzi\LaravelDoctrine\CacheProvider\FilesystemCacheProvider'
            //'custom' => 'Path\To\Your\Class'
        ]
    ],
    /*
     * Set the directory where Doctrine generates any proxy classes, including with which namespace.
     * http://doctrine-orm.readthedocs.org/en/latest/reference/advanced-configuration.html
     */
    'proxy_classes' => [
        'auto_generate' => 'local' === env('APP_ENV', 'production') ? 2 : 0,
        'directory' => storage_path('framework/proxies'),
        'namespace' => null,
    ],
    'migrations' => [
        'directory' => database_path('doctrine-migrations'),
        'namespace' => 'DoctrineMigrations',
        'table_name' => 'doctrine_migration_versions'
    ],
    /*
     * Use to specify the default repository.
     * http://doctrine-orm.readthedocs.org/en/latest/reference/working-with-objects.html#custom-repositories
     */
    'default_repository' => 'Doctrine\ORM\EntityRepository',
    /*
     * Use to specify the SQL Logger.
     * To use with \Doctrine\DBAL\Logging\EchoSQLLogger, do:
     *   'sqlLogger' => new \Doctrine\DBAL\Logging\EchoSQLLogger();
     *
     * http://doctrine-orm.readthedocs.org/en/latest/reference/advanced-configuration.html#sql-logger-optional
     */
    'sql_logger' => env('APP_DEBUG', false) ? new \Doctrine\DBAL\Logging\DebugStack : null,
    /*
     * In some circumstances, you may wish to diverge from what's configured in Laravel
     */
    'debug' => env('APP_DEBUG', false),
    /*
     * Add custom Doctrine types here.
     * For more information: http://doctrine-dbal.readthedocs.org/en/latest/reference/types.html#custom-mapping-types
     */
    'custom_types' => [
        //'json' => 'Atrauzzi\LaravelDoctrine\Type\Json'
    ],
    'auth' => [
        //'authenticator' => 'Atrauzzi\LaravelDoctrine\DoctrineAuthenticator',
        //'model' => 'App\User',
    ]
];