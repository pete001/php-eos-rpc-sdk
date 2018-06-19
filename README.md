# The PHP SDK for the EOS RPC API

This is is a work in progress, the intention is to wrap the Chain API in a PHP SDK.

## Background

You can check out the [official docs](https://eosio.github.io/eos/group__eosiorpc.html) but 
beware that some of the newer methods are missing. Also, some of the examples in those 
docs use outdated syntax `(╯°□°）╯︵ ┻━┻`

## Installing

```php
composer require BlockMatrixNetwork/php-eos-rpc-sdk
```

## Configuration

Create a dotenv `.env` file in the project root, with your favourite RPC API host. You can use
`.env.example` as a template:

```
cp .env.example .env
```

## Usage

There is a shiny factory method to auto instantiate all dependencies: 

```php
$api = (new ChainFactory)->api();
```

## Examples

To get you started, there is a simple example runner which covers all API commands.

Just run this via cli to see example output for all commands:

```
cd examples
php chain.php
```

## API Methods

All read only Chain API methods are covered.

### Get Info

Get latest information related to a node

```php
echo $api->getInfo();

{
  "server_version": "db031363",
  "chain_id": "aca376f206b8fc25a6ed44dbdc66547c36c6c33e3a119ffbeaef943642f0e906",
  "head_block_num": 1380988,
  "last_irreversible_block_num": 1380657,
  "last_irreversible_block_id": "0015113163cbe7676c4e56d1758a1ce95e47fa645827b9202de5753031d36b8b",
  "head_block_id": "0015127c94676db3da55ec66210952db7f4db35b0e731abefff1562c201a0666",
  "head_block_time": "2018-06-18T15:38:45.000",
  "head_block_producer": "eoscannonchn",
  "virtual_block_cpu_limit": 200000000,
  "virtual_block_net_limit": 1048576000,
  "block_cpu_limit": 199900,
  "block_net_limit": 1048576
}
```

### Get Block

Get information related to a block

```php
echo $api->getBlock("1337");

{
  "timestamp": "2018-06-09T12:09:21.500",
  "producer": "eosio",
  "confirmed": 0,
  "previous": "00000538b374c1cbfaeed7253ad3075ddc72a28f0a0515301fc1bbed675f2316",
  "transaction_mroot": "0000000000000000000000000000000000000000000000000000000000000000",
  "action_mroot": "bcb9763baa3bbf98ed36379b4be0ecb2d9cd21c75df01729c63b2b021001c10c",
  "schedule_version": 0,
  "new_producers": null,
  "header_extensions": [
    
  ],
  "producer_signature": "SIG_K1_K5jWf36t6j454Hb2fGuV37YTwMTvuQ51ZPBtpru8Ud2axtMTEauWyvtpJuTpnvqzReUndDgEDXvoeEP4jdj2bpnYKBt6g2",
  "transactions": [
    
  ],
  "block_extensions": [
    
  ],
  "id": "00000539d17a03af7126e073be4c4d99a72b7f58793cf2c87b9bfd41b6c711fb",
  "block_num": 1337,
  "ref_block_prefix": 1944069745
}
```

### Get Block Header State

Get information related to a block header state

```php
echo $api->getBlock("0016e48707b181d93117b07451d9837526eba34a9a37125689fb5a73a5d28a38");

{
    "id": "0016e48707b181d93117b07451d9837526eba34a9a37125689fb5a73a5d28a38",
    "block_num": 1500295,
    "header": {
        "timestamp": "2018-06-19T08:13:05.500",
        "producer": "eosyskoreabp",
        "confirmed": 0,
        "previous": "0016e486b20131beb6ea740a8065cdb87cc7fd687f8a3e07514e8f0c7b593f6e",
        "transaction_mroot": "0000000000000000000000000000000000000000000000000000000000000000",
        "action_mroot": "5b50376ffe42ab2ab3489b69de6a457e1e4507a33f9419036d9562a62d7acab2",
        "schedule_version": 15,
        "header_extensions": [],
        "producer_signature": "SIG_K1_KaDRkEPUzvo8jizYdJGSktT2X9UbuDT5o4mpEbbSBWiRoGGyXDfsviH66NCG8kK9d6n7gnQZfRrxV8DwifzZgBWKEByf7T"
    },
    "dpos_proposed_irreversible_blocknum": 1500127,
    "dpos_irreversible_blocknum": 1499959,
    "bft_irreversible_blocknum": 0,
    "pending_schedule_lib_num": 1215077,
    "pending_schedule_hash": "239bbcbb8723a1d93e5ddb8f89c7bd2beb8272121d00d1beaaf233099c568f2d",
    "pending_schedule": {
        "version": 15,
        "producers": []
    },
    "active_schedule": {
        "version": 15,
        "producers": [
            {
                "producer_name": "argentinaeos",
                "block_signing_key": "EOS7jq4FHrFrtCXxpRQ39dBeDMa5AjM4VaRbqBECkSa5aZnizJzrx"
            },
            {
                "producer_name": "bitfinexeos1",
                "block_signing_key": "EOS6sgKjHUFtY1XxxQaMDwfxBac6nDBibVzZHb8LFMVmvSjcCdDhE"
            },
            {
                "producer_name": "cypherglasss",
                "block_signing_key": "EOS5rTrUiqvgu7YCVyKCeQ1QXA7Uo94FZhq7zKcNPqbrCP5u5fQXo"
            },
            {
                "producer_name": "eos42freedom",
                "block_signing_key": "EOS4tw7vH62TcVtMgm2tjXzn9hTuHEBbGPUK2eos42ssY7ip4LTzu"
            },
            {
                "producer_name": "eosasia11111",
                "block_signing_key": "EOS76gG6ATpqfVf5KrVjh3f4JAa4EKzAwWabTucNQ4Xv2TmVAj9bN"
            },
            {
                "producer_name": "eosauthority",
                "block_signing_key": "EOS7dA4bBiwNqwHwoSY9wSVyXfUgKqdLEMv5hC6tBxVsutKkarpUk"
            },
            {
                "producer_name": "eosbeijingbp",
                "block_signing_key": "EOS5dGpcEhwB4VEhhXEcqtZs9EQj5HeetuXDnsAGVHMXHAFdMjbdj"
            },
            {
                "producer_name": "eoscafeblock",
                "block_signing_key": "EOS7MAPWVuYcxNtc2n9e6WaEedEZd9thGVHn2Wpu2PoMhNiteTTqL"
            },
            {
                "producer_name": "eoscanadacom",
                "block_signing_key": "EOS5HYV7rWeRxpZMCooe8YHRFQHKK7ncdmmUMTe3wCMaY2EvyVzUx"
            },
            {
                "producer_name": "eoscannonchn",
                "block_signing_key": "EOS73cTi9V7PNg4ujW5QzoTfRSdhH44MPiUJkUV6m3oGwj7RX7kML"
            },
            {
                "producer_name": "eosdacserver",
                "block_signing_key": "EOS7aBPDACAn1SpJDjmaZHSEUgqfNWdUaNawVZhVuEWUx5aoepJf6"
            },
            {
                "producer_name": "eoseouldotio",
                "block_signing_key": "EOS6SSA4gYCSZ3q9NWpxGsYDv5MWjSwKseyq25RRZexwj8EM6YHDa"
            },
            {
                "producer_name": "eoshuobipool",
                "block_signing_key": "EOS5XKswW26cR5VQeDGwgNb5aixv1AMcKkdDNrC59KzNSBfnH6TR7"
            },
            {
                "producer_name": "eosisgravity",
                "block_signing_key": "EOS55HTTjoxVX1zVpW8pabxygBb1J3SEnG5D8D3y3KgrnSbLpELfE"
            },
            {
                "producer_name": "eosliquideos",
                "block_signing_key": "EOS4v1n2j5kXbCum8LLEc8zQLpeLK9rKVFmsUgLCWgMDN38P6PcrW"
            },
            {
                "producer_name": "eosnewyorkio",
                "block_signing_key": "EOS6GVX8eUqC1gN1293B3ivCNbifbr1BT6gzTFaQBXzWH9QNKVM4X"
            },
            {
                "producer_name": "eosriobrazil",
                "block_signing_key": "EOS7RioGoHQnhv2fJEiciP9Q7J8JgfJYFcyofVkmCqMop8Q1PzgqP"
            },
            {
                "producer_name": "eosstorebest",
                "block_signing_key": "EOS8FrjiXUDAFc8pSQkFejk1zRxyALnqPbYdJsqhAwKMya3tY7TaU"
            },
            {
                "producer_name": "eosswedenorg",
                "block_signing_key": "EOS7SGSBsWhSob6TEric6u3TGodcc1uXFcqSrquJ3Etuqcbb3VnNY"
            },
            {
                "producer_name": "eosyskoreabp",
                "block_signing_key": "EOS7TjKVBkBcSmjsXF4jJfZ1QU9RqVHuBkkcHNJoEcHGR79CoLf2f"
            },
            {
                "producer_name": "zbeosbp11111",
                "block_signing_key": "EOS7rhgVPWWyfMqjSbNdndtCK8Gkza3xnDbUupsPLMZ6gjfQ4nX81"
            }
        ]
    },
    "blockroot_merkle": {
        "_active_nodes": [
            "0ff9123f7b05992f50cdffbc63bdc65b6258592f7cad9b6b5ab2d413daa1f351",
            "79d112919e4a6ff27598d29a57432f0698f23d765335934eb673c2558d1b96c7",
            "e48707c2415324923b9c7f5ada20b0f2d557c89959ef9faf7e0818981d429c4d",
            "61164c2328a98aa1074c9ad72309814b02ef6e7791befb3c634158f268999570",
            "5aaf06f62977d0f96324c15388db23869b11b7a7c454453e6f2778c586dbb452",
            "a3b1c3d83206bc6e8a3043c4163f017062142ea1459905660e9c0b17de09e4de",
            "8370336b86ff7fab3c49478c75d1d8cf92c84c5098e4e486550d9b61e1e25227",
            "2ec074fbf561f49f3314175fa2d74730d0a88c0c7844504d59dca30e2d5ed228",
            "05ca0cc7d413d29ed875e4cef25663cd10ab1a10aa52be8fded57b9b5e710e80",
            "df09da626560ea44cf59d52a5b308d071a42a4776e792b96b2a01c74988a2945",
            "725446d2cc866e6ac2ab74479a9bb0e43df9f0e8bed5ccbeb30e5505618cbbeb"
        ],
        "_node_count": 1500294
    },
    "producer_to_last_produced": [
        [
            "argentinaeos",
            1500067
        ],
        [
            "bitfinexeos1",
            1500079
        ],
        [
            "cypherglasss",
            1500091
        ],
        [
            "eos42freedom",
            1500103
        ],
        [
            "eosasia11111",
            1500115
        ],
        [
            "eosauthority",
            1500127
        ],
        [
            "eosbeijingbp",
            1500139
        ],
        [
            "eoscafeblock",
            1500151
        ],
        [
            "eoscanadacom",
            1500163
        ],
        [
            "eoscannonchn",
            1500175
        ],
        [
            "eosdacserver",
            1500187
        ],
        [
            "eoseouldotio",
            1500199
        ],
        [
            "eoshuobipool",
            1500211
        ],
        [
            "eosisgravity",
            1500223
        ],
        [
            "eosliquideos",
            1500235
        ],
        [
            "eosnewyorkio",
            1500247
        ],
        [
            "eosriobrazil",
            1500259
        ],
        [
            "eosstorebest",
            1500271
        ],
        [
            "eosswedenorg",
            1500283
        ],
        [
            "eosyskoreabp",
            1500295
        ],
        [
            "zbeosbp11111",
            1500055
        ]
    ],
    "producer_to_last_implied_irb": [
        [
            "argentinaeos",
            1499899
        ],
        [
            "bitfinexeos1",
            1499911
        ],
        [
            "cypherglasss",
            1499923
        ],
        [
            "eos42freedom",
            1499935
        ],
        [
            "eosasia11111",
            1499947
        ],
        [
            "eosauthority",
            1499959
        ],
        [
            "eosbeijingbp",
            1499971
        ],
        [
            "eoscafeblock",
            1499983
        ],
        [
            "eoscanadacom",
            1499995
        ],
        [
            "eoscannonchn",
            1500007
        ],
        [
            "eosdacserver",
            1500019
        ],
        [
            "eoseouldotio",
            1500031
        ],
        [
            "eoshuobipool",
            1500043
        ],
        [
            "eosisgravity",
            1500055
        ],
        [
            "eosliquideos",
            1500067
        ],
        [
            "eosnewyorkio",
            1500079
        ],
        [
            "eosriobrazil",
            1500091
        ],
        [
            "eosstorebest",
            1500103
        ],
        [
            "eosswedenorg",
            1500115
        ],
        [
            "eosyskoreabp",
            1500127
        ],
        [
            "zbeosbp11111",
            1499887
        ]
    ],
    "block_signing_key": "EOS7TjKVBkBcSmjsXF4jJfZ1QU9RqVHuBkkcHNJoEcHGR79CoLf2f",
    "confirm_count": [
        1,
        1,
        1,
        1,
        1,
        1,
        1,
        1,
        1,
        1,
        1,
        1,
        2,
        2,
        2,
        2,
        2,
        2,
        2,
        2,
        2,
        2,
        2,
        2,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        4,
        4,
        4,
        4,
        4,
        4,
        4,
        4,
        4,
        4,
        4,
        4,
        5,
        5,
        5,
        5,
        5,
        5,
        5,
        5,
        5,
        5,
        5,
        5,
        6,
        6,
        6,
        6,
        6,
        6,
        6,
        6,
        6,
        6,
        6,
        6,
        7,
        7,
        7,
        7,
        7,
        7,
        7,
        7,
        7,
        7,
        7,
        7,
        8,
        8,
        8,
        8,
        8,
        8,
        8,
        8,
        8,
        8,
        8,
        8,
        9,
        9,
        9,
        9,
        9,
        9,
        9,
        9,
        9,
        9,
        9,
        9,
        10,
        10,
        10,
        10,
        10,
        10,
        10,
        10,
        10,
        10,
        10,
        10,
        11,
        11,
        11,
        11,
        11,
        11,
        11,
        11,
        11,
        11,
        11,
        11,
        12,
        12,
        12,
        12,
        12,
        12,
        12,
        12,
        12,
        12,
        12,
        12,
        13,
        13,
        13,
        13,
        13,
        13,
        13,
        13,
        13,
        13,
        13,
        13,
        14,
        14,
        14,
        14,
        14,
        14,
        14,
        14,
        14,
        14,
        14,
        14
    ],
    "confirmations": []
}
```

### Get Account

Get information related to an account

```php
$api->getAccount("blockmatrix1");

{
  "account_name": "blockmatrix1",
  "head_block_num": 1486555,
  "head_block_time": "2018-06-19T06:18:29.500",
  "privileged": false,
  "last_code_update": "1970-01-01T00:00:00.000",
  "created": "2018-06-10T13:04:15.500",
  "ram_quota": 8146,
  "net_weight": 20000,
  "cpu_weight": 20000,
  "net_limit": {
    "used": 464,
    "available": 909375,
    "max": 909839
  },
  "cpu_limit": {
    "used": 3654,
    "available": 169882,
    "max": 173536
  },
  "ram_usage": 3329,
  "permissions": [
    {
      "perm_name": "active",
      "parent": "owner",
      "required_auth": {
        "threshold": 1,
        "keys": [
          {
            "key": "EOS5CBFDJvqH9zMtmpQd8uzouRjMkwX7vSHyooRLu2bAzjQCM9WLd",
            "weight": 1
          }
        ],
        "accounts": [
          
        ],
        "waits": [
          
        ]
      }
    },
    {
      "perm_name": "owner",
      "parent": "",
      "required_auth": {
        "threshold": 1,
        "keys": [
          {
            "key": "EOS6kGHnZn9pxsLH1D87RomMrpauRBghBLEptmUz8iYzVRP7kBk9B",
            "weight": 1
          }
        ],
        "accounts": [
          
        ],
        "waits": [
          
        ]
      }
    }
  ],
  "total_resources": {
    "owner": "blockmatrix1",
    "net_weight": "2.0000 EOS",
    "cpu_weight": "2.0000 EOS",
    "ram_bytes": 8146
  },
  "self_delegated_bandwidth": null,
  "refund_request": null,
  "voter_info": null
}
```

### Get Code

Fetch smart contract code

```php
echo $api->getCode("eosio.token");

{
    "account_name": "eosio.token",
    "code_hash": "3e0cf4172ab025f9fff5f1db11ee8a34d44779492e1d668ae1dc2d129e865348",
    "wast": "(module\n  (type $0 (func (param i32 i64 i32)))\n  (type $1 (func (param i32 i64 i64 i32 i32)))\n  (type $2 (func (param i32 i64 i32 i32)))\n  (type $3 (func ))\n  (type $4 (func  (result i64)))\n  (type $5 (func (param i64 i64)))\n  (type $6 (func (param i64)))\n  (type $7 (func (param i32 i32)))\n  (type $8 (func (param i64 i64 i64 i64) (result i32)))\n  (type $9 (func (param i64 i64 i64 i64 i32 i32) (result i32)))\n  (type $10 (func (param i32 i32 i32) (result i32)))\n  (type $11 (func (param i64) (result i32)))\n  (type $12 (func (param i32)))\n  (type $13 (func  (result i32)))\n  (type $14 (func (param i32 i32) (result i32)))\n  (type $15 (func (param i32) (result i32)))\n  (type $16 (func (param i32 i32 i32 i32)))\n  (type $17 (func (param i32 i64 i32 i64)))\n  (type $18 (func (param i64 i64 i32 i32)))\n  (type $19 (func (param i32 i64 i32) (result i32)))\n  (type $20 (func (param i64 i64 i64)))\n  (import \"env\" \"abort\" (func $23 ))\n  (import \"env\" \"action_data_size\" (func $24  (result i32)))\n  (import \"env\" \"current_receiver\" (func $25  (result i64)))\n  (import \"env\" \"current_time\" (func $26  (result i64)))\n  (import \"env\" \"db_find_i64\" (func $27 (param i64 i64 i64 i64) (result i32)))\n  (import \"env\" \"db_get_i64\" (func $28 (param i32 i32 i32) (result i32)))\n  (import \"env\" \"db_remove_i64\" (func $29 (param i32)))\n  (import \"env\" \"db_store_i64\" (func $30 (param i64 i64 i64 i64 i32 i32) (result i32)))\n  (import \"env\" \"db_update_i64\" (func $31 (param i32 i64 i32 i32)))\n  (import \"env\" \"eosio_assert\" (func $32 (param i32 i32)))\n  (import \"env\" \"is_account\" (func $33 (param i64) (result i32)))\n  (import \"env\" \"memcpy\" (func $34 (param i32 i32 i32) (result i32)))\n  (import \"env\" \"read_action_data\" (func $35 (param i32 i32) (result i32)))\n  (import \"env\" \"require_auth\" (func $36 (param i64)))\n  (import \"env\" \"require_auth2\" (func $37 (param i64 i64)))\n  (import \"env\" \"require_recipient\" (func $38 (param i64)))\n  (import \"env\" \"send_inline\" (func $39 (param i32 i32)))\n  (export \"memory\" (memory $22))\n  (export \"_ZeqRK11checksum256S1_\" (func $40))\n  (export \"_ZeqRK11checksum160S1_\" (func $41))\n  (export \"_ZneRK11checksum160S1_\" (func $42))\n  (export \"now\" (func $43))\n  (export \"_ZN5eosio12require_authERKNS_16permission_levelE\" (func $44))\n  (export \"_ZN5eosio5token6createEyNS_5assetE\" (func $45))\n  (export \"_ZN5eosio5token5issueEyNS_5assetENSt3__112basic_stringIcNS2_11char_traitsIcEENS2_9allocatorIcEEEE\" (func $51))\n  (export \"_ZN5eosio5token11add_balanceEyNS_5assetEy\" (func $52))\n  (export \"_ZN5eosio5token8transferEyyNS_5assetENSt3__112basic_stringIcNS2_11char_traitsIcEENS2_9allocatorIcEEEE\" (func $62))\n  (export \"_ZN5eosio5token11sub_balanceEyNS_5assetE\" (func $64))\n  (export \"apply\" (func $67))\n  (export \"memcmp\" (func $82))\n  (export \"malloc\" (func $83))\n  (export \"free\" (func $86))\n  (memory $22 1)\n  (table $21 4 4 anyfunc)\n  (elem $21 (i32.const 0)\n    $87 $45 $62 $51)\n  (data $22 (i32.const 4)\n    \"`O\\00\\00\")\n  (data $22 (i32.const 16)\n    \"invalid symbol name\\00\")\n  (data $22 (i32.const 48)\n    \"invalid supply\\00\")\n  (data $22 (i32.const 64)\n    \"max-supply must be positive\\00\")\n  (data $22 (i32.const 96)\n    \"object passed to iterator_to is not in multi_index\\00\")\n  (data $22 (i32.const 160)\n    \"token with symbol already exists\\00\")\n  (data $22 (i32.const 208)\n    \"cannot create objects in table of another contract\\00\")\n  (data $22 (i32.const 272)\n    \"write\\00\")\n  (data $22 (i32.const 288)\n    \"magnitude of asset amount must be less than 2^62\\00\")\n  (data $22 (i32.const 352)\n    \"error reading iterator\\00\")\n  (data $22 (i32.const 384)\n    \"read\\00\")\n  (data $22 (i32.const 400)\n    \"memo has more than 256 bytes\\00\")\n  (data $22 (i32.const 432)\n    \"token with symbol does not exist, create token before issue\\00\")\n  (data $22 (i32.const 496)\n    \"invalid quantity\\00\")\n  (data $22 (i32.const 528)\n    \"must issue positive quantity\\00\")\n  (data $22 (i32.const 560)\n    \"symbol precision mismatch\\00\")\n  (data $22 (i32.const 592)\n    \"quantity exceeds available supply\\00\")\n  (data $22 (i32.const 640)\n    \"object passed to modify is not in multi_index\\00\")\n  (data $22 (i32.const 688)\n    \"cannot modify objects in table of another contract\\00\")\n  (data $22 (i32.const 752)\n    \"attempt to add asset with different symbol\\00\")\n  (data $22 (i32.const 800)\n    \"addition underflow\\00\")\n  (data $22 (i32.const 832)\n    \"addition overflow\\00\")\n  (data $22 (i32.const 864)\n    \"updater cannot change primary key when modifying an object\\00\")\n  (data $22 (i32.const 928)\n    \"active\\00\")\n  (data $22 (i32.const 944)\n    \"cannot pass end iterator to modify\\00\")\n  (data $22 (i32.const 992)\n    \"cannot transfer to self\\00\")\n  (data $22 (i32.const 1024)\n    \"to account does not exist\\00\")\n  (data $22 (i32.const 1056)\n    \"unable to find key\\00\")\n  (data $22 (i32.const 1088)\n    \"must transfer positive quantity\\00\")\n  (data $22 (i32.const 1120)\n    \"no balance object found\\00\")\n  (data $22 (i32.const 1152)\n    \"overdrawn balance\\00\")\n  (data $22 (i32.const 1184)\n    \"attempt to subtract asset with different symbol\\00\")\n  (data $22 (i32.const 1232)\n    \"subtraction underflow\\00\")\n  (data $22 (i32.const 1264)\n    \"subtraction overflow\\00\")\n  (data $22 (i32.const 1296)\n    \"object passed to erase is not in multi_index\\00\")\n  (data $22 (i32.const 1344)\n    \"cannot erase objects in table of another contract\\00\")\n  (data $22 (i32.const 1408)\n    \"attempt to remove object that was not in multi_index\\00\")\n  (data $22 (i32.const 1472)\n    \"onerror\\00\")\n  (data $22 (i32.const 1488)\n    \"eosio\\00\")\n  (data $22 (i32.const 1504)\n    \"onerror action's are only valid from the \\\"eosio\\\" system account\\00\")\n  (data $22 (i32.const 1568)\n    \"get\\00\")\n  (data $22 (i32.const 9984)\n    \"malloc_from_freed was designed to only be called after _heap was\"\n    \" completely allocated\\00\")\n  \n  (func $40\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    get_local $0\n    get_local $1\n    i32.const 32\n    call $82\n    i32.eqz\n    )\n  \n  (func $41\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    get_local $0\n    get_local $1\n    i32.const 32\n    call $82\n    i32.eqz\n    )\n  \n  (func $42\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    get_local $0\n    get_local $1\n    i32.const 32\n    call $82\n    i32.const 0\n    i32.ne\n    )\n  \n  (func $43\n    (result i32)\n    call $26\n    i64.const 1000000\n    i64.div_u\n    i32.wrap\/i64\n    )\n  \n  (func $44\n    (param $0 i32)\n    get_local $0\n    i64.load\n    get_local $0\n    i64.load offset=8\n    call $37\n    )\n  \n  (func $45\n    (param $0 i32)\n    (param $1 i64)\n    (param $2 i32)\n    (local $3 i64)\n    (local $4 i64)\n    (local $5 i64)\n    (local $6 i32)\n    (local $7 i64)\n    (local $8 i32)\n    (local $9 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 128\n    i32.sub\n    tee_local $9\n    i32.store offset=4\n    get_local $0\n    i64.load\n    call $36\n    i32.const 0\n    set_local $8\n    get_local $2\n    i64.load offset=8\n    tee_local $3\n    i64.const 8\n    i64.shr_u\n    tee_local $4\n    set_local $7\n    block $block\n      block $block1\n        loop $loop\n          get_local $7\n          i32.wrap\/i64\n          i32.const 24\n          i32.shl\n          i32.const -1073741825\n          i32.add\n          i32.const 452984830\n          i32.gt_u\n          br_if $block1\n          block $block2\n            get_local $7\n            i64.const 8\n            i64.shr_u\n            tee_local $7\n            i64.const 255\n            i64.and\n            i64.const 0\n            i64.ne\n            br_if $block2\n            loop $loop1\n              get_local $7\n              i64.const 8\n              i64.shr_u\n              tee_local $7\n              i64.const 255\n              i64.and\n              i64.const 0\n              i64.ne\n              br_if $block1\n              get_local $8\n              i32.const 1\n              i32.add\n              tee_local $8\n              i32.const 7\n              i32.lt_s\n              br_if $loop1\n            end ;; $loop1\n          end ;; $block2\n          i32.const 1\n          set_local $6\n          get_local $8\n          i32.const 1\n          i32.add\n          tee_local $8\n          i32.const 7\n          i32.lt_s\n          br_if $loop\n          br $block\n        end ;; $loop\n      end ;; $block1\n      i32.const 0\n      set_local $6\n    end ;; $block\n    get_local $6\n    i32.const 16\n    call $32\n    i32.const 0\n    set_local $6\n    block $block3\n      get_local $2\n      i64.load\n      tee_local $5\n      i64.const 4611686018427387903\n      i64.add\n      i64.const 9223372036854775806\n      i64.gt_u\n      br_if $block3\n      i32.const 0\n      set_local $8\n      get_local $4\n      set_local $7\n      block $block4\n        loop $loop2\n          get_local $7\n          i32.wrap\/i64\n          i32.const 24\n          i32.shl\n          i32.const -1073741825\n          i32.add\n          i32.const 452984830\n          i32.gt_u\n          br_if $block4\n          block $block5\n            get_local $7\n            i64.const 8\n            i64.shr_u\n            tee_local $7\n            i64.const 255\n            i64.and\n            i64.const 0\n            i64.ne\n            br_if $block5\n            loop $loop3\n              get_local $7\n              i64.const 8\n              i64.shr_u\n              tee_local $7\n              i64.const 255\n              i64.and\n              i64.const 0\n              i64.ne\n              br_if $block4\n              get_local $8\n              i32.const 1\n              i32.add\n              tee_local $8\n              i32.const 7\n              i32.lt_s\n              br_if $loop3\n            end ;; $loop3\n          end ;; $block5\n          i32.const 1\n          set_local $6\n          get_local $8\n          i32.const 1\n          i32.add\n          tee_local $8\n          i32.const 7\n          i32.lt_s\n          br_if $loop2\n          br $block3\n        end ;; $loop2\n      end ;; $block4\n      i32.const 0\n      set_local $6\n    end ;; $block3\n    get_local $6\n    i32.const 48\n    call $32\n    get_local $5\n    i64.const 0\n    i64.gt_s\n    i32.const 64\n    call $32\n    get_local $9\n    i32.const 8\n    i32.add\n    i32.const 32\n    i32.add\n    i32.const 0\n    i32.store\n    get_local $9\n    i64.const -1\n    i64.store offset=24\n    get_local $9\n    i64.const 0\n    i64.store offset=32\n    get_local $9\n    get_local $0\n    i64.load\n    tee_local $7\n    i64.store offset=8\n    get_local $9\n    get_local $4\n    i64.store offset=16\n    block $block6\n      block $block7\n        get_local $7\n        get_local $4\n        i64.const -4157508551318700032\n        get_local $4\n        call $27\n        tee_local $8\n        i32.const 0\n        i32.lt_s\n        br_if $block7\n        get_local $9\n        i32.const 8\n        i32.add\n        get_local $8\n        call $46\n        i32.load offset=40\n        get_local $9\n        i32.const 8\n        i32.add\n        i32.eq\n        i32.const 96\n        call $32\n        i32.const 0\n        set_local $8\n        br $block6\n      end ;; $block7\n      i32.const 1\n      set_local $8\n    end ;; $block6\n    get_local $8\n    i32.const 160\n    call $32\n    get_local $0\n    i64.load\n    set_local $4\n    get_local $9\n    i64.load offset=8\n    call $25\n    i64.eq\n    i32.const 208\n    call $32\n    i32.const 56\n    call $76\n    tee_local $8\n    call $47\n    drop\n    get_local $8\n    get_local $9\n    i32.const 8\n    i32.add\n    i32.store offset=40\n    get_local $8\n    get_local $3\n    i64.store offset=8\n    get_local $8\n    i32.const 28\n    i32.add\n    get_local $2\n    i32.const 12\n    i32.add\n    i32.load\n    i32.store\n    get_local $8\n    i32.const 24\n    i32.add\n    get_local $2\n    i32.const 8\n    i32.add\n    i32.load\n    i32.store\n    get_local $8\n    i32.const 20\n    i32.add\n    get_local $2\n    i32.const 4\n    i32.add\n    i32.load\n    i32.store\n    get_local $8\n    get_local $2\n    i32.load\n    i32.store offset=16\n    get_local $8\n    get_local $1\n    i64.store offset=32\n    get_local $9\n    get_local $9\n    i32.const 48\n    i32.add\n    i32.const 40\n    i32.add\n    i32.store offset=96\n    get_local $9\n    get_local $9\n    i32.const 48\n    i32.add\n    i32.store offset=92\n    get_local $9\n    get_local $9\n    i32.const 48\n    i32.add\n    i32.store offset=88\n    get_local $9\n    get_local $9\n    i32.const 88\n    i32.add\n    i32.store offset=104\n    get_local $9\n    get_local $8\n    i32.const 16\n    i32.add\n    i32.store offset=116\n    get_local $9\n    get_local $8\n    i32.store offset=112\n    get_local $9\n    get_local $8\n    i32.const 32\n    i32.add\n    i32.store offset=120\n    get_local $9\n    i32.const 112\n    i32.add\n    get_local $9\n    i32.const 104\n    i32.add\n    call $48\n    get_local $8\n    get_local $9\n    i32.const 8\n    i32.add\n    i32.const 8\n    i32.add\n    i64.load\n    i64.const -4157508551318700032\n    get_local $4\n    get_local $8\n    i64.load offset=8\n    i64.const 8\n    i64.shr_u\n    tee_local $7\n    get_local $9\n    i32.const 48\n    i32.add\n    i32.const 40\n    call $30\n    tee_local $6\n    i32.store offset=44\n    block $block8\n      get_local $7\n      get_local $9\n      i32.const 8\n      i32.add\n      i32.const 16\n      i32.add\n      tee_local $2\n      i64.load\n      i64.lt_u\n      br_if $block8\n      get_local $2\n      get_local $7\n      i64.const 1\n      i64.add\n      i64.store\n    end ;; $block8\n    get_local $9\n    get_local $8\n    i32.store offset=112\n    get_local $9\n    get_local $8\n    i32.const 8\n    i32.add\n    i64.load\n    i64.const 8\n    i64.shr_u\n    tee_local $7\n    i64.store offset=48\n    get_local $9\n    get_local $6\n    i32.store offset=88\n    block $block9\n      block $block10\n        get_local $9\n        i32.const 8\n        i32.add\n        i32.const 28\n        i32.add\n        i32.load\n        tee_local $2\n        get_local $9\n        i32.const 40\n        i32.add\n        i32.load\n        i32.ge_u\n        br_if $block10\n        get_local $2\n        get_local $7\n        i64.store offset=8\n        get_local $2\n        get_local $6\n        i32.store offset=16\n        get_local $9\n        i32.const 0\n        i32.store offset=112\n        get_local $2\n        get_local $8\n        i32.store\n        get_local $9\n        i32.const 36\n        i32.add\n        get_local $2\n        i32.const 24\n        i32.add\n        i32.store\n        br $block9\n      end ;; $block10\n      get_local $9\n      i32.const 32\n      i32.add\n      get_local $9\n      i32.const 112\n      i32.add\n      get_local $9\n      i32.const 48\n      i32.add\n      get_local $9\n      i32.const 88\n      i32.add\n      call $49\n    end ;; $block9\n    get_local $9\n    i32.load offset=112\n    set_local $8\n    get_local $9\n    i32.const 0\n    i32.store offset=112\n    block $block11\n      get_local $8\n      i32.eqz\n      br_if $block11\n      get_local $8\n      call $77\n    end ;; $block11\n    block $block12\n      get_local $9\n      i32.load offset=32\n      tee_local $6\n      i32.eqz\n      br_if $block12\n      block $block13\n        block $block14\n          get_local $9\n          i32.const 36\n          i32.add\n          tee_local $0\n          i32.load\n          tee_local $8\n          get_local $6\n          i32.eq\n          br_if $block14\n          loop $loop4\n            get_local $8\n            i32.const -24\n            i32.add\n            tee_local $8\n            i32.load\n            set_local $2\n            get_local $8\n            i32.const 0\n            i32.store\n            block $block15\n              get_local $2\n              i32.eqz\n              br_if $block15\n              get_local $2\n              call $77\n            end ;; $block15\n            get_local $6\n            get_local $8\n            i32.ne\n            br_if $loop4\n          end ;; $loop4\n          get_local $9\n          i32.const 32\n          i32.add\n          i32.load\n          set_local $8\n          br $block13\n        end ;; $block14\n        get_local $6\n        set_local $8\n      end ;; $block13\n      get_local $0\n      get_local $6\n      i32.store\n      get_local $8\n      call $77\n    end ;; $block12\n    i32.const 0\n    get_local $9\n    i32.const 128\n    i32.add\n    i32.store offset=4\n    )\n  \n  (func $46\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i64)\n    (local $6 i32)\n    (local $7 i32)\n    (local $8 i32)\n    (local $9 i32)\n    i32.const 0\n    i32.load offset=4\n    i32.const 48\n    i32.sub\n    tee_local $9\n    set_local $8\n    i32.const 0\n    get_local $9\n    i32.store offset=4\n    block $block\n      get_local $0\n      i32.const 28\n      i32.add\n      i32.load\n      tee_local $7\n      get_local $0\n      i32.load offset=24\n      tee_local $2\n      i32.eq\n      br_if $block\n      i32.const 0\n      get_local $2\n      i32.sub\n      set_local $3\n      get_local $7\n      i32.const -24\n      i32.add\n      set_local $6\n      loop $loop\n        get_local $6\n        i32.const 16\n        i32.add\n        i32.load\n        get_local $1\n        i32.eq\n        br_if $block\n        get_local $6\n        set_local $7\n        get_local $6\n        i32.const -24\n        i32.add\n        tee_local $4\n        set_local $6\n        get_local $4\n        get_local $3\n        i32.add\n        i32.const -24\n        i32.ne\n        br_if $loop\n      end ;; $loop\n    end ;; $block\n    block $block1\n      block $block2\n        get_local $7\n        get_local $2\n        i32.eq\n        br_if $block2\n        get_local $7\n        i32.const -24\n        i32.add\n        i32.load\n        set_local $6\n        br $block1\n      end ;; $block2\n      get_local $1\n      i32.const 0\n      i32.const 0\n      call $28\n      tee_local $6\n      i32.const 31\n      i32.shr_u\n      i32.const 1\n      i32.xor\n      i32.const 352\n      call $32\n      block $block3\n        block $block4\n          get_local $6\n          i32.const 513\n          i32.lt_u\n          br_if $block4\n          get_local $6\n          call $83\n          set_local $4\n          br $block3\n        end ;; $block4\n        i32.const 0\n        get_local $9\n        get_local $6\n        i32.const 15\n        i32.add\n        i32.const -16\n        i32.and\n        i32.sub\n        tee_local $4\n        i32.store offset=4\n      end ;; $block3\n      get_local $1\n      get_local $4\n      get_local $6\n      call $28\n      drop\n      get_local $8\n      get_local $4\n      i32.store offset=12\n      get_local $8\n      get_local $4\n      i32.store offset=8\n      get_local $8\n      get_local $4\n      get_local $6\n      i32.add\n      i32.store offset=16\n      block $block5\n        get_local $6\n        i32.const 513\n        i32.lt_u\n        br_if $block5\n        get_local $4\n        call $86\n      end ;; $block5\n      i32.const 56\n      call $76\n      tee_local $6\n      call $47\n      drop\n      get_local $6\n      get_local $0\n      i32.store offset=40\n      get_local $8\n      get_local $8\n      i32.const 8\n      i32.add\n      i32.store offset=24\n      get_local $8\n      get_local $6\n      i32.const 16\n      i32.add\n      i32.store offset=36\n      get_local $8\n      get_local $6\n      i32.store offset=32\n      get_local $8\n      get_local $6\n      i32.const 32\n      i32.add\n      i32.store offset=40\n      get_local $8\n      i32.const 32\n      i32.add\n      get_local $8\n      i32.const 24\n      i32.add\n      call $50\n      get_local $6\n      get_local $1\n      i32.store offset=44\n      get_local $8\n      get_local $6\n      i32.store offset=24\n      get_local $8\n      get_local $6\n      i64.load offset=8\n      i64.const 8\n      i64.shr_u\n      tee_local $5\n      i64.store offset=32\n      get_local $8\n      get_local $6\n      i32.load offset=44\n      tee_local $7\n      i32.store offset=4\n      block $block6\n        block $block7\n          get_local $0\n          i32.const 28\n          i32.add\n          tee_local $1\n          i32.load\n          tee_local $4\n          get_local $0\n          i32.const 32\n          i32.add\n          i32.load\n          i32.ge_u\n          br_if $block7\n          get_local $4\n          get_local $5\n          i64.store offset=8\n          get_local $4\n          get_local $7\n          i32.store offset=16\n          get_local $8\n          i32.const 0\n          i32.store offset=24\n          get_local $4\n          get_local $6\n          i32.store\n          get_local $1\n          get_local $4\n          i32.const 24\n          i32.add\n          i32.store\n          br $block6\n        end ;; $block7\n        get_local $0\n        i32.const 24\n        i32.add\n        get_local $8\n        i32.const 24\n        i32.add\n        get_local $8\n        i32.const 32\n        i32.add\n        get_local $8\n        i32.const 4\n        i32.add\n        call $49\n      end ;; $block6\n      get_local $8\n      i32.load offset=24\n      set_local $4\n      get_local $8\n      i32.const 0\n      i32.store offset=24\n      get_local $4\n      i32.eqz\n      br_if $block1\n      get_local $4\n      call $77\n    end ;; $block1\n    i32.const 0\n    get_local $8\n    i32.const 48\n    i32.add\n    i32.store offset=4\n    get_local $6\n    )\n  \n  (func $47\n    (param $0 i32)\n    (result i32)\n    (local $1 i64)\n    (local $2 i32)\n    (local $3 i32)\n    get_local $0\n    i64.const 1397703940\n    i64.store offset=8\n    get_local $0\n    i64.const 0\n    i64.store\n    i32.const 1\n    i32.const 288\n    call $32\n    get_local $0\n    i64.load offset=8\n    i64.const 8\n    i64.shr_u\n    set_local $1\n    i32.const 0\n    set_local $2\n    block $block\n      block $block1\n        loop $loop\n          get_local $1\n          i32.wrap\/i64\n          i32.const 24\n          i32.shl\n          i32.const -1073741825\n          i32.add\n          i32.const 452984830\n          i32.gt_u\n          br_if $block1\n          block $block2\n            get_local $1\n            i64.const 8\n            i64.shr_u\n            tee_local $1\n            i64.const 255\n            i64.and\n            i64.const 0\n            i64.ne\n            br_if $block2\n            loop $loop1\n              get_local $1\n              i64.const 8\n              i64.shr_u\n              tee_local $1\n              i64.const 255\n              i64.and\n              i64.const 0\n              i64.ne\n              br_if $block1\n              get_local $2\n              i32.const 1\n              i32.add\n              tee_local $2\n              i32.const 7\n              i32.lt_s\n              br_if $loop1\n            end ;; $loop1\n          end ;; $block2\n          i32.const 1\n          set_local $3\n          get_local $2\n          i32.const 1\n          i32.add\n          tee_local $2\n          i32.const 7\n          i32.lt_s\n          br_if $loop\n          br $block\n        end ;; $loop\n      end ;; $block1\n      i32.const 0\n      set_local $3\n    end ;; $block\n    get_local $3\n    i32.const 16\n    call $32\n    get_local $0\n    i32.const 24\n    i32.add\n    tee_local $2\n    i64.const 1397703940\n    i64.store\n    get_local $0\n    i64.const 0\n    i64.store offset=16\n    i32.const 1\n    i32.const 288\n    call $32\n    get_local $2\n    i64.load\n    i64.const 8\n    i64.shr_u\n    set_local $1\n    i32.const 0\n    set_local $2\n    block $block3\n      block $block4\n        loop $loop2\n          get_local $1\n          i32.wrap\/i64\n          i32.const 24\n          i32.shl\n          i32.const -1073741825\n          i32.add\n          i32.const 452984830\n          i32.gt_u\n          br_if $block4\n          block $block5\n            get_local $1\n            i64.const 8\n            i64.shr_u\n            tee_local $1\n            i64.const 255\n            i64.and\n            i64.const 0\n            i64.ne\n            br_if $block5\n            loop $loop3\n              get_local $1\n              i64.const 8\n              i64.shr_u\n              tee_local $1\n              i64.const 255\n              i64.and\n              i64.const 0\n              i64.ne\n              br_if $block4\n              get_local $2\n              i32.const 1\n              i32.add\n              tee_local $2\n              i32.const 7\n              i32.lt_s\n              br_if $loop3\n            end ;; $loop3\n          end ;; $block5\n          i32.const 1\n          set_local $3\n          get_local $2\n          i32.const 1\n          i32.add\n          tee_local $2\n          i32.const 7\n          i32.lt_s\n          br_if $loop2\n          br $block3\n        end ;; $loop2\n      end ;; $block4\n      i32.const 0\n      set_local $3\n    end ;; $block3\n    get_local $3\n    i32.const 16\n    call $32\n    get_local $0\n    )\n  \n  (func $48\n    (param $0 i32)\n    (param $1 i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    get_local $0\n    i32.load\n    set_local $3\n    get_local $1\n    i32.load\n    tee_local $2\n    i32.load offset=8\n    get_local $2\n    i32.load offset=4\n    i32.sub\n    i32.const 7\n    i32.gt_s\n    i32.const 272\n    call $32\n    get_local $2\n    i32.load offset=4\n    get_local $3\n    i32.const 8\n    call $34\n    drop\n    get_local $2\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    tee_local $4\n    i32.store offset=4\n    get_local $2\n    i32.load offset=8\n    get_local $4\n    i32.sub\n    i32.const 7\n    i32.gt_s\n    i32.const 272\n    call $32\n    get_local $2\n    i32.load offset=4\n    get_local $3\n    i32.const 8\n    i32.add\n    i32.const 8\n    call $34\n    drop\n    get_local $2\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    i32.store offset=4\n    get_local $0\n    i32.load offset=4\n    set_local $3\n    get_local $1\n    i32.load\n    tee_local $2\n    i32.load offset=8\n    get_local $2\n    i32.load offset=4\n    i32.sub\n    i32.const 7\n    i32.gt_s\n    i32.const 272\n    call $32\n    get_local $2\n    i32.load offset=4\n    get_local $3\n    i32.const 8\n    call $34\n    drop\n    get_local $2\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    tee_local $4\n    i32.store offset=4\n    get_local $2\n    i32.load offset=8\n    get_local $4\n    i32.sub\n    i32.const 7\n    i32.gt_s\n    i32.const 272\n    call $32\n    get_local $2\n    i32.load offset=4\n    get_local $3\n    i32.const 8\n    i32.add\n    i32.const 8\n    call $34\n    drop\n    get_local $2\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    i32.store offset=4\n    get_local $0\n    i32.load offset=8\n    set_local $0\n    get_local $1\n    i32.load\n    tee_local $2\n    i32.load offset=8\n    get_local $2\n    i32.load offset=4\n    i32.sub\n    i32.const 7\n    i32.gt_s\n    i32.const 272\n    call $32\n    get_local $2\n    i32.load offset=4\n    get_local $0\n    i32.const 8\n    call $34\n    drop\n    get_local $2\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    i32.store offset=4\n    )\n  \n  (func $49\n    (param $0 i32)\n    (param $1 i32)\n    (param $2 i32)\n    (param $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i32)\n    block $block\n      block $block1\n        get_local $0\n        i32.load offset=4\n        get_local $0\n        i32.load\n        tee_local $6\n        i32.sub\n        i32.const 24\n        i32.div_s\n        tee_local $4\n        i32.const 1\n        i32.add\n        tee_local $5\n        i32.const 178956971\n        i32.ge_u\n        br_if $block1\n        i32.const 178956970\n        set_local $7\n        block $block2\n          block $block3\n            get_local $0\n            i32.load offset=8\n            get_local $6\n            i32.sub\n            i32.const 24\n            i32.div_s\n            tee_local $6\n            i32.const 89478484\n            i32.gt_u\n            br_if $block3\n            get_local $5\n            get_local $6\n            i32.const 1\n            i32.shl\n            tee_local $7\n            get_local $7\n            get_local $5\n            i32.lt_u\n            select\n            tee_local $7\n            i32.eqz\n            br_if $block2\n          end ;; $block3\n          get_local $7\n          i32.const 24\n          i32.mul\n          call $76\n          set_local $6\n          br $block\n        end ;; $block2\n        i32.const 0\n        set_local $7\n        i32.const 0\n        set_local $6\n        br $block\n      end ;; $block1\n      get_local $0\n      call $80\n      unreachable\n    end ;; $block\n    get_local $1\n    i32.load\n    set_local $5\n    get_local $1\n    i32.const 0\n    i32.store\n    get_local $6\n    get_local $4\n    i32.const 24\n    i32.mul\n    i32.add\n    tee_local $1\n    get_local $5\n    i32.store\n    get_local $1\n    get_local $2\n    i64.load\n    i64.store offset=8\n    get_local $1\n    get_local $3\n    i32.load\n    i32.store offset=16\n    get_local $6\n    get_local $7\n    i32.const 24\n    i32.mul\n    i32.add\n    set_local $4\n    get_local $1\n    i32.const 24\n    i32.add\n    set_local $5\n    block $block4\n      block $block5\n        get_local $0\n        i32.const 4\n        i32.add\n        i32.load\n        tee_local $6\n        get_local $0\n        i32.load\n        tee_local $7\n        i32.eq\n        br_if $block5\n        loop $loop\n          get_local $6\n          i32.const -24\n          i32.add\n          tee_local $2\n          i32.load\n          set_local $3\n          get_local $2\n          i32.const 0\n          i32.store\n          get_local $1\n          i32.const -24\n          i32.add\n          get_local $3\n          i32.store\n          get_local $1\n          i32.const -8\n          i32.add\n          get_local $6\n          i32.const -8\n          i32.add\n          i32.load\n          i32.store\n          get_local $1\n          i32.const -12\n          i32.add\n          get_local $6\n          i32.const -12\n          i32.add\n          i32.load\n          i32.store\n          get_local $1\n          i32.const -16\n          i32.add\n          get_local $6\n          i32.const -16\n          i32.add\n          i32.load\n          i32.store\n          get_local $1\n          i32.const -24\n          i32.add\n          set_local $1\n          get_local $2\n          set_local $6\n          get_local $7\n          get_local $2\n          i32.ne\n          br_if $loop\n        end ;; $loop\n        get_local $0\n        i32.const 4\n        i32.add\n        i32.load\n        set_local $7\n        get_local $0\n        i32.load\n        set_local $6\n        br $block4\n      end ;; $block5\n      get_local $7\n      set_local $6\n    end ;; $block4\n    get_local $0\n    get_local $1\n    i32.store\n    get_local $0\n    i32.const 4\n    i32.add\n    get_local $5\n    i32.store\n    get_local $0\n    i32.const 8\n    i32.add\n    get_local $4\n    i32.store\n    block $block6\n      get_local $7\n      get_local $6\n      i32.eq\n      br_if $block6\n      loop $loop1\n        get_local $7\n        i32.const -24\n        i32.add\n        tee_local $7\n        i32.load\n        set_local $1\n        get_local $7\n        i32.const 0\n        i32.store\n        block $block7\n          get_local $1\n          i32.eqz\n          br_if $block7\n          get_local $1\n          call $77\n        end ;; $block7\n        get_local $6\n        get_local $7\n        i32.ne\n        br_if $loop1\n      end ;; $loop1\n    end ;; $block6\n    block $block8\n      get_local $6\n      i32.eqz\n      br_if $block8\n      get_local $6\n      call $77\n    end ;; $block8\n    )\n  \n  (func $50\n    (param $0 i32)\n    (param $1 i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    get_local $0\n    i32.load\n    set_local $3\n    get_local $1\n    i32.load\n    tee_local $2\n    i32.load offset=8\n    get_local $2\n    i32.load offset=4\n    i32.sub\n    i32.const 7\n    i32.gt_u\n    i32.const 384\n    call $32\n    get_local $3\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    call $34\n    drop\n    get_local $2\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    tee_local $4\n    i32.store offset=4\n    get_local $2\n    i32.load offset=8\n    get_local $4\n    i32.sub\n    i32.const 7\n    i32.gt_u\n    i32.const 384\n    call $32\n    get_local $3\n    i32.const 8\n    i32.add\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    call $34\n    drop\n    get_local $2\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    i32.store offset=4\n    get_local $0\n    i32.load offset=4\n    set_local $3\n    get_local $1\n    i32.load\n    tee_local $2\n    i32.load offset=8\n    get_local $2\n    i32.load offset=4\n    i32.sub\n    i32.const 7\n    i32.gt_u\n    i32.const 384\n    call $32\n    get_local $3\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    call $34\n    drop\n    get_local $2\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    tee_local $4\n    i32.store offset=4\n    get_local $2\n    i32.load offset=8\n    get_local $4\n    i32.sub\n    i32.const 7\n    i32.gt_u\n    i32.const 384\n    call $32\n    get_local $3\n    i32.const 8\n    i32.add\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    call $34\n    drop\n    get_local $2\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    i32.store offset=4\n    get_local $0\n    i32.load offset=8\n    set_local $0\n    get_local $1\n    i32.load\n    tee_local $2\n    i32.load offset=8\n    get_local $2\n    i32.load offset=4\n    i32.sub\n    i32.const 7\n    i32.gt_u\n    i32.const 384\n    call $32\n    get_local $0\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    call $34\n    drop\n    get_local $2\n    get_local $2\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    i32.store offset=4\n    )\n  \n  (func $51\n    (param $0 i32)\n    (param $1 i64)\n    (param $2 i32)\n    (param $3 i32)\n    (local $4 i32)\n    (local $5 i64)\n    (local $6 i64)\n    (local $7 i32)\n    (local $8 i64)\n    (local $9 i32)\n    (local $10 i32)\n    (local $11 i64)\n    (local $12 i64)\n    (local $13 i64)\n    (local $14 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 224\n    i32.sub\n    tee_local $14\n    i32.store offset=4\n    i32.const 0\n    set_local $9\n    get_local $2\n    i64.load offset=8\n    tee_local $11\n    i64.const 8\n    i64.shr_u\n    tee_local $13\n    set_local $8\n    block $block\n      block $block1\n        loop $loop\n          get_local $8\n          i32.wrap\/i64\n          i32.const 24\n          i32.shl\n          i32.const -1073741825\n          i32.add\n          i32.const 452984830\n          i32.gt_u\n          br_if $block1\n          block $block2\n            get_local $8\n            i64.const 8\n            i64.shr_u\n            tee_local $8\n            i64.const 255\n            i64.and\n            i64.const 0\n            i64.ne\n            br_if $block2\n            loop $loop1\n              get_local $8\n              i64.const 8\n              i64.shr_u\n              tee_local $8\n              i64.const 255\n              i64.and\n              i64.const 0\n              i64.ne\n              br_if $block1\n              get_local $9\n              i32.const 1\n              i32.add\n              tee_local $9\n              i32.const 7\n              i32.lt_s\n              br_if $loop1\n            end ;; $loop1\n          end ;; $block2\n          i32.const 1\n          set_local $7\n          get_local $9\n          i32.const 1\n          i32.add\n          tee_local $9\n          i32.const 7\n          i32.lt_s\n          br_if $loop\n          br $block\n        end ;; $loop\n      end ;; $block1\n      i32.const 0\n      set_local $7\n    end ;; $block\n    get_local $7\n    i32.const 16\n    call $32\n    block $block3\n      block $block4\n        get_local $3\n        i32.load8_u\n        tee_local $9\n        i32.const 1\n        i32.and\n        br_if $block4\n        get_local $9\n        i32.const 1\n        i32.shr_u\n        set_local $9\n        br $block3\n      end ;; $block4\n      get_local $3\n      i32.load offset=4\n      set_local $9\n    end ;; $block3\n    get_local $9\n    i32.const 257\n    i32.lt_u\n    i32.const 400\n    call $32\n    i32.const 0\n    set_local $10\n    get_local $14\n    i32.const 88\n    i32.add\n    i32.const 32\n    i32.add\n    i32.const 0\n    i32.store\n    get_local $14\n    i64.const -1\n    i64.store offset=104\n    get_local $14\n    i64.const 0\n    i64.store offset=112\n    get_local $14\n    get_local $0\n    i64.load\n    tee_local $8\n    i64.store offset=88\n    get_local $14\n    get_local $13\n    i64.store offset=96\n    i32.const 0\n    set_local $7\n    block $block5\n      get_local $8\n      get_local $13\n      i64.const -4157508551318700032\n      get_local $13\n      call $27\n      tee_local $9\n      i32.const 0\n      i32.lt_s\n      br_if $block5\n      get_local $14\n      i32.const 88\n      i32.add\n      get_local $9\n      call $46\n      tee_local $7\n      i32.load offset=40\n      get_local $14\n      i32.const 88\n      i32.add\n      i32.eq\n      i32.const 96\n      call $32\n    end ;; $block5\n    get_local $7\n    i32.const 0\n    i32.ne\n    i32.const 432\n    call $32\n    get_local $7\n    i64.load offset=32\n    call $36\n    get_local $7\n    i32.const 32\n    i32.add\n    set_local $4\n    block $block6\n      get_local $2\n      i64.load\n      tee_local $8\n      i64.const 4611686018427387903\n      i64.add\n      i64.const 9223372036854775806\n      i64.gt_u\n      br_if $block6\n      i32.const 0\n      set_local $9\n      block $block7\n        loop $loop2\n          get_local $13\n          i32.wrap\/i64\n          i32.const 24\n          i32.shl\n          i32.const -1073741825\n          i32.add\n          i32.const 452984830\n          i32.gt_u\n          br_if $block7\n          block $block8\n            get_local $13\n            i64.const 8\n            i64.shr_u\n            tee_local $13\n            i64.const 255\n            i64.and\n            i64.const 0\n            i64.ne\n            br_if $block8\n            loop $loop3\n              get_local $13\n              i64.const 8\n              i64.shr_u\n              tee_local $13\n              i64.const 255\n              i64.and\n              i64.const 0\n              i64.ne\n              br_if $block7\n              get_local $9\n              i32.const 1\n              i32.add\n              tee_local $9\n              i32.const 7\n              i32.lt_s\n              br_if $loop3\n            end ;; $loop3\n          end ;; $block8\n          i32.const 1\n          set_local $10\n          get_local $9\n          i32.const 1\n          i32.add\n          tee_local $9\n          i32.const 7\n          i32.lt_s\n          br_if $loop2\n          br $block6\n        end ;; $loop2\n      end ;; $block7\n      i32.const 0\n      set_local $10\n    end ;; $block6\n    get_local $10\n    i32.const 496\n    call $32\n    get_local $8\n    i64.const 0\n    i64.gt_s\n    i32.const 528\n    call $32\n    get_local $11\n    get_local $7\n    i64.load offset=8\n    i64.eq\n    i32.const 560\n    call $32\n    get_local $8\n    get_local $7\n    i64.load offset=16\n    get_local $7\n    i64.load\n    i64.sub\n    i64.le_s\n    i32.const 592\n    call $32\n    get_local $7\n    i32.load offset=40\n    get_local $14\n    i32.const 88\n    i32.add\n    i32.eq\n    i32.const 640\n    call $32\n    get_local $14\n    i64.load offset=88\n    call $25\n    i64.eq\n    i32.const 688\n    call $32\n    get_local $11\n    get_local $7\n    i64.load offset=8\n    tee_local $13\n    i64.eq\n    i32.const 752\n    call $32\n    get_local $7\n    get_local $7\n    i64.load\n    get_local $8\n    i64.add\n    tee_local $8\n    i64.store\n    get_local $8\n    i64.const -4611686018427387904\n    i64.gt_s\n    i32.const 800\n    call $32\n    get_local $7\n    i64.load\n    i64.const 4611686018427387904\n    i64.lt_s\n    i32.const 832\n    call $32\n    get_local $13\n    i64.const 8\n    i64.shr_u\n    tee_local $8\n    get_local $7\n    i64.load offset=8\n    i64.const 8\n    i64.shr_u\n    i64.eq\n    i32.const 864\n    call $32\n    get_local $14\n    get_local $14\n    i32.const 128\n    i32.add\n    i32.const 40\n    i32.add\n    i32.store offset=192\n    get_local $14\n    get_local $14\n    i32.const 128\n    i32.add\n    i32.store offset=188\n    get_local $14\n    get_local $14\n    i32.const 128\n    i32.add\n    i32.store offset=184\n    get_local $14\n    get_local $14\n    i32.const 184\n    i32.add\n    i32.store offset=200\n    get_local $14\n    get_local $7\n    i32.const 16\n    i32.add\n    i32.store offset=212\n    get_local $14\n    get_local $7\n    i32.store offset=208\n    get_local $14\n    get_local $4\n    i32.store offset=216\n    get_local $14\n    i32.const 208\n    i32.add\n    get_local $14\n    i32.const 200\n    i32.add\n    call $48\n    get_local $7\n    i32.load offset=44\n    i64.const 0\n    get_local $14\n    i32.const 128\n    i32.add\n    i32.const 40\n    call $31\n    block $block9\n      get_local $8\n      get_local $14\n      i32.const 88\n      i32.add\n      i32.const 16\n      i32.add\n      tee_local $9\n      i64.load\n      i64.lt_u\n      br_if $block9\n      get_local $9\n      get_local $8\n      i64.const 1\n      i64.add\n      i64.store\n    end ;; $block9\n    get_local $14\n    i32.const 72\n    i32.add\n    i32.const 12\n    i32.add\n    tee_local $9\n    get_local $2\n    i32.const 12\n    i32.add\n    i32.load\n    i32.store\n    get_local $14\n    i32.const 72\n    i32.add\n    i32.const 8\n    i32.add\n    tee_local $7\n    get_local $2\n    i32.const 8\n    i32.add\n    i32.load\n    i32.store\n    get_local $14\n    get_local $2\n    i32.const 4\n    i32.add\n    i32.load\n    i32.store offset=76\n    get_local $14\n    get_local $2\n    i32.load\n    i32.store offset=72\n    get_local $4\n    i64.load\n    set_local $8\n    get_local $14\n    i32.const 8\n    i32.add\n    i32.const 12\n    i32.add\n    get_local $9\n    i32.load\n    i32.store\n    get_local $14\n    i32.const 8\n    i32.add\n    i32.const 8\n    i32.add\n    get_local $7\n    i32.load\n    i32.store\n    get_local $14\n    get_local $14\n    i32.load offset=76\n    i32.store offset=12\n    get_local $14\n    get_local $14\n    i32.load offset=72\n    i32.store offset=8\n    get_local $0\n    get_local $8\n    get_local $14\n    i32.const 8\n    i32.add\n    get_local $8\n    call $52\n    block $block10\n      get_local $4\n      i64.load\n      tee_local $5\n      get_local $1\n      i64.eq\n      br_if $block10\n      get_local $0\n      i64.load\n      set_local $6\n      i64.const 0\n      set_local $8\n      i64.const 59\n      set_local $11\n      i32.const 928\n      set_local $9\n      i64.const 0\n      set_local $12\n      loop $loop4\n        block $block11\n          block $block12\n            block $block13\n              block $block14\n                block $block15\n                  get_local $8\n                  i64.const 5\n                  i64.gt_u\n                  br_if $block15\n                  get_local $9\n                  i32.load8_s\n                  tee_local $7\n                  i32.const -97\n                  i32.add\n                  i32.const 255\n                  i32.and\n                  i32.const 25\n                  i32.gt_u\n                  br_if $block14\n                  get_local $7\n                  i32.const 165\n                  i32.add\n                  set_local $7\n                  br $block13\n                end ;; $block15\n                i64.const 0\n                set_local $13\n                get_local $8\n                i64.const 11\n                i64.le_u\n                br_if $block12\n                br $block11\n              end ;; $block14\n              get_local $7\n              i32.const 208\n              i32.add\n              i32.const 0\n              get_local $7\n              i32.const -49\n              i32.add\n              i32.const 255\n              i32.and\n              i32.const 5\n              i32.lt_u\n              select\n              set_local $7\n            end ;; $block13\n            get_local $7\n            i64.extend_u\/i32\n            i64.const 56\n            i64.shl\n            i64.const 56\n            i64.shr_s\n            set_local $13\n          end ;; $block12\n          get_local $13\n          i64.const 31\n          i64.and\n          get_local $11\n          i64.const 4294967295\n          i64.and\n          i64.shl\n          set_local $13\n        end ;; $block11\n        get_local $9\n        i32.const 1\n        i32.add\n        set_local $9\n        get_local $8\n        i64.const 1\n        i64.add\n        set_local $8\n        get_local $13\n        get_local $12\n        i64.or\n        set_local $12\n        get_local $11\n        i64.const -5\n        i64.add\n        tee_local $11\n        i64.const -6\n        i64.ne\n        br_if $loop4\n      end ;; $loop4\n      get_local $14\n      i32.const 52\n      i32.add\n      get_local $2\n      i32.const 12\n      i32.add\n      i32.load\n      i32.store\n      get_local $14\n      i32.const 24\n      i32.add\n      i32.const 24\n      i32.add\n      tee_local $7\n      get_local $2\n      i32.const 8\n      i32.add\n      i32.load\n      i32.store\n      get_local $14\n      i32.const 44\n      i32.add\n      get_local $2\n      i32.const 4\n      i32.add\n      i32.load\n      i32.store\n      get_local $14\n      get_local $1\n      i64.store offset=32\n      get_local $14\n      get_local $5\n      i64.store offset=24\n      get_local $14\n      get_local $2\n      i32.load\n      i32.store offset=40\n      get_local $14\n      i32.const 56\n      i32.add\n      get_local $3\n      call $81\n      drop\n      i32.const 16\n      call $76\n      tee_local $9\n      get_local $5\n      i64.store\n      get_local $9\n      get_local $12\n      i64.store offset=8\n      get_local $14\n      get_local $9\n      i32.store offset=208\n      get_local $14\n      get_local $9\n      i32.const 16\n      i32.add\n      tee_local $9\n      i32.store offset=216\n      get_local $14\n      get_local $9\n      i32.store offset=212\n      get_local $14\n      get_local $14\n      i64.load offset=24\n      i64.store offset=128\n      get_local $14\n      get_local $14\n      i64.load offset=32\n      i64.store offset=136\n      get_local $14\n      i32.const 128\n      i32.add\n      i32.const 24\n      i32.add\n      get_local $7\n      i64.load\n      i64.store\n      get_local $14\n      get_local $14\n      i64.load offset=40\n      i64.store offset=144\n      get_local $14\n      i32.const 128\n      i32.add\n      i32.const 40\n      i32.add\n      tee_local $7\n      get_local $14\n      i32.const 24\n      i32.add\n      i32.const 40\n      i32.add\n      tee_local $9\n      i32.load\n      i32.store\n      get_local $14\n      get_local $14\n      i64.load offset=56\n      i64.store offset=160\n      get_local $14\n      i32.const 0\n      i32.store offset=56\n      get_local $14\n      i32.const 60\n      i32.add\n      i32.const 0\n      i32.store\n      get_local $9\n      i32.const 0\n      i32.store\n      get_local $6\n      i64.const -3617168760277827584\n      get_local $14\n      i32.const 208\n      i32.add\n      get_local $14\n      i32.const 128\n      i32.add\n      call $53\n      block $block16\n        get_local $14\n        i32.load8_u offset=160\n        i32.const 1\n        i32.and\n        i32.eqz\n        br_if $block16\n        get_local $7\n        i32.load\n        call $77\n      end ;; $block16\n      block $block17\n        get_local $14\n        i32.load offset=208\n        tee_local $9\n        i32.eqz\n        br_if $block17\n        get_local $14\n        get_local $9\n        i32.store offset=212\n        get_local $9\n        call $77\n      end ;; $block17\n      get_local $14\n      i32.const 56\n      i32.add\n      i32.load8_u\n      i32.const 1\n      i32.and\n      i32.eqz\n      br_if $block10\n      get_local $14\n      i32.const 64\n      i32.add\n      i32.load\n      call $77\n    end ;; $block10\n    block $block18\n      get_local $14\n      i32.load offset=112\n      tee_local $2\n      i32.eqz\n      br_if $block18\n      block $block19\n        block $block20\n          get_local $14\n          i32.const 116\n          i32.add\n          tee_local $10\n          i32.load\n          tee_local $9\n          get_local $2\n          i32.eq\n          br_if $block20\n          loop $loop5\n            get_local $9\n            i32.const -24\n            i32.add\n            tee_local $9\n            i32.load\n            set_local $7\n            get_local $9\n            i32.const 0\n            i32.store\n            block $block21\n              get_local $7\n              i32.eqz\n              br_if $block21\n              get_local $7\n              call $77\n            end ;; $block21\n            get_local $2\n            get_local $9\n            i32.ne\n            br_if $loop5\n          end ;; $loop5\n          get_local $14\n          i32.const 112\n          i32.add\n          i32.load\n          set_local $9\n          br $block19\n        end ;; $block20\n        get_local $2\n        set_local $9\n      end ;; $block19\n      get_local $10\n      get_local $2\n      i32.store\n      get_local $9\n      call $77\n    end ;; $block18\n    i32.const 0\n    get_local $14\n    i32.const 224\n    i32.add\n    i32.store offset=4\n    )\n  \n  (func $52\n    (param $0 i32)\n    (param $1 i64)\n    (param $2 i32)\n    (param $3 i64)\n    (local $4 i64)\n    (local $5 i32)\n    (local $6 i64)\n    (local $7 i32)\n    (local $8 i32)\n    (local $9 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 80\n    i32.sub\n    tee_local $9\n    i32.store offset=4\n    i32.const 0\n    set_local $8\n    get_local $9\n    i32.const 8\n    i32.add\n    i32.const 32\n    i32.add\n    i32.const 0\n    i32.store\n    get_local $9\n    i64.const -1\n    i64.store offset=24\n    get_local $9\n    i64.const 0\n    i64.store offset=32\n    get_local $9\n    get_local $0\n    i64.load\n    tee_local $6\n    i64.store offset=8\n    get_local $9\n    get_local $1\n    i64.store offset=16\n    block $block\n      block $block1\n        block $block2\n          block $block3\n            get_local $6\n            get_local $1\n            i64.const 3607749779137757184\n            get_local $2\n            i64.load offset=8\n            tee_local $4\n            i64.const 8\n            i64.shr_u\n            call $27\n            tee_local $0\n            i32.const 0\n            i32.lt_s\n            br_if $block3\n            get_local $9\n            i32.const 8\n            i32.add\n            get_local $0\n            call $60\n            tee_local $8\n            i32.load offset=16\n            get_local $9\n            i32.const 8\n            i32.add\n            i32.eq\n            i32.const 96\n            call $32\n            i32.const 1\n            i32.const 944\n            call $32\n            get_local $8\n            i32.load offset=16\n            get_local $9\n            i32.const 8\n            i32.add\n            i32.eq\n            i32.const 640\n            call $32\n            get_local $9\n            i64.load offset=8\n            call $25\n            i64.eq\n            i32.const 688\n            call $32\n            get_local $4\n            get_local $8\n            i64.load offset=8\n            tee_local $1\n            i64.eq\n            i32.const 752\n            call $32\n            get_local $8\n            get_local $8\n            i64.load\n            get_local $2\n            i64.load\n            i64.add\n            tee_local $6\n            i64.store\n            get_local $6\n            i64.const -4611686018427387904\n            i64.gt_s\n            i32.const 800\n            call $32\n            get_local $8\n            i64.load\n            i64.const 4611686018427387904\n            i64.lt_s\n            i32.const 832\n            call $32\n            get_local $1\n            i64.const 8\n            i64.shr_u\n            tee_local $1\n            get_local $8\n            i64.load offset=8\n            i64.const 8\n            i64.shr_u\n            i64.eq\n            i32.const 864\n            call $32\n            i32.const 1\n            i32.const 272\n            call $32\n            get_local $9\n            i32.const 64\n            i32.add\n            get_local $8\n            i32.const 8\n            call $34\n            drop\n            i32.const 1\n            i32.const 272\n            call $32\n            get_local $9\n            i32.const 64\n            i32.add\n            i32.const 8\n            i32.or\n            get_local $8\n            i32.const 8\n            i32.add\n            i32.const 8\n            call $34\n            drop\n            get_local $8\n            i32.load offset=20\n            i64.const 0\n            get_local $9\n            i32.const 64\n            i32.add\n            i32.const 16\n            call $31\n            get_local $1\n            get_local $9\n            i32.const 8\n            i32.add\n            i32.const 16\n            i32.add\n            tee_local $8\n            i64.load\n            i64.lt_u\n            br_if $block2\n            get_local $8\n            get_local $1\n            i64.const 1\n            i64.add\n            i64.store\n            get_local $9\n            i32.load offset=32\n            tee_local $2\n            br_if $block1\n            br $block\n          end ;; $block3\n          get_local $9\n          i64.load offset=8\n          call $25\n          i64.eq\n          i32.const 208\n          call $32\n          i32.const 32\n          call $76\n          tee_local $0\n          i64.const 1397703940\n          i64.store offset=8\n          get_local $0\n          i64.const 0\n          i64.store\n          i32.const 1\n          i32.const 288\n          call $32\n          get_local $0\n          i32.const 8\n          i32.add\n          set_local $5\n          i64.const 5459781\n          set_local $1\n          block $block4\n            loop $loop\n              i32.const 0\n              set_local $7\n              get_local $1\n              i32.wrap\/i64\n              i32.const 24\n              i32.shl\n              i32.const -1073741825\n              i32.add\n              i32.const 452984830\n              i32.gt_u\n              br_if $block4\n              block $block5\n                get_local $1\n                i64.const 8\n                i64.shr_u\n                tee_local $1\n                i64.const 255\n                i64.and\n                i64.const 0\n                i64.ne\n                br_if $block5\n                loop $loop1\n                  get_local $1\n                  i64.const 8\n                  i64.shr_u\n                  tee_local $1\n                  i64.const 255\n                  i64.and\n                  i64.const 0\n                  i64.ne\n                  br_if $block4\n                  get_local $8\n                  i32.const 1\n                  i32.add\n                  tee_local $8\n                  i32.const 7\n                  i32.lt_s\n                  br_if $loop1\n                end ;; $loop1\n              end ;; $block5\n              i32.const 1\n              set_local $7\n              get_local $8\n              i32.const 1\n              i32.add\n              tee_local $8\n              i32.const 7\n              i32.lt_s\n              br_if $loop\n            end ;; $loop\n          end ;; $block4\n          get_local $7\n          i32.const 16\n          call $32\n          get_local $0\n          get_local $9\n          i32.const 8\n          i32.add\n          i32.store offset=16\n          get_local $0\n          i32.const 8\n          i32.add\n          tee_local $8\n          get_local $2\n          i32.const 8\n          i32.add\n          i64.load\n          i64.store\n          get_local $0\n          get_local $2\n          i64.load\n          i64.store\n          i32.const 1\n          i32.const 272\n          call $32\n          get_local $9\n          i32.const 64\n          i32.add\n          get_local $0\n          i32.const 8\n          call $34\n          drop\n          i32.const 1\n          i32.const 272\n          call $32\n          get_local $9\n          i32.const 64\n          i32.add\n          i32.const 8\n          i32.or\n          get_local $5\n          i32.const 8\n          call $34\n          drop\n          get_local $0\n          get_local $9\n          i32.const 8\n          i32.add\n          i32.const 8\n          i32.add\n          i64.load\n          i64.const 3607749779137757184\n          get_local $3\n          get_local $8\n          i64.load\n          i64.const 8\n          i64.shr_u\n          tee_local $1\n          get_local $9\n          i32.const 64\n          i32.add\n          i32.const 16\n          call $30\n          tee_local $2\n          i32.store offset=20\n          block $block6\n            get_local $1\n            get_local $9\n            i32.const 8\n            i32.add\n            i32.const 16\n            i32.add\n            tee_local $7\n            i64.load\n            i64.lt_u\n            br_if $block6\n            get_local $7\n            get_local $1\n            i64.const 1\n            i64.add\n            i64.store\n          end ;; $block6\n          get_local $9\n          get_local $0\n          i32.store offset=56\n          get_local $9\n          get_local $8\n          i64.load\n          i64.const 8\n          i64.shr_u\n          tee_local $1\n          i64.store offset=64\n          get_local $9\n          get_local $2\n          i32.store offset=52\n          block $block7\n            block $block8\n              get_local $9\n              i32.const 36\n              i32.add\n              tee_local $7\n              i32.load\n              tee_local $8\n              get_local $9\n              i32.const 40\n              i32.add\n              i32.load\n              i32.ge_u\n              br_if $block8\n              get_local $8\n              get_local $1\n              i64.store offset=8\n              get_local $8\n              get_local $2\n              i32.store offset=16\n              get_local $9\n              i32.const 0\n              i32.store offset=56\n              get_local $8\n              get_local $0\n              i32.store\n              get_local $7\n              get_local $8\n              i32.const 24\n              i32.add\n              i32.store\n              br $block7\n            end ;; $block8\n            get_local $9\n            i32.const 32\n            i32.add\n            get_local $9\n            i32.const 56\n            i32.add\n            get_local $9\n            i32.const 64\n            i32.add\n            get_local $9\n            i32.const 52\n            i32.add\n            call $61\n          end ;; $block7\n          get_local $9\n          i32.load offset=56\n          set_local $8\n          get_local $9\n          i32.const 0\n          i32.store offset=56\n          get_local $8\n          i32.eqz\n          br_if $block2\n          get_local $8\n          call $77\n        end ;; $block2\n        get_local $9\n        i32.load offset=32\n        tee_local $2\n        i32.eqz\n        br_if $block\n      end ;; $block1\n      block $block9\n        block $block10\n          get_local $9\n          i32.const 36\n          i32.add\n          tee_local $7\n          i32.load\n          tee_local $8\n          get_local $2\n          i32.eq\n          br_if $block10\n          loop $loop2\n            get_local $8\n            i32.const -24\n            i32.add\n            tee_local $8\n            i32.load\n            set_local $0\n            get_local $8\n            i32.const 0\n            i32.store\n            block $block11\n              get_local $0\n              i32.eqz\n              br_if $block11\n              get_local $0\n              call $77\n            end ;; $block11\n            get_local $2\n            get_local $8\n            i32.ne\n            br_if $loop2\n          end ;; $loop2\n          get_local $9\n          i32.const 32\n          i32.add\n          i32.load\n          set_local $8\n          br $block9\n        end ;; $block10\n        get_local $2\n        set_local $8\n      end ;; $block9\n      get_local $7\n      get_local $2\n      i32.store\n      get_local $8\n      call $77\n    end ;; $block\n    i32.const 0\n    get_local $9\n    i32.const 80\n    i32.add\n    i32.store offset=4\n    )\n  \n  (func $53\n    (param $0 i64)\n    (param $1 i64)\n    (param $2 i32)\n    (param $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i32)\n    (local $8 i32)\n    (local $9 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 96\n    i32.sub\n    tee_local $9\n    i32.store offset=4\n    get_local $9\n    i32.const 0\n    i32.store offset=16\n    get_local $9\n    i64.const 0\n    i64.store offset=8\n    i32.const 0\n    set_local $6\n    i32.const 0\n    set_local $7\n    i32.const 0\n    set_local $8\n    block $block\n      block $block1\n        get_local $2\n        i32.load offset=4\n        get_local $2\n        i32.load\n        i32.sub\n        tee_local $4\n        i32.const 4\n        i32.shr_s\n        tee_local $5\n        i32.eqz\n        br_if $block1\n        get_local $5\n        i32.const 268435456\n        i32.ge_u\n        br_if $block\n        get_local $9\n        i32.const 16\n        i32.add\n        get_local $4\n        call $76\n        tee_local $8\n        get_local $5\n        i32.const 4\n        i32.shl\n        i32.add\n        tee_local $6\n        i32.store\n        get_local $9\n        get_local $8\n        i32.store offset=8\n        get_local $9\n        get_local $8\n        i32.store offset=12\n        block $block2\n          get_local $2\n          i32.const 4\n          i32.add\n          i32.load\n          get_local $2\n          i32.load\n          tee_local $7\n          i32.sub\n          tee_local $2\n          i32.const 1\n          i32.lt_s\n          br_if $block2\n          get_local $8\n          get_local $7\n          get_local $2\n          call $34\n          drop\n          get_local $9\n          get_local $8\n          get_local $2\n          i32.add\n          tee_local $7\n          i32.store offset=12\n          br $block1\n        end ;; $block2\n        get_local $8\n        set_local $7\n      end ;; $block1\n      get_local $9\n      i32.const 44\n      i32.add\n      get_local $7\n      i32.store\n      get_local $9\n      get_local $1\n      i64.store offset=32\n      get_local $9\n      i32.const 16\n      i32.add\n      i32.const 0\n      i32.store\n      get_local $9\n      i32.const 48\n      i32.add\n      get_local $6\n      i32.store\n      get_local $9\n      get_local $0\n      i64.store offset=24\n      get_local $9\n      get_local $8\n      i32.store offset=40\n      get_local $9\n      i64.const 0\n      i64.store offset=8\n      get_local $9\n      i32.const 0\n      i32.store offset=52\n      get_local $9\n      i32.const 24\n      i32.add\n      i32.const 32\n      i32.add\n      i32.const 0\n      i32.store\n      get_local $9\n      i32.const 24\n      i32.add\n      i32.const 36\n      i32.add\n      i32.const 0\n      i32.store\n      get_local $3\n      i32.const 36\n      i32.add\n      i32.load\n      get_local $3\n      i32.load8_u offset=32\n      tee_local $8\n      i32.const 1\n      i32.shr_u\n      get_local $8\n      i32.const 1\n      i32.and\n      select\n      tee_local $2\n      i32.const 32\n      i32.add\n      set_local $8\n      get_local $2\n      i64.extend_u\/i32\n      set_local $0\n      get_local $9\n      i32.const 52\n      i32.add\n      set_local $2\n      loop $loop\n        get_local $8\n        i32.const 1\n        i32.add\n        set_local $8\n        get_local $0\n        i64.const 7\n        i64.shr_u\n        tee_local $0\n        i64.const 0\n        i64.ne\n        br_if $loop\n      end ;; $loop\n      block $block3\n        block $block4\n          get_local $8\n          i32.eqz\n          br_if $block4\n          get_local $2\n          get_local $8\n          call $54\n          get_local $9\n          i32.const 56\n          i32.add\n          i32.load\n          set_local $2\n          get_local $9\n          i32.const 52\n          i32.add\n          i32.load\n          set_local $8\n          br $block3\n        end ;; $block4\n        i32.const 0\n        set_local $2\n        i32.const 0\n        set_local $8\n      end ;; $block3\n      get_local $9\n      get_local $8\n      i32.store offset=84\n      get_local $9\n      get_local $8\n      i32.store offset=80\n      get_local $9\n      get_local $2\n      i32.store offset=88\n      get_local $9\n      get_local $9\n      i32.const 80\n      i32.add\n      i32.store offset=64\n      get_local $9\n      get_local $3\n      i32.store offset=72\n      get_local $9\n      i32.const 72\n      i32.add\n      get_local $9\n      i32.const 64\n      i32.add\n      call $55\n      get_local $9\n      i32.const 80\n      i32.add\n      get_local $9\n      i32.const 24\n      i32.add\n      call $56\n      get_local $9\n      i32.load offset=80\n      tee_local $8\n      get_local $9\n      i32.load offset=84\n      get_local $8\n      i32.sub\n      call $39\n      block $block5\n        get_local $9\n        i32.load offset=80\n        tee_local $8\n        i32.eqz\n        br_if $block5\n        get_local $9\n        get_local $8\n        i32.store offset=84\n        get_local $8\n        call $77\n      end ;; $block5\n      block $block6\n        get_local $9\n        i32.load offset=52\n        tee_local $8\n        i32.eqz\n        br_if $block6\n        get_local $9\n        i32.const 56\n        i32.add\n        get_local $8\n        i32.store\n        get_local $8\n        call $77\n      end ;; $block6\n      block $block7\n        get_local $9\n        i32.load offset=40\n        tee_local $8\n        i32.eqz\n        br_if $block7\n        get_local $9\n        i32.const 44\n        i32.add\n        get_local $8\n        i32.store\n        get_local $8\n        call $77\n      end ;; $block7\n      block $block8\n        get_local $9\n        i32.load offset=8\n        tee_local $8\n        i32.eqz\n        br_if $block8\n        get_local $9\n        get_local $8\n        i32.store offset=12\n        get_local $8\n        call $77\n      end ;; $block8\n      i32.const 0\n      get_local $9\n      i32.const 96\n      i32.add\n      i32.store offset=4\n      return\n    end ;; $block\n    get_local $9\n    i32.const 8\n    i32.add\n    call $80\n    unreachable\n    )\n  \n  (func $54\n    (param $0 i32)\n    (param $1 i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    block $block\n      block $block1\n        block $block2\n          block $block3\n            block $block4\n              get_local $0\n              i32.load offset=8\n              tee_local $2\n              get_local $0\n              i32.load offset=4\n              tee_local $6\n              i32.sub\n              get_local $1\n              i32.ge_u\n              br_if $block4\n              get_local $6\n              get_local $0\n              i32.load\n              tee_local $5\n              i32.sub\n              tee_local $3\n              get_local $1\n              i32.add\n              tee_local $4\n              i32.const -1\n              i32.le_s\n              br_if $block2\n              i32.const 2147483647\n              set_local $6\n              block $block5\n                get_local $2\n                get_local $5\n                i32.sub\n                tee_local $2\n                i32.const 1073741822\n                i32.gt_u\n                br_if $block5\n                get_local $4\n                get_local $2\n                i32.const 1\n                i32.shl\n                tee_local $6\n                get_local $6\n                get_local $4\n                i32.lt_u\n                select\n                tee_local $6\n                i32.eqz\n                br_if $block3\n              end ;; $block5\n              get_local $6\n              call $76\n              set_local $2\n              br $block1\n            end ;; $block4\n            get_local $0\n            i32.const 4\n            i32.add\n            set_local $0\n            loop $loop\n              get_local $6\n              i32.const 0\n              i32.store8\n              get_local $0\n              get_local $0\n              i32.load\n              i32.const 1\n              i32.add\n              tee_local $6\n              i32.store\n              get_local $1\n              i32.const -1\n              i32.add\n              tee_local $1\n              br_if $loop\n              br $block\n            end ;; $loop\n          end ;; $block3\n          i32.const 0\n          set_local $6\n          i32.const 0\n          set_local $2\n          br $block1\n        end ;; $block2\n        get_local $0\n        call $80\n        unreachable\n      end ;; $block1\n      get_local $2\n      get_local $6\n      i32.add\n      set_local $4\n      get_local $2\n      get_local $3\n      i32.add\n      tee_local $5\n      set_local $6\n      loop $loop1\n        get_local $6\n        i32.const 0\n        i32.store8\n        get_local $6\n        i32.const 1\n        i32.add\n        set_local $6\n        get_local $1\n        i32.const -1\n        i32.add\n        tee_local $1\n        br_if $loop1\n      end ;; $loop1\n      get_local $5\n      get_local $0\n      i32.const 4\n      i32.add\n      tee_local $3\n      i32.load\n      get_local $0\n      i32.load\n      tee_local $1\n      i32.sub\n      tee_local $2\n      i32.sub\n      set_local $5\n      block $block6\n        get_local $2\n        i32.const 1\n        i32.lt_s\n        br_if $block6\n        get_local $5\n        get_local $1\n        get_local $2\n        call $34\n        drop\n        get_local $0\n        i32.load\n        set_local $1\n      end ;; $block6\n      get_local $0\n      get_local $5\n      i32.store\n      get_local $3\n      get_local $6\n      i32.store\n      get_local $0\n      i32.const 8\n      i32.add\n      get_local $4\n      i32.store\n      get_local $1\n      i32.eqz\n      br_if $block\n      get_local $1\n      call $77\n      return\n    end ;; $block\n    )\n  \n  (func $55\n    (param $0 i32)\n    (param $1 i32)\n    (local $2 i32)\n    (local $3 i32)\n    get_local $0\n    i32.load\n    set_local $2\n    get_local $1\n    i32.load\n    tee_local $3\n    i32.load offset=8\n    get_local $3\n    i32.load offset=4\n    i32.sub\n    i32.const 7\n    i32.gt_s\n    i32.const 272\n    call $32\n    get_local $3\n    i32.load offset=4\n    get_local $2\n    i32.const 8\n    call $34\n    drop\n    get_local $3\n    get_local $3\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    i32.store offset=4\n    get_local $0\n    i32.load\n    set_local $0\n    get_local $1\n    i32.load\n    tee_local $3\n    i32.load offset=8\n    get_local $3\n    i32.load offset=4\n    i32.sub\n    i32.const 7\n    i32.gt_s\n    i32.const 272\n    call $32\n    get_local $3\n    i32.load offset=4\n    get_local $0\n    i32.const 8\n    i32.add\n    i32.const 8\n    call $34\n    drop\n    get_local $3\n    get_local $3\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    i32.store offset=4\n    get_local $1\n    i32.load\n    tee_local $3\n    i32.load offset=8\n    get_local $3\n    i32.load offset=4\n    i32.sub\n    i32.const 7\n    i32.gt_s\n    i32.const 272\n    call $32\n    get_local $3\n    i32.load offset=4\n    get_local $0\n    i32.const 16\n    i32.add\n    i32.const 8\n    call $34\n    drop\n    get_local $3\n    get_local $3\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    tee_local $2\n    i32.store offset=4\n    get_local $3\n    i32.load offset=8\n    get_local $2\n    i32.sub\n    i32.const 7\n    i32.gt_s\n    i32.const 272\n    call $32\n    get_local $3\n    i32.load offset=4\n    get_local $0\n    i32.const 24\n    i32.add\n    i32.const 8\n    call $34\n    drop\n    get_local $3\n    get_local $3\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    i32.store offset=4\n    get_local $1\n    i32.load\n    get_local $0\n    i32.const 32\n    i32.add\n    call $59\n    drop\n    )\n  \n  (func $56\n    (param $0 i32)\n    (param $1 i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i64)\n    (local $7 i32)\n    (local $8 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 16\n    i32.sub\n    tee_local $8\n    i32.store offset=4\n    get_local $0\n    i32.const 0\n    i32.store offset=8\n    get_local $0\n    i64.const 0\n    i64.store align=4\n    i32.const 16\n    set_local $5\n    get_local $1\n    i32.const 16\n    i32.add\n    set_local $2\n    get_local $1\n    i32.const 20\n    i32.add\n    i32.load\n    tee_local $7\n    get_local $1\n    i32.load offset=16\n    tee_local $3\n    i32.sub\n    tee_local $4\n    i32.const 4\n    i32.shr_s\n    i64.extend_u\/i32\n    set_local $6\n    loop $loop\n      get_local $5\n      i32.const 1\n      i32.add\n      set_local $5\n      get_local $6\n      i64.const 7\n      i64.shr_u\n      tee_local $6\n      i64.const 0\n      i64.ne\n      br_if $loop\n    end ;; $loop\n    block $block\n      get_local $3\n      get_local $7\n      i32.eq\n      br_if $block\n      get_local $4\n      i32.const -16\n      i32.and\n      get_local $5\n      i32.add\n      set_local $5\n    end ;; $block\n    get_local $1\n    i32.load offset=28\n    tee_local $7\n    get_local $5\n    i32.sub\n    get_local $1\n    i32.const 32\n    i32.add\n    i32.load\n    tee_local $3\n    i32.sub\n    set_local $5\n    get_local $1\n    i32.const 28\n    i32.add\n    set_local $4\n    get_local $3\n    get_local $7\n    i32.sub\n    i64.extend_u\/i32\n    set_local $6\n    loop $loop1\n      get_local $5\n      i32.const -1\n      i32.add\n      set_local $5\n      get_local $6\n      i64.const 7\n      i64.shr_u\n      tee_local $6\n      i64.const 0\n      i64.ne\n      br_if $loop1\n    end ;; $loop1\n    i32.const 0\n    set_local $7\n    block $block1\n      block $block2\n        get_local $5\n        i32.eqz\n        br_if $block2\n        get_local $0\n        i32.const 0\n        get_local $5\n        i32.sub\n        call $54\n        get_local $0\n        i32.const 4\n        i32.add\n        i32.load\n        set_local $7\n        get_local $0\n        i32.load\n        set_local $5\n        br $block1\n      end ;; $block2\n      i32.const 0\n      set_local $5\n    end ;; $block1\n    get_local $8\n    get_local $5\n    i32.store\n    get_local $8\n    get_local $7\n    i32.store offset=8\n    get_local $7\n    get_local $5\n    i32.sub\n    i32.const 7\n    i32.gt_s\n    i32.const 272\n    call $32\n    get_local $5\n    get_local $1\n    i32.const 8\n    call $34\n    drop\n    get_local $7\n    get_local $5\n    i32.const 8\n    i32.add\n    tee_local $0\n    i32.sub\n    i32.const 7\n    i32.gt_s\n    i32.const 272\n    call $32\n    get_local $0\n    get_local $1\n    i32.const 8\n    i32.add\n    i32.const 8\n    call $34\n    drop\n    get_local $8\n    get_local $5\n    i32.const 16\n    i32.add\n    i32.store offset=4\n    get_local $8\n    get_local $2\n    call $57\n    get_local $4\n    call $58\n    drop\n    i32.const 0\n    get_local $8\n    i32.const 16\n    i32.add\n    i32.store offset=4\n    )\n  \n  (func $57\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i64)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 16\n    i32.sub\n    tee_local $7\n    i32.store offset=4\n    get_local $1\n    i32.load offset=4\n    get_local $1\n    i32.load\n    i32.sub\n    i32.const 4\n    i32.shr_s\n    i64.extend_u\/i32\n    set_local $4\n    get_local $0\n    i32.load offset=4\n    set_local $5\n    get_local $0\n    i32.const 8\n    i32.add\n    set_local $2\n    loop $loop\n      get_local $4\n      i32.wrap\/i64\n      set_local $3\n      get_local $7\n      get_local $4\n      i64.const 7\n      i64.shr_u\n      tee_local $4\n      i64.const 0\n      i64.ne\n      tee_local $6\n      i32.const 7\n      i32.shl\n      get_local $3\n      i32.const 127\n      i32.and\n      i32.or\n      i32.store8 offset=15\n      get_local $2\n      i32.load\n      get_local $5\n      i32.sub\n      i32.const 0\n      i32.gt_s\n      i32.const 272\n      call $32\n      get_local $0\n      i32.const 4\n      i32.add\n      tee_local $3\n      i32.load\n      get_local $7\n      i32.const 15\n      i32.add\n      i32.const 1\n      call $34\n      drop\n      get_local $3\n      get_local $3\n      i32.load\n      i32.const 1\n      i32.add\n      tee_local $5\n      i32.store\n      get_local $6\n      br_if $loop\n    end ;; $loop\n    block $block\n      get_local $1\n      i32.load\n      tee_local $6\n      get_local $1\n      i32.const 4\n      i32.add\n      i32.load\n      tee_local $1\n      i32.eq\n      br_if $block\n      get_local $0\n      i32.const 4\n      i32.add\n      set_local $3\n      loop $loop1\n        get_local $0\n        i32.const 8\n        i32.add\n        tee_local $2\n        i32.load\n        get_local $5\n        i32.sub\n        i32.const 7\n        i32.gt_s\n        i32.const 272\n        call $32\n        get_local $3\n        i32.load\n        get_local $6\n        i32.const 8\n        call $34\n        drop\n        get_local $3\n        get_local $3\n        i32.load\n        i32.const 8\n        i32.add\n        tee_local $5\n        i32.store\n        get_local $2\n        i32.load\n        get_local $5\n        i32.sub\n        i32.const 7\n        i32.gt_s\n        i32.const 272\n        call $32\n        get_local $3\n        i32.load\n        get_local $6\n        i32.const 8\n        i32.add\n        i32.const 8\n        call $34\n        drop\n        get_local $3\n        get_local $3\n        i32.load\n        i32.const 8\n        i32.add\n        tee_local $5\n        i32.store\n        get_local $6\n        i32.const 16\n        i32.add\n        tee_local $6\n        get_local $1\n        i32.ne\n        br_if $loop1\n      end ;; $loop1\n    end ;; $block\n    i32.const 0\n    get_local $7\n    i32.const 16\n    i32.add\n    i32.store offset=4\n    get_local $0\n    )\n  \n  (func $58\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i64)\n    (local $8 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 16\n    i32.sub\n    tee_local $8\n    i32.store offset=4\n    get_local $1\n    i32.load offset=4\n    get_local $1\n    i32.load\n    i32.sub\n    i64.extend_u\/i32\n    set_local $7\n    get_local $0\n    i32.load offset=4\n    set_local $6\n    get_local $0\n    i32.const 8\n    i32.add\n    set_local $4\n    get_local $0\n    i32.const 4\n    i32.add\n    set_local $5\n    loop $loop\n      get_local $7\n      i32.wrap\/i64\n      set_local $2\n      get_local $8\n      get_local $7\n      i64.const 7\n      i64.shr_u\n      tee_local $7\n      i64.const 0\n      i64.ne\n      tee_local $3\n      i32.const 7\n      i32.shl\n      get_local $2\n      i32.const 127\n      i32.and\n      i32.or\n      i32.store8 offset=15\n      get_local $4\n      i32.load\n      get_local $6\n      i32.sub\n      i32.const 0\n      i32.gt_s\n      i32.const 272\n      call $32\n      get_local $5\n      i32.load\n      get_local $8\n      i32.const 15\n      i32.add\n      i32.const 1\n      call $34\n      drop\n      get_local $5\n      get_local $5\n      i32.load\n      i32.const 1\n      i32.add\n      tee_local $6\n      i32.store\n      get_local $3\n      br_if $loop\n    end ;; $loop\n    get_local $0\n    i32.const 8\n    i32.add\n    i32.load\n    get_local $6\n    i32.sub\n    get_local $1\n    i32.const 4\n    i32.add\n    i32.load\n    get_local $1\n    i32.load\n    tee_local $2\n    i32.sub\n    tee_local $5\n    i32.ge_s\n    i32.const 272\n    call $32\n    get_local $0\n    i32.const 4\n    i32.add\n    tee_local $6\n    i32.load\n    get_local $2\n    get_local $5\n    call $34\n    drop\n    get_local $6\n    get_local $6\n    i32.load\n    get_local $5\n    i32.add\n    i32.store\n    i32.const 0\n    get_local $8\n    i32.const 16\n    i32.add\n    i32.store offset=4\n    get_local $0\n    )\n  \n  (func $59\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i64)\n    (local $8 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 16\n    i32.sub\n    tee_local $8\n    i32.store offset=4\n    get_local $1\n    i32.load offset=4\n    get_local $1\n    i32.load8_u\n    tee_local $5\n    i32.const 1\n    i32.shr_u\n    get_local $5\n    i32.const 1\n    i32.and\n    select\n    i64.extend_u\/i32\n    set_local $7\n    get_local $0\n    i32.load offset=4\n    set_local $6\n    get_local $0\n    i32.const 8\n    i32.add\n    set_local $4\n    get_local $0\n    i32.const 4\n    i32.add\n    set_local $5\n    loop $loop\n      get_local $7\n      i32.wrap\/i64\n      set_local $2\n      get_local $8\n      get_local $7\n      i64.const 7\n      i64.shr_u\n      tee_local $7\n      i64.const 0\n      i64.ne\n      tee_local $3\n      i32.const 7\n      i32.shl\n      get_local $2\n      i32.const 127\n      i32.and\n      i32.or\n      i32.store8 offset=15\n      get_local $4\n      i32.load\n      get_local $6\n      i32.sub\n      i32.const 0\n      i32.gt_s\n      i32.const 272\n      call $32\n      get_local $5\n      i32.load\n      get_local $8\n      i32.const 15\n      i32.add\n      i32.const 1\n      call $34\n      drop\n      get_local $5\n      get_local $5\n      i32.load\n      i32.const 1\n      i32.add\n      tee_local $6\n      i32.store\n      get_local $3\n      br_if $loop\n    end ;; $loop\n    block $block\n      get_local $1\n      i32.const 4\n      i32.add\n      i32.load\n      get_local $1\n      i32.load8_u\n      tee_local $5\n      i32.const 1\n      i32.shr_u\n      get_local $5\n      i32.const 1\n      i32.and\n      tee_local $2\n      select\n      tee_local $5\n      i32.eqz\n      br_if $block\n      get_local $1\n      i32.load offset=8\n      set_local $3\n      get_local $0\n      i32.const 8\n      i32.add\n      i32.load\n      get_local $6\n      i32.sub\n      get_local $5\n      i32.ge_s\n      i32.const 272\n      call $32\n      get_local $0\n      i32.const 4\n      i32.add\n      tee_local $6\n      i32.load\n      get_local $3\n      get_local $1\n      i32.const 1\n      i32.add\n      get_local $2\n      select\n      get_local $5\n      call $34\n      drop\n      get_local $6\n      get_local $6\n      i32.load\n      get_local $5\n      i32.add\n      i32.store\n    end ;; $block\n    i32.const 0\n    get_local $8\n    i32.const 16\n    i32.add\n    i32.store offset=4\n    get_local $0\n    )\n  \n  (func $60\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i32)\n    (local $8 i64)\n    (local $9 i32)\n    (local $10 i32)\n    i32.const 0\n    i32.load offset=4\n    i32.const 32\n    i32.sub\n    tee_local $10\n    set_local $9\n    i32.const 0\n    get_local $10\n    i32.store offset=4\n    block $block\n      get_local $0\n      i32.const 28\n      i32.add\n      i32.load\n      tee_local $7\n      get_local $0\n      i32.load offset=24\n      tee_local $3\n      i32.eq\n      br_if $block\n      i32.const 0\n      get_local $3\n      i32.sub\n      set_local $4\n      get_local $7\n      i32.const -24\n      i32.add\n      set_local $6\n      loop $loop\n        get_local $6\n        i32.const 16\n        i32.add\n        i32.load\n        get_local $1\n        i32.eq\n        br_if $block\n        get_local $6\n        set_local $7\n        get_local $6\n        i32.const -24\n        i32.add\n        tee_local $5\n        set_local $6\n        get_local $5\n        get_local $4\n        i32.add\n        i32.const -24\n        i32.ne\n        br_if $loop\n      end ;; $loop\n    end ;; $block\n    block $block1\n      block $block2\n        get_local $7\n        get_local $3\n        i32.eq\n        br_if $block2\n        get_local $7\n        i32.const -24\n        i32.add\n        i32.load\n        set_local $5\n        br $block1\n      end ;; $block2\n      get_local $1\n      i32.const 0\n      i32.const 0\n      call $28\n      tee_local $7\n      i32.const 31\n      i32.shr_u\n      i32.const 1\n      i32.xor\n      i32.const 352\n      call $32\n      block $block3\n        block $block4\n          get_local $7\n          i32.const 512\n          i32.le_u\n          br_if $block4\n          get_local $1\n          get_local $7\n          call $83\n          tee_local $3\n          get_local $7\n          call $28\n          drop\n          get_local $3\n          call $86\n          br $block3\n        end ;; $block4\n        i32.const 0\n        get_local $10\n        get_local $7\n        i32.const 15\n        i32.add\n        i32.const -16\n        i32.and\n        i32.sub\n        tee_local $3\n        i32.store offset=4\n        get_local $1\n        get_local $3\n        get_local $7\n        call $28\n        drop\n      end ;; $block3\n      get_local $0\n      i32.const 24\n      i32.add\n      set_local $2\n      i32.const 32\n      call $76\n      tee_local $5\n      i64.const 1397703940\n      i64.store offset=8\n      get_local $5\n      i64.const 0\n      i64.store\n      i32.const 1\n      i32.const 288\n      call $32\n      get_local $5\n      i32.const 8\n      i32.add\n      set_local $10\n      i64.const 5459781\n      set_local $8\n      i32.const 0\n      set_local $6\n      block $block5\n        block $block6\n          loop $loop1\n            get_local $8\n            i32.wrap\/i64\n            i32.const 24\n            i32.shl\n            i32.const -1073741825\n            i32.add\n            i32.const 452984830\n            i32.gt_u\n            br_if $block6\n            block $block7\n              get_local $8\n              i64.const 8\n              i64.shr_u\n              tee_local $8\n              i64.const 255\n              i64.and\n              i64.const 0\n              i64.ne\n              br_if $block7\n              loop $loop2\n                get_local $8\n                i64.const 8\n                i64.shr_u\n                tee_local $8\n                i64.const 255\n                i64.and\n                i64.const 0\n                i64.ne\n                br_if $block6\n                get_local $6\n                i32.const 1\n                i32.add\n                tee_local $6\n                i32.const 7\n                i32.lt_s\n                br_if $loop2\n              end ;; $loop2\n            end ;; $block7\n            i32.const 1\n            set_local $4\n            get_local $6\n            i32.const 1\n            i32.add\n            tee_local $6\n            i32.const 7\n            i32.lt_s\n            br_if $loop1\n            br $block5\n          end ;; $loop1\n        end ;; $block6\n        i32.const 0\n        set_local $4\n      end ;; $block5\n      get_local $4\n      i32.const 16\n      call $32\n      get_local $5\n      get_local $0\n      i32.store offset=16\n      get_local $7\n      i32.const 7\n      i32.gt_u\n      i32.const 384\n      call $32\n      get_local $5\n      get_local $3\n      i32.const 8\n      call $34\n      drop\n      get_local $7\n      i32.const -8\n      i32.and\n      i32.const 8\n      i32.ne\n      i32.const 384\n      call $32\n      get_local $10\n      get_local $3\n      i32.const 8\n      i32.add\n      i32.const 8\n      call $34\n      drop\n      get_local $5\n      get_local $1\n      i32.store offset=20\n      get_local $9\n      get_local $5\n      i32.store offset=24\n      get_local $9\n      get_local $5\n      i32.const 8\n      i32.add\n      i64.load\n      i64.const 8\n      i64.shr_u\n      tee_local $8\n      i64.store offset=16\n      get_local $9\n      get_local $5\n      i32.load offset=20\n      tee_local $7\n      i32.store offset=12\n      block $block8\n        block $block9\n          get_local $0\n          i32.const 28\n          i32.add\n          tee_local $1\n          i32.load\n          tee_local $6\n          get_local $0\n          i32.const 32\n          i32.add\n          i32.load\n          i32.ge_u\n          br_if $block9\n          get_local $6\n          get_local $8\n          i64.store offset=8\n          get_local $6\n          get_local $7\n          i32.store offset=16\n          get_local $9\n          i32.const 0\n          i32.store offset=24\n          get_local $6\n          get_local $5\n          i32.store\n          get_local $1\n          get_local $6\n          i32.const 24\n          i32.add\n          i32.store\n          br $block8\n        end ;; $block9\n        get_local $2\n        get_local $9\n        i32.const 24\n        i32.add\n        get_local $9\n        i32.const 16\n        i32.add\n        get_local $9\n        i32.const 12\n        i32.add\n        call $61\n      end ;; $block8\n      get_local $9\n      i32.load offset=24\n      set_local $6\n      get_local $9\n      i32.const 0\n      i32.store offset=24\n      get_local $6\n      i32.eqz\n      br_if $block1\n      get_local $6\n      call $77\n    end ;; $block1\n    i32.const 0\n    get_local $9\n    i32.const 32\n    i32.add\n    i32.store offset=4\n    get_local $5\n    )\n  \n  (func $61\n    (param $0 i32)\n    (param $1 i32)\n    (param $2 i32)\n    (param $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i32)\n    block $block\n      block $block1\n        get_local $0\n        i32.load offset=4\n        get_local $0\n        i32.load\n        tee_local $6\n        i32.sub\n        i32.const 24\n        i32.div_s\n        tee_local $4\n        i32.const 1\n        i32.add\n        tee_local $5\n        i32.const 178956971\n        i32.ge_u\n        br_if $block1\n        i32.const 178956970\n        set_local $7\n        block $block2\n          block $block3\n            get_local $0\n            i32.load offset=8\n            get_local $6\n            i32.sub\n            i32.const 24\n            i32.div_s\n            tee_local $6\n            i32.const 89478484\n            i32.gt_u\n            br_if $block3\n            get_local $5\n            get_local $6\n            i32.const 1\n            i32.shl\n            tee_local $7\n            get_local $7\n            get_local $5\n            i32.lt_u\n            select\n            tee_local $7\n            i32.eqz\n            br_if $block2\n          end ;; $block3\n          get_local $7\n          i32.const 24\n          i32.mul\n          call $76\n          set_local $6\n          br $block\n        end ;; $block2\n        i32.const 0\n        set_local $7\n        i32.const 0\n        set_local $6\n        br $block\n      end ;; $block1\n      get_local $0\n      call $80\n      unreachable\n    end ;; $block\n    get_local $1\n    i32.load\n    set_local $5\n    get_local $1\n    i32.const 0\n    i32.store\n    get_local $6\n    get_local $4\n    i32.const 24\n    i32.mul\n    i32.add\n    tee_local $1\n    get_local $5\n    i32.store\n    get_local $1\n    get_local $2\n    i64.load\n    i64.store offset=8\n    get_local $1\n    get_local $3\n    i32.load\n    i32.store offset=16\n    get_local $6\n    get_local $7\n    i32.const 24\n    i32.mul\n    i32.add\n    set_local $4\n    get_local $1\n    i32.const 24\n    i32.add\n    set_local $5\n    block $block4\n      block $block5\n        get_local $0\n        i32.const 4\n        i32.add\n        i32.load\n        tee_local $6\n        get_local $0\n        i32.load\n        tee_local $7\n        i32.eq\n        br_if $block5\n        loop $loop\n          get_local $6\n          i32.const -24\n          i32.add\n          tee_local $2\n          i32.load\n          set_local $3\n          get_local $2\n          i32.const 0\n          i32.store\n          get_local $1\n          i32.const -24\n          i32.add\n          get_local $3\n          i32.store\n          get_local $1\n          i32.const -8\n          i32.add\n          get_local $6\n          i32.const -8\n          i32.add\n          i32.load\n          i32.store\n          get_local $1\n          i32.const -12\n          i32.add\n          get_local $6\n          i32.const -12\n          i32.add\n          i32.load\n          i32.store\n          get_local $1\n          i32.const -16\n          i32.add\n          get_local $6\n          i32.const -16\n          i32.add\n          i32.load\n          i32.store\n          get_local $1\n          i32.const -24\n          i32.add\n          set_local $1\n          get_local $2\n          set_local $6\n          get_local $7\n          get_local $2\n          i32.ne\n          br_if $loop\n        end ;; $loop\n        get_local $0\n        i32.const 4\n        i32.add\n        i32.load\n        set_local $7\n        get_local $0\n        i32.load\n        set_local $6\n        br $block4\n      end ;; $block5\n      get_local $7\n      set_local $6\n    end ;; $block4\n    get_local $0\n    get_local $1\n    i32.store\n    get_local $0\n    i32.const 4\n    i32.add\n    get_local $5\n    i32.store\n    get_local $0\n    i32.const 8\n    i32.add\n    get_local $4\n    i32.store\n    block $block6\n      get_local $7\n      get_local $6\n      i32.eq\n      br_if $block6\n      loop $loop1\n        get_local $7\n        i32.const -24\n        i32.add\n        tee_local $7\n        i32.load\n        set_local $1\n        get_local $7\n        i32.const 0\n        i32.store\n        block $block7\n          get_local $1\n          i32.eqz\n          br_if $block7\n          get_local $1\n          call $77\n        end ;; $block7\n        get_local $6\n        get_local $7\n        i32.ne\n        br_if $loop1\n      end ;; $loop1\n    end ;; $block6\n    block $block8\n      get_local $6\n      i32.eqz\n      br_if $block8\n      get_local $6\n      call $77\n    end ;; $block8\n    )\n  \n  (func $62\n    (param $0 i32)\n    (param $1 i64)\n    (param $2 i64)\n    (param $3 i32)\n    (param $4 i32)\n    (local $5 i64)\n    (local $6 i32)\n    (local $7 i64)\n    (local $8 i32)\n    (local $9 i64)\n    (local $10 i32)\n    (local $11 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 112\n    i32.sub\n    tee_local $11\n    i32.store offset=4\n    get_local $1\n    get_local $2\n    i64.ne\n    i32.const 992\n    call $32\n    get_local $1\n    call $36\n    get_local $2\n    call $33\n    i32.const 1024\n    call $32\n    get_local $3\n    i64.load offset=8\n    set_local $5\n    i32.const 0\n    set_local $8\n    get_local $11\n    i32.const 104\n    i32.add\n    i32.const 0\n    i32.store\n    get_local $11\n    get_local $5\n    i64.const 8\n    i64.shr_u\n    tee_local $9\n    i64.store offset=80\n    get_local $11\n    i64.const -1\n    i64.store offset=88\n    get_local $11\n    i64.const 0\n    i64.store offset=96\n    get_local $11\n    get_local $0\n    i64.load\n    i64.store offset=72\n    get_local $11\n    i32.const 72\n    i32.add\n    get_local $9\n    i32.const 1056\n    call $63\n    set_local $6\n    get_local $1\n    call $38\n    get_local $2\n    call $38\n    block $block\n      get_local $3\n      i64.load\n      tee_local $7\n      i64.const 4611686018427387903\n      i64.add\n      i64.const 9223372036854775806\n      i64.gt_u\n      br_if $block\n      i32.const 0\n      set_local $10\n      block $block1\n        loop $loop\n          get_local $9\n          i32.wrap\/i64\n          i32.const 24\n          i32.shl\n          i32.const -1073741825\n          i32.add\n          i32.const 452984830\n          i32.gt_u\n          br_if $block1\n          block $block2\n            get_local $9\n            i64.const 8\n            i64.shr_u\n            tee_local $9\n            i64.const 255\n            i64.and\n            i64.const 0\n            i64.ne\n            br_if $block2\n            loop $loop1\n              get_local $9\n              i64.const 8\n              i64.shr_u\n              tee_local $9\n              i64.const 255\n              i64.and\n              i64.const 0\n              i64.ne\n              br_if $block1\n              get_local $10\n              i32.const 1\n              i32.add\n              tee_local $10\n              i32.const 7\n              i32.lt_s\n              br_if $loop1\n            end ;; $loop1\n          end ;; $block2\n          i32.const 1\n          set_local $8\n          get_local $10\n          i32.const 1\n          i32.add\n          tee_local $10\n          i32.const 7\n          i32.lt_s\n          br_if $loop\n          br $block\n        end ;; $loop\n      end ;; $block1\n      i32.const 0\n      set_local $8\n    end ;; $block\n    get_local $8\n    i32.const 496\n    call $32\n    get_local $7\n    i64.const 0\n    i64.gt_s\n    i32.const 1088\n    call $32\n    get_local $5\n    get_local $6\n    i64.load offset=8\n    i64.eq\n    i32.const 560\n    call $32\n    block $block3\n      block $block4\n        get_local $4\n        i32.load8_u\n        tee_local $10\n        i32.const 1\n        i32.and\n        br_if $block4\n        get_local $10\n        i32.const 1\n        i32.shr_u\n        set_local $10\n        br $block3\n      end ;; $block4\n      get_local $4\n      i32.load offset=4\n      set_local $10\n    end ;; $block3\n    get_local $10\n    i32.const 257\n    i32.lt_u\n    i32.const 400\n    call $32\n    get_local $11\n    i32.const 56\n    i32.add\n    i32.const 8\n    i32.add\n    tee_local $10\n    get_local $3\n    i32.const 8\n    i32.add\n    tee_local $8\n    i64.load\n    i64.store\n    get_local $3\n    i64.load\n    set_local $9\n    get_local $11\n    i32.const 24\n    i32.add\n    i32.const 12\n    i32.add\n    get_local $11\n    i32.const 56\n    i32.add\n    i32.const 12\n    i32.add\n    i32.load\n    i32.store\n    get_local $11\n    i32.const 24\n    i32.add\n    i32.const 8\n    i32.add\n    get_local $10\n    i32.load\n    i32.store\n    get_local $11\n    get_local $9\n    i64.store offset=56\n    get_local $11\n    get_local $11\n    i32.load offset=60\n    i32.store offset=28\n    get_local $11\n    get_local $11\n    i32.load offset=56\n    i32.store offset=24\n    get_local $0\n    get_local $1\n    get_local $11\n    i32.const 24\n    i32.add\n    call $64\n    get_local $11\n    i32.const 40\n    i32.add\n    i32.const 8\n    i32.add\n    tee_local $10\n    get_local $8\n    i64.load\n    i64.store\n    get_local $3\n    i64.load\n    set_local $9\n    get_local $11\n    i32.const 8\n    i32.add\n    i32.const 12\n    i32.add\n    get_local $11\n    i32.const 40\n    i32.add\n    i32.const 12\n    i32.add\n    i32.load\n    i32.store\n    get_local $11\n    i32.const 8\n    i32.add\n    i32.const 8\n    i32.add\n    get_local $10\n    i32.load\n    i32.store\n    get_local $11\n    get_local $9\n    i64.store offset=40\n    get_local $11\n    get_local $11\n    i32.load offset=44\n    i32.store offset=12\n    get_local $11\n    get_local $11\n    i32.load offset=40\n    i32.store offset=8\n    get_local $0\n    get_local $2\n    get_local $11\n    i32.const 8\n    i32.add\n    get_local $1\n    call $52\n    block $block5\n      get_local $11\n      i32.load offset=96\n      tee_local $8\n      i32.eqz\n      br_if $block5\n      block $block6\n        block $block7\n          get_local $11\n          i32.const 100\n          i32.add\n          tee_local $0\n          i32.load\n          tee_local $10\n          get_local $8\n          i32.eq\n          br_if $block7\n          loop $loop2\n            get_local $10\n            i32.const -24\n            i32.add\n            tee_local $10\n            i32.load\n            set_local $3\n            get_local $10\n            i32.const 0\n            i32.store\n            block $block8\n              get_local $3\n              i32.eqz\n              br_if $block8\n              get_local $3\n              call $77\n            end ;; $block8\n            get_local $8\n            get_local $10\n            i32.ne\n            br_if $loop2\n          end ;; $loop2\n          get_local $11\n          i32.const 96\n          i32.add\n          i32.load\n          set_local $10\n          br $block6\n        end ;; $block7\n        get_local $8\n        set_local $10\n      end ;; $block6\n      get_local $0\n      get_local $8\n      i32.store\n      get_local $10\n      call $77\n    end ;; $block5\n    i32.const 0\n    get_local $11\n    i32.const 112\n    i32.add\n    i32.store offset=4\n    )\n  \n  (func $63\n    (param $0 i32)\n    (param $1 i64)\n    (param $2 i32)\n    (result i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i32)\n    block $block\n      get_local $0\n      i32.const 28\n      i32.add\n      i32.load\n      tee_local $7\n      get_local $0\n      i32.load offset=24\n      tee_local $3\n      i32.eq\n      br_if $block\n      get_local $7\n      i32.const -24\n      i32.add\n      set_local $6\n      i32.const 0\n      get_local $3\n      i32.sub\n      set_local $4\n      loop $loop\n        get_local $6\n        i32.load\n        i64.load offset=8\n        i64.const 8\n        i64.shr_u\n        get_local $1\n        i64.eq\n        br_if $block\n        get_local $6\n        set_local $7\n        get_local $6\n        i32.const -24\n        i32.add\n        tee_local $5\n        set_local $6\n        get_local $5\n        get_local $4\n        i32.add\n        i32.const -24\n        i32.ne\n        br_if $loop\n      end ;; $loop\n    end ;; $block\n    block $block1\n      block $block2\n        get_local $7\n        get_local $3\n        i32.eq\n        br_if $block2\n        get_local $7\n        i32.const -24\n        i32.add\n        i32.load\n        tee_local $6\n        i32.load offset=40\n        get_local $0\n        i32.eq\n        i32.const 96\n        call $32\n        br $block1\n      end ;; $block2\n      i32.const 0\n      set_local $6\n      get_local $0\n      i64.load\n      get_local $0\n      i64.load offset=8\n      i64.const -4157508551318700032\n      get_local $1\n      call $27\n      tee_local $5\n      i32.const 0\n      i32.lt_s\n      br_if $block1\n      get_local $0\n      get_local $5\n      call $46\n      tee_local $6\n      i32.load offset=40\n      get_local $0\n      i32.eq\n      i32.const 96\n      call $32\n    end ;; $block1\n    get_local $6\n    i32.const 0\n    i32.ne\n    get_local $2\n    call $32\n    get_local $6\n    )\n  \n  (func $64\n    (param $0 i32)\n    (param $1 i64)\n    (param $2 i32)\n    (local $3 i64)\n    (local $4 i64)\n    (local $5 i32)\n    (local $6 i64)\n    (local $7 i32)\n    (local $8 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 64\n    i32.sub\n    tee_local $8\n    i32.store offset=4\n    get_local $8\n    i32.const 40\n    i32.add\n    i32.const 0\n    i32.store\n    get_local $8\n    get_local $1\n    i64.store offset=16\n    get_local $8\n    i64.const -1\n    i64.store offset=24\n    get_local $8\n    i64.const 0\n    i64.store offset=32\n    get_local $8\n    get_local $0\n    i64.load\n    i64.store offset=8\n    get_local $8\n    i32.const 8\n    i32.add\n    get_local $2\n    i64.load offset=8\n    tee_local $3\n    i64.const 8\n    i64.shr_u\n    i32.const 1120\n    call $65\n    tee_local $0\n    i64.load\n    get_local $2\n    i64.load\n    tee_local $4\n    i64.ge_s\n    i32.const 1152\n    call $32\n    block $block\n      block $block1\n        block $block2\n          get_local $4\n          get_local $0\n          i64.load\n          i64.ne\n          br_if $block2\n          get_local $8\n          i32.const 8\n          i32.add\n          get_local $0\n          call $66\n          get_local $8\n          i32.load offset=32\n          tee_local $5\n          br_if $block1\n          br $block\n        end ;; $block2\n        get_local $0\n        i32.load offset=16\n        get_local $8\n        i32.const 8\n        i32.add\n        i32.eq\n        i32.const 640\n        call $32\n        get_local $8\n        i64.load offset=8\n        call $25\n        i64.eq\n        i32.const 688\n        call $32\n        get_local $3\n        get_local $0\n        i64.load offset=8\n        tee_local $6\n        i64.eq\n        i32.const 1184\n        call $32\n        get_local $0\n        get_local $0\n        i64.load\n        get_local $4\n        i64.sub\n        tee_local $4\n        i64.store\n        get_local $4\n        i64.const -4611686018427387904\n        i64.gt_s\n        i32.const 1232\n        call $32\n        get_local $0\n        i64.load\n        i64.const 4611686018427387904\n        i64.lt_s\n        i32.const 1264\n        call $32\n        get_local $6\n        i64.const 8\n        i64.shr_u\n        tee_local $4\n        get_local $0\n        i64.load offset=8\n        i64.const 8\n        i64.shr_u\n        i64.eq\n        i32.const 864\n        call $32\n        i32.const 1\n        i32.const 272\n        call $32\n        get_local $8\n        i32.const 48\n        i32.add\n        get_local $0\n        i32.const 8\n        call $34\n        drop\n        i32.const 1\n        i32.const 272\n        call $32\n        get_local $8\n        i32.const 48\n        i32.add\n        i32.const 8\n        i32.or\n        get_local $0\n        i32.const 8\n        i32.add\n        i32.const 8\n        call $34\n        drop\n        get_local $0\n        i32.load offset=20\n        get_local $1\n        get_local $8\n        i32.const 48\n        i32.add\n        i32.const 16\n        call $31\n        block $block3\n          get_local $4\n          get_local $8\n          i32.const 8\n          i32.add\n          i32.const 16\n          i32.add\n          tee_local $0\n          i64.load\n          i64.lt_u\n          br_if $block3\n          get_local $0\n          get_local $4\n          i64.const 1\n          i64.add\n          i64.store\n        end ;; $block3\n        get_local $8\n        i32.load offset=32\n        tee_local $5\n        i32.eqz\n        br_if $block\n      end ;; $block1\n      block $block4\n        block $block5\n          get_local $8\n          i32.const 36\n          i32.add\n          tee_local $7\n          i32.load\n          tee_local $0\n          get_local $5\n          i32.eq\n          br_if $block5\n          loop $loop\n            get_local $0\n            i32.const -24\n            i32.add\n            tee_local $0\n            i32.load\n            set_local $2\n            get_local $0\n            i32.const 0\n            i32.store\n            block $block6\n              get_local $2\n              i32.eqz\n              br_if $block6\n              get_local $2\n              call $77\n            end ;; $block6\n            get_local $5\n            get_local $0\n            i32.ne\n            br_if $loop\n          end ;; $loop\n          get_local $8\n          i32.const 32\n          i32.add\n          i32.load\n          set_local $0\n          br $block4\n        end ;; $block5\n        get_local $5\n        set_local $0\n      end ;; $block4\n      get_local $7\n      get_local $5\n      i32.store\n      get_local $0\n      call $77\n    end ;; $block\n    i32.const 0\n    get_local $8\n    i32.const 64\n    i32.add\n    i32.store offset=4\n    )\n  \n  (func $65\n    (param $0 i32)\n    (param $1 i64)\n    (param $2 i32)\n    (result i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i32)\n    block $block\n      get_local $0\n      i32.const 28\n      i32.add\n      i32.load\n      tee_local $7\n      get_local $0\n      i32.load offset=24\n      tee_local $3\n      i32.eq\n      br_if $block\n      get_local $7\n      i32.const -24\n      i32.add\n      set_local $6\n      i32.const 0\n      get_local $3\n      i32.sub\n      set_local $4\n      loop $loop\n        get_local $6\n        i32.load\n        i64.load offset=8\n        i64.const 8\n        i64.shr_u\n        get_local $1\n        i64.eq\n        br_if $block\n        get_local $6\n        set_local $7\n        get_local $6\n        i32.const -24\n        i32.add\n        tee_local $5\n        set_local $6\n        get_local $5\n        get_local $4\n        i32.add\n        i32.const -24\n        i32.ne\n        br_if $loop\n      end ;; $loop\n    end ;; $block\n    block $block1\n      block $block2\n        get_local $7\n        get_local $3\n        i32.eq\n        br_if $block2\n        get_local $7\n        i32.const -24\n        i32.add\n        i32.load\n        tee_local $6\n        i32.load offset=16\n        get_local $0\n        i32.eq\n        i32.const 96\n        call $32\n        br $block1\n      end ;; $block2\n      i32.const 0\n      set_local $6\n      get_local $0\n      i64.load\n      get_local $0\n      i64.load offset=8\n      i64.const 3607749779137757184\n      get_local $1\n      call $27\n      tee_local $5\n      i32.const 0\n      i32.lt_s\n      br_if $block1\n      get_local $0\n      get_local $5\n      call $60\n      tee_local $6\n      i32.load offset=16\n      get_local $0\n      i32.eq\n      i32.const 96\n      call $32\n    end ;; $block1\n    get_local $6\n    i32.const 0\n    i32.ne\n    get_local $2\n    call $32\n    get_local $6\n    )\n  \n  (func $66\n    (param $0 i32)\n    (param $1 i32)\n    (local $2 i64)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i32)\n    (local $8 i32)\n    get_local $1\n    i32.load offset=16\n    get_local $0\n    i32.eq\n    i32.const 1296\n    call $32\n    get_local $0\n    i64.load\n    call $25\n    i64.eq\n    i32.const 1344\n    call $32\n    block $block\n      get_local $0\n      i32.const 28\n      i32.add\n      tee_local $5\n      i32.load\n      tee_local $7\n      get_local $0\n      i32.load offset=24\n      tee_local $3\n      i32.eq\n      br_if $block\n      get_local $1\n      i64.load offset=8\n      set_local $2\n      i32.const 0\n      get_local $3\n      i32.sub\n      set_local $6\n      get_local $7\n      i32.const -24\n      i32.add\n      set_local $8\n      loop $loop\n        get_local $8\n        i32.load\n        i64.load offset=8\n        get_local $2\n        i64.xor\n        i64.const 256\n        i64.lt_u\n        br_if $block\n        get_local $8\n        set_local $7\n        get_local $8\n        i32.const -24\n        i32.add\n        tee_local $4\n        set_local $8\n        get_local $4\n        get_local $6\n        i32.add\n        i32.const -24\n        i32.ne\n        br_if $loop\n      end ;; $loop\n    end ;; $block\n    get_local $7\n    get_local $3\n    i32.ne\n    i32.const 1408\n    call $32\n    get_local $7\n    i32.const -24\n    i32.add\n    set_local $8\n    block $block1\n      block $block2\n        get_local $7\n        get_local $5\n        i32.load\n        tee_local $4\n        i32.eq\n        br_if $block2\n        i32.const 0\n        get_local $4\n        i32.sub\n        set_local $3\n        get_local $8\n        set_local $7\n        loop $loop1\n          get_local $7\n          i32.const 24\n          i32.add\n          tee_local $8\n          i32.load\n          set_local $6\n          get_local $8\n          i32.const 0\n          i32.store\n          get_local $7\n          i32.load\n          set_local $4\n          get_local $7\n          get_local $6\n          i32.store\n          block $block3\n            get_local $4\n            i32.eqz\n            br_if $block3\n            get_local $4\n            call $77\n          end ;; $block3\n          get_local $7\n          i32.const 16\n          i32.add\n          get_local $7\n          i32.const 40\n          i32.add\n          i32.load\n          i32.store\n          get_local $7\n          i32.const 8\n          i32.add\n          get_local $7\n          i32.const 32\n          i32.add\n          i64.load\n          i64.store\n          get_local $8\n          set_local $7\n          get_local $8\n          get_local $3\n          i32.add\n          i32.const -24\n          i32.ne\n          br_if $loop1\n        end ;; $loop1\n        get_local $0\n        i32.const 28\n        i32.add\n        i32.load\n        tee_local $7\n        get_local $8\n        i32.eq\n        br_if $block1\n      end ;; $block2\n      loop $loop2\n        get_local $7\n        i32.const -24\n        i32.add\n        tee_local $7\n        i32.load\n        set_local $4\n        get_local $7\n        i32.const 0\n        i32.store\n        block $block4\n          get_local $4\n          i32.eqz\n          br_if $block4\n          get_local $4\n          call $77\n        end ;; $block4\n        get_local $8\n        get_local $7\n        i32.ne\n        br_if $loop2\n      end ;; $loop2\n    end ;; $block1\n    get_local $0\n    i32.const 28\n    i32.add\n    get_local $8\n    i32.store\n    get_local $1\n    i32.load offset=20\n    call $29\n    )\n  \n  (func $67\n    (param $0 i64)\n    (param $1 i64)\n    (param $2 i64)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i64)\n    (local $6 i64)\n    (local $7 i64)\n    (local $8 i64)\n    (local $9 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 64\n    i32.sub\n    tee_local $9\n    i32.store offset=4\n    i64.const 0\n    set_local $6\n    i64.const 59\n    set_local $5\n    i32.const 1472\n    set_local $4\n    i64.const 0\n    set_local $7\n    loop $loop\n      block $block\n        block $block1\n          block $block2\n            block $block3\n              block $block4\n                get_local $6\n                i64.const 6\n                i64.gt_u\n                br_if $block4\n                get_local $4\n                i32.load8_s\n                tee_local $3\n                i32.const -97\n                i32.add\n                i32.const 255\n                i32.and\n                i32.const 25\n                i32.gt_u\n                br_if $block3\n                get_local $3\n                i32.const 165\n                i32.add\n                set_local $3\n                br $block2\n              end ;; $block4\n              i64.const 0\n              set_local $8\n              get_local $6\n              i64.const 11\n              i64.le_u\n              br_if $block1\n              br $block\n            end ;; $block3\n            get_local $3\n            i32.const 208\n            i32.add\n            i32.const 0\n            get_local $3\n            i32.const -49\n            i32.add\n            i32.const 255\n            i32.and\n            i32.const 5\n            i32.lt_u\n            select\n            set_local $3\n          end ;; $block2\n          get_local $3\n          i64.extend_u\/i32\n          i64.const 56\n          i64.shl\n          i64.const 56\n          i64.shr_s\n          set_local $8\n        end ;; $block1\n        get_local $8\n        i64.const 31\n        i64.and\n        get_local $5\n        i64.const 4294967295\n        i64.and\n        i64.shl\n        set_local $8\n      end ;; $block\n      get_local $4\n      i32.const 1\n      i32.add\n      set_local $4\n      get_local $6\n      i64.const 1\n      i64.add\n      set_local $6\n      get_local $8\n      get_local $7\n      i64.or\n      set_local $7\n      get_local $5\n      i64.const -5\n      i64.add\n      tee_local $5\n      i64.const -6\n      i64.ne\n      br_if $loop\n    end ;; $loop\n    block $block5\n      get_local $7\n      get_local $2\n      i64.ne\n      br_if $block5\n      i64.const 0\n      set_local $6\n      i64.const 59\n      set_local $5\n      i32.const 1488\n      set_local $4\n      i64.const 0\n      set_local $7\n      loop $loop1\n        block $block6\n          block $block7\n            block $block8\n              block $block9\n                block $block10\n                  get_local $6\n                  i64.const 4\n                  i64.gt_u\n                  br_if $block10\n                  get_local $4\n                  i32.load8_s\n                  tee_local $3\n                  i32.const -97\n                  i32.add\n                  i32.const 255\n                  i32.and\n                  i32.const 25\n                  i32.gt_u\n                  br_if $block9\n                  get_local $3\n                  i32.const 165\n                  i32.add\n                  set_local $3\n                  br $block8\n                end ;; $block10\n                i64.const 0\n                set_local $8\n                get_local $6\n                i64.const 11\n                i64.le_u\n                br_if $block7\n                br $block6\n              end ;; $block9\n              get_local $3\n              i32.const 208\n              i32.add\n              i32.const 0\n              get_local $3\n              i32.const -49\n              i32.add\n              i32.const 255\n              i32.and\n              i32.const 5\n              i32.lt_u\n              select\n              set_local $3\n            end ;; $block8\n            get_local $3\n            i64.extend_u\/i32\n            i64.const 56\n            i64.shl\n            i64.const 56\n            i64.shr_s\n            set_local $8\n          end ;; $block7\n          get_local $8\n          i64.const 31\n          i64.and\n          get_local $5\n          i64.const 4294967295\n          i64.and\n          i64.shl\n          set_local $8\n        end ;; $block6\n        get_local $4\n        i32.const 1\n        i32.add\n        set_local $4\n        get_local $6\n        i64.const 1\n        i64.add\n        set_local $6\n        get_local $8\n        get_local $7\n        i64.or\n        set_local $7\n        get_local $5\n        i64.const -5\n        i64.add\n        tee_local $5\n        i64.const -6\n        i64.ne\n        br_if $loop1\n      end ;; $loop1\n      get_local $7\n      get_local $1\n      i64.eq\n      i32.const 1504\n      call $32\n    end ;; $block5\n    block $block11\n      block $block12\n        get_local $1\n        get_local $0\n        i64.eq\n        br_if $block12\n        i64.const 0\n        set_local $6\n        i64.const 59\n        set_local $5\n        i32.const 1472\n        set_local $4\n        i64.const 0\n        set_local $7\n        loop $loop2\n          block $block13\n            block $block14\n              block $block15\n                block $block16\n                  block $block17\n                    get_local $6\n                    i64.const 6\n                    i64.gt_u\n                    br_if $block17\n                    get_local $4\n                    i32.load8_s\n                    tee_local $3\n                    i32.const -97\n                    i32.add\n                    i32.const 255\n                    i32.and\n                    i32.const 25\n                    i32.gt_u\n                    br_if $block16\n                    get_local $3\n                    i32.const 165\n                    i32.add\n                    set_local $3\n                    br $block15\n                  end ;; $block17\n                  i64.const 0\n                  set_local $8\n                  get_local $6\n                  i64.const 11\n                  i64.le_u\n                  br_if $block14\n                  br $block13\n                end ;; $block16\n                get_local $3\n                i32.const 208\n                i32.add\n                i32.const 0\n                get_local $3\n                i32.const -49\n                i32.add\n                i32.const 255\n                i32.and\n                i32.const 5\n                i32.lt_u\n                select\n                set_local $3\n              end ;; $block15\n              get_local $3\n              i64.extend_u\/i32\n              i64.const 56\n              i64.shl\n              i64.const 56\n              i64.shr_s\n              set_local $8\n            end ;; $block14\n            get_local $8\n            i64.const 31\n            i64.and\n            get_local $5\n            i64.const 4294967295\n            i64.and\n            i64.shl\n            set_local $8\n          end ;; $block13\n          get_local $4\n          i32.const 1\n          i32.add\n          set_local $4\n          get_local $6\n          i64.const 1\n          i64.add\n          set_local $6\n          get_local $8\n          get_local $7\n          i64.or\n          set_local $7\n          get_local $5\n          i64.const -5\n          i64.add\n          tee_local $5\n          i64.const -6\n          i64.ne\n          br_if $loop2\n        end ;; $loop2\n        get_local $7\n        get_local $2\n        i64.ne\n        br_if $block11\n      end ;; $block12\n      get_local $9\n      get_local $0\n      i64.store offset=56\n      block $block18\n        block $block19\n          get_local $2\n          i64.const -3617168760277827584\n          i64.eq\n          br_if $block19\n          get_local $2\n          i64.const 8516769789752901632\n          i64.eq\n          br_if $block18\n          get_local $2\n          i64.const 5031766152489992192\n          i64.ne\n          br_if $block11\n          get_local $9\n          i32.const 0\n          i32.store offset=52\n          get_local $9\n          i32.const 1\n          i32.store offset=48\n          get_local $9\n          get_local $9\n          i64.load offset=48\n          i64.store offset=8 align=4\n          get_local $9\n          i32.const 56\n          i32.add\n          get_local $9\n          i32.const 8\n          i32.add\n          call $68\n          drop\n          br $block11\n        end ;; $block19\n        get_local $9\n        i32.const 0\n        i32.store offset=36\n        get_local $9\n        i32.const 2\n        i32.store offset=32\n        get_local $9\n        get_local $9\n        i64.load offset=32\n        i64.store offset=24 align=4\n        get_local $9\n        i32.const 56\n        i32.add\n        get_local $9\n        i32.const 24\n        i32.add\n        call $70\n        drop\n        br $block11\n      end ;; $block18\n      get_local $9\n      i32.const 0\n      i32.store offset=44\n      get_local $9\n      i32.const 3\n      i32.store offset=40\n      get_local $9\n      get_local $9\n      i64.load offset=40\n      i64.store offset=16 align=4\n      get_local $9\n      i32.const 56\n      i32.add\n      get_local $9\n      i32.const 16\n      i32.add\n      call $69\n      drop\n    end ;; $block11\n    i32.const 0\n    get_local $9\n    i32.const 64\n    i32.add\n    i32.store offset=4\n    )\n  \n  (func $68\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i64)\n    (local $5 i32)\n    (local $6 i64)\n    (local $7 i32)\n    (local $8 i32)\n    (local $9 i32)\n    i32.const 0\n    i32.load offset=4\n    i32.const 96\n    i32.sub\n    tee_local $7\n    set_local $9\n    i32.const 0\n    get_local $7\n    i32.store offset=4\n    get_local $1\n    i32.load offset=4\n    set_local $2\n    get_local $1\n    i32.load\n    set_local $8\n    i32.const 0\n    set_local $1\n    i32.const 0\n    set_local $5\n    block $block\n      call $24\n      tee_local $3\n      i32.eqz\n      br_if $block\n      block $block1\n        block $block2\n          get_local $3\n          i32.const 513\n          i32.lt_u\n          br_if $block2\n          get_local $3\n          call $83\n          set_local $5\n          br $block1\n        end ;; $block2\n        i32.const 0\n        get_local $7\n        get_local $3\n        i32.const 15\n        i32.add\n        i32.const -16\n        i32.and\n        i32.sub\n        tee_local $5\n        i32.store offset=4\n      end ;; $block1\n      get_local $5\n      get_local $3\n      call $35\n      drop\n    end ;; $block\n    get_local $9\n    i32.const 40\n    i32.add\n    i64.const 1397703940\n    i64.store\n    get_local $9\n    i64.const 0\n    i64.store offset=32\n    get_local $9\n    i64.const 0\n    i64.store offset=24\n    i32.const 1\n    i32.const 288\n    call $32\n    i64.const 5459781\n    set_local $6\n    block $block3\n      loop $loop\n        i32.const 0\n        set_local $7\n        get_local $6\n        i32.wrap\/i64\n        i32.const 24\n        i32.shl\n        i32.const -1073741825\n        i32.add\n        i32.const 452984830\n        i32.gt_u\n        br_if $block3\n        block $block4\n          get_local $6\n          i64.const 8\n          i64.shr_u\n          tee_local $6\n          i64.const 255\n          i64.and\n          i64.const 0\n          i64.ne\n          br_if $block4\n          loop $loop1\n            get_local $6\n            i64.const 8\n            i64.shr_u\n            tee_local $6\n            i64.const 255\n            i64.and\n            i64.const 0\n            i64.ne\n            br_if $block3\n            get_local $1\n            i32.const 1\n            i32.add\n            tee_local $1\n            i32.const 7\n            i32.lt_s\n            br_if $loop1\n          end ;; $loop1\n        end ;; $block4\n        i32.const 1\n        set_local $7\n        get_local $1\n        i32.const 1\n        i32.add\n        tee_local $1\n        i32.const 7\n        i32.lt_s\n        br_if $loop\n      end ;; $loop\n    end ;; $block3\n    get_local $7\n    i32.const 16\n    call $32\n    get_local $3\n    i32.const 7\n    i32.gt_u\n    i32.const 384\n    call $32\n    get_local $9\n    i32.const 24\n    i32.add\n    get_local $5\n    i32.const 8\n    call $34\n    drop\n    get_local $3\n    i32.const -8\n    i32.and\n    tee_local $7\n    i32.const 8\n    i32.ne\n    i32.const 384\n    call $32\n    get_local $9\n    i32.const 24\n    i32.add\n    i32.const 8\n    i32.add\n    tee_local $1\n    get_local $5\n    i32.const 8\n    i32.add\n    i32.const 8\n    call $34\n    drop\n    get_local $7\n    i32.const 16\n    i32.ne\n    i32.const 384\n    call $32\n    get_local $9\n    i32.const 24\n    i32.add\n    i32.const 16\n    i32.add\n    get_local $5\n    i32.const 16\n    i32.add\n    i32.const 8\n    call $34\n    drop\n    block $block5\n      get_local $3\n      i32.const 513\n      i32.lt_u\n      br_if $block5\n      get_local $5\n      call $86\n    end ;; $block5\n    get_local $9\n    i32.const 48\n    i32.add\n    i32.const 8\n    i32.add\n    tee_local $7\n    get_local $1\n    i32.const 8\n    i32.add\n    i64.load\n    i64.store\n    get_local $9\n    i64.load offset=24\n    set_local $6\n    get_local $9\n    get_local $1\n    i64.load\n    i64.store offset=48\n    get_local $9\n    i32.const 64\n    i32.add\n    i32.const 8\n    i32.add\n    get_local $7\n    i64.load\n    i64.store\n    get_local $9\n    get_local $9\n    i64.load offset=48\n    i64.store offset=64\n    get_local $0\n    get_local $2\n    i32.const 1\n    i32.shr_s\n    i32.add\n    set_local $1\n    block $block6\n      get_local $2\n      i32.const 1\n      i32.and\n      i32.eqz\n      br_if $block6\n      get_local $1\n      i32.load\n      get_local $8\n      i32.add\n      i32.load\n      set_local $8\n    end ;; $block6\n    get_local $9\n    i32.const 80\n    i32.add\n    i32.const 8\n    i32.add\n    get_local $9\n    i32.const 64\n    i32.add\n    i32.const 8\n    i32.add\n    i64.load\n    tee_local $4\n    i64.store\n    get_local $9\n    i32.const 8\n    i32.add\n    i32.const 8\n    i32.add\n    get_local $4\n    i64.store\n    get_local $9\n    get_local $9\n    i64.load offset=64\n    tee_local $4\n    i64.store offset=80\n    get_local $9\n    get_local $4\n    i64.store offset=8\n    get_local $1\n    get_local $6\n    get_local $9\n    i32.const 8\n    i32.add\n    get_local $8\n    call_indirect $0\n    i32.const 0\n    get_local $9\n    i32.const 96\n    i32.add\n    i32.store offset=4\n    i32.const 1\n    )\n  \n  (func $69\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    (local $2 i32)\n    (local $3 i64)\n    (local $4 i32)\n    (local $5 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 80\n    i32.sub\n    tee_local $4\n    i32.store offset=4\n    get_local $4\n    tee_local $5\n    get_local $0\n    i32.store offset=60\n    get_local $5\n    get_local $1\n    i32.load\n    i32.store offset=48\n    get_local $5\n    get_local $1\n    i32.load offset=4\n    i32.store offset=52\n    i32.const 0\n    set_local $1\n    i32.const 0\n    set_local $0\n    block $block\n      call $24\n      tee_local $2\n      i32.eqz\n      br_if $block\n      block $block1\n        block $block2\n          get_local $2\n          i32.const 513\n          i32.lt_u\n          br_if $block2\n          get_local $2\n          call $83\n          set_local $0\n          br $block1\n        end ;; $block2\n        i32.const 0\n        get_local $4\n        get_local $2\n        i32.const 15\n        i32.add\n        i32.const -16\n        i32.and\n        i32.sub\n        tee_local $0\n        i32.store offset=4\n      end ;; $block1\n      get_local $0\n      get_local $2\n      call $35\n      drop\n    end ;; $block\n    get_local $5\n    i32.const 24\n    i32.add\n    i64.const 1397703940\n    i64.store\n    get_local $5\n    i64.const 0\n    i64.store offset=16\n    get_local $5\n    i64.const 0\n    i64.store offset=8\n    i32.const 1\n    i32.const 288\n    call $32\n    i64.const 5459781\n    set_local $3\n    block $block3\n      block $block4\n        loop $loop\n          get_local $3\n          i32.wrap\/i64\n          i32.const 24\n          i32.shl\n          i32.const -1073741825\n          i32.add\n          i32.const 452984830\n          i32.gt_u\n          br_if $block4\n          block $block5\n            get_local $3\n            i64.const 8\n            i64.shr_u\n            tee_local $3\n            i64.const 255\n            i64.and\n            i64.const 0\n            i64.ne\n            br_if $block5\n            loop $loop1\n              get_local $3\n              i64.const 8\n              i64.shr_u\n              tee_local $3\n              i64.const 255\n              i64.and\n              i64.const 0\n              i64.ne\n              br_if $block4\n              get_local $1\n              i32.const 1\n              i32.add\n              tee_local $1\n              i32.const 7\n              i32.lt_s\n              br_if $loop1\n            end ;; $loop1\n          end ;; $block5\n          i32.const 1\n          set_local $4\n          get_local $1\n          i32.const 1\n          i32.add\n          tee_local $1\n          i32.const 7\n          i32.lt_s\n          br_if $loop\n          br $block3\n        end ;; $loop\n      end ;; $block4\n      i32.const 0\n      set_local $4\n    end ;; $block3\n    get_local $4\n    i32.const 16\n    call $32\n    get_local $5\n    i32.const 40\n    i32.add\n    i32.const 0\n    i32.store\n    get_local $5\n    i64.const 0\n    i64.store offset=32\n    get_local $5\n    get_local $0\n    i32.store offset=64\n    get_local $5\n    get_local $0\n    get_local $2\n    i32.add\n    tee_local $1\n    i32.store offset=72\n    get_local $2\n    i32.const 7\n    i32.gt_u\n    i32.const 384\n    call $32\n    get_local $5\n    i32.const 8\n    i32.add\n    get_local $0\n    i32.const 8\n    call $34\n    drop\n    get_local $1\n    get_local $0\n    i32.const 8\n    i32.add\n    tee_local $4\n    i32.sub\n    i32.const 7\n    i32.gt_u\n    i32.const 384\n    call $32\n    get_local $5\n    i32.const 8\n    i32.add\n    i32.const 8\n    i32.add\n    get_local $4\n    i32.const 8\n    call $34\n    drop\n    get_local $1\n    get_local $0\n    i32.const 16\n    i32.add\n    tee_local $4\n    i32.sub\n    i32.const 7\n    i32.gt_u\n    i32.const 384\n    call $32\n    get_local $5\n    i32.const 8\n    i32.add\n    i32.const 16\n    i32.add\n    get_local $4\n    i32.const 8\n    call $34\n    drop\n    get_local $5\n    get_local $0\n    i32.const 24\n    i32.add\n    i32.store offset=68\n    get_local $5\n    i32.const 64\n    i32.add\n    get_local $5\n    i32.const 8\n    i32.add\n    i32.const 24\n    i32.add\n    call $73\n    drop\n    block $block6\n      get_local $2\n      i32.const 513\n      i32.lt_u\n      br_if $block6\n      get_local $0\n      call $86\n    end ;; $block6\n    get_local $5\n    get_local $5\n    i32.const 48\n    i32.add\n    i32.store offset=68\n    get_local $5\n    get_local $5\n    i32.const 60\n    i32.add\n    i32.store offset=64\n    get_local $5\n    i32.const 64\n    i32.add\n    get_local $5\n    i32.const 8\n    i32.add\n    call $75\n    block $block7\n      get_local $5\n      i32.load8_u offset=32\n      i32.const 1\n      i32.and\n      i32.eqz\n      br_if $block7\n      get_local $5\n      i32.const 40\n      i32.add\n      i32.load\n      call $77\n    end ;; $block7\n    i32.const 0\n    get_local $5\n    i32.const 80\n    i32.add\n    i32.store offset=4\n    i32.const 1\n    )\n  \n  (func $70\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    (local $2 i32)\n    (local $3 i64)\n    (local $4 i32)\n    (local $5 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 96\n    i32.sub\n    tee_local $4\n    i32.store offset=4\n    get_local $4\n    tee_local $5\n    get_local $0\n    i32.store offset=60\n    get_local $5\n    get_local $1\n    i32.load\n    i32.store offset=48\n    get_local $5\n    get_local $1\n    i32.load offset=4\n    i32.store offset=52\n    i32.const 0\n    set_local $1\n    i32.const 0\n    set_local $0\n    block $block\n      call $24\n      tee_local $2\n      i32.eqz\n      br_if $block\n      block $block1\n        block $block2\n          get_local $2\n          i32.const 513\n          i32.lt_u\n          br_if $block2\n          get_local $2\n          call $83\n          set_local $0\n          br $block1\n        end ;; $block2\n        i32.const 0\n        get_local $4\n        get_local $2\n        i32.const 15\n        i32.add\n        i32.const -16\n        i32.and\n        i32.sub\n        tee_local $0\n        i32.store offset=4\n      end ;; $block1\n      get_local $0\n      get_local $2\n      call $35\n      drop\n    end ;; $block\n    get_local $5\n    i32.const 24\n    i32.add\n    i64.const 1397703940\n    i64.store\n    get_local $5\n    i64.const 0\n    i64.store offset=8\n    get_local $5\n    i64.const 0\n    i64.store\n    get_local $5\n    i64.const 0\n    i64.store offset=16\n    i32.const 1\n    i32.const 288\n    call $32\n    i64.const 5459781\n    set_local $3\n    block $block3\n      block $block4\n        loop $loop\n          get_local $3\n          i32.wrap\/i64\n          i32.const 24\n          i32.shl\n          i32.const -1073741825\n          i32.add\n          i32.const 452984830\n          i32.gt_u\n          br_if $block4\n          block $block5\n            get_local $3\n            i64.const 8\n            i64.shr_u\n            tee_local $3\n            i64.const 255\n            i64.and\n            i64.const 0\n            i64.ne\n            br_if $block5\n            loop $loop1\n              get_local $3\n              i64.const 8\n              i64.shr_u\n              tee_local $3\n              i64.const 255\n              i64.and\n              i64.const 0\n              i64.ne\n              br_if $block4\n              get_local $1\n              i32.const 1\n              i32.add\n              tee_local $1\n              i32.const 7\n              i32.lt_s\n              br_if $loop1\n            end ;; $loop1\n          end ;; $block5\n          i32.const 1\n          set_local $4\n          get_local $1\n          i32.const 1\n          i32.add\n          tee_local $1\n          i32.const 7\n          i32.lt_s\n          br_if $loop\n          br $block3\n        end ;; $loop\n      end ;; $block4\n      i32.const 0\n      set_local $4\n    end ;; $block3\n    get_local $4\n    i32.const 16\n    call $32\n    get_local $5\n    i32.const 40\n    i32.add\n    i32.const 0\n    i32.store\n    get_local $5\n    i64.const 0\n    i64.store offset=32\n    get_local $5\n    get_local $0\n    i32.store offset=68\n    get_local $5\n    get_local $0\n    i32.store offset=64\n    get_local $5\n    get_local $0\n    get_local $2\n    i32.add\n    i32.store offset=72\n    get_local $5\n    get_local $5\n    i32.const 64\n    i32.add\n    i32.store offset=80\n    get_local $5\n    get_local $5\n    i32.store offset=88\n    get_local $5\n    i32.const 88\n    i32.add\n    get_local $5\n    i32.const 80\n    i32.add\n    call $71\n    block $block6\n      get_local $2\n      i32.const 513\n      i32.lt_u\n      br_if $block6\n      get_local $0\n      call $86\n    end ;; $block6\n    get_local $5\n    get_local $5\n    i32.const 48\n    i32.add\n    i32.store offset=68\n    get_local $5\n    get_local $5\n    i32.const 60\n    i32.add\n    i32.store offset=64\n    get_local $5\n    i32.const 64\n    i32.add\n    get_local $5\n    call $72\n    block $block7\n      get_local $5\n      i32.load8_u offset=32\n      i32.const 1\n      i32.and\n      i32.eqz\n      br_if $block7\n      get_local $5\n      i32.const 40\n      i32.add\n      i32.load\n      call $77\n    end ;; $block7\n    i32.const 0\n    get_local $5\n    i32.const 96\n    i32.add\n    i32.store offset=4\n    i32.const 1\n    )\n  \n  (func $71\n    (param $0 i32)\n    (param $1 i32)\n    (local $2 i32)\n    (local $3 i32)\n    get_local $0\n    i32.load\n    set_local $2\n    get_local $1\n    i32.load\n    tee_local $3\n    i32.load offset=8\n    get_local $3\n    i32.load offset=4\n    i32.sub\n    i32.const 7\n    i32.gt_u\n    i32.const 384\n    call $32\n    get_local $2\n    get_local $3\n    i32.load offset=4\n    i32.const 8\n    call $34\n    drop\n    get_local $3\n    get_local $3\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    i32.store offset=4\n    get_local $0\n    i32.load\n    set_local $0\n    get_local $1\n    i32.load\n    tee_local $3\n    i32.load offset=8\n    get_local $3\n    i32.load offset=4\n    i32.sub\n    i32.const 7\n    i32.gt_u\n    i32.const 384\n    call $32\n    get_local $0\n    i32.const 8\n    i32.add\n    get_local $3\n    i32.load offset=4\n    i32.const 8\n    call $34\n    drop\n    get_local $3\n    get_local $3\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    i32.store offset=4\n    get_local $1\n    i32.load\n    tee_local $3\n    i32.load offset=8\n    get_local $3\n    i32.load offset=4\n    i32.sub\n    i32.const 7\n    i32.gt_u\n    i32.const 384\n    call $32\n    get_local $0\n    i32.const 16\n    i32.add\n    get_local $3\n    i32.load offset=4\n    i32.const 8\n    call $34\n    drop\n    get_local $3\n    get_local $3\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    tee_local $2\n    i32.store offset=4\n    get_local $3\n    i32.load offset=8\n    get_local $2\n    i32.sub\n    i32.const 7\n    i32.gt_u\n    i32.const 384\n    call $32\n    get_local $0\n    i32.const 24\n    i32.add\n    get_local $3\n    i32.load offset=4\n    i32.const 8\n    call $34\n    drop\n    get_local $3\n    get_local $3\n    i32.load offset=4\n    i32.const 8\n    i32.add\n    i32.store offset=4\n    get_local $1\n    i32.load\n    get_local $0\n    i32.const 32\n    i32.add\n    call $73\n    drop\n    )\n  \n  (func $72\n    (param $0 i32)\n    (param $1 i32)\n    (local $2 i64)\n    (local $3 i64)\n    (local $4 i32)\n    (local $5 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 96\n    i32.sub\n    tee_local $5\n    i32.store offset=4\n    get_local $5\n    i32.const 44\n    i32.add\n    get_local $1\n    i32.const 28\n    i32.add\n    i32.load\n    i32.store\n    get_local $5\n    i32.const 32\n    i32.add\n    i32.const 8\n    i32.add\n    tee_local $4\n    get_local $1\n    i32.const 24\n    i32.add\n    i32.load\n    i32.store\n    get_local $5\n    get_local $1\n    i32.load offset=16\n    i32.store offset=32\n    get_local $5\n    get_local $1\n    i32.const 20\n    i32.add\n    i32.load\n    i32.store offset=36\n    get_local $1\n    i64.load offset=8\n    set_local $3\n    get_local $1\n    i64.load\n    set_local $2\n    get_local $5\n    i32.const 16\n    i32.add\n    get_local $1\n    i32.const 32\n    i32.add\n    call $81\n    drop\n    get_local $5\n    i32.const 48\n    i32.add\n    i32.const 8\n    i32.add\n    get_local $4\n    i64.load\n    i64.store\n    get_local $5\n    get_local $5\n    i64.load offset=32\n    i64.store offset=48\n    get_local $0\n    i32.load\n    i32.load\n    get_local $0\n    i32.load offset=4\n    tee_local $1\n    i32.load offset=4\n    tee_local $4\n    i32.const 1\n    i32.shr_s\n    i32.add\n    set_local $0\n    get_local $1\n    i32.load\n    set_local $1\n    block $block\n      get_local $4\n      i32.const 1\n      i32.and\n      i32.eqz\n      br_if $block\n      get_local $0\n      i32.load\n      get_local $1\n      i32.add\n      i32.load\n      set_local $1\n    end ;; $block\n    get_local $5\n    i32.const 80\n    i32.add\n    i32.const 8\n    i32.add\n    tee_local $4\n    get_local $5\n    i32.const 48\n    i32.add\n    i32.const 8\n    i32.add\n    i64.load\n    i64.store\n    get_local $5\n    get_local $5\n    i64.load offset=48\n    i64.store offset=80\n    get_local $5\n    i32.const 64\n    i32.add\n    get_local $5\n    i32.const 16\n    i32.add\n    call $81\n    drop\n    get_local $5\n    i32.const 8\n    i32.add\n    get_local $4\n    i64.load\n    i64.store\n    get_local $5\n    get_local $5\n    i64.load offset=80\n    i64.store\n    get_local $0\n    get_local $2\n    get_local $3\n    get_local $5\n    get_local $5\n    i32.const 64\n    i32.add\n    get_local $1\n    call_indirect $1\n    block $block1\n      get_local $5\n      i32.load8_u offset=64\n      i32.const 1\n      i32.and\n      i32.eqz\n      br_if $block1\n      get_local $5\n      i32.load offset=72\n      call $77\n    end ;; $block1\n    block $block2\n      get_local $5\n      i32.load8_u offset=16\n      i32.const 1\n      i32.and\n      i32.eqz\n      br_if $block2\n      get_local $5\n      i32.load offset=24\n      call $77\n    end ;; $block2\n    i32.const 0\n    get_local $5\n    i32.const 96\n    i32.add\n    i32.store offset=4\n    )\n  \n  (func $73\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 32\n    i32.sub\n    tee_local $7\n    i32.store offset=4\n    get_local $7\n    i32.const 0\n    i32.store offset=24\n    get_local $7\n    i64.const 0\n    i64.store offset=16\n    get_local $0\n    get_local $7\n    i32.const 16\n    i32.add\n    call $74\n    drop\n    block $block\n      block $block1\n        block $block2\n          block $block3\n            block $block4\n              block $block5\n                block $block6\n                  block $block7\n                    block $block8\n                      get_local $7\n                      i32.load offset=20\n                      tee_local $5\n                      get_local $7\n                      i32.load offset=16\n                      tee_local $4\n                      i32.ne\n                      br_if $block8\n                      get_local $1\n                      i32.load8_u\n                      i32.const 1\n                      i32.and\n                      br_if $block7\n                      get_local $1\n                      i32.const 0\n                      i32.store16\n                      get_local $1\n                      i32.const 8\n                      i32.add\n                      set_local $4\n                      br $block6\n                    end ;; $block8\n                    get_local $7\n                    i32.const 8\n                    i32.add\n                    i32.const 0\n                    i32.store\n                    get_local $7\n                    i64.const 0\n                    i64.store\n                    get_local $5\n                    get_local $4\n                    i32.sub\n                    tee_local $2\n                    i32.const -16\n                    i32.ge_u\n                    br_if $block\n                    get_local $2\n                    i32.const 11\n                    i32.ge_u\n                    br_if $block5\n                    get_local $7\n                    get_local $2\n                    i32.const 1\n                    i32.shl\n                    i32.store8\n                    get_local $7\n                    i32.const 1\n                    i32.or\n                    set_local $6\n                    get_local $2\n                    br_if $block4\n                    br $block3\n                  end ;; $block7\n                  get_local $1\n                  i32.load offset=8\n                  i32.const 0\n                  i32.store8\n                  get_local $1\n                  i32.const 0\n                  i32.store offset=4\n                  get_local $1\n                  i32.const 8\n                  i32.add\n                  set_local $4\n                end ;; $block6\n                get_local $1\n                i32.const 0\n                call $79\n                get_local $4\n                i32.const 0\n                i32.store\n                get_local $1\n                i64.const 0\n                i64.store align=4\n                get_local $7\n                i32.load offset=16\n                tee_local $4\n                br_if $block2\n                br $block1\n              end ;; $block5\n              get_local $2\n              i32.const 16\n              i32.add\n              i32.const -16\n              i32.and\n              tee_local $5\n              call $76\n              set_local $6\n              get_local $7\n              get_local $5\n              i32.const 1\n              i32.or\n              i32.store\n              get_local $7\n              get_local $6\n              i32.store offset=8\n              get_local $7\n              get_local $2\n              i32.store offset=4\n            end ;; $block4\n            get_local $2\n            set_local $3\n            get_local $6\n            set_local $5\n            loop $loop\n              get_local $5\n              get_local $4\n              i32.load8_u\n              i32.store8\n              get_local $5\n              i32.const 1\n              i32.add\n              set_local $5\n              get_local $4\n              i32.const 1\n              i32.add\n              set_local $4\n              get_local $3\n              i32.const -1\n              i32.add\n              tee_local $3\n              br_if $loop\n            end ;; $loop\n            get_local $6\n            get_local $2\n            i32.add\n            set_local $6\n          end ;; $block3\n          get_local $6\n          i32.const 0\n          i32.store8\n          block $block9\n            block $block10\n              get_local $1\n              i32.load8_u\n              i32.const 1\n              i32.and\n              br_if $block10\n              get_local $1\n              i32.const 0\n              i32.store16\n              br $block9\n            end ;; $block10\n            get_local $1\n            i32.load offset=8\n            i32.const 0\n            i32.store8\n            get_local $1\n            i32.const 0\n            i32.store offset=4\n          end ;; $block9\n          get_local $1\n          i32.const 0\n          call $79\n          get_local $1\n          i32.const 8\n          i32.add\n          get_local $7\n          i32.const 8\n          i32.add\n          i32.load\n          i32.store\n          get_local $1\n          get_local $7\n          i64.load\n          i64.store align=4\n          get_local $7\n          i32.load offset=16\n          tee_local $4\n          i32.eqz\n          br_if $block1\n        end ;; $block2\n        get_local $7\n        get_local $4\n        i32.store offset=20\n        get_local $4\n        call $77\n      end ;; $block1\n      i32.const 0\n      get_local $7\n      i32.const 32\n      i32.add\n      i32.store offset=4\n      get_local $0\n      return\n    end ;; $block\n    get_local $7\n    call $78\n    unreachable\n    )\n  \n  (func $74\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i64)\n    (local $7 i32)\n    get_local $0\n    i32.load offset=4\n    set_local $5\n    i32.const 0\n    set_local $7\n    i64.const 0\n    set_local $6\n    get_local $0\n    i32.const 8\n    i32.add\n    set_local $2\n    get_local $0\n    i32.const 4\n    i32.add\n    set_local $3\n    loop $loop\n      get_local $5\n      get_local $2\n      i32.load\n      i32.lt_u\n      i32.const 1568\n      call $32\n      get_local $3\n      i32.load\n      tee_local $5\n      i32.load8_u\n      set_local $4\n      get_local $3\n      get_local $5\n      i32.const 1\n      i32.add\n      tee_local $5\n      i32.store\n      get_local $4\n      i32.const 127\n      i32.and\n      get_local $7\n      i32.const 255\n      i32.and\n      tee_local $7\n      i32.shl\n      i64.extend_u\/i32\n      get_local $6\n      i64.or\n      set_local $6\n      get_local $7\n      i32.const 7\n      i32.add\n      set_local $7\n      get_local $4\n      i32.const 7\n      i32.shr_u\n      br_if $loop\n    end ;; $loop\n    block $block\n      block $block1\n        get_local $6\n        i32.wrap\/i64\n        tee_local $3\n        get_local $1\n        i32.load offset=4\n        tee_local $7\n        get_local $1\n        i32.load\n        tee_local $4\n        i32.sub\n        tee_local $2\n        i32.le_u\n        br_if $block1\n        get_local $1\n        get_local $3\n        get_local $2\n        i32.sub\n        call $54\n        get_local $0\n        i32.const 4\n        i32.add\n        i32.load\n        set_local $5\n        get_local $1\n        i32.const 4\n        i32.add\n        i32.load\n        set_local $7\n        get_local $1\n        i32.load\n        set_local $4\n        br $block\n      end ;; $block1\n      get_local $3\n      get_local $2\n      i32.ge_u\n      br_if $block\n      get_local $1\n      i32.const 4\n      i32.add\n      get_local $4\n      get_local $3\n      i32.add\n      tee_local $7\n      i32.store\n    end ;; $block\n    get_local $0\n    i32.const 8\n    i32.add\n    i32.load\n    get_local $5\n    i32.sub\n    get_local $7\n    get_local $4\n    i32.sub\n    tee_local $5\n    i32.ge_u\n    i32.const 384\n    call $32\n    get_local $4\n    get_local $0\n    i32.const 4\n    i32.add\n    tee_local $7\n    i32.load\n    get_local $5\n    call $34\n    drop\n    get_local $7\n    get_local $7\n    i32.load\n    get_local $5\n    i32.add\n    i32.store\n    get_local $0\n    )\n  \n  (func $75\n    (param $0 i32)\n    (param $1 i32)\n    (local $2 i64)\n    (local $3 i32)\n    (local $4 i32)\n    i32.const 0\n    i32.const 0\n    i32.load offset=4\n    i32.const 96\n    i32.sub\n    tee_local $4\n    i32.store offset=4\n    get_local $4\n    i32.const 32\n    i32.add\n    i32.const 12\n    i32.add\n    get_local $1\n    i32.const 20\n    i32.add\n    i32.load\n    i32.store\n    get_local $4\n    i32.const 32\n    i32.add\n    i32.const 8\n    i32.add\n    tee_local $3\n    get_local $1\n    i32.const 16\n    i32.add\n    i32.load\n    i32.store\n    get_local $4\n    get_local $1\n    i32.load offset=8\n    i32.store offset=32\n    get_local $4\n    get_local $1\n    i32.const 12\n    i32.add\n    i32.load\n    i32.store offset=36\n    get_local $1\n    i64.load\n    set_local $2\n    get_local $4\n    i32.const 16\n    i32.add\n    get_local $1\n    i32.const 24\n    i32.add\n    call $81\n    drop\n    get_local $4\n    i32.const 48\n    i32.add\n    i32.const 8\n    i32.add\n    get_local $3\n    i64.load\n    i64.store\n    get_local $4\n    get_local $4\n    i64.load offset=32\n    i64.store offset=48\n    get_local $0\n    i32.load\n    i32.load\n    get_local $0\n    i32.load offset=4\n    tee_local $1\n    i32.load offset=4\n    tee_local $3\n    i32.const 1\n    i32.shr_s\n    i32.add\n    set_local $0\n    get_local $1\n    i32.load\n    set_local $1\n    block $block\n      get_local $3\n      i32.const 1\n      i32.and\n      i32.eqz\n      br_if $block\n      get_local $0\n      i32.load\n      get_local $1\n      i32.add\n      i32.load\n      set_local $1\n    end ;; $block\n    get_local $4\n    i32.const 80\n    i32.add\n    i32.const 8\n    i32.add\n    tee_local $3\n    get_local $4\n    i32.const 48\n    i32.add\n    i32.const 8\n    i32.add\n    i64.load\n    i64.store\n    get_local $4\n    get_local $4\n    i64.load offset=48\n    i64.store offset=80\n    get_local $4\n    i32.const 64\n    i32.add\n    get_local $4\n    i32.const 16\n    i32.add\n    call $81\n    drop\n    get_local $4\n    i32.const 8\n    i32.add\n    get_local $3\n    i64.load\n    i64.store\n    get_local $4\n    get_local $4\n    i64.load offset=80\n    i64.store\n    get_local $0\n    get_local $2\n    get_local $4\n    get_local $4\n    i32.const 64\n    i32.add\n    get_local $1\n    call_indirect $2\n    block $block1\n      get_local $4\n      i32.load8_u offset=64\n      i32.const 1\n      i32.and\n      i32.eqz\n      br_if $block1\n      get_local $4\n      i32.load offset=72\n      call $77\n    end ;; $block1\n    block $block2\n      get_local $4\n      i32.load8_u offset=16\n      i32.const 1\n      i32.and\n      i32.eqz\n      br_if $block2\n      get_local $4\n      i32.load offset=24\n      call $77\n    end ;; $block2\n    i32.const 0\n    get_local $4\n    i32.const 96\n    i32.add\n    i32.store offset=4\n    )\n  \n  (func $76\n    (param $0 i32)\n    (result i32)\n    (local $1 i32)\n    (local $2 i32)\n    block $block\n      get_local $0\n      i32.const 1\n      get_local $0\n      select\n      tee_local $1\n      call $83\n      tee_local $0\n      br_if $block\n      loop $loop\n        i32.const 0\n        set_local $0\n        i32.const 0\n        i32.load offset=1572\n        tee_local $2\n        i32.eqz\n        br_if $block\n        get_local $2\n        call_indirect $3\n        get_local $1\n        call $83\n        tee_local $0\n        i32.eqz\n        br_if $loop\n      end ;; $loop\n    end ;; $block\n    get_local $0\n    )\n  \n  (func $77\n    (param $0 i32)\n    block $block\n      get_local $0\n      i32.eqz\n      br_if $block\n      get_local $0\n      call $86\n    end ;; $block\n    )\n  \n  (func $78\n    (param $0 i32)\n    call $23\n    unreachable\n    )\n  \n  (func $79\n    (param $0 i32)\n    (param $1 i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i32)\n    block $block\n      get_local $1\n      i32.const -16\n      i32.ge_u\n      br_if $block\n      i32.const 10\n      set_local $2\n      block $block1\n        get_local $0\n        i32.load8_u\n        tee_local $5\n        i32.const 1\n        i32.and\n        i32.eqz\n        br_if $block1\n        get_local $0\n        i32.load\n        tee_local $5\n        i32.const -2\n        i32.and\n        i32.const -1\n        i32.add\n        set_local $2\n      end ;; $block1\n      block $block2\n        block $block3\n          get_local $5\n          i32.const 1\n          i32.and\n          br_if $block3\n          get_local $5\n          i32.const 254\n          i32.and\n          i32.const 1\n          i32.shr_u\n          set_local $3\n          br $block2\n        end ;; $block3\n        get_local $0\n        i32.load offset=4\n        set_local $3\n      end ;; $block2\n      i32.const 10\n      set_local $4\n      block $block4\n        get_local $3\n        get_local $1\n        get_local $3\n        get_local $1\n        i32.gt_u\n        select\n        tee_local $1\n        i32.const 11\n        i32.lt_u\n        br_if $block4\n        get_local $1\n        i32.const 16\n        i32.add\n        i32.const -16\n        i32.and\n        i32.const -1\n        i32.add\n        set_local $4\n      end ;; $block4\n      block $block5\n        get_local $4\n        get_local $2\n        i32.eq\n        br_if $block5\n        block $block6\n          block $block7\n            get_local $4\n            i32.const 10\n            i32.ne\n            br_if $block7\n            i32.const 1\n            set_local $6\n            get_local $0\n            i32.const 1\n            i32.add\n            set_local $1\n            get_local $0\n            i32.load offset=8\n            set_local $2\n            i32.const 0\n            set_local $7\n            br $block6\n          end ;; $block7\n          get_local $4\n          i32.const 1\n          i32.add\n          call $76\n          set_local $1\n          block $block8\n            get_local $4\n            get_local $2\n            i32.gt_u\n            br_if $block8\n            get_local $1\n            i32.eqz\n            br_if $block5\n          end ;; $block8\n          block $block9\n            get_local $0\n            i32.load8_u\n            tee_local $5\n            i32.const 1\n            i32.and\n            br_if $block9\n            i32.const 1\n            set_local $7\n            get_local $0\n            i32.const 1\n            i32.add\n            set_local $2\n            i32.const 0\n            set_local $6\n            br $block6\n          end ;; $block9\n          get_local $0\n          i32.load offset=8\n          set_local $2\n          i32.const 1\n          set_local $6\n          i32.const 1\n          set_local $7\n        end ;; $block6\n        block $block10\n          block $block11\n            get_local $5\n            i32.const 1\n            i32.and\n            br_if $block11\n            get_local $5\n            i32.const 254\n            i32.and\n            i32.const 1\n            i32.shr_u\n            set_local $5\n            br $block10\n          end ;; $block11\n          get_local $0\n          i32.load offset=4\n          set_local $5\n        end ;; $block10\n        block $block12\n          get_local $5\n          i32.const 1\n          i32.add\n          tee_local $5\n          i32.eqz\n          br_if $block12\n          get_local $1\n          get_local $2\n          get_local $5\n          call $34\n          drop\n        end ;; $block12\n        block $block13\n          get_local $6\n          i32.eqz\n          br_if $block13\n          get_local $2\n          call $77\n        end ;; $block13\n        block $block14\n          get_local $7\n          i32.eqz\n          br_if $block14\n          get_local $0\n          get_local $3\n          i32.store offset=4\n          get_local $0\n          get_local $1\n          i32.store offset=8\n          get_local $0\n          get_local $4\n          i32.const 1\n          i32.add\n          i32.const 1\n          i32.or\n          i32.store\n          return\n        end ;; $block14\n        get_local $0\n        get_local $3\n        i32.const 1\n        i32.shl\n        i32.store8\n      end ;; $block5\n      return\n    end ;; $block\n    call $23\n    unreachable\n    )\n  \n  (func $80\n    (param $0 i32)\n    call $23\n    unreachable\n    )\n  \n  (func $81\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    get_local $0\n    i64.const 0\n    i64.store align=4\n    get_local $0\n    i32.const 8\n    i32.add\n    tee_local $3\n    i32.const 0\n    i32.store\n    block $block\n      get_local $1\n      i32.load8_u\n      i32.const 1\n      i32.and\n      br_if $block\n      get_local $0\n      get_local $1\n      i64.load align=4\n      i64.store align=4\n      get_local $3\n      get_local $1\n      i32.const 8\n      i32.add\n      i32.load\n      i32.store\n      get_local $0\n      return\n    end ;; $block\n    block $block1\n      get_local $1\n      i32.load offset=4\n      tee_local $3\n      i32.const -16\n      i32.ge_u\n      br_if $block1\n      get_local $1\n      i32.load offset=8\n      set_local $2\n      block $block2\n        block $block3\n          block $block4\n            get_local $3\n            i32.const 11\n            i32.ge_u\n            br_if $block4\n            get_local $0\n            get_local $3\n            i32.const 1\n            i32.shl\n            i32.store8\n            get_local $0\n            i32.const 1\n            i32.add\n            set_local $1\n            get_local $3\n            br_if $block3\n            br $block2\n          end ;; $block4\n          get_local $3\n          i32.const 16\n          i32.add\n          i32.const -16\n          i32.and\n          tee_local $4\n          call $76\n          set_local $1\n          get_local $0\n          get_local $4\n          i32.const 1\n          i32.or\n          i32.store\n          get_local $0\n          get_local $1\n          i32.store offset=8\n          get_local $0\n          get_local $3\n          i32.store offset=4\n        end ;; $block3\n        get_local $1\n        get_local $2\n        get_local $3\n        call $34\n        drop\n      end ;; $block2\n      get_local $1\n      get_local $3\n      i32.add\n      i32.const 0\n      i32.store8\n      get_local $0\n      return\n    end ;; $block1\n    call $23\n    unreachable\n    )\n  \n  (func $82\n    (param $0 i32)\n    (param $1 i32)\n    (param $2 i32)\n    (result i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    i32.const 0\n    set_local $5\n    block $block\n      get_local $2\n      i32.eqz\n      br_if $block\n      block $block1\n        loop $loop\n          get_local $0\n          i32.load8_u\n          tee_local $3\n          get_local $1\n          i32.load8_u\n          tee_local $4\n          i32.ne\n          br_if $block1\n          get_local $1\n          i32.const 1\n          i32.add\n          set_local $1\n          get_local $0\n          i32.const 1\n          i32.add\n          set_local $0\n          get_local $2\n          i32.const -1\n          i32.add\n          tee_local $2\n          br_if $loop\n          br $block\n        end ;; $loop\n      end ;; $block1\n      get_local $3\n      get_local $4\n      i32.sub\n      set_local $5\n    end ;; $block\n    get_local $5\n    )\n  \n  (func $83\n    (param $0 i32)\n    (result i32)\n    i32.const 1576\n    get_local $0\n    call $84\n    )\n  \n  (func $84\n    (param $0 i32)\n    (param $1 i32)\n    (result i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i32)\n    (local $8 i32)\n    (local $9 i32)\n    (local $10 i32)\n    (local $11 i32)\n    (local $12 i32)\n    (local $13 i32)\n    block $block\n      get_local $1\n      i32.eqz\n      br_if $block\n      block $block1\n        get_local $0\n        i32.load offset=8384\n        tee_local $13\n        br_if $block1\n        i32.const 16\n        set_local $13\n        get_local $0\n        i32.const 8384\n        i32.add\n        i32.const 16\n        i32.store\n      end ;; $block1\n      get_local $1\n      i32.const 8\n      i32.add\n      get_local $1\n      i32.const 4\n      i32.add\n      i32.const 7\n      i32.and\n      tee_local $2\n      i32.sub\n      get_local $1\n      get_local $2\n      select\n      set_local $2\n      block $block2\n        block $block3\n          block $block4\n            get_local $0\n            i32.load offset=8388\n            tee_local $10\n            get_local $13\n            i32.ge_u\n            br_if $block4\n            get_local $0\n            get_local $10\n            i32.const 12\n            i32.mul\n            i32.add\n            i32.const 8192\n            i32.add\n            set_local $1\n            block $block5\n              get_local $10\n              br_if $block5\n              get_local $0\n              i32.const 8196\n              i32.add\n              tee_local $13\n              i32.load\n              br_if $block5\n              get_local $1\n              i32.const 8192\n              i32.store\n              get_local $13\n              get_local $0\n              i32.store\n            end ;; $block5\n            get_local $2\n            i32.const 4\n            i32.add\n            set_local $10\n            loop $loop\n              block $block6\n                get_local $1\n                i32.load offset=8\n                tee_local $13\n                get_local $10\n                i32.add\n                get_local $1\n                i32.load\n                i32.gt_u\n                br_if $block6\n                get_local $1\n                i32.load offset=4\n                get_local $13\n                i32.add\n                tee_local $13\n                get_local $13\n                i32.load\n                i32.const -2147483648\n                i32.and\n                get_local $2\n                i32.or\n                i32.store\n                get_local $1\n                i32.const 8\n                i32.add\n                tee_local $1\n                get_local $1\n                i32.load\n                get_local $10\n                i32.add\n                i32.store\n                get_local $13\n                get_local $13\n                i32.load\n                i32.const -2147483648\n                i32.or\n                i32.store\n                get_local $13\n                i32.const 4\n                i32.add\n                tee_local $1\n                br_if $block3\n              end ;; $block6\n              get_local $0\n              call $85\n              tee_local $1\n              br_if $loop\n            end ;; $loop\n          end ;; $block4\n          i32.const 2147483644\n          get_local $2\n          i32.sub\n          set_local $4\n          get_local $0\n          i32.const 8392\n          i32.add\n          set_local $11\n          get_local $0\n          i32.const 8384\n          i32.add\n          set_local $12\n          get_local $0\n          i32.load offset=8392\n          tee_local $3\n          set_local $13\n          loop $loop1\n            get_local $0\n            get_local $13\n            i32.const 12\n            i32.mul\n            i32.add\n            tee_local $1\n            i32.const 8200\n            i32.add\n            i32.load\n            get_local $1\n            i32.const 8192\n            i32.add\n            tee_local $5\n            i32.load\n            i32.eq\n            i32.const 9984\n            call $32\n            get_local $1\n            i32.const 8196\n            i32.add\n            i32.load\n            tee_local $6\n            i32.const 4\n            i32.add\n            set_local $13\n            loop $loop2\n              get_local $6\n              get_local $5\n              i32.load\n              i32.add\n              set_local $7\n              get_local $13\n              i32.const -4\n              i32.add\n              tee_local $8\n              i32.load\n              tee_local $9\n              i32.const 2147483647\n              i32.and\n              set_local $1\n              block $block7\n                get_local $9\n                i32.const 0\n                i32.lt_s\n                br_if $block7\n                block $block8\n                  get_local $1\n                  get_local $2\n                  i32.ge_u\n                  br_if $block8\n                  loop $loop3\n                    get_local $13\n                    get_local $1\n                    i32.add\n                    tee_local $10\n                    get_local $7\n                    i32.ge_u\n                    br_if $block8\n                    get_local $10\n                    i32.load\n                    tee_local $10\n                    i32.const 0\n                    i32.lt_s\n                    br_if $block8\n                    get_local $1\n                    get_local $10\n                    i32.const 2147483647\n                    i32.and\n                    i32.add\n                    i32.const 4\n                    i32.add\n                    tee_local $1\n                    get_local $2\n                    i32.lt_u\n                    br_if $loop3\n                  end ;; $loop3\n                end ;; $block8\n                get_local $8\n                get_local $1\n                get_local $2\n                get_local $1\n                get_local $2\n                i32.lt_u\n                select\n                get_local $9\n                i32.const -2147483648\n                i32.and\n                i32.or\n                i32.store\n                block $block9\n                  get_local $1\n                  get_local $2\n                  i32.le_u\n                  br_if $block9\n                  get_local $13\n                  get_local $2\n                  i32.add\n                  get_local $4\n                  get_local $1\n                  i32.add\n                  i32.const 2147483647\n                  i32.and\n                  i32.store\n                end ;; $block9\n                get_local $1\n                get_local $2\n                i32.ge_u\n                br_if $block2\n              end ;; $block7\n              get_local $13\n              get_local $1\n              i32.add\n              i32.const 4\n              i32.add\n              tee_local $13\n              get_local $7\n              i32.lt_u\n              br_if $loop2\n            end ;; $loop2\n            i32.const 0\n            set_local $1\n            get_local $11\n            i32.const 0\n            get_local $11\n            i32.load\n            i32.const 1\n            i32.add\n            tee_local $13\n            get_local $13\n            get_local $12\n            i32.load\n            i32.eq\n            select\n            tee_local $13\n            i32.store\n            get_local $13\n            get_local $3\n            i32.ne\n            br_if $loop1\n          end ;; $loop1\n        end ;; $block3\n        get_local $1\n        return\n      end ;; $block2\n      get_local $8\n      get_local $8\n      i32.load\n      i32.const -2147483648\n      i32.or\n      i32.store\n      get_local $13\n      return\n    end ;; $block\n    i32.const 0\n    )\n  \n  (func $85\n    (param $0 i32)\n    (result i32)\n    (local $1 i32)\n    (local $2 i32)\n    (local $3 i32)\n    (local $4 i32)\n    (local $5 i32)\n    (local $6 i32)\n    (local $7 i32)\n    (local $8 i32)\n    get_local $0\n    i32.load offset=8388\n    set_local $1\n    block $block\n      block $block1\n        i32.const 0\n        i32.load8_u offset=10070\n        i32.eqz\n        br_if $block1\n        i32.const 0\n        i32.load offset=10072\n        set_local $7\n        br $block\n      end ;; $block1\n      current_memory\n      set_local $7\n      i32.const 0\n      i32.const 1\n      i32.store8 offset=10070\n      i32.const 0\n      get_local $7\n      i32.const 16\n      i32.shl\n      tee_local $7\n      i32.store offset=10072\n    end ;; $block\n    get_local $7\n    set_local $3\n    block $block2\n      block $block3\n        block $block4\n          block $block5\n            get_local $7\n            i32.const 65535\n            i32.add\n            i32.const 16\n            i32.shr_u\n            tee_local $2\n            current_memory\n            tee_local $8\n            i32.le_u\n            br_if $block5\n            get_local $2\n            get_local $8\n            i32.sub\n            grow_memory\n            drop\n            i32.const 0\n            set_local $8\n            get_local $2\n            current_memory\n            i32.ne\n            br_if $block4\n            i32.const 0\n            i32.load offset=10072\n            set_local $3\n          end ;; $block5\n          i32.const 0\n          set_local $8\n          i32.const 0\n          get_local $3\n          i32.store offset=10072\n          get_local $7\n          i32.const 0\n          i32.lt_s\n          br_if $block4\n          get_local $0\n          get_local $1\n          i32.const 12\n          i32.mul\n          i32.add\n          set_local $2\n          get_local $7\n          i32.const 65536\n          i32.const 131072\n          get_local $7\n          i32.const 65535\n          i32.and\n          tee_local $8\n          i32.const 64513\n          i32.lt_u\n          tee_local $6\n          select\n          i32.add\n          get_local $8\n          get_local $7\n          i32.const 131071\n          i32.and\n          get_local $6\n          select\n          i32.sub\n          get_local $7\n          i32.sub\n          set_local $7\n          block $block6\n            i32.const 0\n            i32.load8_u offset=10070\n            br_if $block6\n            current_memory\n            set_local $3\n            i32.const 0\n            i32.const 1\n            i32.store8 offset=10070\n            i32.const 0\n            get_local $3\n            i32.const 16\n            i32.shl\n            tee_local $3\n            i32.store offset=10072\n          end ;; $block6\n          get_local $2\n          i32.const 8192\n          i32.add\n          set_local $2\n          get_local $7\n          i32.const 0\n          i32.lt_s\n          br_if $block3\n          get_local $3\n          set_local $6\n          block $block7\n            get_local $7\n            i32.const 7\n            i32.add\n            i32.const -8\n            i32.and\n            tee_local $5\n            get_local $3\n            i32.add\n            i32.const 65535\n            i32.add\n            i32.const 16\n            i32.shr_u\n            tee_local $8\n            current_memory\n            tee_local $4\n            i32.le_u\n            br_if $block7\n            get_local $8\n            get_local $4\n            i32.sub\n            grow_memory\n            drop\n            get_local $8\n            current_memory\n            i32.ne\n            br_if $block3\n            i32.const 0\n            i32.load offset=10072\n            set_local $6\n          end ;; $block7\n          i32.const 0\n          get_local $6\n          get_local $5\n          i32.add\n          i32.store offset=10072\n          get_local $3\n          i32.const -1\n          i32.eq\n          br_if $block3\n          get_local $0\n          get_local $1\n          i32.const 12\n          i32.mul\n          i32.add\n          tee_local $1\n          i32.const 8196\n          i32.add\n          i32.load\n          tee_local $6\n          get_local $2\n          i32.load\n          tee_local $8\n          i32.add\n          get_local $3\n          i32.eq\n          br_if $block2\n          block $block8\n            get_local $8\n            get_local $1\n            i32.const 8200\n            i32.add\n            tee_local $5\n            i32.load\n            tee_local $1\n            i32.eq\n            br_if $block8\n            get_local $6\n            get_local $1\n            i32.add\n            tee_local $6\n            get_local $6\n            i32.load\n            i32.const -2147483648\n            i32.and\n            i32.const -4\n            get_local $1\n            i32.sub\n            get_local $8\n            i32.add\n            i32.or\n            i32.store\n            get_local $5\n            get_local $2\n            i32.load\n            i32.store\n            get_local $6\n            get_local $6\n            i32.load\n            i32.const 2147483647\n            i32.and\n            i32.store\n          end ;; $block8\n          get_local $0\n          i32.const 8388\n          i32.add\n          tee_local $2\n          get_local $2\n          i32.load\n          i32.const 1\n          i32.add\n          tee_local $2\n          i32.store\n          get_local $0\n          get_local $2\n          i32.const 12\n          i32.mul\n          i32.add\n          tee_local $0\n          i32.const 8196\n          i32.add\n          get_local $3\n          i32.store\n          get_local $0\n          i32.const 8192\n          i32.add\n          tee_local $8\n          get_local $7\n          i32.store\n        end ;; $block4\n        get_local $8\n        return\n      end ;; $block3\n      block $block9\n        get_local $2\n        i32.load\n        tee_local $8\n        get_local $0\n        get_local $1\n        i32.const 12\n        i32.mul\n        i32.add\n        tee_local $3\n        i32.const 8200\n        i32.add\n        tee_local $1\n        i32.load\n        tee_local $7\n        i32.eq\n        br_if $block9\n        get_local $3\n        i32.const 8196\n        i32.add\n        i32.load\n        get_local $7\n        i32.add\n        tee_local $3\n        get_local $3\n        i32.load\n        i32.const -2147483648\n        i32.and\n        i32.const -4\n        get_local $7\n        i32.sub\n        get_local $8\n        i32.add\n        i32.or\n        i32.store\n        get_local $1\n        get_local $2\n        i32.load\n        i32.store\n        get_local $3\n        get_local $3\n        i32.load\n        i32.const 2147483647\n        i32.and\n        i32.store\n      end ;; $block9\n      get_local $0\n      get_local $0\n      i32.const 8388\n      i32.add\n      tee_local $7\n      i32.load\n      i32.const 1\n      i32.add\n      tee_local $3\n      i32.store offset=8384\n      get_local $7\n      get_local $3\n      i32.store\n      i32.const 0\n      return\n    end ;; $block2\n    get_local $2\n    get_local $8\n    get_local $7\n    i32.add\n    i32.store\n    get_local $2\n    )\n  \n  (func $86\n    (param $0 i32)\n    (local $1 i32)\n    (local $2 i32)\n    (local $3 i32)\n    block $block\n      block $block1\n        get_local $0\n        i32.eqz\n        br_if $block1\n        i32.const 0\n        i32.load offset=9960\n        tee_local $2\n        i32.const 1\n        i32.lt_s\n        br_if $block1\n        i32.const 9768\n        set_local $3\n        get_local $2\n        i32.const 12\n        i32.mul\n        i32.const 9768\n        i32.add\n        set_local $1\n        loop $loop\n          get_local $3\n          i32.const 4\n          i32.add\n          i32.load\n          tee_local $2\n          i32.eqz\n          br_if $block1\n          block $block2\n            get_local $2\n            i32.const 4\n            i32.add\n            get_local $0\n            i32.gt_u\n            br_if $block2\n            get_local $2\n            get_local $3\n            i32.load\n            i32.add\n            get_local $0\n            i32.gt_u\n            br_if $block\n          end ;; $block2\n          get_local $3\n          i32.const 12\n          i32.add\n          tee_local $3\n          get_local $1\n          i32.lt_u\n          br_if $loop\n        end ;; $loop\n      end ;; $block1\n      return\n    end ;; $block\n    get_local $0\n    i32.const -4\n    i32.add\n    tee_local $3\n    get_local $3\n    i32.load\n    i32.const 2147483647\n    i32.and\n    i32.store\n    )\n  \n  (func $87\n    unreachable\n    ))",
    "wasm": "",
    "abi": {
        "version": "eosio::abi\/1.0",
        "types": [
            {
                "new_type_name": "account_name",
                "type": "name"
            }
        ],
        "structs": [
            {
                "name": "transfer",
                "base": "",
                "fields": [
                    {
                        "name": "from",
                        "type": "account_name"
                    },
                    {
                        "name": "to",
                        "type": "account_name"
                    },
                    {
                        "name": "quantity",
                        "type": "asset"
                    },
                    {
                        "name": "memo",
                        "type": "string"
                    }
                ]
            },
            {
                "name": "create",
                "base": "",
                "fields": [
                    {
                        "name": "issuer",
                        "type": "account_name"
                    },
                    {
                        "name": "maximum_supply",
                        "type": "asset"
                    }
                ]
            },
            {
                "name": "issue",
                "base": "",
                "fields": [
                    {
                        "name": "to",
                        "type": "account_name"
                    },
                    {
                        "name": "quantity",
                        "type": "asset"
                    },
                    {
                        "name": "memo",
                        "type": "string"
                    }
                ]
            },
            {
                "name": "account",
                "base": "",
                "fields": [
                    {
                        "name": "balance",
                        "type": "asset"
                    }
                ]
            },
            {
                "name": "currency_stats",
                "base": "",
                "fields": [
                    {
                        "name": "supply",
                        "type": "asset"
                    },
                    {
                        "name": "max_supply",
                        "type": "asset"
                    },
                    {
                        "name": "issuer",
                        "type": "account_name"
                    }
                ]
            }
        ],
        "actions": [
            {
                "name": "transfer",
                "type": "transfer",
                "ricardian_contract": "## Transfer Terms & Conditions\n\nI, {{from}}, certify the following to be true to the best of my knowledge:\n\n1. I certify that {{quantity}} is not the proceeds of fraudulent or violent activities.\n2. I certify that, to the best of my knowledge, {{to}} is not supporting initiation of violence against others.\n3. I have disclosed any contractual terms & conditions with respect to {{quantity}} to {{to}}.\n\nI understand that funds transfers are not reversible after the {{transaction.delay}} seconds or other delay as configured by {{from}}'s permissions.\n\nIf this action fails to be irreversibly confirmed after receiving goods or services from '{{to}}', I agree to either return the goods or services or resend {{quantity}} in a timely manner.\n"
            },
            {
                "name": "issue",
                "type": "issue",
                "ricardian_contract": ""
            },
            {
                "name": "create",
                "type": "create",
                "ricardian_contract": ""
            }
        ],
        "tables": [
            {
                "name": "accounts",
                "index_type": "i64",
                "key_names": [
                    "currency"
                ],
                "key_types": [
                    "uint64"
                ],
                "type": "account"
            },
            {
                "name": "stat",
                "index_type": "i64",
                "key_names": [
                    "currency"
                ],
                "key_types": [
                    "uint64"
                ],
                "type": "currency_stats"
            }
        ],
        "ricardian_clauses": [],
        "error_messages": [],
        "abi_extensions": []
    }
}
```

### Get Table Rows

Fetch smart contract data from an account

```php
echo $api->getTableRows("eosio", "eosio", "producers", ["limit" => 10]);

