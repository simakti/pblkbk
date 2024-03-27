<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class dosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $dosenData = [
        ['ALDE ALANDA, S.Kom, M.T', '0025088802', '198808252015041002', 'Laki-laki', 7, 2, 'alde@pnp.ac.id', '', 1],
        ['ALDO ERIANDA, M.T, S.ST', '003078904', '198907032019031015', 'Laki-laki', 7, 1, 'aldo@pnp.ac.id', '', 1],
        ['CIPTO PRABOWO, S.T, M.T', '0002037410', '197403022008121001', 'Laki-laki', 7, 2, 'cipto@pnp.ac.id', 'fac231b8a829e7d730931228d72011b1.jpg', 1],
        ['DEDDY PRAYAMA, S.Kom, M.ISD', '0015048105', '198104152006041002', 'Laki-laki', 7, 2, 'deddy@pnp.ac.id', '4fa060ef27985838eb293d99da52efb2.jpeg', 1],
        ['DEFNI, S.Si, M.Kom', '0007128104', '198112072008122001', 'Perempuan', 7, 1, 'defni@pnp.ac.id', 'd864890c6bb076a318c06825005cae8d.jpg', 1],
        ['DENI SATRIA, S.Kom, M.Kom', '0028097803', '197809282008121002', 'Laki-laki', 7, 1, 'dns1st@gmail.com', '55c4fc824b98c03c6c4433c3b1e86d45.jpg', 1],
        ['DWINY MEIDELFI, S.Kom, M.Cs', '0009058601', '198605092014042001', 'Perempuan', 7, 3, 'dwinymeidelfi@pnp.ac.id', '', 1],
        ['ERVAN ASRI, S.Kom, M.Kom', '0001097802', '197809012008121001', 'Laki-laki', 7, 1, 'ervan@pnp.ac.id', '', 1],
        ['FAZROL ROZI, M.Sc.', '0021078601', '19860721201012006', 'Laki-laki', 7, 2, 'fazrol@pnp.ac.id', 'c01a268923bad997d5fd32b91f7dd70c.jpg', 1],
        ['FITRI NOVA, M.T, S.ST', '1029058502', '198505292014042001', 'Perempuan', 7, 2, 'fitrinova85@gmail.com', '', 1],
        ['Ir. HANRIYAWAN ADNAN MOODUTO, M.Kom.', '0010056606', '196605101994031003', 'Laki-laki', 7, 2, 'mooduto@pnp.ac.id', 'b3ad9efee85368414b8028cd8374f23b.jpg', 1],
        ['HENDRICK, S.T, M.T.,Ph.D', '0002127705', '197712022006041000', 'Laki-laki', 4, 4, 'hendrickpnp77@gmail.com', NULL, 0],
        ['HIDRA AMNUR, S.E., S.Kom, M.Kom', '0015048209', '198204152012121002', 'Laki-laki', 7, 1, 'hidra@pnp.ac.id', '71969dd34b719324a67cf5c2f2dcc23d.jpg', 1],
        ['HUMAIRA, S.T, M.T', '0019038103', '198103192006042002', 'Perempuan', 7, 3, 'humaira@pnp.ac.id', 'de0d94dc972a2c1d82affa030b024cfe.png', 1],
        ['IKHSAN YUSDA PRIMA PUTRA, S.H., LL.M', '0001107505', '197510012006041002', 'Laki-laki', 7, 2, 'ikhsan_yusda@yahoo.com', '', 1],
        ['INDRI RAHMAYUNI, S.T, M.T', '0025068301', '198306252008012004', 'Perempuan', 7, 3, 'indri@pnp.ac.id', '3b3b5b311bbf329ff9816431eeb7a736.jpg', 1],
        ['MERI AZMI, S.T, M.Cs', '0029068102', '198106292006042001', 'Perempuan', 7, 1, 'meriazmi@gmail.com', '9d007a42b662278a64d733739369e466.jpg', 1],
        ['Ir. Rahmat Hidayat, S.T, M.Sc.IT', '1015047801', '197804152000121002', 'Laki-laki', 7, 3, 'rahmat@pnp.ac.id', '25882a9736335a9d74afb9d8b7166694.jpg', 1],
        ['RASYIDAH, S.Si, M.M.', '0001067407', '197406012006042001', 'Perempuan', 7, 1, 'rasyidah@pnp.ac.id', '2c01adfd7d935c8ad94e43a30bd58630.jpg', 1],
        ['RIKA IDMAYANTI, S.T, M.Kom', '0022017806', '197801222009122002', 'Perempuan', 7, 3, 'rikaidmayanti@pnp.ac.id', '', 1],
        ['RITA AFYENNI, S.Kom, M.Kom', '0018077099', '197007182008012010', 'Perempuan', 7, 1, 'ritaafyenni@pnp.ac.id', 'cb6177274299747739a5ec8b82a7996e.jpg', 1],
        ['RONAL HADI, S.T, M.Kom', '0029017603', '197601292002121001', 'Laki-laki', 7, 2, 'ronalhadi@pnp.ac.id', '82701602ab2345fba65799deabc6465e.jpg', 1],
        ['TAUFIK GUSMAN,  S.S.T, M.Ds', '0010088805', ' 19880810 201903 1 012', 'Laki-laki', 7, 1, 'taufikgusman@gmail.com', '', 1],
        ['YANCE SONATHA, S.Kom, M.T', '0029128003', '198012292006042001', 'Perempuan', 7, 1, 'sonatha.yance@gmail.com', 'ad21784c0d96ee45d915486f5034e93f.JPG', 1],
        ['Dr. Ir. YUHEFIZAR, S.Kom., M.Kom', '0013017604', '197601132006041002', 'Laki-laki', 7, 1, 'yuhefizar@pnp.ac.id', '09ce456b8d8e7aeb7826d39e2e807f47.jpg', 1],
        ['YULHERNIWATI, S.Kom, M.T', '0019077609', '197607192008012017', 'Perempuan', 7, 3, 'yulherniwati@pnp.ac.id', '', 1],
        ['TRI LESTARI, S.Pd.,M.Eng.', '0005039205', '199203052019032025', 'Perempuan', 7, 1, 'trilestari0503@gmail.com', '', 1],
        ['Fanni Sukma, S.ST., M.T', '0006069009', '199006062019032026', 'Perempuan', 7, 3, 'fannisukma@pnp.ac.id', '', 1],
        ['Andre Febrian Kasmar, S.T., M.T.', '0020028804', '198802202019031009', 'Laki-laki', 7, 3, 'andrefebrian@pnp.ac.id', '', 1],
        ['RONI PUTRA, S.Kom, M.T ', '0022078607', '198607222009121004', 'Laki-laki', 7, 1, 'rn.putra@gmail.com', '84c314601260564ac3c6f027806898ce.jpg', 1],
        ['Ardi Syawaldipa, S.Kom.,M.T.', '0029058909', '19890529 202012 1 003', 'Laki-laki', 7, 2, 'ardi.syawaldipa@gmail.com', '5ce5dcfbea617cd2647bb40ac674787a.jpg', 1],
        ['Harfebi Fryonanda, S.Kom., M.Kom', '0310119101', '19911110 202203 1 008', 'Laki-laki', 7, 3, 'harfebi@pnp.ac.id', '', 1],
        ['Ideva Gaputra, S.Kom., M.Kom', '0012098808', '198809122022031006', 'Laki-laki', 7, 2, 'idevagaputra@pnp.ac.id', '', 1],
        ['Yulia Jihan Sy, S.Kom., M.Kom', '1017078904', '19890717 202203 2 010', 'Perempuan', 7, 2, 'yulia@pnp.ac.id', '', 1],
        ['Andrew Kurniawan Vadreas, S.Kom., M.T	', '1021028702', '19870221 202203 1 001', 'Laki-laki', 7, 1, 'andrew@pnp.ac.id', '4f7699576c1ba641216407178bcf495f.jpg', 1],
        ['YORI ADI ATMA, S.Pd., M.Kom', '2010059001', '19900510 202203 1 002', 'Laki-laki', 7, 1, 'yori@pnp.ac.id', '', 1],
        ['Dr. Ulya Ilhami Arsyah, S.Kom., M.Kom', '0130039101', '19910330 202203 1 004', 'Laki-laki', 7, 3, 'ulya@pnp.ac.id', 'a59e301291dc0faa739038d98a227573.jpg', 1],
        ['Hendra Rotama, S.Pd., M.Sn', '0218068801', '19880618 202203 1 003', 'Laki-laki', 7, 2, 'hendrarotama@pnp.ac.id', '', 1],
        ['Sumema, S.Ds., M.Ds', '0008069103', '19910608 202203 2 006', 'Perempuan', 7, 2, 'sumema@pnp.ac.id', 'e1942d441a62daa7e806333f86d80847.jpg', 1],
        ['Raemon Syaljumairi, S.Kom., M.Kom', '0017078407', '19840717 201012 1 002', 'Laki-laki', 7, 2, 'raemon_syaljumairi@pnp.ac.id', '4e64aa532551a9591dc03f7b0d42bcee.jpg', 1],
        ['Mutia Rahmi Dewi, S.Kom., M.Kom', '0004099601', '19960904 202203 2 018', 'Perempuan', 7, 3, 'mutiarahmi@pnp.ac.id', '2b21f8c49d10f534b8792d0d7f4a7607.jpg', 1],
        ['Novi, S.Kom., M.T', '0001118611', '19861101 202203 2 003', 'Perempuan', 7, 2, 'novi@pnp.ac.id', '', 1],
        ['Rahmi Putri Kurnia, S.Kom., M.Kom', '0027089303', '19930827 202203 2 012', 'Perempuan', 7, 2, 'rahmiputri@pnp.ac.id', '', 1]
    ];

    foreach ($dosenData as $data) {
        DB::table('dosen')->insert([
            'nama_dosen' => $data[0],
            'nidn' => $data[1],
            'nip' => $data[2],
            'jenis_kelamin' => $data[3],
            'id_jurusan' => $data[4],
            'id_prodi' => $data[5],
            'email' => $data[6],
            'image' => $data[7],
            'status' => $data[8]
        ]);
    }
}
}
