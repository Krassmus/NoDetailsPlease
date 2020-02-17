<?php

require_once 'lib/exceptions/LoginException.php';

class NoDetailsPlease extends StudIPPlugin implements SystemPlugin
{
    protected $already = false;

    public function __construct()
    {
        parent::__construct();
        if (!$GLOBALS['NO_DETAILS_PLEASE_ALREADY_STARTED'] && !$GLOBALS['perm']->have_perm("autor") && (mb_stripos($_SERVER['REQUEST_URI'], "dispatch.php/course/details") !== false)) {
            $GLOBALS['NO_DETAILS_PLEASE_ALREADY_STARTED'] = true;
            throw new LoginException();
        }
    }
}
