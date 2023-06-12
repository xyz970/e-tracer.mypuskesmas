@component('mail::message')
# Keterlambatan Pengembalian

Halo {{$email}},<br>
Ada berkas yang belum anda kembalikan, mohon untuk mengembalikan segera<br>


{{ config('app.name') }}
@endcomponent