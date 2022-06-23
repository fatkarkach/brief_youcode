<?php

class Router{
    public function index($page)
    {
        include 'view/'. $page .'.php';
    }
}