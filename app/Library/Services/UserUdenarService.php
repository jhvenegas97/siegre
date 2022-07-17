<?php
namespace App\Library\Services;

use App\Models\UserUdenar;
use GuzzleHttp;

class UserUdenarService
{
    public function userExistsInUdenar($pIdentification,$pArrayToSearch){
        foreach($pArrayToSearch as $element){
            if($element->identification == $pIdentification){
                return true;
            }
            else if($element->student_code == $pIdentification){
                return true;
            }
        }
        return false;
    }

    public function GetDataUdenar(){
        $client = new GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', 'https://sapiens.udenar.edu.co:3019/solicitudLicInfEgresado');

        $arrayReturnted = json_decode($res->getBody(), true);
        $arrayStudentsUdenar = array();
        foreach ($arrayReturnted as $value) {
            $arrayAux = array();
            foreach($value as $element){
                array_push($arrayAux,$element);
            }
            $userUdenar = new UserUdenar;
            for ($i = 0; $i < count($arrayAux); $i++) {
                switch ($i) {
                    case 0:
                        $userUdenar->surname = $arrayAux[$i];
                        break;
                    case 1:
                        $userUdenar->name = $arrayAux[$i];
                        break;
                    case 2:
                        $userUdenar->identification = $arrayAux[$i];
                        break;
                    case 3:
                        $userUdenar->email = $arrayAux[$i];
                        break;
                    case 4:
                        $userUdenar->date_finish = $arrayAux[$i];
                        break;
                    case 5:
                        $userUdenar->student_code = $arrayAux[$i];
                        break;
                }
            }
            array_push($arrayStudentsUdenar,$userUdenar);
        }
        return $arrayStudentsUdenar;
    }
}