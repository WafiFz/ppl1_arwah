<?php

namespace Modules\Theme\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class ThemesController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Themes';

        // module name
        $this->module_name = 'themes';

        // directory path of the module
        $this->module_path = 'theme::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Theme\Models\Theme";
    }

}
