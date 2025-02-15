<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KategoriPsuModel;
use App\Models\JenisPsuModel;
use App\Models\PsuModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Artisan;

class MasterDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Create admin User and assign the role to him.
        KategoriPsuModel::firstOrCreate(
            ['id' => '1'],
            ['title' => 'Prasarana', 'deskripsi' => '']
        );
        KategoriPsuModel::firstOrCreate(
            ['id' => '2'],
            ['title' => 'Sarana', 'deskripsi' => '']
        );
        KategoriPsuModel::firstOrCreate(
            ['id' => '3'],
            ['title' => 'Utilitas', 'deskripsi' => '']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 1],
            ['kategori' => 1, 'title' => 'Jalan']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 2],
            ['kategori' => 1, 'title' => 'Drainase']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 3],
            ['kategori' => 1, 'title' => 'Air Minum']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 4],
            ['kategori' => 1, 'title' => 'Sanitasi']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 5],
            ['kategori' => 1, 'title' => 'Air Limbah']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 6],
            ['kategori' => 2, 'title' => 'Perniagaan/ Perbelanjaan']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 7],
            ['kategori' => 2, 'title' => 'Pelayanan Umum Dan Pemerintahan']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 8],
            ['kategori' => 2, 'title' => 'Pendidikan']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 9],
            ['kategori' => 2, 'title' => 'Kesehatan']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 10],
            ['kategori' => 2, 'title' => 'Peribadatan']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 11],
            ['kategori' => 2, 'title' => 'Rekreasi Dan Olah Raga']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 12],
            ['kategori' => 2, 'title' => 'Pemakaman']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 13],
            ['kategori' => 2, 'title' => 'Pertamanan Dan Ruang Terbuka Hijau (RTH)']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 14],
            ['kategori' => 2, 'title' => 'Parkir']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 15],
            ['kategori' => 3, 'title' => 'Jaringan Listrik']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 16],
            ['kategori' => 3, 'title' => 'Jaringan Air Bersih']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 17],
            ['kategori' => 3, 'title' => 'Jaringan Telepon']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 18],
            ['kategori' => 3, 'title' => 'Jaringan Gas']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 19],
            ['kategori' => 3, 'title' => 'Jaringan Transportasi']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 20],
            ['kategori' => 3, 'title' => 'Pemadam Kebakaran']
        );

        JenisPsuModel::firstOrCreate(
            ['id' => 21],
            ['kategori' => 3, 'title' => 'Sarana Penerangan Jalan Umum']
        );


        PsuModel::firstOrCreate(
            ['id' => 1],
            [
                'kategori' => 1,
                'jenis' => 1,
                'judul' => 'Jalan Raya',
                'deskripsi' => 'Jalan utama yang menghubungkan antar kota atau antar wilayah.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 2],
            [
                'kategori' => 1,
                'jenis' => 1,
                'judul' => 'Jalan Tol',
                'deskripsi' => 'Jalan berbayar dengan akses terbatas untuk kendaraan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 3],
            [
                'kategori' => 1,
                'jenis' => 1,
                'judul' => 'Jalan Lingkungan',
                'deskripsi' => 'Jalan yang melayani akses di dalam perumahan atau lingkungan lokal.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 4],
            [
                'kategori' => 1,
                'jenis' => 1,
                'judul' => 'Jembatan',
                'deskripsi' => 'Struktur yang menghubungkan dua titik di atas rintangan seperti sungai atau lembah.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 5],
            [
                'kategori' => 1,
                'jenis' => 1,
                'judul' => 'Trotoar',
                'deskripsi' => 'Area untuk pejalan kaki di sepanjang jalan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 6],
            [
                'kategori' => 1,
                'jenis' => 1,
                'judul' => 'Lampu Jalan',
                'deskripsi' => 'Penerangan di sepanjang jalan untuk keselamatan dan keamanan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 7],
            [
                'kategori' => 1,
                'jenis' => 2,
                'judul' => 'Saluran Terbuka',
                'deskripsi' => 'Parit atau kanal yang terbuka untuk mengalirkan air permukaan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 8],
            [
                'kategori' => 1,
                'jenis' => 2,
                'judul' => 'Saluran Tertutup',
                'deskripsi' => 'Pipa atau gorong-gorong yang mengalirkan air di bawah tanah.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 9],
            [
                'kategori' => 1,
                'jenis' => 2,
                'judul' => 'Kolam Retensi',
                'deskripsi' => 'Kolam yang dibuat untuk menampung air hujan sementara sebelum dialirkan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 10],
            [
                'kategori' => 1,
                'jenis' => 2,
                'judul' => 'Pompa Air',
                'deskripsi' => 'Alat untuk mengalirkan air dari tempat yang lebih rendah ke tempat yang lebih tinggi atau keluar dari area yang banjir.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 11],
            [
                'kategori' => 1,
                'jenis' => 3,
                'judul' => 'Instalasi Pengolahan Air (IPA)',
                'deskripsi' => 'Fasilitas untuk mengolah air baku menjadi air bersih yang layak minum.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 12],
            [
                'kategori' => 1,
                'jenis' => 3,
                'judul' => 'Reservoir',
                'deskripsi' => 'Tangki atau waduk untuk menyimpan air bersih.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 13],
            [
                'kategori' => 1,
                'jenis' => 3,
                'judul' => 'Jaringan Pipa Distribusi',
                'deskripsi' => 'Pipa yang mengalirkan air bersih dari instalasi pengolahan ke rumah-rumah atau bangunan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 14],
            [
                'kategori' => 1,
                'jenis' => 3,
                'judul' => 'Pompa Air',
                'deskripsi' => 'Alat untuk mengalirkan air melalui jaringan distribusi.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 15],
            [
                'kategori' => 1,
                'jenis' => 4,
                'judul' => 'Toilet',
                'deskripsi' => 'Fasilitas dasar untuk pembuangan tinja dan urine.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 16],
            [
                'kategori' => 1,
                'jenis' => 4,
                'judul' => 'Septic Tank',
                'deskripsi' => 'Tangki bawah tanah untuk pengolahan limbah domestik secara anaerob.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 17],
            [
                'kategori' => 1,
                'jenis' => 4,
                'judul' => 'MCK (Mandi, Cuci, Kakus)',
                'deskripsi' => 'Fasilitas umum untuk mandi, mencuci, dan buang air di area publik atau pemukiman padat.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 18],
            [
                'kategori' => 1,
                'jenis' => 5,
                'judul' => 'Instalasi Pengolahan Air Limbah (IPAL)',
                'deskripsi' => 'Fasilitas untuk mengolah air limbah sebelum dibuang ke lingkungan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 19],
            [
                'kategori' => 1,
                'jenis' => 5,
                'judul' => 'Jaringan Pipa Air Limbah',
                'deskripsi' => 'Pipa yang mengalirkan air limbah dari sumbernya ke instalasi pengolahan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 20],
            [
                'kategori' => 1,
                'jenis' => 5,
                'judul' => 'Kolam Oksidasi',
                'deskripsi' => 'Kolam yang digunakan untuk mengolah air limbah secara alami dengan bantuan oksigen.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 21],
            [
                'kategori' => 1,
                'jenis' => 5,
                'judul' => 'Pompa Air Limbah',
                'deskripsi' => 'Alat untuk memindahkan air limbah melalui jaringan pipa atau dari tempat rendah ke tempat yang lebih tinggi.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 22],
            [
                'kategori' => 2,
                'jenis' => 6,
                'judul' => 'Pusat Perbelanjaan/Mal',
                'deskripsi' => 'Gedung besar dengan berbagai toko dan fasilitas hiburan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 23],
            [
                'kategori' => 2,
                'jenis' => 6,
                'judul' => 'Pasar Tradisional',
                'deskripsi' => 'Area di mana pedagang menjual berbagai barang kebutuhan sehari-hari.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 24],
            [
                'kategori' => 2,
                'jenis' => 6,
                'judul' => 'Supermarket dan Minimarket',
                'deskripsi' => 'Toko besar atau kecil yang menjual barang-barang kebutuhan rumah tangga.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 25],
            [
                'kategori' => 2,
                'jenis' => 6,
                'judul' => 'Toko dan Kios',
                'deskripsi' => 'Unit usaha kecil yang menjual barang-barang tertentu.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 26],
            [
                'kategori' => 2,
                'jenis' => 7,
                'judul' => 'Kantor Pemerintahan',
                'deskripsi' => 'Gedung untuk aktivitas administrasi pemerintahan (seperti balai kota, kantor kecamatan).'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 27],
            [
                'kategori' => 2,
                'jenis' => 7,
                'judul' => 'Kantor Polisi',
                'deskripsi' => 'Bangunan yang digunakan oleh kepolisian untuk operasional sehari-hari.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 28],
            [
                'kategori' => 2,
                'jenis' => 7,
                'judul' => 'Kantor Pos',
                'deskripsi' => 'Tempat untuk layanan pengiriman surat dan paket.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 29],
            [
                'kategori' => 2,
                'jenis' => 7,
                'judul' => 'Kantor Pelayanan Publik',
                'deskripsi' => 'Tempat yang menyediakan berbagai layanan kepada masyarakat seperti pembuatan KTP, SIM, dll.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 30],
            [
                'kategori' => 2,
                'jenis' => 8,
                'judul' => 'Sekolah Dasar, Menengah, dan Atas',
                'deskripsi' => 'Bangunan untuk pendidikan dasar hingga menengah.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 31],
            [
                'kategori' => 2,
                'jenis' => 8,
                'judul' => 'Perguruan Tinggi/Universitas',
                'deskripsi' => 'Institusi pendidikan tinggi untuk program sarjana, pascasarjana, dan doktoral.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 32],
            [
                'kategori' => 2,
                'jenis' => 8,
                'judul' => 'Perpustakaan',
                'deskripsi' => 'Tempat penyimpanan dan peminjaman buku serta sumber belajar lainnya.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 33],
            [
                'kategori' => 2,
                'jenis' => 8,
                'judul' => 'Laboratorium',
                'deskripsi' => 'Fasilitas untuk praktik dan penelitian di berbagai bidang ilmu.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 34],
            [
                'kategori' => 2,
                'jenis' => 9,
                'judul' => 'Rumah Sakit',
                'deskripsi' => 'Fasilitas besar dengan layanan kesehatan lengkap dan perawatan pasien.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 35],
            [
                'kategori' => 2,
                'jenis' => 9,
                'judul' => 'Puskesmas',
                'deskripsi' => 'Pusat kesehatan masyarakat yang memberikan pelayanan kesehatan dasar.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 36],
            [
                'kategori' => 2,
                'jenis' => 9,
                'judul' => 'Klinik',
                'deskripsi' => 'Fasilitas kesehatan yang menyediakan layanan medis dasar.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 37],
            [
                'kategori' => 2,
                'jenis' => 9,
                'judul' => 'Apotek',
                'deskripsi' => 'Tempat penjualan obat-obatan dan produk kesehatan lainnya.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 38],
            [
                'kategori' => 2,
                'jenis' => 10,
                'judul' => 'Masjid',
                'deskripsi' => 'Tempat ibadah bagi umat Muslim.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 39],
            [
                'kategori' => 2,
                'jenis' => 10,
                'judul' => 'Gereja',
                'deskripsi' => 'Tempat ibadah bagi umat Kristen.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 40],
            [
                'kategori' => 2,
                'jenis' => 10,
                'judul' => 'Pura',
                'deskripsi' => 'Tempat ibadah bagi umat Hindu.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 41],
            [
                'kategori' => 2,
                'jenis' => 10,
                'judul' => 'Vihara',
                'deskripsi' => 'Tempat ibadah bagi umat Buddha.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 42],
            [
                'kategori' => 2,
                'jenis' => 10,
                'judul' => 'Kuil',
                'deskripsi' => 'Tempat ibadah bagi berbagai agama dan kepercayaan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 43],
            [
                'kategori' => 2,
                'jenis' => 11,
                'judul' => 'Taman Rekreasi',
                'deskripsi' => 'Area hijau dengan fasilitas untuk bermain dan bersantai.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 44],
            [
                'kategori' => 2,
                'jenis' => 11,
                'judul' => 'Stadion',
                'deskripsi' => 'Tempat untuk pertandingan olahraga besar dan konser.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 45],
            [
                'kategori' => 2,
                'jenis' => 11,
                'judul' => 'Lapangan Olahraga',
                'deskripsi' => 'Area untuk berolahraga seperti sepak bola, basket, dan tenis.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 46],
            [
                'kategori' => 2,
                'jenis' => 11,
                'judul' => 'Kolam Renang',
                'deskripsi' => 'Fasilitas untuk berenang dan olahraga air.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 47],
            [
                'kategori' => 2,
                'jenis' => 12,
                'judul' => 'TPU (Tempat Pemakaman Umum)',
                'deskripsi' => 'Area yang disediakan untuk pemakaman umum.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 48],
            [
                'kategori' => 2,
                'jenis' => 12,
                'judul' => 'Krematorium',
                'deskripsi' => 'Fasilitas untuk kremasi jenazah.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 49],
            [
                'kategori' => 2,
                'jenis' => 12,
                'judul' => 'Makam Keluarga',
                'deskripsi' => 'Area pemakaman khusus untuk satu keluarga.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 50],
            [
                'kategori' => 2,
                'jenis' => 13,
                'judul' => 'Taman Kota',
                'deskripsi' => 'Area hijau di kota untuk rekreasi dan aktivitas luar ruangan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 51],
            [
                'kategori' => 2,
                'jenis' => 13,
                'judul' => 'Hutan Kota',
                'deskripsi' => 'Area hijau dengan pepohonan yang berfungsi sebagai paru-paru kota.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 52],
            [
                'kategori' => 2,
                'jenis' => 13,
                'judul' => 'Taman Bermain',
                'deskripsi' => 'Area khusus dengan peralatan bermain untuk anak-anak.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 53],
            [
                'kategori' => 2,
                'jenis' => 13,
                'judul' => 'Jalur Hijau',
                'deskripsi' => 'Area hijau di sepanjang jalan atau sungai untuk keindahan dan kesejukan lingkungan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 54],
            [
                'kategori' => 2,
                'jenis' => 14,
                'judul' => 'Tempat Parkir Umum',
                'deskripsi' => 'Area yang disediakan untuk parkir kendaraan di ruang publik.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 55],
            [
                'kategori' => 2,
                'jenis' => 14,
                'judul' => 'Gedung Parkir',
                'deskripsi' => 'Bangunan bertingkat yang digunakan untuk parkir kendaraan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 56],
            [
                'kategori' => 2,
                'jenis' => 14,
                'judul' => 'Parkir Tepi Jalan',
                'deskripsi' => 'Area parkir yang disediakan di sepanjang jalan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 57],
            [
                'kategori' => 3,
                'jenis' => 15,
                'judul' => 'Pembangkit Listrik',
                'deskripsi' => 'Fasilitas untuk menghasilkan listrik dari berbagai sumber (misalnya, PLTA, PLTU, PLTN, PLTS).'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 58],
            [
                'kategori' => 3,
                'jenis' => 15,
                'judul' => 'Jaringan Transmisi',
                'deskripsi' => 'Sistem kabel dan tiang untuk mengalirkan listrik dari pembangkit ke pusat distribusi.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 59],
            [
                'kategori' => 3,
                'jenis' => 15,
                'judul' => 'Jaringan Distribusi',
                'deskripsi' => 'Sistem kabel dan transformator untuk mengalirkan listrik dari pusat distribusi ke pengguna akhir.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 60],
            [
                'kategori' => 3,
                'jenis' => 15,
                'judul' => 'Meteran Listrik',
                'deskripsi' => 'Alat untuk mengukur konsumsi listrik oleh pengguna.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 61],
            [
                'kategori' => 3,
                'jenis' => 16,
                'judul' => 'Instalasi Pengolahan Air (IPA)',
                'deskripsi' => 'Fasilitas untuk mengolah air baku menjadi air bersih.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 62],
            [
                'kategori' => 3,
                'jenis' => 16,
                'judul' => 'Jaringan Pipa Distribusi',
                'deskripsi' => 'Sistem pipa yang mengalirkan air bersih dari IPA ke pengguna.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 63],
            [
                'kategori' => 3,
                'jenis' => 16,
                'judul' => 'Reservoir',
                'deskripsi' => 'Tangki besar untuk menyimpan air bersih sebelum didistribusikan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 64],
            [
                'kategori' => 3,
                'jenis' => 16,
                'judul' => 'Hidran',
                'deskripsi' => 'Fasilitas untuk mengakses air bersih di jalan atau tempat umum.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 65],
            [
                'kategori' => 3,
                'jenis' => 17,
                'judul' => 'Sentral Telepon',
                'deskripsi' => 'Pusat pengendalian dan pengaturan lalu lintas telekomunikasi.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 66],
            [
                'kategori' => 3,
                'jenis' => 17,
                'judul' => 'Jaringan Kabel Telepon',
                'deskripsi' => 'Sistem kabel yang menghubungkan sentral telepon dengan pengguna akhir.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 67],
            [
                'kategori' => 3,
                'jenis' => 17,
                'judul' => 'Base Transceiver Station (BTS)',
                'deskripsi' => 'Menara pemancar untuk jaringan telepon seluler.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 68],
            [
                'kategori' => 3,
                'jenis' => 17,
                'judul' => 'Fiber Optic Network',
                'deskripsi' => 'Jaringan kabel serat optik untuk komunikasi data dengan kecepatan tinggi.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 69],
            [
                'kategori' => 3,
                'jenis' => 18,
                'judul' => 'Pusat Pengolahan Gas',
                'deskripsi' => 'Fasilitas untuk memproses gas alam sebelum distribusi.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 70],
            [
                'kategori' => 3,
                'jenis' => 18,
                'judul' => 'Jaringan Pipa Gas',
                'deskripsi' => 'Sistem pipa yang mengalirkan gas dari pusat pengolahan ke pengguna.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 71],
            [
                'kategori' => 3,
                'jenis' => 18,
                'judul' => 'Regulator Gas',
                'deskripsi' => 'Alat untuk mengatur tekanan dan aliran gas ke pengguna.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 72],
            [
                'kategori' => 3,
                'jenis' => 18,
                'judul' => 'Meteran Gas',
                'deskripsi' => 'Alat untuk mengukur konsumsi gas oleh pengguna.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 73],
            [
                'kategori' => 3,
                'jenis' => 19,
                'judul' => 'Jalan Raya',
                'deskripsi' => 'Infrastruktur jalan untuk kendaraan bermotor.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 74],
            [
                'kategori' => 3,
                'jenis' => 19,
                'judul' => 'Rel Kereta Api',
                'deskripsi' => 'Infrastruktur untuk transportasi kereta api.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 75],
            [
                'kategori' => 3,
                'jenis' => 19,
                'judul' => 'Bandara',
                'deskripsi' => 'Fasilitas untuk transportasi udara.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 76],
            [
                'kategori' => 3,
                'jenis' => 19,
                'judul' => 'Pelabuhan',
                'deskripsi' => 'Fasilitas untuk transportasi laut dan sungai.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 77],
            [
                'kategori' => 3,
                'jenis' => 19,
                'judul' => 'Terminal Bus',
                'deskripsi' => 'Tempat keberangkatan dan kedatangan bus antar kota atau antar provinsi.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 78],
            [
                'kategori' => 3,
                'jenis' => 19,
                'judul' => 'Stasiun Kereta Api',
                'deskripsi' => 'Tempat pemberhentian dan pemberangkatan kereta api.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 79],
            [
                'kategori' => 3,
                'jenis' => 20,
                'judul' => 'Stasiun Pemadam Kebakaran',
                'deskripsi' => 'Pusat operasional dan garasi untuk kendaraan pemadam kebakaran.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 80],
            [
                'kategori' => 3,
                'jenis' => 20,
                'judul' => 'Mobil Pemadam Kebakaran',
                'deskripsi' => 'Kendaraan yang dilengkapi dengan peralatan pemadam kebakaran.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 81],
            [
                'kategori' => 3,
                'jenis' => 20,
                'judul' => 'Hidran Kebakaran',
                'deskripsi' => 'Sumber air yang dapat digunakan oleh pemadam kebakaran di lokasi kebakaran.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 82],
            [
                'kategori' => 3,
                'jenis' => 20,
                'judul' => 'Alat Pemadam Api Ringan (APAR)',
                'deskripsi' => 'Peralatan pemadam kebakaran kecil yang ditempatkan di gedung-gedung.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 83],
            [
                'kategori' => 3,
                'jenis' => 21,
                'judul' => 'Lampu Jalan',
                'deskripsi' => 'Penerangan di sepanjang jalan untuk keselamatan dan keamanan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 84],
            [
                'kategori' => 3,
                'jenis' => 21,
                'judul' => 'Tiang Lampu',
                'deskripsi' => 'Struktur yang menyangga lampu jalan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 85],
            [
                'kategori' => 3,
                'jenis' => 21,
                'judul' => 'Jaringan Kabel Penerangan',
                'deskripsi' => 'Sistem kabel yang mengalirkan listrik ke lampu jalan.'
            ]
        );

        PsuModel::firstOrCreate(
            ['id' => 86],
            [
                'kategori' => 3,
                'jenis' => 21,
                'judul' => 'Sistem Kontrol Otomatis',
                'deskripsi' => 'Teknologi untuk mengatur nyala dan mati lampu jalan secara otomatis berdasarkan waktu atau kondisi cahaya.'
            ]
        );
    }
}
