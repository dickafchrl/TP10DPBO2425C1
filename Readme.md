## JANJI
Saya Dicka Fachrunaldo Kartamiharja NIM 2407846 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Alur (Flow)
A. User membuka form tambah event
- index.php mendeteksi ?page=add_event.
- index.php menampilkan add_event.php (view).
- User mengisi form.

B. User submit form
- index.php menerima POST.
- index.php memanggil:
- ViewModel validasi & memanggil model
- Model menjalankan query INSERT ke DB.
- Redirect kembali ke daftar event.

C. Saat user membuka form tiket
- index.php memanggil TicketsViewModel->getAllEvents()
- ViewModel meminta data ke model:
  - Events->readAll()
  - Data event dikirim ke view.
  - View menampilkan dropdown daftar event.

D. Pemesanan tiket (Orders)

- User memilih:
  - user_id
  - ticket_id
  - jumlah
  - tanggal_order
- index.php memanggil:
  - OrdersViewModel->addOrder($user_id, $ticket_id, $jumlah, $tanggal)
  - ViewModel validasi & memanggil model:
    - Orders->create($user_id, $ticket_id, $jumlah, $tanggal)
  - Model menjalankan query INSERT.
 
        User 
          ↓
        index.php (menangani request)
          ↓
        ViewModel (validasi + logika)
          ↓
        Model (query)
          ↓
        Database (event/ticket/order)
          ↓
        Model
          ↓
        ViewModel
          ↓
        View (tampilan kembali ke user)


## Struktur Program
        C:.
        │   Readme.md
        │   
        └───project
            │   index.php
            │
            ├───config
            │       database.php
            │
            ├───database
            ├───models
            │       Events.php
            │       Orders.php
            │       Tickets.php
            │       Users.php
            │
            ├───viewmodels
            │       EventsViewModel.php
            │       OrdersViewModel.php
            │       TicketsViewModel.php
            │       UsersViewModel.php
            │
            └───views
                │   event_form.php
                │   event_list.php
                │   home.php
                │   order_form.php
                │   order_list.php
                │   ticket_form.php
                │   ticket_list.php
                │   user_form.php
                │   user_list.php
                │
                └───Template
                        footer.php
                        header.php

## Dokumentasi


https://github.com/user-attachments/assets/2fc21c84-25a1-436f-8c1a-c69a5989e755

