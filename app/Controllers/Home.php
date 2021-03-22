<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct(){
		parent::__construct();
		$this->client = \Config\Services::curlrequest();
	}
	public function index()
	{
		//dd($this->client);

		$listContact = $this->client->request('POST', 'http://contact/api', [
			'form_params' => [
					'paginate' => 10,
					'typeSearch' => '',
					'element' => '',
			]
		]);
		$Contacts = json_decode($listContact->getBody());
		
		$data = 
		[
			"contacts" => $Contacts
		]; 

		echo view('common/HeaderSite');
		echo view('index', $data);
		echo view('common/FooterSite');
	}
}
