<?php

namespace App\Actions;
use TCG\Voyager\Actions\AbstractAction;

class CertificateAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Print';
    }

    public function getIcon()
    {
        return 'voyager-documentation';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-success pull-right',
        ];
    }

    public function getDefaultRoute()
    {

        return route('certificate' , $this->data);
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'certificates';
    }
}
