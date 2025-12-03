<?php
require_once 'models/Events.php';

class EventViewModel
{
    private $event;

    public function __construct()
    {
        $this->event = new Events();
    }

    public function getEventList()
    {
        return $this->event->getAll();
    }

    public function getEventById($id)
    {
        return $this->event->getById($id);
    }

    public function addEvent($nama_event, $tanggal, $lokasi)
    {
        return $this->event->create($nama_event, $tanggal, $lokasi);
    }

    public function updateEvent($id, $nama_event, $tanggal, $lokasi)
    {
        return $this->event->update($id, $nama_event, $tanggal, $lokasi);
    }

    public function deleteEvent($id)
    {
        return $this->event->delete($id);
    }
}
