<?php
namespace Mints\User\Ecommerce;
use Mints\MintsHelper;

trait Orders {
    ##
    # == Orders
    #

    # === Duplicate order.
    # Duplicate an order.
    #
    # ==== Parameters
    # order_id:: (Integer) -- Order id.
    # data:: (Hash) -- Data to be submitted.
    #
    public function duplicateOrder($orderId, $data) {
        $this->client->raw('post', "/ecommerce/orders/duplicate/{$orderId}", null, $data);
    }

    # === Delete orders.
    # Delete orders.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     data = ['ids' => [18]];
    #     $data = $mintsUser->deleteOrders($data);
    public function deleteOrders($data) {
        $this->client->raw('delete', '/ecommerce/orders/delete', null, $this->dataTransform($data));
    }

    # === Get orders support data.
    # Get support data used in orders.
    #
    # ==== Example
    #     $data = $mintsUser->getOrdersSupportData();
    public function getOrdersSupportData() {
        return $this->client->raw('get', '/ecommerce/orders/support-data');
    }

    # === Get orders.
    # Get a collection of orders.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    # use_post:: (Boolean) -- Variable to determine if the request is by 'post' or 'get' functions.
    #
    # ==== First Example
    #     $data = $mintsUser->getOrders();
    #
    # ==== Second Example
    #     $options = ['fields' => 'id, title'];
    #     $data = $mintsUser->getOrders($options);
    #
    # ==== Third Example
    #     $options = ['fields' => 'id, title'];
    #     $data = $mintsUser->getOrders($options, false);
    public function getOrders($options = null, $usePost = true) {
        return MintsHelper::getQueryResults($this->client, '/ecommerce/orders', $options, $usePost);
    }

    # === Get order.
    # Get a order info.
    #
    # ==== Parameters
    # id:: (Integer) -- Order id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getOrder(1);
    #
    # ==== Second Example
    #     $options = ['fields' => "title"];
    #     $data = $mintsUser->getOrder(1, $options);
    public function getOrder($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/orders/{$id}", $options);
    }

    # === Create order.
    # Create a order with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'title' => 'New Order',
    #         'order_template_id' => 2
    #     ];
    #     $data = $mintsUser->createOrder($data);
    public function createOrder($data, $options = null) {
        return $this->client->raw('post', '/ecommerce/orders', $options, $this->dataTransform($data));
    }

    # === Update order.
    # Update a order info.
    #
    # ==== Parameters
    # id:: (Integer) -- Order id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = ['title' => 'New Order Modified'];
    #     $data = $mintsUser->updateOrder(26, $data);
    public function updateOrder($id, $data, $options = null) {
        return $this->client->raw('put', "/ecommerce/orders/{$id}", $options, $this->dataTransform($data));
    }

    ##
    # == Order Templates
    #

    # === Get order template support data.
    # Get support data from a order template.
    #
    # ==== Parameters
    # id:: (Integer) -- Order template id.
    #
    # ==== Example
    #     $data = $mintsUser->getOrderTemplateSupportData(1);
    public function getOrderTemplateSupportData($id) {
        return $this->client->raw('get', "/ecommerce/order-templates/support-data/{$id}");
    }

    # === Get order templates.
    # Get a collection of order templates.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getOrderTemplates();
    #
    # ==== Second Example
    #     $options = ['fields' => 'title'];
    #     $data = $mintsUser->getOrderTemplates($options);
    public function getOrderTemplates($options = null) {
        return $this->client->raw('get', '/ecommerce/order-templates', $options);
    }

    # === Get order template.
    # Get a order template info.
    #
    # ==== Parameters
    # id:: (Integer) -- Order template id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getOrderTemplate(1);
    #
    # ==== Second Example
    #     $options = ['fields' => 'title'];
    #     $data = $mintsUser->getOrderTemplate(1, $options);
    public function getOrderTemplate($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/order-templates/{$id}", $options);
    }

    # === Update order template.
    # Update a order template info.
    #
    # ==== Parameters
    # id:: (Integer) -- Order template id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = ['title' => 'Inventory Increase'];
    #     $data = $mintsUser->updateOrderTemplate(12, $data);
    public function updateOrderTemplate($id, $data) {
        return $this->client->raw('put', "/ecommerce/order-templates/{$id}", null, $this->dataTransform($data));
    }

    ##
    # == Order Items
    #

    # === Get order items support data.
    # Get support data used in order items.
    #
    # ==== Example
    #     $data = $mintsUser->getOrderItemsSupportData();
    public function getOrderItemsSupportData() {
        return $this->client->raw('get', '/ecommerce/order-items/support-data');
    }

    # TODO: The following two methods receive objects instead integer variable. Research use and test it.
    # === Detach order item from order item group.
    # Detach an order item from an order item group.
    #
    # ==== Parameters
    # order_item_id:: (Integer) -- Order item id.
    # group_id:: (Integer) -- Order items group id.
    #
    public function detachOrderItemFromOrderItemGroup($orderItemId, $groupId) {
        # TODO: Research use
        $this->client->raw('put', "/ecommerce/order-items/detach/{$orderItemId}/order-items-groups/{$groupId}");
    }

    # === Update order item from order item group.
    # Update an order item data from an order item group.
    #
    # ==== Parameters
    # order_item_id:: (Integer) -- Order item id.
    # group_id:: (Integer) -- Order items group id.
    #
    public function updateOrderItemFromOrderItemGroup($orderItemId, $groupId, $data) {
        # TODO: Research use
        $url = "/ecommerce/order-items/update/{$orderItemId}/order-items-groups/{$groupId}";
        $this->client->raw('put', $url, null, $this->dataTransform($data));
    }

    # === Get order items.
    # Get a collection of order items.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getOrderItems();
    #
    # ==== Second Example
    #     $options = ['fields' => "id"];
    #     $data = $mintsUser->getOrderItems($options);
    public function getOrderItems($options = null) {
        # FIXME: CaliRouter POST method not supported.
        return $this->client->raw('get', '/ecommerce/order-items', $options);
    }

    # === Get order item.
    # Get a order item info.
    #
    # ==== Parameters
    # id:: (Integer) -- Order item id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getOrderItem(1);
    #
    # ==== Second Example
    #     $options = ['fields' => 'id'];
    #     $data = $mintsUser->getOrderItem(1, $options);
    public function getOrderItem($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/order-items/{$id}", $options);
    }

    # === Update order item.
    # Update a order item info.
    #
    # ==== Parameters
    # id:: (Integer) -- Order item id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = ['title' => 'No title in order items'];
    #     $data = $mintsUser->updateOrderItem(1, $data);
    public function updateOrderItem($id, $data) {
        # TODO: Research what can update
        return $this->client->raw('put', "/ecommerce/order-items/{$id}", null, $this->dataTransform($data));
    }
}