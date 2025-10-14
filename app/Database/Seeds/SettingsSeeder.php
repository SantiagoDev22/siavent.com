<?php

/**
 * This file is part of CodeIgniter 4 Framework.
 *
 * (c) 2023 Powered by Develogy™ <soporte@develogy.mx>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        helper('setting');

        setting()->get('App.general', 'company') ?? setting()->set('App.general', 'On Eventos', 'company');

        setting()->get('App.general', 'phones') ?? setting()->set('App.general', '442 270 2947', 'phones');

        setting()->get('App.general', 'theme') ?? setting()->set('App.general', 'winter', 'theme');

        setting()->get('App.general', 'favicon') ?? setting()->set('App.general', 'favicon.png', 'favicon');

        setting()->get('App.general', 'background') ?? setting()->set('App.general', 'background.webp', 'background');

        setting()->get('App.general', 'logo') ?? setting()->set('App.general', 'logo.svg', 'logo');

        setting()->get('App.emails', 'to') ?? setting()->set('App.emails', '', 'to');

        setting()->get('App.emails', 'cc') ?? setting()->set('App.emails', '', 'cc');

        setting()->get('App.emails', 'bcc') ?? setting()->set('App.emails', 'daniel@cimientomx.com', 'bcc');

        setting()->get('App.emails', 'support') ?? setting()->set('App.emails', 'info@develogy.mx', 'support');

        setting()->get('App.apps', 'whatsapp') ?? setting()->set('App.apps', 'https://api.whatsapp.com/send?phone=', 'whatsapp');

        setting()->get('App.apps', 'google:searchConsole') ?? setting()->set('App.apps', '', 'google:searchConsole');

        // setting()->get('App.apps', 'google:recaptcha') ?? setting()->set('App.apps', '', 'google:recaptcha');

        setting()->get('App.apps', 'google:tagManager') ?? setting()->set('App.apps', '', 'google:tagManager');
    }
}
