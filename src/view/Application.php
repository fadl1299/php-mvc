
<?php

namespace SecTheater;

use SecTheater\http\Route;
use SecTheater\Database\DB;
use SecTheater\http\Request;
use SecTheater\http\Response;
use SecTheater\support\Config;
use SecTheater\support\Session;
use SecTheater\Database\Managers\MySQLManager;
use SecTheater\Database\Managers\SQLiteManager;

class Application
{
    protected route $route;
    protected request $request;
    protected response $response;
    protected DB $db;
    protected Config $config;
    protected Session $session;

    public function __construct()
    {
        $this->request  = new request;
        $this->response = new response;
        $this->route    = new route($this->request, $this->response);
        $this->db       = new DB($this->getDatabaseDriver());
        $this->config   = new Config($this->loadConfigurations());
        $this->session  = new Session;
    }

    protected function getDatabaseDriver()
    {
        return match(env('DB_DRIVER')) {
            'sqlite' => new SQLiteManager,
            'mysql' => new MySQLManager,
            default => new SQLiteManager
        };
    }

    protected function loadConfigurations()
    {
        foreach(scandir(config_path()) as $file) {

            if ($file == '.' || $file == '..') {

                continue;

            }

            $filename = explode('.', $file)[0];

            yield $filename => require config_path() . $file;
        }

    }

    public function run()
    {
        $this->db->init();

        $this->route->resolve();
    }

    public function __get($name)
    {
        if(property_exists($this, $name)) {
            return $this->$name;
        }
    }
}
