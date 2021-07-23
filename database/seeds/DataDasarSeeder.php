<?php

use App\Models\Badan;
use App\Models\Fraksi;
use App\Models\Komisi;
use Illuminate\Database\Seeder;

class DataDasarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //seeder badan
        $badanANGGARAN = new Badan();
        $badanANGGARAN->nama = 'Badan Anggaran';
        $badanANGGARAN->slug = Str::slug('Badan Anggaran');
        $badanANGGARAN->keterangan = "Menjalin kerjasama dengan pihak Pemerintah Kota Samarinda dalam rangka perancangan, pembahasan, dan penetapan yang berkaitan dengan Anggaran Pendapatan Belanja Daerah (APBD) Kota Samarinda.";
        $badanANGGARAN->save();

        $badanKEHORMATAN = new Badan();
        $badanKEHORMATAN->nama = 'Badan Kehormatan';
        $badanKEHORMATAN->slug = Str::slug('Badan Kehormatan');
        $badanKEHORMATAN->keterangan = "Menegakkan peraturan dan tata tertib yang kaitannya dengan kode etik Dewan Perwakilan Rakyat Daerah (DPRD) Kota Samarinda.";
        $badanKEHORMATAN->save();

        $badanMUSYAWARAH = new Badan();
        $badanMUSYAWARAH->nama = 'Badan Musyawarah';
        $badanMUSYAWARAH->slug = Str::slug('Badan Musyawarah');
        $badanMUSYAWARAH->keterangan = "Mengkordinasikan hal-hal yang berkaitan dengan agenda kegiatan dewan, penetapan sidang, termasuk penetapan jangka waktu pembahasan Peraturan Daerah (Perda), dan memberi kesempatan kepada semua alat kelengkapan dewan guna mengajukan masukan-masukan yang berkaitan dengan tugas pokok dan fungsi mereka didalamnya.";
        $badanMUSYAWARAH->save();

        $badanPERATURAN = new Badan();
        $badanPERATURAN->nama = 'Badan Pembentukan Peraturan Daerah';
        $badanPERATURAN->slug = Str::slug('Badan Pembentukan Peraturan Daerah');
        $badanPERATURAN->keterangan = "Menyusun rancangan Peraturan Daerah (Perda) dan Program Legislasi Daerah (Prolegda) guna dikordinasikan dengan pihak Pemerintah Kota Samarinda sebelum diajukan dan dibahas oleh Pimpinan Dewan";
        $badanPERATURAN->save();

        //seeder komisi
        $komisiSatu = new Komisi();
        $komisiSatu->nama = 'Komisi I';
        $komisiSatu->slug = Str::slug('Komisi I');
        $komisiSatu->bidang = "Bidang Hukum & Pemerintahan";
        $komisiSatu->keterangan = "Pemerintahan umum, kependudukan dan catatan sipil, komunikasi/pers, hukum/perundang-undangan, pertahanan, pelayanan perizinan terpadu, kepegawaian/aparatur, litbang dan diklat daerah, kesatuan bangsa, politik dan perlindungan masyarakat, organisasi masyarakat.";
        $komisiSatu->save();

        $komisiDua = new Komisi();
        $komisiDua->nama = 'Komisi II';
        $komisiDua->slug = Str::slug('Komisi II');
        $komisiDua->bidang = "Bidang Ekonomi dan Keuangan";
        $komisiDua->keterangan = "Pendapatan, pengelolaan keuangan & aset daerah, pelayanan perizinan terpadu, dunia usaha dan penanaman modal, perindustrian dan perdagangan, perikanan dan peternakan, pariwisata, pertanian, perkebunan dan kehutanan, ketahanan pangan dan penyuluhan pertanian, pengadaan pangan, logistik, pasar koperasi, usaha mikro, kecil dan menengah, perpajakan, retribusi dan perbankan.";
        $komisiDua->save();

        $komisiTiga = new Komisi();
        $komisiTiga->nama = 'Komisi III';
        $komisiTiga->slug = Str::slug('Komisi III');
        $komisiTiga->bidang = "Bidang Pembangunan";
        $komisiTiga->keterangan = "Bina marga dan pengairan, cipta karya dan tata kota, pemetaan, penataan dan pengawasan kota, kebersihan, pertamanan dan pemakaman, perhubungan, pertambangan dan energi, perumahan rakyat dan lingkungan hidup, penanggulangan bencana dan pemadam kebakaran.";
        $komisiTiga->save();

        $komisiEmpat = new Komisi();
        $komisiEmpat->nama = 'Komisi IV';
        $komisiEmpat->slug = Str::slug('Komisi IV');
        $komisiEmpat->bidang = "Bidang Kesejahteraan Rakyat";
        $komisiEmpat->keterangan = "Ketenagakerjaan, transmigrasi, pendidikan, ilmu pengetahuan dan teknologi, pemuda dan olahraga, pemberdayaan masyarakat dan perempuan, keluarga berencana dan keluarga sejahtera dan kesejahteraan sosial.";
        $komisiEmpat->save();

        //seeder fraksi

        $fraksiPDIP = new Fraksi();
        $fraksiPDIP->nama = 'Partai Demokrasi Perjuangan Indonesia';
        $fraksiPDIP->slug = Str::slug('Partai Demokrasi Perjuangan Indonesia');
        $fraksiPDIP->save();

        $fraksiGERINDRA = new Fraksi();
        $fraksiGERINDRA->nama = 'Partai Gerakan Indonesia Raya';
        $fraksiGERINDRA->slug = Str::slug('Gerakan Indonesia Raya');
        $fraksiGERINDRA->save();

        $fraksiGOLKAR = new Fraksi();
        $fraksiGOLKAR->nama = 'Partai Golongan Karya';
        $fraksiGOLKAR->slug = Str::slug('Partai Golongan Karya');
        $fraksiGOLKAR->save();

        $fraksiPKS = new Fraksi();
        $fraksiPKS->nama = 'Partai Keadilan Sejahtera';
        $fraksiPKS->slug = Str::slug('Partai Keadilan Sejahtera');
        $fraksiPKS->save();

        $fraksiDEMOKRAT = new Fraksi();
        $fraksiDEMOKRAT->nama = 'Partai Demokrat';
        $fraksiDEMOKRAT->slug = Str::slug('Partai Demokrat');
        $fraksiDEMOKRAT->save();

        $fraksiNASDEM = new Fraksi();
        $fraksiNASDEM->nama = 'Partai Nasional Demokrat';
        $fraksiNASDEM->slug = Str::slug('Partai Nasional Demokrat');
        $fraksiNASDEM->save();

        $fraksiPAN = new Fraksi();
        $fraksiPAN->nama = 'Partai Amanat Nasional';
        $fraksiPAN->slug = Str::slug('Partai Amanat Nasional');
        $fraksiPAN->save();

        $fraksiPKB = new Fraksi();
        $fraksiPKB->nama = 'Partai Kebangkitan Pembangunan';
        $fraksiPKB->slug = Str::slug('Partai Kebangkitan Pembangunan');
        $fraksiPKB->save();
    }
}
