<?php
namespace Mints\User\Ecommerce;
trait OrderItemsGroups {
    ##
    # == Order Items Groups
    #

    # === Get pending order template from order item group.
    # Get a pending order template from an order item group.
    #
    # ==== Parameters
    # parent_order_id:: (Integer) -- Order items group id.
    # order_template_id:: (Integer) -- Order template id.
    #
    # ==== Example
    #     $data = $mintsUser->getPendingOrderTemplateFromOrderItemGroup(1, 1);
    public function getPendingOrderTemplateFromOrderItemGroup($parent_order_id, $order_template_id) {
        $url = "/ecommerce/order-items-groups/{$parent_order_id}/pending-items/order-template/{$order_template_id}";
        return $this->client->raw('get', $url);
    }

    # === Get order item group support data by order id.
    # Get support data of an order item group by an order id.
    #
    # ==== Parameters
    # order_id:: (Integer) -- Order id.
    #
    # ==== Example
    #     $data = $mintsUser->getOrderItemGroupSupportDataByOrderId(1);
    public function getOrderItemGroupSupportDataByOrderId($order_id) {
        // FIXME: Return in OrderItemsGroupController.getTemplateSupportDataByOrderId method doesnt create data variable.
        return $this->client->raw('get', "/ecommerce/order-items-groups/support-data/{$order_id}");
    }

    # === Get order item groups.
    # Get a collection of order item groups.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getOrderItemGroups();
    #
    # ==== Second Example
    #     $options = [ 'fields' => 'name' ];
    #     $data = $mintsUser->getOrderItemGroups($options);
    public function getOrderItemGroups($options = null) {
        return $this->client->raw('get', '/ecommerce/order-items-groups', $options);
    }

    # === Get order item group.
    # Get a order item group info.
    #
    # ==== Parameters
    # id:: (Integer) -- Order item group id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getOrderItemGroup(1);
    #
    # ==== Second Example
    #     $options = [ 'fields' => 'name' ];
    #     $data = $mintsUser->getOrderItemGroup(1, $options);
    public function getOrderItemGroup($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/order-items-groups/{$id}", $options);
    }

    # === Create order item group.
    # Create a order item group with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #       'name' => 'New Order Item Group',
    #       'order_id' => 1,
    #       'quantity' => 1,
    #       'sale_price' => 200
    #     ];
    #     $options = [ 'include' => 'orderItems' ];
    #     $data = $mintsUser->createOrderItemGroup($data, $options);
    public function createOrderItemGroup($data, $options = null) {
        return $this->client->raw('post', '/ecommerce/order-items-groups', $options, $this->dataTransform($data));
    }

    # === Update order item group.
    # Update a order item group info.
    #
    # ==== Parameters
    # id:: (Integer) -- Order item group id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #       'name' => 'New Order Item Group Modified'
    #     ];
    #     $data = $mintsUser->updateOrderItemGroup(147, $data);
    public function updateOrderItemGroup($id, $data, $options = null) {
        return $this->client->raw('put', "/ecommerce/order-items-groups/{$id}", $options, $this->dataTransform($data));
    }

    # === Delete order item group.
    # Delete a order item group.
    #
    # ==== Parameters
    # id:: (Integer) -- Order item group id.
    #
    # ==== Example
    #     $data = $mintsUser->deleteOrderItemGroup(147);
    public function deleteOrderItemGroup($id) {
        return $this->client->raw('delete', "/ecommerce/order-items-groups/{$id}");
    }
}