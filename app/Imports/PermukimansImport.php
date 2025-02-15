<?php

namespace App\Imports;

use App\Models\PermukimanModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class PermukimansImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    /* 
    public function model(array $row)
    {
        print_r($row);
        //return [$row];
        return new PermukimanModel([
            //
        ]);
    }

    public function startRow(): int
    {
        // Mengatur baris mulai membaca (misalnya baris ketiga karena baris pertama dan kedua adalah header dengan merge cell)
        return 2;
    } 
    */

    public function collection(Collection $rows)
    {
        $data = [];

        foreach ($rows as $row) 
        {
            //0	$data['no']
            //1	$data['nama_permukiman']
            //2	$data['nama_developer']
            //3	$data['alamat']
            //4	$data['kelurahan']
            //5	$data['kecamatan']
            //6	$data['koordinat']['x']
            //7	$data['koordinat']['y']
            //8	$data['jumlah_rumah']['total']
            //9	$data['jumlah_rumah']['proses']
            //10	$data['jumlah_rumah']['ditempati']
            //11	$data['jumlah_rumah']['kosong']
            //12	$data['kondisi_jalan']['panjang']
            //13	$data['kondisi_jalan']['lebar']
            //14	$data['kondisi_jalan']['perkerasan']
            //15	$data['kondisi_jalan']['jenis_perkerasan']
            //16	$data['kondisi_jalan']['kondisi']
            //17	$data['kondisi_drainase']['panjang']
            //18	$data['kondisi_drainase']['jenis']
            //19	$data['kondisi_drainase']['kondisi']
            //20	$data['jaringan_limbah']['jenis']
            //21	$data['jaringan_limbah']['kondisi']
            //22	$data['jaringan_listrik']['jenis']
            //23	$data['jaringan_listrik']['kondisi']
            //24	$data['jaringan_telekomunikasi']['jenis']
            //25	$data['jaringan_telekomunikasi']['kondisi']
            //26	$data['sumber_air_bersih']
            //27	$data['persampahan']
            //28	$data['pju']['ada']
            //29	$data['pju']['tidak_ada']
            //30	$data['ruang_terbuka_hijau']['jenis']
            //31	$data['ruang_terbuka_hijau']['luas']
            //32	$data['peribadatan']['jenis']
            //33	$data['peribadatan']['keterangan']
            //34	$data['peribadatan']['luas']
            //35	$data['pendidikan']['jenis']
            //36	$data['pendidikan']['keterangan']
            //37	$data['pendidikan']['luas']
            //38	$data['sosial']['jenis']
            //39	$data['sosial']['keterangan']
            //40	$data['sosial']['luas']
            //41	$data['olah_raga']['jenis']
            //42	$data['olah_raga']['keterangan']
            //43	$data['olah_raga']['luas']
            //44	$data['kesehatan']['jenis']
            //45	$data['kesehatan']['keterangan']
            //46	$data['kesehatan']['luas']
            //47	$data['keterangan']

            $permukiman = [
                //'kabkota_id' => $row[0],
                'kecamatan_id' => $row[0],
                'kelurahan_id' => $row[0],
                'nama_permukiman' => $row[1],
                'luas' => $row[0],
                'tahun_siteplan' => $row[0],
                'latitude' => $row[6],
                'longitude' => $row[7],
                'latlong' => $row[0],
                'total_unit' => $row[0],
                'no_bast' => $row[0],
                'file_bast' => $row[0],
                'photo' => $row[0],
                'siteplan' => $row[0],
                'alamat' => $row[0],
                'user_id_create' => $row[0],
                'status_data' => $row[0],
                'user_id_update' => $row[0],
                'geometry' => $row[0],
                'geometry_file' => $row[0],
                'file_survey' => $row[0],
            ];

            $data[] = $permukiman;
        }

        return $rows;
    }
}
