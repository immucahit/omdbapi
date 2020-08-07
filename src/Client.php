<?php

namespace OMDBAPI;

use Exception;
use GuzzleHttp\Client as GuzzleHttpClient;
use OMDBAPI\Parameters\IParameter;

class Client
{
	
	private string $baseUrl;
	private string $apiKey;
	private GuzzleHttpClient $client;
	
	public function __construct(string $baseUrl, string $apiKey)
	{
		$this->baseUrl = $baseUrl;
		$this->setApiKey($apiKey);
		$this->client = new GuzzleHttpClient([
			'base_uri' => $this->baseUrl,
		]);
	}
	
	public function getApiKey(): string
	{
		return $this->apiKey;
	}
	
	public function setApiKey(string $apiKey): void
	{
		$this->apiKey = $apiKey;
	}
	
	public function get(IParameter $parameter): array
	{
		$queryString = array_merge(['apikey' => $this->apiKey], $parameter->toArray());
		$response = $this->client->request('GET', '', ['query' => $queryString]);
		switch ($response->getStatusCode()) {
			case 200:
				return json_decode($response->getBody(), true);
			default:
				throw new Exception('Unexpected error! Http Status Code ' . $response->getStatusCode());
		}
	}
}