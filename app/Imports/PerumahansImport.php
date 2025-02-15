<?php

namespace App\Imports;

use App\Models\PerumahanModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;

class PerumahansImport implements ToCollection //ToModel //FromCollection //ToModel //ToArray //ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    /* public function model(array $row)
    {
        //0	$data['no']
        //1	$data['nama_perumahan']
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

        //5	$data['kecamatan']
        //4	$data['kelurahan']

        $kecamatan = $row[5];
        $kelurahan = $row[4];

        $kabkota_id = '';
        $kecamatan_id = ''; //5	$data['kecamatan']
        $kelurahan_id = ''; //4	$data['kelurahan']
        $nama_perumahan = $row[1];
        $luas = '';
        $tahun_siteplan = '';
        $latitude = $row[6];
        $longitude = $row[7];
        $jumlah_mbr = '';
        $jumlah_nonmbr = '';
        $no_bast = '';
        $file_bast = '';
        $photo = '';
        $siteplan = '';
        $alamat = $row[3];
        $status_data = 'publik';
        $nama_pengembang = $row[2];
        $telepon_pengembang = '';
        $email_pengembang = '';
        $total_unit = $row[8];
        $jumlah_proses = $row[9];
        $jumlah_ditempati = $row[10];
        $jumlah_kosong = $row[11];
        $keterangan = $row[47];

        $perumahan = [
            'kabkota_id' => $kabkota_id,
            'kecamatan_id' => $kecamatan_id,
            'kelurahan_id' => $kelurahan_id,
            'nama_perumahan' => $nama_perumahan,
            'luas' => $luas,
            'tahun_siteplan' => $tahun_siteplan,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'total_unit' => $total_unit,
            'jumlah_mbr' => $jumlah_mbr,
            'jumlah_nonmbr' => $jumlah_nonmbr,
            'no_bast' => $no_bast,
            'file_bast' => $file_bast,
            'photo' => $photo,
            'siteplan' => $siteplan,
            'alamat' => $alamat,
            'status_data' => $status_data,
            'nama_pengembang' => $nama_pengembang,
            'telepon_pengembang' => $telepon_pengembang,
            'email_pengembang' => $email_pengembang,
            'jumlah_proses' => $jumlah_proses,
            'jumlah_ditempati' => $jumlah_ditempati,
            'jumlah_kosong' => $jumlah_kosong,
            'keterangan' => $keterangan
        ];
        return new PerumahanModel($perumahan);
    } */
    
    public function collection(Collection $collection)
    {
        return $collection;
    }
    /* 
    public function collection(Collection $rows)
    {
        $data = [];

        foreach ($rows as $row) 
        {
            //0	$data['no']
            //1	$data['nama_perumahan']
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

            //5	$data['kecamatan']
            //4	$data['kelurahan']

            $kecamatan = $row[5];
            $kelurahan = $row[4];

            $kabkota_id = '';
            $kecamatan_id = ''; //5	$data['kecamatan']
            $kelurahan_id = ''; //4	$data['kelurahan']
            $nama_perumahan = $row[1];
            $luas = '';
            $tahun_siteplan = '';
            $latitude = $row[6];
            $longitude = $row[7];
            $jumlah_mbr = '';
            $jumlah_nonmbr = '';
            $no_bast = '';
            $file_bast = '';
            $photo = '';
            $siteplan = '';
            $alamat = $row[3];
            $status_data = 'publik';
            $nama_pengembang = $row[2];
            $telepon_pengembang = '';
            $email_pengembang = '';
            $total_unit = $row[8];
            $jumlah_proses = $row[9];
            $jumlah_ditempati = $row[10];
            $jumlah_kosong = $row[11];
            $keterangan = $row[47];

            $perumahan = [
                'kabkota_id' => $kabkota_id,
                'kecamatan_id' => $kecamatan_id,
                'kelurahan_id' => $kelurahan_id,
                'nama_perumahan' => $nama_perumahan,
                'luas' => $luas,
                'tahun_siteplan' => $tahun_siteplan,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'total_unit' => $total_unit,
                'jumlah_mbr' => $jumlah_mbr,
                'jumlah_nonmbr' => $jumlah_nonmbr,
                'no_bast' => $no_bast,
                'file_bast' => $file_bast,
                'photo' => $photo,
                'siteplan' => $siteplan,
                'alamat' => $alamat,
                'status_data' => $status_data,
                'nama_pengembang' => $nama_pengembang,
                'telepon_pengembang' => $telepon_pengembang,
                'email_pengembang' => $email_pengembang,
                'jumlah_proses' => $jumlah_proses,
                'jumlah_ditempati' => $jumlah_ditempati,
                'jumlah_kosong' => $jumlah_kosong,
                'keterangan' => $keterangan
            ];

            $data[] = $perumahan;
        }

        return $data;
    } 
    */
}
