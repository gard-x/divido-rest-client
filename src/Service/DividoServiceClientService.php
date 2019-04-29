<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 24.02.2019
 * Time: 19:31
 */

namespace DividoServiceClient\Service;


use DividoServiceClient\DataStorage\CreditRequest;
use DividoServiceClient\DataStorage\CreditRequestResponse;
use DividoServiceClient\DataStorage\Deal;
use DividoServiceClient\DataStorage\Finance;
use DividoServiceClient\Exception\UnallowedOperationExcetion;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;
use http\Exception\UnexpectedValueException;

use DividoServiceClient\Exception\ApiReplyExcetion;
use DividoServiceClient\DataStorage\User;
use Psr\Http\Message\ResponseInterface;

class DividoServiceClientService
{
    const DevUrl = "http://157.230.103.114";
    const LiveUrl = "http://157.230.103.114";


    /** @var Client */
    private $client;


    /** @var ResponseInterface|null */
    private $lastResult;

    private $lastResponseBody = '';


    static function create($url=null)
    {
        return new self(new Client(['base_uri' => $url?$url:static::LiveUrl]));
    }

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param Response $response
     * @return mixed
     * @throws ApiReplyExcetion
     * @throws UnexpectedValueException
     */
    private static function checkData(Response $response)
    {
        $result = json_decode($rawResult = $response->getBody()->getContents(), true);
        if (isset($result['data']['error'])) {
            throw new ApiReplyExcetion(is_array($result['data']['error']) ? json_encode($result['data']['error']) : $result['data']['error'],
                isset($result['data']['code']) ? $result['data']['code'] : "0");
        }
        if (isset($result['data'])) {
            return $result['data'];
        }
        throw new \UnexpectedValueException($rawResult);
    }

    /**
     * @param Response $response
     * @param $fileName
     * @return File
     * @throws ApiReplyExcetion
     */
    private static function checkFile(Response $response, $fileName)
    {
        if (($response->getHeader("Content-Type")[0] ?? null) == "application/pdf") {
            return new File($result = $response->getBody()->getContents(), "application/pdf", $fileName);
        }
        $result = json_decode($rawResult = $response->getBody()->getContents(), true);
        if (isset($result['data']['error'])) {
            throw new ApiReplyExcetion(is_array($result['data']['error']) ? json_encode($result['data']['error']) : $result['data']['error'],
                isset($result['data']['code']) ? $result['data']['code'] : "0");
        }
        throw new \UnexpectedValueException($rawResult);
    }


    public function login($login, $password)
    {
        try {
            $result = $this->call('/api/v1/auth/login', ['login' => $login, 'password' => $password]);
        } catch (ApiReplyExcetion $e) {
            $decoded = json_decode($e->getMessage(), true);
            if (isset($decoded['exception'])) {
                throw new ApiReplyExcetion($decoded['exception'], $e->getCode());
            } else {
                throw $e;
            }

        }
        $data = json_decode($result, true);
        $user = User::__fromArray($data);
        return $user;

    }

