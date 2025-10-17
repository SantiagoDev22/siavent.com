<?php

/**
 * This file is part of CodeIgniter 4 Framework.
 *
 * (c) 2023 Powered by Develogy™ <soporte@develogy.mx>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Controllers\Landing;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    public function privacy()
    {
        return view('landing/pages/privacy');
    }

    public function index($slug = null)
    {
        // Valida si la landing existe.
        if (! $this->validateData(
            ['slug' => $slug],
            ['slug' => 'required|max_length[256]|is_not_unique[landings.slug,active,1]'],
        )) {
            throw PageNotFoundException::forPageNotFound();
        }

        $landingModel = model('LandingsModel');
        $landing = $landingModel
            ->where('slug', $slug)
            ->first();

        $sectionModels = model('SectionsModel');

        $sections = $sectionModels->where('landing_id', $landing['id'])->orderBy('sort_order')->findAll();
        $stateModel = model('StatesModel');

        $states = $stateModel->orderBy('name', 'decs')->findAll();

        // dd($sections);
        return view('landing/pages/home', [
            'landing'  => $landing,
            'sections' => $sections,
            'states'   => $states,
        ]);
    }

    /**
     * Registra un nuevo prospecto
     *
     * @param POST|prospect
     */
    public function prospects()
    {
        // Valida los campos del formulario.
        if (strtolower($this->request->getMethod()) === 'post' && $this->validate([
            'origin'  => 'required|min_length[36]|max_length[36]',
            'name'    => 'required|max_length[64]|string',
            'email'   => 'required|max_length[256]|valid_email',
            'phone'   => 'required|max_length[15]|decimal',
            // Validamos que el estado provenga de la tabla states y esté activo
            'estados' => 'required|is_not_unique[estados.id]',
        ])) {

            if (!$this->validateData(
                ['landing_id' => $this->request->getPost('origin')],
                ['landing_id' => 'required|min_length[36]|is_not_unique[landings.id,active,1]'],
            )) {
                throw PageNotFoundException::forPageNotFound();
            }

            $prospectModel = model('ProspectsModel');

            $message = trimAll($this->request->getPost('message'));
            // Nota: 'date' ya no se espera desde el formulario, se elimina

            // Registra un nuevo prospecto.
            $datainsert = [
                'name'       => trimAll($this->request->getPost('name')),
                'email'      => lowerCase(trim($this->request->getPost('email'))),
                'phone'      => stripAllSpaces($this->request->getPost('phone')),
                'landing_id' => $this->request->getPost('origin'),
                'state_id'   => $this->request->getPost('estados'),
                'message'    => $message,
                'observations' => stripAllSpaces($this->request->getPost('empresa')),
            ];

            // Insertar los datos en la tabla
            $prospectModel->transStart();
            $prospectModel->insert($datainsert);
            $prospectModel->transComplete();
            if ($prospectModel->transStatus() === true) {
                $stateModel   = model('StatesModel');
                $landingModel = model('LandingsModel');

                $estado = $stateModel->select('id,name')->where('id', $datainsert['state_id'])->first();
                $landing = $landingModel->select('id, slug,name, other, title')->where('id', $datainsert['landing_id'])->first();

                $email = service('email');
                // Define el correo de prospecto como reply
                $email->setReplyTo($datainsert['email'], $datainsert['name']);
                // Define el remitente y el destinatario del email.
                $email->setFrom(config('Email')->SMTPUser, setting()->get('App.general', 'company'));
                $email->setTo(setting()->get('App.emails', 'to'));
                $email->setCC(setting()->get('App.emails', 'cc'));
                $email->setBCC(setting()->get('App.emails', 'bcc'));

                // Define el asunto y el cuerpo del mensaje.
                $email->setSubject('Prospecto Google Ads');
                $email->setMessage(view('backend/emails/prospect', [
                    'prospect' => $datainsert,
                    'landing'  => $landing,
                    'state'    => $estado,
                ]));

                if ($email->send()) {
                    return redirect()->route('landing.pages.thanks');
                }

                return redirect()->back()->withInput()
                    ->with('error', 'Tuvimos un problema para enviar tus datos, por favor inténtelo de nuevo');
            }

            throw PageNotFoundException::forPageNotFound();
        }

        return redirect()->back()->withInput();
    }

    /**
     * reenderiza la pagina de gracias, con el metodo get
     *
     * @method|GET
     */
    public function thanks()
    {
        return view('landing/pages/thanks');
    }
}
