<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih atas Shodaqoh Anda</title>
</head>
<body>
    <h4>Semoga Bapak / Ibu senantiasa mendapatkan keberkahan dan kesehatan selalu oleh Allah SWT. Aamiin</h4>
    <p>Nama : {{ $shodaqoh->nama_shodaqoh }}</p>
    <p>Nominal : Rp. {{ number_format($shodaqoh->nominal_shodaqoh, 0, ',', '.') }} </p>
    <p>Semoga amal ibadah Anda diterima oleh Allah SWT.</p>
</body>
</html>
