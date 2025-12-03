<?php
require_once 'models/Tickets.php';

class TicketViewModel
{
    private $Ticket;

    public function __construct()
    {
        $this->ticket = new Tickets();
    }

    public function getTicketList()
    {
        return $this->ticket->getAll();
    }

    public function getTicketById($id)
    {
        return $this->ticket->getById($id);
    }

    public function addTicket($event_id, $tipe_tiket, $harga)
    {
        return $this->ticket->create($event_id, $tipe_tiket, $harga);
    }

    public function updateTicket($id, $event_id, $tipe_tiket, $harga)
    {
        return $this->ticket->update($id, $event_id, $tipe_tiket, $harga);
    }

    public function deleteTicket($id)
    {
        return $this->ticket->delete($id);
    }
}
