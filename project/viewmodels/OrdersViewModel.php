<?php
require_once 'models/Orders.php';

class OrderViewModel
{
    private $order;

    public function __construct()
    {
        $this->order = new Orders();
    }

    public function getOrderList()
    {
        return $this->order->getAll();
    }

    public function getOrderById($id)
    {
        return $this->order->getById($id);
    }

    public function addOrder($user_id, $ticket_id, $jumlah, $tanggal_order)
    {
        return $this->order->create($user_id, $ticket_id, $jumlah, $tanggal_order);
    }

    public function updateOrder($id, $user_id, $ticket_id, $jumlah)
    {
        return $this->order->update($id, $user_id, $ticket_id, $jumlah);
    }

    public function deleteOrder($id)
    {
        return $this->order->delete($id);
    }
}
