<div class="">
    <table border="1" style="width: 100%">
        <tr style="text-align: center">
            <td>Nama</td>
            <td>Alamat</td>
            <td>Tanggal Lahir</td>
            <td>No Hp</td>
            <td>Jenis Kelamin</td>
            <td>Jalur Masuk</td>
        </tr>
        <tr style="text-align: center">
            <td>{{ $calonSiswa['nama_lengkap'] }}</td>
            <td>{{ $calonSiswa['alamat'] ?? '-' }}</td>
            <td>{{ $calonSiswa['tanggal_lahir'] }}</td>
            <td>{{ $calonSiswa['no_hp'] }}</td>
            <td>
                @if (isset($calonSiswa['jenis_kelamin_id']))
                    @if ($calonSiswa['jenis_kelamin_id'] == 1)
                        Pria
                    @elseif($calonSiswa['jenis_kelamin_id'] == 2)
                        Perempuan
                    @else
                        -
                    @endif
                @else
                    -
                @endif
            </td>

            <td>{{ $calonSiswa['jalur_masuk'] }}</td>
        </tr>
    </table>
</div>
