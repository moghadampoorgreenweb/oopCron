<?php

namespace App\Controller;

use App\Infrasructure\Request\Request;
use App\model\Email;
use App\model\Job;
use App\model\User;
use Illuminate\Database\Capsule\Manager as Capsule;

class emailController
{
    public function createOnce(Request $request)
    {
        $model = new Email();

        $data = $request->getParameters();
        $vailemail = $request->validEmail($data['email']);
        if (!$vailemail) {
            die("email not valid");
        }
        $model->insert([
            'email' => $data['email'],
            'subject' => $data['subject'],
            'body' => $data['body'],
            'status' => '1',
        ]);

        d("ok  once");

    }

    public function createBulk(Request $request)
    {
        $model = new Email();

        $data = $request->getParameters();

        foreach ($data['email'] as $key => $value) {
            $vailemail = $request->validEmail($value);
            if (!$vailemail) {
                die("email not valid");
            }
            $d[] = [
                "email" => $value,
                "subject" => $data['subject'],
                "body" => $data['body'],
                'status' => '1',
            ];
            $model->insert([
                'email' => $d[$key]['email'],
                'subject' => $d[$key]['subject'],
                'body' => $d[$key]['body'],
                'status' => $d[$key]['status']
            ]);
        }
        d("ok  bulk");
    }


}