{
    "rows": [
        {
            "owner": "123singapore",
            "total_votes": "7635381396651940.00000000000000000",
            "producer_key": "EOS71UbkZzuz55WNBpsEVQzkXrZAJ2XyLoQiEcS9WKwbYambhFxWb",
            "is_active": 1,
            "url": "http:\/\/eos.vote",
            "unpaid_blocks": 0,
            "last_claim_time": 0,
            "location": 0
        },
        {
            "owner": "1eosbattles1",
            "total_votes": "329144938830.10693359375000000",
            "producer_key": "EOS1111111111111111111111111111111114T1Anm",
            "is_active": 0,
            "url": "http:\/\/eosbattles.com",
            "unpaid_blocks": 0,
            "last_claim_time": 0,
            "location": 643
        },
        {
            "owner": "1eostheworld",
            "total_votes": "6444721987248596.00000000000000000",
            "producer_key": "EOS7DtVzfmr1c5ACb7usAwyn4f39V7urk6kBWswUWCtg3H8H6CFAr",
            "is_active": 1,
            "url": "https:\/\/eostheworld.io",
            "unpaid_blocks": 0,
            "last_claim_time": 0,
            "location": 0
        },
        {
            "owner": "acroeos12345",
            "total_votes": "40843507006054472.00000000000000000",
            "producer_key": "EOS56PyKoHXwyRkwDzr2uNhgDRioPoq5TwdN8Pm2hQGko7jrup2W5",
            "is_active": 1,
            "url": "http:\/\/www.acroeos.one",
            "unpaid_blocks": 0,
            "last_claim_time": "1529384683500000",
            "location": 0
        },
        {
            "owner": "activeeoscom",
            "total_votes": "263423256515098.18750000000000000",
            "producer_key": "EOS788SrVzZ3mJt3WUZkmYadjFJCisJGhZRTp85EznxEaqsARN26w",
            "is_active": 1,
            "url": "https:\/\/www.activeeos.com",
            "unpaid_blocks": 0,
            "last_claim_time": 0,
            "location": 840
        },
        {
            "owner": "alohaeosprod",
            "total_votes": "3030935801454364.00000000000000000",
            "producer_key": "EOS53pfXfxZ4tH3EGccdnGvBZVJsrcSf2nbCKiLLMphgaii9XxxhM",
            "is_active": 1,
            "url": "https:\/\/www.alohaeos.com",
            "unpaid_blocks": 0,
            "last_claim_time": 0,
            "location": 840
        },
        {
            "owner": "argentinaeos",
            "total_votes": "123369870016327824.00000000000000000",
            "producer_key": "EOS7jq4FHrFrtCXxpRQ39dBeDMa5AjM4VaRbqBECkSa5aZnizJzrx",
            "is_active": 1,
            "url": "https:\/\/www.eosargentina.io",
            "unpaid_blocks": 6204,
            "last_claim_time": "1529332327000000",
            "location": 0
        },
        {
            "owner": "atticlabeosb",
            "total_votes": "33150087680189208.00000000000000000",
            "producer_key": "EOS7LqudX6Ac4woGwTF9CvQKwrJhg3H7p3pScDoXj1Ws82mMZFQqf",
            "is_active": 1,
            "url": "http:\/\/atticlab.net\/",
            "unpaid_blocks": 0,
            "last_claim_time": 0,
            "location": 0
        },
        {
            "owner": "atticlabeosp",
            "total_votes": "13342565292388.24609375000000000",
            "producer_key": "EOS1111111111111111111111111111111114T1Anm",
            "is_active": 0,
            "url": "http:\/\/atticlab.net\/",
            "unpaid_blocks": 0,
            "last_claim_time": 0,
            "location": 0
        },
        {
            "owner": "aus1genereos",
            "total_votes": "60161086577330376.00000000000000000",
            "producer_key": "EOS57ZyzVjoEG2bvzmYmmeiH8YnYtRudxNKxppx17q7Hg29F8tW4t",
            "is_active": 1,
            "url": "http:\/\/www.genereos.io",
            "unpaid_blocks": 0,
            "last_claim_time": "1529336128000000",
            "location": 36
        }
    ],
    "more": true
}
```

### Get Currency Balance

Fetch currency balance(s) for an account

```php
echo $api->getCurrencyBalance("eosio.token", "eosdacserver");

