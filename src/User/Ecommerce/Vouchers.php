<?php
namespace Mints\User\Ecommerce;
use Mints\MintsHelper;

trait Vouchers {
    ##
    # === Get vouchers.
    # Get a collection of vouchers.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    # use_post:: (Boolean) -- Variable to determine if the request is by 'post' or 'get' functions.
    #
    # ==== First Example
    #
    #     $data = $mintsUser->getVouchers();
    # ==== Second Example
    #
    #     $options = ['fields' => 'id,title'];
    #     $data = $mintsUser->getVouchers($options);
    # ==== Third Example
    #
    #     $options = ['fields' => 'id,title'];
    #     $data = $mintsUser->getVouchers($options, true);
    #
    public function getVouchers($options = null, $usePost = true) {
        return MintsHelper::getQueryResults($this->client, '/ecommerce/vouchers', $options, $usePost);
    }

    ##
    # === Get vouchers.
    # Get a specific voucher.
    #
    # ==== Parameters
    # id:: (Integer) -- Voucher id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #
    #     $data = $mintsUser->getVoucher(1);
    # ==== Second Example
    #
    #     $options = ['fields' => 'id,title'];
    #     $data = $mintsUser->getVoucher(1, $options);
    #
    public function getVoucher($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/vouchers/{$id}", $options);
    }

    ##
    # === Create voucher.
    # Create voucher code.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'title' => 'Voucher title',
    #         'voucher_code' => 'XAZWQ12MP',
    #         'amount' => 100,
    #         'start_date' => '2023-03-28T10:20:00-06:00',
    #         'end_date' => '2023-03-31T10:20:00-06:00',
    #         'is_redeemed' => false
    #     ];
    #
    #     $data = $mintsUser->createVoucher($data);
    #
    public function createVoucher($data) {
        return $this->client->raw('post', '/ecommerce/vouchers', null, $this->dataTransform($data));
    }

    ##
    # === Update voucher.
    # Update voucher code.
    #
    # ==== Parameters
    # id:: (Integer) -- Voucher id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'title' => 'New voucher title',
    #         'voucher_code' => 'XAZWQ12MP2',
    #         'amount' => 250,
    #         'start_date' => '2023-03-27T10:20:00-06:00',
    #         'end_date' => '2023-03-30T10:20:00-06:00'
    #     ];
    #
    #     $data = $mintsUser->updateVoucher(1, $data);
    #
    public function updateVoucher($id, $data) {
        return $this->client->raw('put', "/ecommerce/vouchers/{$id}", null, $this->dataTransform($data));
    }
}