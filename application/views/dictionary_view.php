<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tooth Dictionary</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dictionary.css'); ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-top: 0;
            color: #333;
            text-align: center; /* Pusatkan teks */
        }
        p {
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .vertical-line {
            border-left: 1px solid #ddd;
        }
        .back-button {
            margin-top: 20px;
            text-align: center;
        }
        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ffc107; /* warna tombol kuning sebelum kena mouse */
            color: #fff; /* ini untuk warna text button */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .back-button a:hover {
            background-color: #ff9800; /* kalau mau warna lain pada tombol backnya untuk hover*/
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Tittle kamus -->
        <h1>Tooth Dictionary</h1>
        <!-- Tabel baru -->
       <table class="table table-bordered border-primary">
    <!-- Baris judul tabel -->
    <tr>
        <th>No</th>
        <th>Code</th>
        <th>Informationn</th>
    </tr>
    <!-- Baris data -->
    <tr>
        <td>1</td>
        <td>Tk</td>
        <td>Tumpuan Kunci</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Exo</td>
        <td>Ekstraksi</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Scalling</td>
        <td>Pembersihan Karang Gigi</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Dexa</td>
        <td>Dexamethasone</td>
    </tr>
    <tr>
        <td>5</td>
        <td>PCT</td>
        <td>Paracetamol</td>
    </tr>
    <tr>
        <td>6</td>
        <td>Amox</td>
        <td>Amoxicillin</td>
    </tr>
    <tr>
        <td>7</td>
        <td>Ryuk</td>
        <td>Ryukunt</td>
    </tr>
    <tr>
        <td>8</td>
        <td>Tumpat</td>
        <td>Tumpatan</td>
    </tr>
    <!--<tr>-->
    <!--    <td>Amoxilin</td>-->
    <!--    <td>Amoxilin</td>-->
    <!--</tr>-->
    <tr>
        <td>9</td>
        <td>Asmeh</td>
        <td>Asmeh</td>
    </tr>
    <tr>
        <td>10</td>
        <td>O</td>
        <td>Karies</td>
    </tr>
    <tr>
        <td>11</td>
        <td>X</td>
        <td>Sudah Dicabut</td>
    </tr>
    <tr>
        <td>12</td>
        <td>B</td>
        <td>Belum Erupsi</td>
    </tr>
    <tr>
        <td>13</td>
        <td>•</td>
        <td>Tumpatan</td>
    </tr>
    <tr>
        <td>14</td>
        <td>/</td>
        <td>Impaksi</td>
    </tr>
    <tr>
        <td>15</td>
        <td>|</td>
        <td>Inlay</td>
    </tr>
    <tr>
        <td>16</td>
        <td>E</td>
        <td>Post endo</td>
    </tr>
    <tr>
        <td>17</td>
        <td>C</td>
        <td>Crown</td>
    </tr>


    <!-- Baris data end -->
</table>

        
        <!-- Tombol Kembali ke Halaman Add Prescription -->
        <div class="back-button">
            <a href="<?php echo site_url('prescription/add_prescription'); ?>">Back to the Prescription</a>
        </div>
    </div>
</body>
</html>
