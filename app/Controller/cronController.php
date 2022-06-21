<?php

namespace App\Controller;

use App\Infrasructure\Request\Request;
use App\model\Email;
use App\model\Job;
use App\service\emailService;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class cronController
{
    public function run(Request $request)
    {
        $model = new Email();
        $data = $request->getParameters();

        $ispendig = $model->ispendig($data["email_id"]);
        $listfail = $model->isfail($data["email_id"]);



        if (!($ispendig->isEmpty()) || !($listfail->isEmpty())) {
            try {
                $i = 0;
                $email = new emailService();
                foreach ($data["email_id"] as $key => $value) {
                    $listemail = Capsule::table('email')->select()->where('id', '=', $value)->first();
                    $email->emailSending($listemail);
                    $model->update($value, ['status' => 3]);
                    $model->update($value, ['updated_at' => Carbon::now('Asia/Tehran')]);
                    echo 'Message has been sent';
                    d($value);
                    if ($i >= 5) {
                        break;
                    }
                    $i++;
                }
            } catch (\Exception $e) {
                echo "Message could not be sent. Mailer Error: {$email->ErrorInfo}";
            }
        }
    }

    public function cron(Request $request)
    {

        $model = new Email();
        $data = $request->getParameters();
        $listpending = $model->getwhere('status', '1');
        $listfaild = $model->getwhere('status', '2');
        $listsent = $model->getwhere('status', '3');

        if (isset($data['starttime']) && isset($data['endtime'])) {
            $valid_date_start_time = $request->validDate($data['starttime']);
            $valid_date_end_time = $request->validDate($data['endtime']);
            if ($valid_date_start_time && $valid_date_end_time) {
                $listbeetween = $model->getbeetween('created_at', [$data['starttime'], $data['endtime']]);
                d($listbeetween);
            } else {
                die("date not valid. valid= YYYY-MM-DD HH:MM:SS ");
            }
        }


        d("-----------------------------------------------------------------list pending------------------------------------------------------------");
        foreach ($listpending as $key => $value) {
            d(' email_Id:key ' . $value->id . ' | status: ' . 'pending' . ' ');
        }
        d("--------------------------------------------------------------end list pending------------------------------------------------------------");
        d("-----------------------------------------------------------------list sent------------------------------------------------------------");
        foreach ($listsent as $key => $value) {
            d(' email_Id:key ' . $value->id . ' | status: ' . 'sent' . ' ');
        }
        d("--------------------------------------------------------------end list sent------------------------------------------------------------");
        d("-----------------------------------------------------------------list failed------------------------------------------------------------");
        foreach ($listfaild as $key => $value) {

            d(' email_Id:key ' . $value->id . ' | status: ' . 'failed' . ' ');
        }
        d("--------------------------------------------------------------end list failed------------------------------------------------------------");
    }


}