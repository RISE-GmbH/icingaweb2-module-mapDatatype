<?php

namespace Icinga\Module\MapDatatype\Controllers;

use ipl\Web\Compat\CompatController;


class JsController extends CompatController
{

    public function kickstartAction()
    {
        $script = <<<EOD
            alert("test");
            var interval = setInterval(function () {
                if (typeof icinga == 'undefined') return;
                clearInterval(interval);

                var modulname = "mapDatatype";
                if (icinga.isLoadedModule(modulname)) {
                    icinga.modules.mapDatatype.initialize();
                } else {
                    icinga.loadModule(modulname)
                }

            }, 10);
EOD;

                ob_get_clean();
                header("Content-type: application/javascript");
                header('Pragma: public');
                ob_clean();
                flush();
                echo $script;
                exit;

    }

}