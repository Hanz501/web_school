<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProfilAndStrukturSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        // 1. Seed Profil Sekolah
        if ($this->db->table('profil_sekolah')->countAllResults() === 0) {
            $this->db->table('profil_sekolah')->insert([
                'nama_sekolah'      => 'SMK UNGGULAN PUSAT KEUNGGULAN',
                'npsn'              => '20194821',
                'akreditasi'        => 'A (Unggul) BAN-S/M & ISO 9001:2015',
                'tahun_berdiri'     => '2012',
                'ringkasan_sejarah' => 'SMK Unggulan didirikan pada tahun 2012 sebagai respons strategis terhadap tingginya kebutuhan industri nasional akan tenaga ahli teknologi informasi, rekayasa digital, dan sistem keuangan modern yang berkarakter kuat serta memiliki kompetensi berstandar internasional.',
                'visi'              => 'Menjadi Pusat Keunggulan Pendidikan Vokasi Terdepan di Asia Tenggara yang Menghasilkan Lulusan Berkarakter Unggul, Berdaya Saing Global, dan Adaptif terhadap Teknologi Masa Depan.',
                'misi'              => json_encode([
                    'Menyelenggarakan kurikulum link and match yang selaras secara dinamis dengan standar kompetensi industri tier-1 global.',
                    'Membekali peserta didik dengan sertifikasi profesi resmi BNSP dan sertifikasi vendor internasional terkemuka (Cisco, AWS, Adobe, SAP).',
                    'Mengembangkan ekosistem Teaching Factory (TeFa) berbasis proyek komersial riil untuk menumbuhkan jiwa wirausaha teknologi (technopreneur).',
                    'Membangun budaya kerja industri dengan integritas moral tinggi, kedisiplinan prima, dan wawasan kebinekaan global.'
                ]),
                'nilai_budaya'      => json_encode([
                    [
                        'icon'  => '💎',
                        'label' => 'Professional',
                        'sub'   => 'Kompeten & Tepat'
                    ],
                    [
                        'icon'  => '🛡️',
                        'label' => 'Reliable',
                        'sub'   => 'Berintegritas'
                    ],
                    [
                        'icon'  => '💡',
                        'label' => 'Innovative',
                        'sub'   => 'Kreatif Solutif'
                    ],
                    [
                        'icon'  => '🤝',
                        'label' => 'Disciplined',
                        'sub'   => 'Etos Kerja Kuat'
                    ],
                    [
                        'icon'  => '🚀',
                        'label' => 'Excellence',
                        'sub'   => 'Standar Tertinggi'
                    ]
                ]),
                'created_at'        => $now,
                'updated_at'        => $now,
            ]);
        }

        // 2. Seed Linimasa Sejarah
        if ($this->db->table('sejarah')->countAllResults() === 0) {
            $sejarahData = [
                [
                    'tahun'        => '2012',
                    'badge_tahun'  => 'Tahun 2012',
                    'judul'        => 'Pendirian & Peletakan Fondasi Vokasi',
                    'deskripsi'    => 'Memulai operasional perdana dengan 2 program keahlian perintis (RPL dan TKJ), menggandeng asosiasi industri lokal dan laboratorium dasar komputasi.',
                    'urutan'       => 1,
                    'color_scheme' => 'amber',
                    'created_at'   => $now,
                    'updated_at'   => $now,
                ],
                [
                    'tahun'        => '2017',
                    'badge_tahun'  => 'Tahun 2017',
                    'judul'        => 'Akreditasi A & Sertifikasi Manajemen Mutu ISO',
                    'deskripsi'    => 'Meraih Akreditasi A (Unggul) dari BAN-S/M dan tersertifikasi ISO 9001:2015. Membuka program DKV dan Akuntansi FinTech untuk melengkapi ekosistem digital.',
                    'urutan'       => 2,
                    'color_scheme' => 'amber',
                    'created_at'   => $now,
                    'updated_at'   => $now,
                ],
                [
                    'tahun'        => '2021',
                    'badge_tahun'  => 'Tahun 2021',
                    'judul'        => 'Penetapan SMK Pusat Keunggulan (SMK PK)',
                    'deskripsi'    => 'Ditetapkan secara resmi oleh Kemendikbudristek sebagai SMK Pusat Keunggulan Skema Pemadanan Industri, membangun Cyber Range Simulator Tier-3 & Studio 3D CGI Render Farm.',
                    'urutan'       => 3,
                    'color_scheme' => 'orange',
                    'created_at'   => $now,
                    'updated_at'   => $now,
                ],
                [
                    'tahun'        => '2025',
                    'badge_tahun'  => 'Tahun 2025',
                    'judul'        => 'Ekspansi Kemitraan Global & Applied AI Vokasi',
                    'deskripsi'    => 'Menjalin 50+ kemitraan industri multinasional, program magang internasional ke Singapura & Jepang, serta integrasi kurikulum Artificial Intelligence & Cloud Computing.',
                    'urutan'       => 4,
                    'color_scheme' => 'emerald',
                    'created_at'   => $now,
                    'updated_at'   => $now,
                ],
            ];
            $this->db->table('sejarah')->insertBatch($sejarahData);
        }

        // 3. Seed Bagan Struktur Organisasi
        if ($this->db->table('struktur_organisasi')->countAllResults() === 0) {
            $strukturData = [
                // Level 1: Kepala Sekolah
                [
                    'nama'        => 'Dr. H. Hendra Wijaya, M.Kom., IPM.',
                    'jabatan'     => 'Kepala Sekolah',
                    'level'       => 'kepala_sekolah',
                    'sub_jabatan' => 'Penanggung Jawab Utama & Asesor Nasional BAN-S/M',
                    'badge_label' => 'Pimpinan Puncak',
                    'icon'        => '👨‍💼',
                    'foto'        => null,
                    'urutan'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],

                // Level 1.5: Komite Sekolah (Sayap Kiri)
                [
                    'nama'        => 'H. Suryadharma, S.E.',
                    'jabatan'     => 'Ketua Komite Sekolah',
                    'level'       => 'komite',
                    'sub_jabatan' => 'Perwakilan Orang Tua & Mitra Strategis',
                    'badge_label' => 'Mitra / Penasihat',
                    'icon'        => '🏛️',
                    'foto'        => null,
                    'urutan'      => 2,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],

                // Level 1.5: Kepala Tata Usaha (Sayap Kanan)
                [
                    'nama'        => 'Endang Susilowati, S.Sos.',
                    'jabatan'     => 'Kepala Tata Usaha',
                    'level'       => 'tata_usaha',
                    'sub_jabatan' => 'Layanan Administrasi & Kepegawaian',
                    'badge_label' => 'Administrasi',
                    'icon'        => '📋',
                    'foto'        => null,
                    'urutan'      => 3,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],

                // Level 2: 4 Wakil Kepala Sekolah
                [
                    'nama'        => 'Siti Rahmawati, S.Pd., M.T.',
                    'jabatan'     => 'Waka Kurikulum',
                    'level'       => 'waka',
                    'sub_jabatan' => 'Kurikulum Merdeka & Standar Industri',
                    'badge_label' => 'Waka 1',
                    'icon'        => '📚',
                    'foto'        => null,
                    'urutan'      => 4,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                [
                    'nama'        => 'Bambang Prasetyo, M.Pd.',
                    'jabatan'     => 'Waka Kesiswaan',
                    'level'       => 'waka',
                    'sub_jabatan' => 'Karakter Siswa, Ekstra & LKS',
                    'badge_label' => 'Waka 2',
                    'icon'        => '🎖️',
                    'foto'        => null,
                    'urutan'      => 5,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                [
                    'nama'        => 'Rian Ardiansyah, S.Kom.',
                    'jabatan'     => 'Waka Hubin & Humas',
                    'level'       => 'waka',
                    'sub_jabatan' => '50+ Industri, Prakerin & BKK',
                    'badge_label' => 'Waka 3',
                    'icon'        => '🤝',
                    'foto'        => null,
                    'urutan'      => 6,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                [
                    'nama'        => 'Ir. Dedi Kurniawan, S.T.',
                    'jabatan'     => 'Waka Sarana Prasarana',
                    'level'       => 'waka',
                    'sub_jabatan' => 'Lab Tier-3, Server & TeFa',
                    'badge_label' => 'Waka 4',
                    'icon'        => '🏗️',
                    'foto'        => null,
                    'urutan'      => 7,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],

                // Level 3: 4 Kepala Program Keahlian (Kaprodi)
                [
                    'nama'        => 'Ahmad Fauzi, M.Kom.',
                    'jabatan'     => 'Kaprodi RPL',
                    'level'       => 'kaprodi',
                    'sub_jabatan' => 'Software & Applied AI',
                    'badge_label' => 'Kaprodi',
                    'icon'        => '💻',
                    'foto'        => null,
                    'urutan'      => 8,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                [
                    'nama'        => 'Yusuf Iskandar, S.T., CCNA.',
                    'jabatan'     => 'Kaprodi TKJ',
                    'level'       => 'kaprodi',
                    'sub_jabatan' => 'Cyber Defense & Cloud',
                    'badge_label' => 'Kaprodi',
                    'icon'        => '🌐',
                    'foto'        => null,
                    'urutan'      => 9,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                [
                    'nama'        => 'Maya Anggraini, S.Ds.',
                    'jabatan'     => 'Kaprodi DKV',
                    'level'       => 'kaprodi',
                    'sub_jabatan' => '3D Animation & UI/UX',
                    'badge_label' => 'Kaprodi',
                    'icon'        => '🎨',
                    'foto'        => null,
                    'urutan'      => 10,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                [
                    'nama'        => 'Dewi Lestari, S.E., Ak.',
                    'jabatan'     => 'Kaprodi Akuntansi',
                    'level'       => 'kaprodi',
                    'sub_jabatan' => 'FinTech & Cloud ERP',
                    'badge_label' => 'Kaprodi',
                    'icon'        => '📊',
                    'foto'        => null,
                    'urutan'      => 11,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
            ];
            $this->db->table('struktur_organisasi')->insertBatch($strukturData);
        }
    }
}
