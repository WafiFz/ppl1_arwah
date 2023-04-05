<?php

namespace Modules\Invitation\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class InvitationsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Invitations';

        // module name
        $this->module_name = 'invitations';

        // directory path of the module
        $this->module_path = 'invitation::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Invitation\Models\Invitation";
    }

}
