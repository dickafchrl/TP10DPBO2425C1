<?php
require_once 'viewmodels/UsersViewModel.php';
require_once 'viewmodels/OrdersViewModel.php';
require_once 'viewmodels/TicketsViewModel.php';
require_once 'viewmodels/EventsViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'index';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity === 'index') {
    require_once 'views/home.php';
} else if ($entity === 'users') {
    $userVM = new UserViewModel();

    switch ($action) {
        case 'list':
            $userList = $userVM->getUserList();
            require_once 'views/user_list.php';
            break;
        case 'add':
            require_once 'views/user_form.php';
            break;
        case 'edit':
            $id = $_GET['id'];
            $user = $userVM->getUserById($id);
            require_once 'views/user_form.php';
            break;
        case 'save':
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $userVM->addUser($nama, $email);
            header('Location: index.php?entity=users&action=list');
            break;
        case 'update':
            $id = $_GET['id'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $userVM->updateUser($id, $nama, $email);
            header('Location: index.php?entity=users&action=list');
            break;
        case 'delete':
            $id = $_GET['id'];
            $userVM->deleteUser($id);
            header('Location: index.php?entity=users&action=list');
            break;
        default:
            echo "Invalid action.";
            break;
    }
} else if ($entity === 'orders') {
    $orderVM = new OrderViewModel();
    $userVM = new UserViewModel();
    $ticketVM = new TicketViewModel();

    switch ($action) {
        case 'list':
            $orderList = $orderVM->getOrderList();
            require_once 'views/order_list.php';
            break;
        case 'add':
            $userList = $userVM->getUserList();
            $ticketList = $ticketVM->getTicketList();
            require_once 'views/order_form.php';
            break;
        case 'edit':
            $id = $_GET['id'];
            $order = $orderVM->getOrderById($id);
            $userList = $userVM->getUserList();
            $ticketList = $ticketVM->getTicketList();
            require_once 'views/order_form.php';
            break;
        case 'save':
            $user_id = $_POST['user_id'];
            $ticket_id = $_POST['ticket_id'];
            $jumlah = $_POST['jumlah'];
            $orderVM->addOrder($user_id, $ticket_id, $jumlah, $tanggal_order);
            header('Location: index.php?entity=orders&action=list');
            break;
        case 'update':
            $id = $_GET['id'];
            $user_id = $_POST['user_id'];
            $ticket_id = $_POST['ticket_id'];
            $jumlah = $_POST['jumlah'];
            $orderVM->updateOrder($id, $user_id, $ticket_id, $jumlah);
            header('Location: index.php?entity=orders&action=list');
            break;
        case 'delete':
            $id = $_GET['id'];
            $orderVM->deleteOrder($id);
            header('Location: index.php?entity=orders&action=list');
            break;
        default:
            echo "Invalid action.";
            break;
    }
} else if ($entity === 'tickets') {
    $ticketVM = new TicketViewModel();
    $eventVM = new EventViewModel();

    switch ($action) {
        case 'list':
            $ticketList = $ticketVM->getTicketList();
            require_once 'views/ticket_list.php';
            break;
        case 'add':
            $eventList = $eventVM->getEventList();
            require_once 'views/ticket_form.php';
            break;
        case 'edit':
            $id = $_GET['id'];
            $ticket = $ticketVM->getTicketById($id);
            $eventList = $eventVM->getEventList();
            require_once 'views/ticket_form.php';
            break;
        case 'save':
            $event_id = $_POST['event_id'];
            $tipe_tiket = $_POST['tipe_tiket'];
            $harga = $_POST['harga'];
            $ticketVM->addTicket($event_id, $tipe_tiket, $harga);
            header('Location: index.php?entity=tickets&action=list');
            break;
        case 'update':
            $id = $_GET['id'];
            $event_id = $_POST['event_id'];
            $tipe_tiket = $_POST['tipe_tiket'];
            $harga = $_POST['harga'];
            $ticketVM->updateTicket($id, $event_id, $tipe_tiket, $harga);
            header('Location: index.php?entity=tickets&action=list');
            break;
        case 'delete':
            $id = $_GET['id'];
            $ticketVM->deleteTicket($id);
            header('Location: index.php?entity=tickets&action=list');
            break;
        default:
            echo "Invalid action.";
            break;
    }
} else if ($entity === 'events') {
    $eventVM = new EventViewModel();

    switch ($action) {
        case 'list':
            $eventList = $eventVM->getEventList();
            require_once 'views/event_list.php';
            break;
        case 'add':
            require_once 'views/event_form.php';
            break;
        case 'edit':
            $id = $_GET['id'];
            $event = $eventVM->getEventById($id);
            require_once 'views/event_form.php';
            break;
        case 'save':
            $nama_event = $_POST['nama_event'];
            $tanggal = $_POST['tanggal'];
            $lokasi = $_POST['lokasi'];
            $eventVM->addEvent($nama_event, $tanggal, $lokasi);
            header('Location: index.php?entity=events&action=list');
            break;
        case 'update':
            $id = $_GET['id'];
            $nama_event = $_POST['nama_event'];
            $tanggal = $_POST['tanggal'];
            $lokasi = $_POST['lokasi'];
            $eventVM->updateEvent($id, $nama_event, $tanggal, $lokasi);
            header('Location: index.php?entity=events&action=list');
            break;
        case 'delete':
            $id = $_GET['id'];
            $eventVM->deleteEvent($id);
            header('Location: index.php?entity=events&action=list');
            break;
        default:
            echo "Invalid action.";
            break;
    }
}