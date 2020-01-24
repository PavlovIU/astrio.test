<?php
class Cookie {
    /**
     *
     * @var App_Cookie
     */
    protected static $_instance = null;

    /**
     * Singleton instance makes this redundant
     */
    protected function __construct(){}

    /**
     * Retrieve an instance of the class.
     * @return App_Cookie
     */
    public static function getInstance()
    {
        if (self::$_instance == null)
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Send a cookie
     * @param name string
     * @param value string[optional]
     * @param expire int[optional]
     * @param path string[optional]
     * @param domain string[optional]
     * @param secure bool[optional]
     * @param httponly bool[optional]
     * @return bool
     */
    public function setCookie($name, $value = null, $expire = strtotime("+1 year"), $path = null, $domain = null, $secure = null, $httponly = null)
    {
        $set = setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
        return $set;
    }

    /**
     * Retrieve a cookie by name
     * @param string $name
     * @return string|boolean false for failure
     */
    public function getCookie($name)
    {
        if (isset($_COOKIE) && is_array($_COOKIE) && array_key_exists($name, $_COOKIE))
        {
            return $_COOKIE[$name];
        }
        return false;
    }

    /**
     * Unset a cookie by name
     * @param string $name
     * @return boolean
     */
    public function unsetCookie($name)
    {
        if ($this->getCookie($name) != false)
        {
            setcookie($name, "", time() - 3600);
            return true;
        }
        return false;
    }
}