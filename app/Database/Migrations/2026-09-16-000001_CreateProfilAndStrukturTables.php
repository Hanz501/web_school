<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProfilAndStrukturTables extends Migration
{
    public function up()
    {
        // 1. Tabel profil_sekolah (Visi, Misi, Nilai Budaya, Info Lembaga)
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_sekolah' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'default'    => 'SMK UNGGULAN PUSAT KEUNGGULAN',
            ],
            'npsn' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => '20194821',
            ],
            'akreditasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'A (Unggul) BAN-S/M & ISO 9001:2015',
            ],
            'tahun_berdiri' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'default'    => '2012',
            ],
            'ringkasan_sejarah' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'visi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'misi' => [
                'type' => 'TEXT', // JSON encoded array
                'null' => true,
            ],
            'nilai_budaya' => [
                'type' => 'TEXT', // JSON encoded array of [{icon, label, sub}]
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('profil_sekolah', true);

        // 2. Tabel sejarah (Milestone & Linimasa Sejarah Sekolah)
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tahun' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'badge_tahun' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'urutan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'color_scheme' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'amber',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('sejarah', true);

        // 3. Tabel struktur_organisasi (Bagan Pimpinan, Komite, Waka, Kaprodi)
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'jabatan' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'level' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'waka', // kepala_sekolah, komite, tata_usaha, waka, kaprodi, lainnya
            ],
            'sub_jabatan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'badge_label' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'icon' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => '👨‍💼',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'urutan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('struktur_organisasi', true);
    }

    public function down()
    {
        $this->forge->dropTable('struktur_organisasi', true);
        $this->forge->dropTable('sejarah', true);
        $this->forge->dropTable('profil_sekolah', true);
    }
}