[
    "2453.2054 EOS"
]
```

### Get Currency Stats

Fetch stats for a currency

```php
echo $api->getCurrencyStats("eosio.token", "EOS");

{
    "EOS": {
        "supply": "1000630685.5979 EOS",
        "max_supply": "10000000000.0000 EOS",
        "issuer": "eosio"
    }
}
```

### Get ABI

Get an account ABI

```php
echo $api->getAbi("eosio.token");

{
    "account_name": "eosio.token",
    "abi": {
        "version": "eosio::abi\/1.0",
        "types": [
            {
                "new_type_name": "account_name",
                "type": "name"
            }
        ],
        "structs": [
            {
                "name": "transfer",
                "base": "",
                "fields": [
                    {
                        "name": "from",
                        "type": "account_name"
                    },
                    {
                        "name": "to",
                        "type": "account_name"
                    },
                    {
                        "name": "quantity",
                        "type": "asset"
                    },
                    {
                        "name": "memo",
                        "type": "string"
                    }
                ]
            },
            {
                "name": "create",
                "base": "",
                "fields": [
                    {
                        "name": "issuer",
                        "type": "account_name"
                    },
                    {
                        "name": "maximum_supply",
                        "type": "asset"
                    }
                ]
            },
            {
                "name": "issue",
                "base": "",
                "fields": [
                    {
                        "name": "to",
                        "type": "account_name"
                    },
                    {
                        "name": "quantity",
                        "type": "asset"
                    },
                    {
                        "name": "memo",
                        "type": "string"
                    }
                ]
            },
            {
                "name": "account",
                "base": "",
                "fields": [
                    {
                        "name": "balance",
                        "type": "asset"
                    }
                ]
            },
            {
                "name": "currency_stats",
                "base": "",
                "fields": [
                    {
                        "name": "supply",
                        "type": "asset"
                    },
                    {
                        "name": "max_supply",
                        "type": "asset"
                    },
                    {
                        "name": "issuer",
                        "type": "account_name"
                    }
                ]
            }
        ],
        "actions": [
            {
                "name": "transfer",
                "type": "transfer",
                "ricardian_contract": "## Transfer Terms & Conditions\n\nI, {{from}}, certify the following to be true to the best of my knowledge:\n\n1. I certify that {{quantity}} is not the proceeds of fraudulent or violent activities.\n2. I certify that, to the best of my knowledge, {{to}} is not supporting initiation of violence against others.\n3. I have disclosed any contractual terms & conditions with respect to {{quantity}} to {{to}}.\n\nI understand that funds transfers are not reversible after the {{transaction.delay}} seconds or other delay as configured by {{from}}'s permissions.\n\nIf this action fails to be irreversibly confirmed after receiving goods or services from '{{to}}', I agree to either return the goods or services or resend {{quantity}} in a timely manner.\n"
            },
            {
                "name": "issue",
                "type": "issue",
                "ricardian_contract": ""
            },
            {
                "name": "create",
                "type": "create",
                "ricardian_contract": ""
            }
        ],
        "tables": [
            {
                "name": "accounts",
                "index_type": "i64",
                "key_names": [
                    "currency"
                ],
                "key_types": [
                    "uint64"
                ],
                "type": "account"
            },
            {
                "name": "stat",
                "index_type": "i64",
                "key_names": [
                    "currency"
                ],
                "key_types": [
                    "uint64"
                ],
                "type": "currency_stats"
            }
        ],
        "ricardian_clauses": [],
        "error_messages": [],
        "abi_extensions": []
    }
}
```

### Get Producers

List the producers

```php
echo $api->getProducers(10);

