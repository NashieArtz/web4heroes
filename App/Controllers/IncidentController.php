<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;

class IncidentController extends Controller
{
    public function showIncidents(): Response
    {
        return $this->view('incident-list', [
            'title' => 'Liste Incidents'
        ]);
    }

}
