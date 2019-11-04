<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Aerospike;

class BaseController extends Controller 
{
    protected $aeroSpike;
    protected $namespace;
    protected $set;
    protected $key;

    public function __construct(Aerospike $aeroSpike)
    {
        //tạo 1 instance của Aerospike dựa trên config singleton (đã đề cập)
        $this->aeroSpike = $aeroSpike;
        $this->namespace = config("cache.stores.aerospike.namespace");
        //khởi tạo key, key này ứng với 1 record trên namespace trên set với PK = 1
        //về sau PK này sẽ được dùng để xoá record trên set
        $this->key = $this->aeroSpike->initKey($this->namespace, $this->set, 1);
    }
}