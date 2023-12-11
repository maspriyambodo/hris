<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Compro extends CI_Controller {

    public function index() {
        //https://idx.co.id/primary/ListedCompany/GetCompanyProfiles?emitenType=s&start=0&length=9999
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://idx.co.id/primary/ListedCompany/GetCompanyProfiles?emitenType=s&start=0&length=9999',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 50,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                '_ga_7KMDT3ZVMR=GS1.1.1692011480.3.1.1692011492.0.0.0; _gid=GA1.3.369199724.1692868990; _cfuvid=.Xz67xhOWf2l4R6hysctkb_aZvsrduxF5B7H8RFyVi8-1693146630209-0-604800000; auth.strategy=local; auth._token.local=Bearer%20eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI3MGU4MDk2NS0zMDE3LTQ4MzctOGE3Ni1jNWUyOGVjMTQ3MDUiLCJlbWFpbCI6ImluZm9Ac2NlbnRpdmFpZC5jb20iLCJqdGkiOiI0NTM1YzNjNC02ZWIwLTQxNDgtYWFiNS1mNWUzYTg1MDJiYTMiLCJyb2xlIjoiTWFzeWFyYWthdCBVbXVtIiwicm9sZUlkIjoiYWNiNjZhYjItOWI2Yi00ZDk2LWEzZWQtMTU0YWRkNjA0ZDJiIiwidXQiOiJmYWI0ZmFjMS1jNTQ2LTQxZGUtYWViYy1hMTRkYTY4OTU3MTUiLCJuYmYiOjE2OTI4Njg0NzMsImV4cCI6MTY5Mjg2OTY3MywiaWF0IjoxNjkyODY4NDczfQ.GERPR0HnI0bHV59wGWhrwpDmtkLvEB1ofla9hFhcGzI; arp_scroll_position=247.27272033691406; __cf_bm=lqkGi2tlq2P93fl8cIIYQ9aZMnKDn8qbC3Q8T4WDdLQ-1693149172-0-AZp+PA+/mUOmAUze2yCoJG97wKpLu5Pv8Gp/Y5wsSd6AfxW8QE0pfiROsMqDakorIBofFiVjnlMH0QN5k0y2w5M=; _gat_gtag_UA_69243601_3=1; _ga_VDBWS0BLZR=GS1.1.1693149171.33.1.1693149173.0.0.0; _ga=GA1.1.1517257161.1691742536'
            )
        ));
        $response = curl_exec($curl);
        $penyuluh = json_decode($response);
        $http_code = curl_getinfo($curl)['http_code'];
        curl_close($curl);
        print_r($response);
    }
}
