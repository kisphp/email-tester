<?php

namespace Kisphp\Core;

class Config
{
    use SingletonTrait;

    protected $params = [];

    /**
     * @param array $parameters
     */
    public function setParams(array $parameters)
    {
        foreach ($parameters as $k => $v) {
            $this->params[$k] = $v;
        }
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public static function get($name)
    {
        $cfg = static::getInstance();

        return ( isset($cfg->params[$name]) && ! empty($cfg->params[$name]) ) ? $cfg->params[$name] : null;
    }
}
