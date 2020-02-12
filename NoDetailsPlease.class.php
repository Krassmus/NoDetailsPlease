<?php

require_once 'lib/exceptions/LoginException.php';

class NoDetailsPlease extends StudIPPlugin implements SystemPlugin
{
    public function __construct()
    {
        parent::__construct();
        if (!$GLOBALS['perm']->have_perm("autor") && (stripos($_SERVER['REQUEST_URI'], "dispatch.php/course/details") !== false)) {
            throw new LoginException();
        }
    }
}
