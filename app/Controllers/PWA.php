<?php namespace App\Controllers;

class PWA extends BaseController
{
    public function manifest()
    {
        $json = file_get_contents(ROOTPATH . '/app/Views/pwa/manifest.webmanifest');

        return $this->response
            ->setContentType('application/manifest+json')
            ->setBody($json);
    }

    public function service_worker()
    {
        return $this->response
            ->setContentType('text/javascript')
            ->setBody(view('pwa/service_worker_js'));
    }

    public function assetlinks()
    {
        $json = file_get_contents(ROOTPATH . 'public/.well-known/assetlinks.json');

        return $this->response
            ->setContentType('application/json')
            ->setBody($json);
    }
}