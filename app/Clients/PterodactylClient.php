<?php


namespace App\Clients;


use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

/**
 * @method Response get(string $string, array $params = [])
 * @method Response post(string $string, array $params = [])
 */
class PterodactylClient
{

    protected $apiUrl;

    protected $key;

    protected $params = [];

    public function __construct()
    {
        $this->apiUrl = config('services.pterodactyl.url');
        $this->key = config('services.pterodactyl.key');
    }

    public function withFilters(array $filters)
    {
        $this->params['filter'] = $filters;
        return $this;
    }

    public function withIncludes($includes)
    {

        $this->params['include'] = $includes;
        return $this;
    }

    public function sortBy(string $key, $descending = false)
    {
        $this->params['sort'] =
            $descending ?
                "-$key"
                : $key;
        return $this;
    }

    public function getUrl(string $url = '')
    {
        return $this->apiUrl . $url;
    }

    public function getClient()
    {
        return Http::timeout(10)->retry(3, 1000)->withToken($this->key);
    }

    public function request(string $method, string $url = '', array $params = [])
    {
        $params = array_merge($this->params, $params);
        $url = $this->getUrl($url);
        return $this->getClient()->$method($url, $params);
    }

    public function __call($method, $args)
    {
        if (in_array($method, ['get', 'post', 'put', 'patch', 'delete'])) {
            return $this->request($method, ...$args);
        }
    }

    public function getUsers(array $params = [])
    {
        return $this->get('users', $params)->json();
    }

    public function createUser(array $data)
    {
        return $this->post('users', $data)->json();
    }

    public function getUser(int $id)
    {
        return $this->get('users/' . $id)->json();
    }
    public function getUserWithServers(int $id)
    {
        return $this->withIncludes('servers')->get('users/' . $id)->json();
    }

    public function createServer($data)
    {
        $data = array_merge([
            'docker_image' => 'quay.io/pterodactyl/core:java',
            'startup' => 'java -Xms128M -Xmx{{SERVER_MEMORY}}M -jar {{SERVER_JARFILE}}',
            "egg" => 3,
            'environment' => [
                'SERVER_JARFILE' => 'server.jar',
                'BUNGEE_VERSION' => 'latest'
            ],
            'limits' => [
                'cpu' => 150,
                'disk' => 1024 * 50,
                'swap' => 0,
                'io' => 500
            ],
            'feature_limits' => [
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3
            ],
            'allocation' => [
                'default' => isset($data['allocation']['default']) ?: $this-> getUnassignedAllocation()['attributes']['id']
            ],
            'start_on_completion' => false,

        ], $data);
//        dump($data);
//        dd($this->post('servers', $data)->body());
        $this->post('servers', $data)->json();
    }

    public function suspendServer($server_id)
    {
        return $this->post('servers/' . $server_id . '/ suspend');
    }

    public function unsuspendServer($server_id)
    {
        return $this->post('servers/' . $server_id . '/unsuspend');
    }

    public function getUnassignedAllocation($node_id = 2)
    {
        $allocations = $this->get('nodes/' . $node_id . '/allocations')->json()['data'];
        return Arr::first($allocations, function ($allocation) {
            return !$allocation['attributes']['assigned'];
        });
    }
}
