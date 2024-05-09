<?php
namespace Mints\User\Ecommerce;
trait OrderStatuses {
    ##
    # == Order Statuses
    #

    # === Get order statuses.
    # Get order statuses.
    #
    # ==== First Example
    #     $data = $mintsUser->getOrderStatuses();
    public function getOrderStatuses() {
        return $this->client->raw('get', '/ecommerce/order-statuses');
    }

    # === Get order status.
    # Get status of an order.
    #
    # ==== Parameters
    # id:: (Integer) -- Order id.
    #
    # ==== First Example
    #     $data = $mintsUser->getOrderStatus(1);
    public function getOrderStatus($id) {
        return $this->client->raw('get', "/ecommerce/order-statuses/{$id}");
    }
}
