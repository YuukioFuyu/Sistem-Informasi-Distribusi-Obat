<?php namespace App\Controllers;

class PWA extends BaseController
{
    public function manifest()
    {
        return $this->response
            ->setContentType('application/json')
            ->setBody(view('pwa/manifest_json'));
    }

    public function service_worker()
    {
        return $this->response
            ->setContentType('text/javascript')
            ->setBody(view('pwa/service_worker_js'));
    }
}