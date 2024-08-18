<?php
require 'function.php';
require 'ceklogin.php';
?>

<html>
<head>
  <title>Art Fusion</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <h2>Art Fusion</h2>
        <div class="table-responsive">  
            <table class="table table-striped table-bordered table-hover" id="mauexport" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bahan</th>
                        <th>Harga</th>
                        <th>Supplier</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Bahan</th>
                        <th>Harga</th>
                        <th>Supplier</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $ambilsemuadatahargabahan = mysqli_query($conn, "select * from hargabahan");
                    $i =1;
                    while($data=mysqli_fetch_array($ambilsemuadatahargabahan)){
                        $namabahan = $data['namabahan'];
                        $harga = $data['harga'];
                        $supplier = $data['supplier'];
                        $keterangan = $data['keterangan'];
                        $idh = $data['idhargabahan'];
                    ?>

                    <tr>
                        <td><?=$i++;?></td>
                        <td><?=$namabahan;?></td>
                        <td><?=$harga;?></td>
                        <td><?=$supplier;?></td>
                        <td><?=$keterangan;?></td>
                    <td>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#mauexport').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy','csv','excel', 'pdf', 'print'
            ]
        } );
    } );
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>
</html>