<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\GaleriModel;
use App\Models\JurusanModel;
use App\Models\ProfilModel;
use App\Models\SejarahModel;
use App\Models\StrukturOrganisasiModel;
use Throwable;

class Home extends BaseController
{
    public function index(): string
    {
        $jurusanModel  = new JurusanModel();
        $beritaModel   = new BeritaModel();
        $galeriModel   = new GaleriModel();
        $profilModel   = new ProfilModel();
        $sejarahModel  = new SejarahModel();
        $strukturModel = new StrukturOrganisasiModel();

        // 1. Fetch Jurusan from Database with JSON formatting
        try {
            $dbJurusan = $jurusanModel->getAllFormatted();
        } catch (Throwable $e) {
            $dbJurusan = [];
        }

        // 2. Fetch Berita from Database
        try {
            $dbBerita = $beritaModel->getLatestBerita(6);
        } catch (Throwable $e) {
            $dbBerita = [];
        }

        // 3. Fetch Galeri from Database
        try {
            $dbGaleri = $galeriModel->getAllGaleri();
        } catch (Throwable $e) {
            $dbGaleri = [];
        }

        // 4. Fetch Profil Sekolah from Database
        try {
            $dbProfil = $profilModel->getProfil();
        } catch (Throwable $e) {
            $dbProfil = [];
        }

        // 5. Fetch Sejarah Linimasa from Database
        try {
            $dbSejarah = $sejarahModel->getAllOrdered();
        } catch (Throwable $e) {
            $dbSejarah = [];
        }

        // 6. Fetch Struktur Organisasi from Database
        try {
            $dbStruktur = $strukturModel->getGroupedByLevel();
        } catch (Throwable $e) {
            $dbStruktur = [
                'kepala_sekolah' => null,
                'komite'         => null,
                'tata_usaha'     => null,
                'waka'           => [],
                'kaprodi'        => [],
                'lainnya'        => [],
            ];
        }

        // Exact Master Prompt Fallback Data: 4 Program Keahlian
        $defaultJurusan = [
            [
                'id' => 'rpl',
                'kode' => 'RPL',
                'nama' => 'Rekayasa Perangkat Lunak',
                'kategori' => 'Teknologi Informasi & Software Engineering',
                'kuota' => 72,
                'terisi' => 64,
                'angle' => 0, // 0°: Posisi Atas
                'icon' => 'code-2',
                'tagline' => 'Architecting Intelligent Systems & Enterprise Solutions',
                'deskripsi' => 'Fokus pada rekayasa perangkat lunak modern, pengembangan aplikasi berbasis kecerdasan buatan (AI), arsitektur cloud computing, mobile application development (Flutter & React Native), serta penerapan DevOps dan CI/CD pipeline berstandar industri global.',
                'kompetensi' => [
                    'Fullstack Web Architecture (Next.js, Node.js, Laravel)',
                    'Mobile Application Development (Flutter / React Native)',
                    'Cloud Computing & Distributed Database Management',
                    'DevOps, Containerization & CI/CD Pipeline',
                    'Applied AI & Machine Learning Integration'
                ],
                'karir' => [
                    'Fullstack Software Engineer',
                    'Mobile Application Developer',
                    'Cloud & DevOps Specialist',
                    'AI & Data Solutions Architect',
                    'Tech Startup Co-Founder'
                ],
                'sertifikasi' => 'BNSP Rekayasa Perangkat Lunak, Oracle Certified Associate (OCA), AWS Certified Cloud Practitioner',
                'mitra' => ['Google Cloud Indonesia', 'Telkom Indonesia', 'Tokopedia Academy', 'Gojek Tech Academy'],
                'tefa' => 'Software House Vokasi (Menerima proyek komersial web aplikasi, ERP kasir, dan digitalisasi UMKM)'
            ],
            [
                'id' => 'dkv',
                'kode' => 'DKV',
                'nama' => 'Desain Komunikasi Visual',
                'kategori' => 'Seni, Media & Industri Kreatif Digital',
                'kuota' => 64,
                'terisi' => 58,
                'angle' => 90, // 90°: Posisi Kanan
                'icon' => 'palette',
                'tagline' => 'Visual Identity, 3D CGI Animation & UI/UX Experience',
                'deskripsi' => 'Mengembangkan kompetensi visual storytelling, desain identitas korporasi, perancangan UI/UX interaktif berbasis data, animasi 3D dan CGI rendering kelas dunia, serta sinematografi digital dan motion graphics standar agensi periklanan multinasional.',
                'kompetensi' => [
                    'UI/UX Interaction Design & High-Fidelity Prototyping',
                    '3D Modeling, Rigging & Motion Animation (Blender/C4D)',
                    'Corporate Brand Identity & Visual Communication Strategy',
                    'Digital Cinematography & Video Post-Production',
                    'Commercial Illustration & Digital Asset Creation'
                ],
                'karir' => [
                    'UI/UX Product Designer',
                    '3D Animator & CGI Artist',
                    'Creative Director & Brand Consultant',
                    'Motion Graphic Specialist',
                    'Game Concept Artist'
                ],
                'sertifikasi' => 'BNSP Desain Grafis & Multimedia, Adobe Certified Professional (Illustrator, Photoshop, Premiere)',
                'mitra' => ['Kinema Studio', 'Infinite Studios', 'Asosiasi Desainer Grafis Indonesia (ADGI)', 'Dentsu Creative'],
                'tefa' => 'Studio Kreatif Digital (Produksi video branding promosi, UI/UX aplikasi, dan visual marketing industri)'
            ],
            [
                'id' => 'ak',
                'kode' => 'AK',
                'nama' => 'Akuntansi & Keuangan Lembaga',
                'kategori' => 'FinTech, Cloud ERP & Digital Banking',
                'kuota' => 70,
                'terisi' => 67,
                'angle' => 180, // 180°: Posisi Bawah
                'icon' => 'calculator',
                'tagline' => 'Automated Financial Systems & Corporate Cloud ERP',
                'deskripsi' => 'Transformasi pendidikan akuntansi modern berbasis ekosistem FinTech, implementasi Cloud ERP (SAP & Accurate Online), otomatisasi pelaporan pajak digital (e-SPT/e-Bupot), audit forensik berbasis data, dan sistem manajemen perbankan syariah/konvensional.',
                'kompetensi' => [
                    'SAP Cloud ERP Financials & Accurate Accounting Online',
                    'Automated Corporate Tax Filing (e-SPT, e-Faktur & PPh)',
                    'Financial Modeling & Business Data Analytics',
                    'Computer-Assisted Audit Techniques (CAAT)',
                    'Fintech Ecosystem & Microbanking Operations'
                ],
                'karir' => [
                    'Junior Financial Analyst',
                    'Cloud ERP Accounting Specialist',
                    'Corporate Tax Compliance Officer',
                    'Internal Audit Associate',
                    'Digital Banking Operations Officer'
                ],
                'sertifikasi' => 'BNSP Teknisi Akuntansi Yunior, SAP Certified Associate, Certified Accurate Professional (CAP)',
                'mitra' => ['Bank Mandiri', 'Bank BCA', 'Kantor Akuntan Publik (KAP) Partner', 'Accurate Indonesia'],
                'tefa' => 'Tax & Accounting Center (Layanan konsultasi pembukuan UMKM, audit internal, dan pelaporan pajak)'
            ],
            [
                'id' => 'tkj',
                'kode' => 'TKJ',
                'nama' => 'Teknik Komputer & Jaringan',
                'kategori' => 'Infrastruktur Jaringan, Server & Cyber Security',
                'kuota' => 68,
                'terisi' => 62,
                'angle' => 270, // 270°: Posisi Kiri
                'icon' => 'network',
                'tagline' => 'Enterprise Cloud Infrastructure & Cyber Defense',
                'deskripsi' => 'Mendalami perancangan arsitektur jaringan data center skala enterprise, routing switching berkecepatan tinggi, virtualisasi server (Proxmox/VMware), Security Operations Center (SOC Tier-1), mitigasi cyber attack, dan transmisi Fiber Optic FTTH.',
                'kompetensi' => [
                    'Cisco Enterprise Routing & Switching (CCNA)',
                    'MikroTik Advanced Traffic & Bandwidth Engineering',
                    'Cyber Defense, SOC Fundamentals & Enterprise Firewall',
                    'Enterprise Linux Server & High-Availability Virtualization',
                    'Fiber Optic FTTH Installation & OTDR Testing'
                ],
                'karir' => [
                    'Enterprise Network Engineer',
                    'Cyber Security Analyst / SOC Tier 1',
                    'Linux & Cloud Infrastructure Administrator',
                    'Data Center Technical Specialist',
                    'Fiber Optic Project Engineer'
                ],
                'sertifikasi' => 'BNSP Teknik Komputer Jaringan, Cisco Certified Network Associate (CCNA), MikroTik MTCNA/MTCRE',
                'mitra' => ['Cisco Networking Academy', 'MikroTik Indonesia', 'Biznet Networks', 'Lintasarta Data Center'],
                'tefa' => 'NOC & ISP Center (Penyedia infrastruktur internet kampus, maintenance server tier-3, instalasi FO)'
            ]
        ];

        // Exact Master Prompt Fallback Data: 3 Artikel Warta Berita & Prestasi
        $defaultBerita = [
            [
                'id' => 1,
                'kategori' => 'Karya Siswa',
                'kategori_color' => 'amber',
                'tanggal' => '12 Mei 2025',
                'penulis' => 'Tim Riset Vokasi',
                'judul' => 'Siswa RPL & TKJ Ciptakan Sistem AI Deteksi Mutu Pertanian Presisi',
                'ringkasan' => 'Kolaborasi lintas jurusan RPL dan TKJ berhasil mengembangkan prototipe perangkat IoT dan Edge AI berbiaya rendah untuk menganalisis kesuburan tanah dan deteksi hama tanaman secara realtime.',
                'konten' => 'Inovasi ini mengintegrasikan mikrokomputer dengan modul kamera telemetri dan algoritma computer vision berbasis lightweight neural network. Sistem ini mampu menganalisis citra daun dan kelembaban tanah dalam waktu kurang dari 2 detik tanpa ketergantungan pada koneksi internet berkecepatan tinggi.<br><br>Dalam pengujian lapangan bersama kelompok tani binaan di Jawa Barat, akurasi deteksi mencapai 98.2%. Proyek ini merupakan implementasi nyata kurikulum Project-Based Learning (PjBL) SMK Unggulan yang menghubungkan langsung problem riil masyarakat dengan solusi teknologi tepat guna.<br><br>Riset ini juga berhasil memenangkan hibah inovasi teknologi vokasi Kemendikbudristek dan siap diproduksi massal melalui unit Teaching Factory sekolah.',
                'foto' => 'berita-pertanian-ai.jpg',
                'waktu_baca' => '3 menit baca'
            ],
            [
                'id' => 2,
                'kategori' => 'Prestasi Global',
                'kategori_color' => 'emerald',
                'tanggal' => '28 April 2025',
                'penulis' => 'Humas & Kemitraan Luar Negeri',
                'judul' => 'Karya Animasi 3D Jurusan DKV Sabet Gold Winner di ASEAN Digital Arts 2025',
                'ringkasan' => 'Film pendek animasi 3D berjudul "Nusantara 2088" karya siswa tingkat akhir DKV mengungguli ratusan karya sineas muda dari 10 negara di Asia Tenggara.',
                'konten' => 'Proses produksi animasi sepanjang 7 menit ini dikerjakan secara kolaboratif selama 6 bulan di Lab Apple iMac & 3D Render Farm SMK Unggulan dengan supervisi langsung dari mentor industri Kinema Studio.<br><br>Karya ini diapresiasi oleh dewan juri internasional atas kedalaman visual storytelling, detail tekstur CGI yang halus, dan perpaduan kearifan lokal dengan estetika futuristik cyber-heritage.<br><br>Sebagai pemenang Gold Winner, para siswa mendapatkan jalur beasiswa studi lanjut animasi di Nanyang Polytechnic Singapura serta kontrak magang eksklusif di agensi animasi regional.',
                'foto' => 'berita-animasi-dkv.jpg',
                'waktu_baca' => '4 menit baca'
            ],
            [
                'id' => 3,
                'kategori' => 'FinTech & Akuntansi',
                'kategori_color' => 'amber',
                'tanggal' => '15 April 2025',
                'penulis' => 'Kaprodi Akuntansi & Keuangan',
                'judul' => 'Transformasi FinTech: Jurusan Akuntansi Resmikan Laboratorium Cloud ERP',
                'ringkasan' => 'Bekerja sama dengan penyedia software enterprise global, laboratorium akuntansi SMK Unggulan kini terhubung langsung dengan sistem live server cloud accounting.',
                'konten' => 'Peresmian laboratorium modern ini menandai langkah besar dalam revolusi pembelajaran akuntansi kejuruan. Siswa tidak lagi hanya belajar pembukuan manual, melainkan langsung mengoperasikan modul enterprise seperti Automated General Ledger, Real-time Tax Calculation, dan Financial Dashboard Analytics.<br><br>Fasilitas ini juga dilengkapi dengan 36 unit terminal digital banking simulasi untuk melatih kesiapan siswa menghadapi standar perbankan modern dan industri fintech masa kini.<br><br>Lulusan program ini dijamin mengantongi sertifikat resmi SAP dan Accurate yang diakui oleh lebih dari 500 korporasi nasional.',
                'foto' => 'berita-cloud-erp.jpg',
                'waktu_baca' => '3 menit baca'
            ]
        ];

        // Exact Master Prompt Fallback Data: 4 Dokumentasi & Galeri Prestasi Kampus
        $defaultGaleri = [
            [
                'id' => 1,
                'judul' => 'Tech Expo & Hackathon 2025',
                'kategori' => 'Event & Lomba',
                'kategori_slug' => 'event',
                'foto' => 'galeri-hackathon.jpg',
                'deskripsi' => 'Pameran 45 karya inovasi digital siswa dan kompetisi hackathon 24 jam bersama mentor developer top tier industri teknologi.',
                'tag' => 'Event & Lomba'
            ],
            [
                'id' => 2,
                'judul' => 'Juara 1 LKS Nasional Bidang Cyber Security',
                'kategori' => 'Sejarah & Milestone',
                'kategori_slug' => 'milestone',
                'foto' => 'galeri-lks-cyber.jpg',
                'deskripsi' => 'Kontingen siswa SMK Unggulan meraih medali emas pada LKS Tingkat Nasional setelah menyelesaikan skenario cyber defense & incident response.',
                'tag' => 'Milestone'
            ],
            [
                'id' => 3,
                'judul' => 'Cyber Range & Server Lab Simulator Tier-3',
                'kategori' => 'Fasilitas Lab',
                'kategori_slug' => 'fasilitas',
                'foto' => 'galeri-server-lab.jpg',
                'deskripsi' => 'Infrastruktur komputasi dan rack server enterprise berstandar Tier-3 yang mendukung simulasi serangan jaringan dan cloud hosting nyata.',
                'tag' => 'Fasilitas Lab'
            ],
            [
                'id' => 4,
                'judul' => 'Kemitraan Industri Global ke Tokyo & Singapura',
                'kategori' => 'Event & Lomba',
                'kategori_slug' => 'event',
                'foto' => 'galeri-tokyo-singapura.jpg',
                'deskripsi' => 'Delegasi siswa dan guru vokasi melakukan kunjungan studi teknologi serta penandatanganan penempatan magang internasional.',
                'tag' => 'Event & Lomba'
            ]
        ];

        $data = [
            'title' => 'SMK Unggulan - Pusat Keunggulan Vokasi Berkarakter Industri',
            'meta_description' => 'SMK Unggulan - Sekolah Menengah Kejuruan Pusat Keunggulan dengan kurikulum link and match industri, sertifikasi internasional, dan fasilitas modern berstandar global.',
            'jurusan'            => !empty($dbJurusan) ? $dbJurusan : $defaultJurusan,
            'berita'             => !empty($dbBerita) ? $dbBerita : $defaultBerita,
            'galeri'             => !empty($dbGaleri) ? $dbGaleri : $defaultGaleri,
            'profil'             => !empty($dbProfil) ? $dbProfil : (new ProfilModel())->getProfil(),
            'sejarahList'        => !empty($dbSejarah) ? $dbSejarah : [],
            'strukturOrganisasi' => !empty($dbStruktur) ? $dbStruktur : (new StrukturOrganisasiModel())->getGroupedByLevel(),

            // 3 Floating Metric Cards
            'metrics' => [
                [
                    'nilai' => '98.4%',
                    'label' => 'Tingkat Keterserapan',
                    'sub'   => 'Lulusan Terserap Kerja & Industri',
                    'icon'  => 'check-circle'
                ],
                [
                    'nilai' => 'Akreditasi A',
                    'label' => 'Standar Mutu Pendidikan',
                    'sub'   => 'Unggul BAN-SM & ISO 9001:2015',
                    'icon'  => 'award'
                ],
                [
                    'nilai' => '50+ Mitra',
                    'label' => 'Kemitraan Strategis',
                    'sub'   => 'Industri Multinasional & Tech Giant',
                    'icon'  => 'network-partner'
                ]
            ],

            // Data Kontak Terpadu & Sekolah
            'kontak' => [
                'nama_sekolah' => 'SMK UNGGULAN PUSAT KEUNGGULAN',
                'npsn' => '20194821',
                'akreditasi' => 'A (Unggul) BAN-S/M & ISO 9001:2015',
                'alamat' => 'Jl. Teknologi Vokasi No. 42, Kompleks Kawasan Industri & Sains Terpadu',
                'telepon' => '(021) 8890-7712',
                'telepon_alt' => '+62 812-3456-7890',
                'whatsapp' => '+62 812-3456-7890',
                'whatsapp_raw' => '6281234567890',
                'email' => 'info@smkunggulan.sch.id',
                'jam_kerja' => 'Senin - Jumat: 07.30 - 16.00 WIB',
                'transit_lrt' => 'Stasiun LRT Vokasi (300m)',
                'transit_tol' => 'Gerbang Tol Exit Sains (1.2km)',
                'social' => [
                    'instagram' => 'https://instagram.com/smk_unggulan',
                    'tiktok' => 'https://tiktok.com/@smk_unggulan',
                    'youtube' => 'https://youtube.com/@smk_unggulan_official'
                ]
            ],

            // FAQ (Tanya Jawab Seputar Sekolah & PPDB)
            'faq' => [
                [
                    'tanya' => 'Bagaimana alur pendaftaran Penerimaan Peserta Didik Baru (PPDB) 2025/2026?',
                    'jawab' => 'Pendaftaran dilakukan 100% online melalui portal PPDB resmi SMK Unggulan. Calon peserta didik mengisi biodata, mengunggah rapor semester 1-5, memilih program keahlian prioritas, dan mengikuti asesmen bakat minat vokasi terpadu.'
                ],
                [
                    'tanya' => 'Apakah seluruh lulusan mendapatkan sertifikasi kompetensi resmi BNSP & Internasional?',
                    'jawab' => 'Ya. Setiap siswa wajib menempuh uji kompetensi BNSP pada semester akhir serta dibekali kesempatan meraih sertifikasi vendor global terkemuka seperti Cisco (CCNA), Adobe (ACP), Oracle, AWS Cloud, dan SAP tanpa biaya tambahan.'
                ],
                [
                    'tanya' => 'Berapa lama periode magang industri (Prakerin) yang dijalani siswa?',
                    'jawab' => 'Siswa menjalani program Praktik Kerja Industri selama 6 hingga 12 bulan penuh di 50+ perusahaan mitra multinasional dengan pembimbing industri (mentor) dan guru pamong tersertifikasi.'
                ],
                [
                    'tanya' => 'Apakah lulusan SMK Unggulan dapat melanjutkan studi ke Perguruan Tinggi Negeri?',
                    'jawab' => 'Tentu. Lulusan kami memiliki rekam jejak keterserapan tinggi di PTN ternama (UI, ITB, ITS, PENS, Polman) melalui jalur prestasi SNBP, SNBT, maupun beasiswa vokasi perguruan tinggi kedinasan.'
                ]
            ]
        ];

        return view('pages/beranda', $data);
    }

    /**
     * Handle submission of Contact / Message form
     */
    public function kirimPesan()
    {
        $pesanModel = new \App\Models\PesanModel();

        $data = [
            'nama_lengkap' => trim((string) $this->request->getPost('nama_lengkap')),
            'email'        => trim((string) $this->request->getPost('email')),
            'pesan'        => trim((string) $this->request->getPost('pesan')),
            'is_read'      => 0,
        ];

        if (!$pesanModel->validate($data)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'errors' => $pesanModel->errors(),
                ])->setStatusCode(422);
            }

            return redirect()->to(base_url('/#kontak'))
                ->withInput()
                ->with('pesan_errors', $pesanModel->errors());
        }

        $pesanModel->insert($data);

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Terima kasih! Pesan dan masukan Anda berhasil terkirim ke manajemen sekolah.',
            ]);
        }

        return redirect()->to(base_url('/#kontak'))
            ->with('pesan_success', 'Terima kasih! Pesan dan masukan Anda berhasil terkirim kepada kami. Tim admisi akan segera menindaklanjuti.');
    }
}
