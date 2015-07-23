<?php

namespace Kisphp\Core;

class Config
{
    use SingletonTrait;

    protected $params = array();

    public function setParams(array $parameters)
    {
        foreach ($parameters as $k => $v) {
            $this->params[$k] = $v;
        }
    }

    public function getParams()
    {
        return $this->params;
    }

    public static function get($name)
    {
        $cfg = static::getInstance();

        return ( isset($cfg->params[$name]) && ! empty($cfg->params[$name]) ) ? $cfg->params[$name] : null;
    }
}
