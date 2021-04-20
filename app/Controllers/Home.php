<?php

namespace App\Controllers;

use App\Models\ShortUrlModel;

class Home extends BaseController
{
	public function index()
	{
		$userModel = new ShortUrlModel();
		$data['shortUrls'] = $userModel->orderBy('id', 'DESC')->get()->getResultArray();
		return view('home', $data);
	}

	public function createShortUrl()
	{
		$shortUrlModel = new ShortUrlModel();
		$data = [
			'original_url' => $this->request->getVar('original_url'),
			'short_url'  => base_url('url/') . '/' . uniqid(),
		];
		$shortUrlModel->insert($data);
		return $this->response->redirect(base_url('/'));
	}

	public function url()
	{
		$shortUrlModel = new ShortUrlModel();
		$shortUrl = $shortUrlModel->where('short_url', current_url())->get()->getFirstRow();

		if (! $shortUrl) {
			throw new \Exception('Url not found');
		}

		return redirect()->to($shortUrl->original_url);
	}
}
