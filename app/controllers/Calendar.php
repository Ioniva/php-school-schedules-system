<?php

class Calendar extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION["login"])) {
            header("location: " . base_url() . "/login");
        }

        parent::__construct();
    }

    public function calendar()
    {
        $this->views->getView($this, "calendar");
    }
}
