<?php


class Session
{
    const SESSION_NAMESPACE = 'prefix_';

    protected static $instance;

    private function __construct()
    {
        // Check if custom session ID header is used

        if (isset($_SERVER['HTTP_X_SID'])) {
            session_id($_SERVER['HTTP_X_SID']);
        } elseif (isset($_GET['_sid'])) {
            session_id($_GET['_sid']);
        }

        // Set cookie expiration time to browser's session

        session_set_cookie_params(0);

        // set session path

        ini_set('session.save_path', realpath(__DIR__ . '/tmp'));
        ini_set('session.gc_probability', 1);

        // Start session handling

        session_start();

        // Create the namespace

        if (empty($_SESSION[self::SESSION_NAMESPACE])) {
            $_SESSION[self::SESSION_NAMESPACE] = [];
        }

        self::$instance = $this;
    }

    public function get($key)
    {
        return isset($_SESSION[self::SESSION_NAMESPACE][$key]) ? $_SESSION[self::SESSION_NAMESPACE][$key] : null;
    }

    public function has($key)
    {
        return isset($_SESSION[self::SESSION_NAMESPACE][$key]);
    }

    public function set($key, $value)
    {
        $_SESSION[self::SESSION_NAMESPACE][$key] = $value;
    }

    public function remove($key)
    {
        unset($_SESSION[self::SESSION_NAMESPACE][$key]);
    }

    public function destroy()
    {
        session_destroy();
    }

    public function getId()
    {
        return session_id();
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            new Session();
        }

        return self::$instance;
    }
}
