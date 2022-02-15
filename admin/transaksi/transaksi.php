<?php
    if(!isset($_GET['s'])) {
        $query = $koneksi->query("SELECT * FROM transaksi ORDER BY id_transaksi DESC");
        $i = 1;
        $total=0;
        foreach ($query as $row) :
            $total+=$row['total_bayar'];
?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td>
                    <script>
                        jumlah =<?=$row['total_bayar']?>;
                        document.write(toRupiah(jumlah));
                    </script>
                </td>
            </tr>
<?php     
        endforeach; 

    }
    else if(isset($_GET['s'])) {
        $query = $koneksi->query("SELECT * FROM transaksi WHERE tanggal LIKE '%$_GET[s]%' ORDER BY id_transaksi DESC");
        $i = 1;
        $total=0;
        foreach ($query as $row) :
            $total+=$row['total_bayar'];
?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td>
                    <script>
                        jumlah =<?=$row['total_bayar']?>;
                        document.write(toRupiah(jumlah));
                    </script>
                </td>
            </tr>
<?php     
        endforeach; 

    }
?>
