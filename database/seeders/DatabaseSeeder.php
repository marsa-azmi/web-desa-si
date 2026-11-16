<?php


namespace Database\Seeders;


use App\Models\Berita;
use App\Models\Penduduk;
use App\Models\Pengaduan;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();


        foreach (['admin', 'staff', 'warga'] as $role) {
            Role::findOrCreate($role);
        }


        // Password otomatis di-hash oleh model User (cast 'hashed')
        $admin = User::create([
            'name' => 'Admin Desa', 'email' => 'admin@desa.id',
            'password' => 'password123', 'nik' => '3201000000000001',
        ]);
        $admin->assignRole('admin');


        $staff = User::create([
            'name' => 'Staff Pelayanan', 'email' => 'staff@desa.id',
            'password' => 'password123', 'nik' => '3201000000000002',
        ]);
        $staff->assignRole('staff');


        $warga = User::create([
            'name' => 'Budi Santoso', 'email' => 'warga@desa.id',
            'password' => 'password123', 'nik' => '3201000000000003',
        ]);
        $warga->assignRole('warga');
        
        // 80 data penduduk acak untuk statistik
        $faker = fake('id_ID');
        $agama = ['Islam', 'Islam', 'Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha'];
        $kerja = ['Petani', 'Buruh Tani', 'Pedagang', 'Wiraswasta', 'PNS', 'Guru', 'Pelajar/Mahasiswa', 'Ibu Rumah Tangga'];
        
        for ($i = 1; $i <= 80; $i++) {
            $jk = $faker->randomElement(['L', 'P']);


            Penduduk::create([
                'nik' => '32010000'.str_pad($i + 10, 8, '0', STR_PAD_LEFT),
                'no_kk' => '32010000'.str_pad(5000 + (int) ceil($i / 4), 8, '0', STR_PAD_LEFT),
                'nama_lengkap' => $faker->name($jk === 'L' ? 'male' : 'female'),
                'jenis_kelamin' => $jk,
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->dateTimeBetween('-70 years', '-1 year')->format('Y-m-d'),
                'agama' => $faker->randomElement($agama),
                'status_perkawinan' => $faker->randomElement(['Belum Menikah', 'Menikah', 'Menikah', 'Cerai']),
                'pekerjaan' => $faker->randomElement($kerja),
                'dusun' => $faker->randomElement(['Dusun I', 'Dusun II', 'Dusun III', 'Dusun IV']),
                'rt' => $faker->randomElement(['001', '002', '003']),
                'rw' => $faker->randomElement(['001', '002']),
                'alamat_lengkap' => $faker->streetAddress(),
            ]);
        }


        // Contoh berita
        $contoh = [
            ['Gotong Royong Perbaikan Jalan Dusun II', 'Kegiatan', 'Warga Dusun II bersama perangkat desa memperbaiki jalan yang berlubang'],
            ['Layanan E-Surat Kini Tersedia Online', 'Pengumuman', 'Warga kini dapat mengajukan surat keterangan dari rumah. Cukup daftar di portal desa dan unggah dokumen yang diperlukan.'],
            ['Jadwal Posyandu Bulan Ini', 'Kesehatan', 'Posyandu balita dan lansia dilaksanakan setiap minggu kedua di balai desa mulai pukul 08.00 hingga 11.00.']
        ];
        
        foreach ($contoh as [$judul, $kategori, $konten]) {
            Berita::create([
                'judul' => $judul,
                'slug' => Str::slug($judul).'-'.Str::lower(Str::random(5)),
                'kategori' => $kategori,
                'konten' => $konten,
                'author_id' => $admin->id,
            ]);
        }


        // Contoh surat dan aduan
        Surat::create([
            'nomor_tiket' => 'SRT-DEMO-0001', 'user_id' => $warga->id,
            'jenis_surat' => 'Domisili',
            'nik_pemohon' => $warga->nik, 'nama_pemohon' => $warga->name,
            'keperluan' => 'Persyaratan melamar pekerjaan', 'status' => 'Pending',
        ]);
        
        Surat::create([
            'nomor_tiket' => 'SRT-DEMO-0002', 'user_id' => $warga->id,
            'jenis_surat' => 'Usaha',
            'nik_pemohon' => $warga->nik, 'nama_pemohon' => $warga->name,
            'keperluan' => 'Pengajuan kredit usaha warung', 'status' => 'Selesai',
       ]);
    
       Pengaduan::create([
            'kode_pengaduan' => 'ADU-DEMO-0001', 'user_id' => $warga->id,
            'nama_pelapor' => $warga->name,
            'judul' => 'Lampu jalan mati di RT 02', 'kategori' => 'Infrastruktur',
            'isi_laporan' => 'Sudah dua minggu lampu penerangan di gang RT 02 tidak menyala sehingga gelap dan rawan.',
            'status' => 'Proses', 'tanggapan' => 'Sedang dikoordinasikan dengan petugas listrik.',
         ]);
    
         Pengaduan::create([
            'kode_pengaduan' => 'ADU-DEMO-0002', 'nama_pelapor' => 'Warga Dusun III', 'user_id' => $warga->id,
            'judul' => 'Sampah menumpuk dekat pasar', 'kategori' => 'Lingkungan',
            'isi_laporan' => 'Tumpukan sampah di dekat pasar desa mulai berbau dan mengundang lalat.',
            'status' => 'Pending',   
        ]);
        
    }
}


