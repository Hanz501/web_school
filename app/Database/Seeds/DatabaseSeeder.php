<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        // 1. Seed Default Admin
        $userExists = $this->db->table('users')->where('username', 'admin')->countAllResults();
        if ($userExists === 0) {
            $this->db->table('users')->insert([
                'username'      => 'admin',
                'email'         => 'admin@smk-unggulan.sch.id',
                'password_hash' => password_hash('admin123', PASSWORD_BCRYPT),
                'nama_lengkap'  => 'Administrator SMK Unggulan',
                'role'          => 'admin',
                'created_at'    => $now,
                'updated_at'    => $now,
            ]);
        }

        // 2. Seed Jurusan
        $jurusanData = [
            [
                'id'          => 'rpl',
                'kode'        => 'RPL',
                'nama'        => 'Rekayasa Perangkat Lunak',
                'kategori'    => 'Teknologi Informasi & Digital',
                'kuota'       => 72,
                'terisi'      => 64,
                'angle'       => 0,
                'icon'        => 'code-2',
                'tagline'     => 'Architecting Next-Gen Intelligent Digital Systems',
                'deskripsi'   => 'Fokus pada pengembangan aplikasi web modern skala enterprise, arsitektur cloud microservices, mobile apps (Flutter/React Native), data engineering, dan integrasi Artificial Intelligence (AI).',
                'kompetensi'  => json_encode([
                    'Fullstack Web Architecture (Next.js, Node.js, Laravel)',
                    'Mobile App Development (Flutter & React Native)',
                    'Cloud Computing & PostgreSQL Optimization',
                    'CI/CD DevOps & Docker Containers',
                    'AI / Machine Learning Integration'
                ]),
                'karir'       => json_encode([
                    'Fullstack Software Engineer',
                    'Mobile Application Developer',
                    'Cloud & DevOps Engineer',
                    'AI & Data Solutions Specialist',
                    'Tech Startup Founder'
                ]),
                'sertifikasi' => 'BNSP Rekayasa Perangkat Lunak, Oracle Certified Associate (OCA), AWS Certified Cloud Practitioner',
                'mitra'       => json_encode(['Google Cloud Indonesia', 'Telkom Indonesia', 'Tokopedia Academy', 'Gojek Tech Academy']),
                'tefa'        => 'Software House Vokasi (Menerima proyek komersial pembuatan web, aplikasi kasir ERP, dan custom software)',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'id'          => 'dkv',
                'kode'        => 'DKV',
                'nama'        => 'Desain Komunikasi Visual',
                'kategori'    => 'Seni, Media & Industri Kreatif',
                'kuota'       => 64,
                'terisi'      => 58,
                'angle'       => 90,
                'icon'        => 'palette',
                'tagline'     => 'Shaping Visual Identities & Immersive 3D Experiences',
                'deskripsi'   => 'Mengembangkan kompetensi visual storytelling, branding identity system, UI/UX interaction design, 3D modeling & CGI rendering, serta motion graphics dan sinematografi komersial standar agensi global.',
                'kompetensi'  => json_encode([
                    'UI/UX Design & Interactive Prototyping (Figma)',
                    '3D Modeling & Motion Animation (Blender / C4D)',
                    'Corporate Brand Identity & Typography',
                    'Digital Cinematography & Video Post-Production',
                    'Commercial Illustration & Digital Art'
                ]),
                'karir'       => json_encode([
                    'UI/UX Interaction Designer',
                    '3D Animator & Motion Designer',
                    'Brand Identity Consultant',
                    'Creative Director / Art Director',
                    'Game Artist & Environment Designer'
                ]),
                'sertifikasi' => 'BNSP Desain Grafis & Multimedia, Adobe Certified Professional (Illustrator, Photoshop, Premiere)',
                'mitra'       => json_encode(['Kinema Studio', 'Infinite Studios', 'ADGI Indonesia', 'Dentsu Creative']),
                'tefa'        => 'Studio Kreatif Digital (Produksi video branding, aset UI/UX mobile, dan desain packaging industri)',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'id'          => 'ak',
                'kode'        => 'AK',
                'nama'        => 'Akuntansi & Keuangan Lembaga',
                'kategori'    => 'Bisnis Digital, FinTech & Perbankan',
                'kuota'       => 70,
                'terisi'      => 67,
                'angle'       => 180,
                'icon'        => 'calculator',
                'tagline'     => 'Digital Finance Mastery with Cloud ERP & Automated Analytics',
                'deskripsi'   => 'Transformasi pendidikan akuntansi modern berbasis Cloud ERP, automated tax processing (e-Faktur/e-SPT), financial data analytics, audit forensik digital, dan sistem manajemen perbankan syariah/konvensional.',
                'kompetensi'  => json_encode([
                    'SAP Cloud ERP Financial & Accurate Online',
                    'Automated Corporate Tax Filing (e-SPT/e-Bupot)',
                    'Digital Financial Modeling & Data Analytics',
                    'Computer-Assisted Audit Techniques (CAAT)',
                    'Fintech Ecosystem & Microbanking Operations'
                ]),
                'karir'       => json_encode([
                    'Junior Financial Analyst',
                    'Cloud ERP Accounting Specialist',
                    'Tax Compliance Officer',
                    'Internal Audit Associate',
                    'Digital Banking Operations Officer'
                ]),
                'sertifikasi' => 'BNSP Teknisi Akuntansi Yunior, SAP Certified Associate, Certified Accurate Professional (CAP)',
                'mitra'       => json_encode(['Bank Mandiri', 'Bank BCA', 'Kantor Akuntan Publik Partner', 'Accurate Indonesia']),
                'tefa'        => 'Tax & Accounting Center (Layanan konsultasi pembukuan UMKM dan pelaporan SPT digital)',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'id'          => 'tkj',
                'kode'        => 'TKJ',
                'nama'        => 'Teknik Komputer & Jaringan',
                'kategori'    => 'Infrastruktur Jaringan & Cyber Security',
                'kuota'       => 68,
                'terisi'      => 62,
                'angle'       => 270,
                'icon'        => 'network',
                'tagline'     => 'Fortifying Enterprise Infrastructure & Cyber Defense',
                'deskripsi'   => 'Mendalami perancangan arsitektur jaringan skala enterprise, routing & switching kelas data center, virtualisasi server (Proxmox/VMware), cybersecurity defense, dan administrasi Linux Server berkemampuan tinggi.',
                'kompetensi'  => json_encode([
                    'Cisco Enterprise Routing & Switching (CCNA)',
                    'MikroTik Advanced Traffic & Bandwidth Engineering',
                    'Cyber Defense, SOC Fundamentals & Firewalling',
                    'Enterprise Linux Server & Cluster Virtualization',
                    'Fiber Optic FTTH Installation & OTDR Testing'
                ]),
                'karir'       => json_encode([
                    'Enterprise Network Engineer',
                    'Cyber Security Analyst / SOC Tier 1',
                    'Linux System Administrator',
                    'Cloud Datacenter Infrastructure Engineer',
                    'Fiber Optic Specialist'
                ]),
                'sertifikasi' => 'BNSP Teknik Komputer Jaringan, Cisco Certified Network Associate (CCNA), MikroTik MTCNA/MTCRE',
                'mitra'       => json_encode(['Cisco Networking Academy', 'MikroTik Indonesia', 'Biznet Networks', 'Lintasarta Data Center']),
                'tefa'        => 'NOC & ISP Center (Penyedia infrastruktur internet kampus, maintenance server, dan instalasi FO)',
                'created_at'  => $now,
                'updated_at'  => $now,
            ]
        ];

        foreach ($jurusanData as $j) {
            $exists = $this->db->table('jurusan')->where('id', $j['id'])->countAllResults();
            if ($exists === 0) {
                $this->db->table('jurusan')->insert($j);
            }
        }

        // 3. Seed Berita
        $beritaData = [
            [
                'judul'          => 'Siswa RPL & TKJ Ciptakan Sistem AI IoT Deteksi Mutu Pertanian Presisi',
                'slug'           => 'siswa-rpl-tkj-ciptakan-sistem-ai-iot-pertanian-presisi',
                'kategori'       => 'KARYA SISWA',
                'kategori_color' => 'amber',
                'penulis'        => 'Humas Vokasi',
                'tanggal'        => '12 Mei 2025',
                'ringkasan'      => 'Kolaborasi lintas jurusan menghasilkan perangkat IoT edge computing terjangkau yang siap diadopsi petani modern dalam mendeteksi kesuburan tanah secara realtime.',
                'konten'         => 'Riset mendalam selama 4 bulan yang mengawinkan computer vision dengan sensor IoT mikro menghantarkan tim siswa SMK Unggulan merebut hibah riset inovasi vokasi nasional. Alat ini memanfaatkan mikrokontroler ESP32, kamera AI, dan modul telemetry LoRa yang mampu memonitor kelembaban, pH tanah, dan nutrisi daun dengan akurasi 97.8% tanpa butuh koneksi internet konstan. Perangkat ini langsung diuji coba di lahan pertanian seluas 5 hektar di Jawa Timur dengan bimbingan langsung engineer dari Telkom Indonesia.',
                'foto'           => 'iot_pertanian.jpg',
                'waktu_baca'     => '3 menit baca',
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'judul'          => 'Penandatanganan MoU Kelas Industri dengan 5 Perusahaan Teknologi Terkemuka',
                'slug'           => 'penandatanganan-mou-kelas-industri-5-perusahaan-teknologi',
                'kategori'       => 'KERJASAMA INDUSTRI',
                'kategori_color' => 'orange',
                'penulis'        => 'BKK & Hubin',
                'tanggal'        => '28 April 2025',
                'ringkasan'      => 'SMK Unggulan meresmikan kelas binaan industri dan sinkronisasi kurikulum berbasis kompetensi kerja masa depan bersama para pimpinan industri nasional.',
                'konten'         => 'Bertempat di Aula Utama Graha Kejuruan, SMK Unggulan resmi menandatangani Nota Kesepahaman (MoU) bersama lima perusahaan papan atas bidang teknologi, keuangan, dan animasi digital. Kerjasama ini mencakup pembukaan kelas magang 1 tahun, beasiswa sertifikasi internasional, donasi perangkat laboratorium berstandar industri, serta komitmen penyerapan kerja minimal 40 lulusan setiap tahunnya.',
                'foto'           => 'mou_industri.jpg',
                'waktu_baca'     => '4 menit baca',
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'judul'          => 'Sabet Medali Emas LKS Nasional Bidang Cloud Computing & Graphic Design',
                'slug'           => 'sabet-medali-emas-lks-nasional-cloud-computing-graphic-design',
                'kategori'       => 'PRESTASI NASIONAL',
                'kategori_color' => 'emerald',
                'penulis'        => 'Tim Kesiswaan',
                'tanggal'        => '15 April 2025',
                'ringkasan'      => 'Dua delegasi siswa SMK Unggulan berhasil meraih podium tertinggi dalam ajang Lomba Kompetensi Siswa (LKS) Tingkat Nasional.',
                'konten'         => 'Perjuangan panjang kontingen sekolah kembali membuahkan hasil membanggakan. Muhammad Fatih (XII RPL) meraih Medali Emas pada bidang Cloud Computing setelah berhasil mendesain arsitektur AWS Multi-Region dalam waktu 3 jam, sementara Chelsea Aurelia (XII DKV) memenangkan Medali Emas di bidang Graphic Design Technology dengan karya packaging ramah lingkungan dan interactive augmented reality.',
                'foto'           => 'lks_emas.jpg',
                'waktu_baca'     => '2 menit baca',
                'created_at'     => $now,
                'updated_at'     => $now,
            ]
        ];

        if ($this->db->table('berita')->countAllResults() === 0) {
            $this->db->table('berita')->insertBatch($beritaData);
        }

        // 4. Seed Galeri
        $galeriData = [
            [
                'judul'      => 'Lab Apple iMac & 3D Render Farm',
                'kategori'   => 'FASILITAS DKV',
                'foto'       => 'lab-imac.jpg',
                'deskripsi'  => 'Studio 36 unit iMac M3 dan workstation dedicated GPU RTX 4080 untuk rendering 3D, animasi, dan multimedia.',
                'icon'       => 'monitor',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'judul'      => 'Cloud Data Center & Cisco Networking Pod',
                'kategori'   => 'FASILITAS TKJ',
                'foto'       => 'data-center.jpg',
                'deskripsi'  => 'Rak server rackmount enterprise, core switch Cisco Catalyst, dan simulator Fiber Optic FTTH berstandar internasional.',
                'icon'       => 'server',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'judul'      => 'Software House & AI Innovation Lab',
                'kategori'   => 'FASILITAS RPL',
                'foto'       => 'software-house.jpg',
                'deskripsi'  => 'Ruang kolaborasi scrum agile dengan smartboard interaktif dan workstation komputasi AI berkinerja tinggi.',
                'icon'       => 'cpu',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'judul'      => 'Digital Banking & Mini Bank Syariah',
                'kategori'   => 'FASILITAS AKL',
                'foto'       => 'mini-bank.jpg',
                'deskripsi'  => 'Laboratorium transaksi perbankan riil terintegrasi dengan core banking system dan automated teller simulation.',
                'icon'       => 'landmark',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'judul'      => 'Smart Library & Tech Lounge',
                'kategori'   => 'PUSAT BELAJAR',
                'foto'       => 'smart-library.jpg',
                'deskripsi'  => 'Perpustakaan digital modern dengan katalog ribuan e-book internasional, silent pod, dan discussion lounge.',
                'icon'       => 'book-open',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'judul'      => 'Auditorium Dome & Exhibition Hall',
                'kategori'   => 'KAMPUS',
                'foto'       => 'auditorium.jpg',
                'deskripsi'  => 'Gedung serbaguna berkapasitas 1.500 orang dengan tata suara akustik profesional, videotron LED, dan area pameran.',
                'icon'       => 'sparkles',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];

        if ($this->db->table('galeri')->countAllResults() === 0) {
            $this->db->table('galeri')->insertBatch($galeriData);
        }

        // 5. Seed Profil & Struktur Organisasi
        $this->call('App\Database\Seeds\ProfilAndStrukturSeeder');
    }
}
