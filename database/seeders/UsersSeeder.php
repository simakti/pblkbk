<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'dosen_id' => null, 'name' => 'SUPER ADMIN', 'email' => 'superadmin@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 2, 'dosen_id' => null, 'name' => 'ADMIN', 'email' => 'admin@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 3, 'dosen_id' => 13, 'name' => 'ALDE ALANDA, S.KOM, M.T', 'email' => 'alde@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 4, 'dosen_id' => 14, 'name' => 'ALDO ERIANDA, M.T, S.ST', 'email' => 'aldo@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 5, 'dosen_id' => 40, 'name' => 'CIPTO PRABOWO, S.T, M.T', 'email' => 'cipto@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 6, 'dosen_id' => 46, 'name' => 'DEDDY PRAYAMA, S.KOM, M.ISD', 'email' => 'deddy@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 7, 'dosen_id' => 50, 'name' => 'DEFNI, S.SI, M.KOM', 'email' => 'defni@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 8, 'dosen_id' => 52, 'name' => 'DENI SATRIA, S.KOM, M.KOM', 'email' => 'dns1st@gmail.com', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 9, 'dosen_id' => 66, 'name' => 'DWINY MEIDELFI, S.KOM, M.CS', 'email' => 'dwinymeidelfi@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 10, 'dosen_id' => 85, 'name' => 'ERVAN ASRI, S.KOM, M.KOM', 'email' => 'ervan@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 11, 'dosen_id' => 91, 'name' => 'FAZROL ROZI, M.SC.', 'email' => 'fazrol@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 12, 'dosen_id' => 103, 'name' => 'FITRI NOVA, M.T, S.ST', 'email' => 'fitrinova85@gmail.com', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 13, 'dosen_id' => 109, 'name' => 'IR. HANRIYAWAN ADNAN MOODUTO, M.KOM.', 'email' => 'mooduto@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 14, 'dosen_id' => 116, 'name' => 'HENDRICK, S.T, M.T.,PH.D', 'email' => 'hendrickpnp77@gmail.com', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 15, 'dosen_id' => 121, 'name' => 'HIDRA AMNUR, S.E., S.KOM, M.KOM', 'email' => 'hidra@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 16, 'dosen_id' => 122, 'name' => 'HUMAIRA, S.T, M.T', 'email' => 'humaira@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 17, 'dosen_id' => 127, 'name' => 'IKHSAN YUSDA PRIMA PUTRA, S.H., LL.M', 'email' => '', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 18, 'dosen_id' => 132, 'name' => 'INDRI RAHMAYUNI, S.T, M.T', 'email' => 'indri@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 19, 'dosen_id' => 160, 'name' => 'MERI AZMI, S.T, M.CS', 'email' => 'meriazmi@gmail.com', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 20, 'dosen_id' => 198, 'name' => 'IR. RAHMAT HIDAYAT, S.T, M.SC.IT', 'email' => 'rahmat@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 21, 'dosen_id' => 206, 'name' => 'RASYIDAH, S.SI, M.M.', 'email' => 'rasyidah@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 22, 'dosen_id' => 212, 'name' => 'RIKA IDMAYANTI, S.T, M.KOM', 'email' => 'rikaidmayanti@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 23, 'dosen_id' => 220, 'name' => 'RITA AFYENNI, S.KOM, M.KOM', 'email' => 'ritaafyenni@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 24, 'dosen_id' => 223, 'name' => 'RONAL HADI, S.T, M.KOM', 'email' => 'ronalhadi@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 25, 'dosen_id' => 258, 'name' => 'TAUFIK GUSMAN, S.S.T, M.DS', 'email' => 'taufikgusman@gmail.com', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 26, 'dosen_id' => 277, 'name' => 'YANCE SONATHA, S.KOM, M.T', 'email' => 'sonatha.yance@gmail.com', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 27, 'dosen_id' => 289, 'name' => 'DR. IR. YUHEFIZAR, S.KOM., M.KOM', 'email' => 'yuhefizar@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 28, 'dosen_id' => 292, 'name' => 'YULHERNIWATI, S.KOM, M.T', 'email' => 'yulherniwati@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 29, 'dosen_id' => 310, 'name' => 'TRI LESTARI, S.PD., M.ENG.', 'email' => 'trilestari0503@gmail.com', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 30, 'dosen_id' => 311, 'name' => 'FANNI SUKMA, S.ST., M.T', 'email' => 'fannisukma@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 31, 'dosen_id' => 312, 'name' => 'ANDRE FEBRIAN KASMAR, S.T., M.T.', 'email' => 'andrefebrian@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 32, 'dosen_id' => 351, 'name' => 'RONI PUTRA, S.KOM, M.T', 'email' => 'rn.putra@gmail.com', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 33, 'dosen_id' => 352, 'name' => 'ARDI SYAWALDIPA, S.KOM, M.T', 'email' => 'ardi.syawaldipa@gmail.com', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 34, 'dosen_id' => 353, 'name' => 'HARFEBI FRYONANDA, S.KOM, M.KOM', 'email' => 'harfebi@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 35, 'dosen_id' => 354, 'name' => 'IDEVA GAPUTRA, S.KOM, M.KOM', 'email' => 'idevagaputra@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 36, 'dosen_id' => 355, 'name' => 'YULIA JIHAN SY, S.KOM, M.KOM', 'email' => 'yulia@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 37, 'dosen_id' => 356, 'name' => 'ANDREW KURNIAWAN VADREAS, S.KOM, M.T', 'email' => 'andrew@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 38, 'dosen_id' => 357, 'name' => 'YORI ADI ATMA, S.PD, M.KOM', 'email' => 'yori@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 39, 'dosen_id' => 358, 'name' => 'DR. ULYA ILHAMI ARSYAH, S.KOM, M.KOM', 'email' => 'ulya@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 40, 'dosen_id' => 359, 'name' => 'HENDRA ROTAMA, S.PD, M.SN', 'email' => 'hendrarotama@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 41, 'dosen_id' => 360, 'name' => 'SUMEMA, S.DS, M.DS', 'email' => 'sumema@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 42, 'dosen_id' => 361, 'name' => 'RAEMON SYALJUMAIRI, S.KOM, M.KOM', 'email' => 'raemon_syaljumairi@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 43, 'dosen_id' => 362, 'name' => 'MUTIA RAHMI DEWI, S.KOM, M.KOM', 'email' => 'mutiarahmi@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 44, 'dosen_id' => 363, 'name' => 'NOVI, S.KOM, M.T', 'email' => 'novi@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 45, 'dosen_id' => 364, 'name' => 'RAHMI PUTRI KURNIA, S.KOM, M.KOM', 'email' => 'rahmiputri@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
        ];

        DB::table('users')->insert($users);
    }
}
