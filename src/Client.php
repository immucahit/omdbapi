<?php

namespace OMDBAPI;

use OMDBAPI\Parameters\TitleParameter;
use OMDBAPI\Parameters\IDParameter;
use OMDBAPI\Parameters\SearchParameter;
use GuzzleHttp\Client as GuzzleHttpClient;

class Client{

    private string $baseUrl;
    private string $apiKey;
    private GuzzleHttpClient $client;

    public function __construct(string $baseUrl,string $apiKey){
        $this->baseUrl = $baseUrl;
        $this->setApiKey($apiKey);
        $this->client = new GuzzleHttpClient([
            'base_uri' => $this->baseUrl
        ]);
    }

    public function getApiKey() : string {
        return $this->apiKey;
    }

    public function setApiKey(string $apiKey) : void {
        $this->apiKey = $apiKey;
    }

    public function requestByTitleParameter(TitleParameter $titleParameter){
        return $this->request(json_decode($titleParameter->toJSON(),true));        
    }

    public function requestByIDParameter(IDParameter $idParameter){
        return $this->request(json_decode($idParameter->toJSON(),true));
    }

    public function search(SearchParameter $searchParameter){
        return $this->request(json_decode($searchParameter->toJSON(),true));
    }

    private function request(array $queryStringData){
        $queryString = array_merge(['apikey'=>$this->apiKey],$queryStringData);
        $response = $this->client->request('GET','',['query'=>$queryString]);
        switch($response->getStatusCode()){
            case 200:
                return $response->getBody();
            break;
            default:
                throw new Exception('Unexpected error! Http Status Code '.$response->getStatusCode());
        }
    }

}