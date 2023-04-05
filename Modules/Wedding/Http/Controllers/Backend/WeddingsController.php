<?php

namespace Modules\Wedding\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class WeddingsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Weddings';

        // module name
        $this->module_name = 'weddings';

        // directory path of the module
        $this->module_path = 'wedding::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Wedding\Models\Wedding";
    }

}
