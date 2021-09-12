
@if (auth()->user()->level == "admin")
    <h2>Selamat Datang Admin Londry Kilo</h2>
@elseif(auth()->user()->level == "kasir")
    <h2>Selamat Datang di Londry Kilo</h2>
@endif