    /**
     * @param User $user
     * @return Finance[]
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function getFinances(User $user)
    {
        try {
            $result = $this->call('/api/v1/secured/divido/finances', null, $user->getToken());
        } catch (ApiReplyExcetion $e) {
            $decoded = json_decode($e->getMessage(), true);
            if (isset($decoded['exception'])) {
                throw new ApiReplyExcetion($decoded['exception'], $e->getCode());
            } else {
                throw $e;
            }

        }
        $data = json_decode($result, true);
        $finances = array();

        foreach ($data as $finance) {
            $finances[] = Finance::__fromArray($finance);
        }

        return $finances;

    }


    public function calculateDeal(User $user, $financeId, $amount, $deposit)
    {
        try {
            $result = $this->call('/api/v1/secured/divido/calculate-deal', ['finance' => $financeId, 'amount' => $amount, 'deposit' => $deposit], $user->getToken());
        } catch (ApiReplyExcetion $e) {
            $decoded = json_decode($e->getMessage(), true);
            if (isset($decoded['exception'])) {
                throw new ApiReplyExcetion($decoded['exception'], $e->getCode());
            } else {
                throw $e;
            }

        }
        $data = json_decode($result, true);
        $deal = Deal::__fromArray($data);
        return $deal;

    }

    public function creditRequest(User $user, CreditRequest $creditRequest)
    {
        try {
            $result = $this->call('/api/v1/secured/divido/credit-request', $creditRequest->createRequest(), $user->getToken());
        } catch (ApiReplyExcetion $e) {
            $decoded = json_decode($e->getMessage(), true);
            if (isset($decoded['exception'])) {
                throw new ApiReplyExcetion(json_encode($decoded), $e->getCode());
            } else {
                throw $e;
            }

        }
        $data = json_decode($result, true);
        $deal = CreditRequestResponse::__fromArray($data);
        return $deal;

    }


    public function call(string $subpath, $data, $authToken = '', string $method = "POST")
    {
        try {
            $this->lastResult = $this->client->request($method, $subpath,
                ['json' => $data, 'headers' => ['X-Auth-Token' => $authToken],"timeout"=>10]);

            $this->lastResponseBody = $this->lastResult->getBody()->getContents();
        } catch (ClientException $e) {
            $response = $e->getResponse()->getBody(true);
            throw new ApiReplyExcetion($response, $e->getResponse()->getStatusCode());
        } catch (\Exception $e) {
            echo get_class($e);
            var_dump($e->getMessage());
            throw new ApiReplyExcetion($e->getMessage());

        }
        return $this->lastResponseBody;

    }

    /**
     * @param User $user
     * @param string $applicationId
     * @return CreditRequestResponse
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function getApplication(User $user, string $applicationId)
    {
        $return=$this->getApplications($user,$applicationId);
        return $return[0];
    }


    /**
     * @param User $user
     * @param string|null $applicationId
     * @param string|null $finance
     * @param string|null $status
     * @return CreditRequestResponse[]
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function getApplications(User $user, ?string $applicationId=null,?string $finance=null,?string $status=null)
    {
        try {
            $result = $this->call('/api/v1/applications?application_id=' . $applicationId."&finance=".$finance."&status=".$status, [], $user->getToken(), "GET");
        } catch (ApiReplyExcetion $e) {
            $decoded = json_decode($e->getMessage(), true);
            if (isset($decoded['exception'])) {
                throw new ApiReplyExcetion(json_encode($decoded), $e->getCode());
            } else {
                throw $e;
            }
        }
        $return = array();
        $result = json_decode($result,true);
        foreach ($result as $item) {
            $return[] = CreditRequestResponse::__fromArray($item);
        }

        return $return;
    }



    public function cancelApplication(User $user, CreditRequestResponse $application)
    {
        if (!$application->isCancelable())
        {
            throw new UnallowedOperationExcetion("Application can not be canceled");
        }

        try {
            $result = $this->call('/api/v1/secured/divido/cancellation', ["application"=>$application->getApplicationId()], $user->getToken());
        } catch (ApiReplyExcetion $e) {
            $decoded = json_decode($e->getMessage(), true);
            if (isset($decoded['exception'])) {
                throw new ApiReplyExcetion(json_encode($decoded), $e->getCode());
            } else {
                throw $e;
            }

        }

        $result = json_decode($result,true);

        return $result;
    }

    public function activateApplication(User $user, CreditRequestResponse $application)
    {
        if (!$application->isCancelable())
        {
            throw new UnallowedOperationExcetion("Application can not be canceled");
        }

        try {
            $result = $this->call('/api/v1/secured/divido/activation', ["application"=>$application->getApplicationId()], $user->getToken());
        } catch (ApiReplyExcetion $e) {
            $decoded = json_decode($e->getMessage(), true);
            if (isset($decoded['exception'])) {
                throw new ApiReplyExcetion(json_encode($decoded), $e->getCode());
            } else {
                throw $e;
            }

        }

        $result = json_decode($result,true);

        return $result;
    }

    public function refundApplication(User $user, CreditRequestResponse $application)
    {
        if (!$application->isForRefund())
        {
            throw new UnallowedOperationExcetion("Application can not be Refunded");
        }

        try {
            $result = $this->call('/api/v1/secured/divido/refund', ["application"=>$application->getApplicationId()], $user->getToken());
        } catch (ApiReplyExcetion $e) {
            $decoded = json_decode($e->getMessage(), true);
            if (isset($decoded['exception'])) {
                throw new ApiReplyExcetion(json_encode($decoded), $e->getCode());
            } else {
                throw $e;
            }

        }

        $result = json_decode($result,true);

        return $result;
    }





    public function _getLastResult()
    {
        return $this->lastResult;
    }


}