{
    "rows": [
        {
            "owner": "eoscannonchn",
            "total_votes": "190885314305033216.00000000000000000",
            "producer_key": "EOS73cTi9V7PNg4ujW5QzoTfRSdhH44MPiUJkUV6m3oGwj7RX7kML",
            "is_active": 1,
            "url": "https:\/\/eoscannon.io\/",
            "unpaid_blocks": 1068,
            "last_claim_time": "1529386104500000",
            "location": 0
        },
        {
            "owner": "eosliquideos",
            "total_votes": "183820287473882624.00000000000000000",
            "producer_key": "EOS4v1n2j5kXbCum8LLEc8zQLpeLK9rKVFmsUgLCWgMDN38P6PcrW",
            "is_active": 1,
            "url": "http:\/\/vote.liquideos.com\/",
            "unpaid_blocks": 36035,
            "last_claim_time": 0,
            "location": 0
        },
        {
            "owner": "bitfinexeos1",
            "total_votes": "183640395873258752.00000000000000000",
            "producer_key": "EOS6sgKjHUFtY1XxxQaMDwfxBac6nDBibVzZHb8LFMVmvSjcCdDhE",
            "is_active": 1,
            "url": "https:\/\/www.bitfinex.com",
            "unpaid_blocks": 12336,
            "last_claim_time": "1529267868500000",
            "location": 0
        },
        {
            "owner": "eosbeijingbp",
            "total_votes": "166097029637641184.00000000000000000",
            "producer_key": "EOS5dGpcEhwB4VEhhXEcqtZs9EQj5HeetuXDnsAGVHMXHAFdMjbdj",
            "is_active": 1,
            "url": "https:\/\/www.eosbeijing.one",
            "unpaid_blocks": 765,
            "last_claim_time": "1529389351500000",
            "location": 0
        },
        {
            "owner": "eoscanadacom",
            "total_votes": "166093998144777248.00000000000000000",
            "producer_key": "EOS5HYV7rWeRxpZMCooe8YHRFQHKK7ncdmmUMTe3wCMaY2EvyVzUx",
            "is_active": 1,
            "url": "https:\/\/www.eoscanada.com",
            "unpaid_blocks": 14844,
            "last_claim_time": "1529241504000000",
            "location": 0
        },
        {
            "owner": "eosstorebest",
            "total_votes": "163330702214720640.00000000000000000",
            "producer_key": "EOS8FrjiXUDAFc8pSQkFejk1zRxyALnqPbYdJsqhAwKMya3tY7TaU",
            "is_active": 1,
            "url": "http:\/\/www.eos.store",
            "unpaid_blocks": 576,
            "last_claim_time": "1529391314500000",
            "location": 900
        },
        {
            "owner": "eosauthority",
            "total_votes": "161795025325723264.00000000000000000",
            "producer_key": "EOS7dA4bBiwNqwHwoSY9wSVyXfUgKqdLEMv5hC6tBxVsutKkarpUk",
            "is_active": 1,
            "url": "https:\/\/eosauthority.com",
            "unpaid_blocks": 744,
            "last_claim_time": "1529389517000000",
            "location": 826
        },
        {
            "owner": "eosdacserver",
            "total_votes": "157360815010631104.00000000000000000",
            "producer_key": "EOS7aBPDACAn1SpJDjmaZHSEUgqfNWdUaNawVZhVuEWUx5aoepJf6",
            "is_active": 1,
            "url": "https:\/\/eosdac.io",
            "unpaid_blocks": 13656,
            "last_claim_time": "1529254000500000",
            "location": 0
        },
        {
            "owner": "eosnewyorkio",
            "total_votes": "147910610609050848.00000000000000000",
            "producer_key": "EOS6GVX8eUqC1gN1293B3ivCNbifbr1BT6gzTFaQBXzWH9QNKVM4X",
            "is_active": 1,
            "url": "https:\/\/bp.eosnewyork.io",
            "unpaid_blocks": 1908,
            "last_claim_time": "1529377390500000",
            "location": 184
        },
        {
            "owner": "eoscafeblock",
            "total_votes": "147016007941297792.00000000000000000",
            "producer_key": "EOS7MAPWVuYcxNtc2n9e6WaEedEZd9thGVHn2Wpu2PoMhNiteTTqL",
            "is_active": 1,
            "url": "https:\/\/eoscafecalgary.com",
            "unpaid_blocks": 1716,
            "last_claim_time": "1529379320500000",
            "location": 124
        }
    ],
    "total_producer_vote_weight": "5781755218852022272.00000000000000000",
    "more": "cypherglasss"
}
```

### ABI Json To Bin

Serialize json to binary hex

```php
echo $api->abiJsonToBin("eosio.token", "transfer", ["blockmatrix1", "blockmatrix1", "7.0000 EOS", "Testy McTest"]);

{
    "binargs": "10babbd94888683c10babbd94888683c701101000000000004454f53000000000c5465737479204d6354657374"
}
```

### ABI Bin To JSON

Serialize back binary hex to json

```php
echo $api->abiBinToJson("eosio.token", "transfer", "10babbd94888683c10babbd94888683c701101000000000004454f53000000000c5465737479204d6354657374");

{
    "args": {
        "from": "blockmatrix1",
        "to": "blockmatrix1",
        "quantity": "7.0000 EOS",
        "memo": "Testy McTest"
    }
}
```

## Tests

To run the test suites, simply execute:

```php
vendor/bin/phpunit
```

If you wanna get fancy and check code coverage:

```php
vendor/bin/phpunit --coverage-html tests/coverage
```

If you're really bored, you might wanna run some static analysis:

```php
vendor/bin/phpmetrics --report-html="tests/static" .
```

## Contributing

All contributions are welcome! Just fire up a PR, make sure your code style is PSR-2 compliant: 

```php
vendor/bin/php-cs-fixer fix --verbose
```

## License

Free for everyone!

MIT License
