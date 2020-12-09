<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	'title' => 'Variasi Snack Box Be Unique & Be Different',
            'image' => 'Variasi_Snack_Box.jpg',
            'description' => 'Penulis buku ini adalah pemilik akun Instagram aurellia_cake jember yang berisi kumpulan resep kue dengan rangkaian private baking class. Meski tinggal di Kota Jember Jawa Timur, penulis telah melanglang buana ke berbagai kota dalam dan luar negeri untuk menyebarkan ilmu bakingnya. Buku Variasi SNACK BOX Be Unique Be Different ini berisi 30 resep kue andalannya, termasuk kue favorit untuk snack box yang best seller yaitu Sus Sanggobuwono, Buko Pie, Black Risol, Red Velvet Pudding Cake, dan Melted Potatoes. Dengan mempraktikkan resep buku ini Anda dapat langsung menyerap ilmu dari ahlinya.',
            'category_id' => 14,
            'stock' => 60,
            'price' => 75000,
            'author' => 'Yunik Ira',
            'publisher' => 'Gramedia Pustaka Utama',
            'year' => 2020,
            'pages' => 76
        ]);

        DB::table('products')->insert([
        	'title' => 'Detektif Conan 96',
            'image' => 'Conan_96.jpg',
            'description' => 'Pertama kalinya Heiji Hattori berhadapan dengan si Kid Pencuri yang mengincar "Fairy Lip "! Di kasus lain Makoto Kyogoku terlibat dalam insiden di lokasi syuting TV drama. . . ! ? Selanjutnya ada informasi baru terkuaknya bos Organisasi Baju Hitam!!',
            'category_id' => 7,
            'stock' => 89,
            'price' => 25000,
            'author' => 'Aoyama Gosho',
            'publisher' => 'Elex Media Komputindo',
            'year' => 2019,
            'pages' => 184
        ]);
        DB::table('products')->insert([
        	'title' => 'Warm Heart',
            'image' => 'Warm_Heart.jpg',
            'description' => 'Dua insan manusia harus terjebak dalam dilema
            cinta yang memaksa salah satu dari mereka pergi
            menjauh. Setelah menghilang selama lima  tahun,
            Clara kembali masuk ke dalam kehidupan Andre,
            pria yang dicintainya dalam ikatan pertunangan yang
            orangtua mereka buat. Namun sayangnya Andre yang
            dikenalnya kini bukanlah Andre yang sama dengan
            yang dikenalnya lima tahun yang lalu. Dapatkah Clara
            mendapatkan cinta pertamanya kembali?',
            'category_id' => 17,
            'stock' => 48,
            'price' => 49000,
            'author' => 'Ullianne',
            'publisher' => 'Gramedia Widiasarana Indonesia',
            'year' => 2018,
            'pages' => 150
        ]);
        DB::table('products')->insert([
        	'title' => 'Boys do Write Love Letters',
            'image' => 'Boys_do_Write_Love_Letters.jpg',
            'description' => 'Shenaya mulai percaya, bahwa bukan hanya anak perempuan yang suka menulis. Sebab gadis itu menemukan surat-surat tersebut di lokernya yang tak pernah dikunci. Ia pikir, semuanya adalah surat salah kirim dari seorang siswi, sampai akhirnya Shenaya temukan kode jelas tentang siapa yang menuliskan semuanya. Namun permasalahannya adalah, Shenaya sudah lebih dulu menyukai Dipo jauh sebelum surat-suratnya datang. Dan permasalahannya lagi adalah, Argado datang entah atas perintah siapa. Hati Shenaya semakin bimbang. Nanti, setelah puluhan surat datang, setelah Argado semakin dekat, dan setelah Dipo tetap tidak berkutik, Shenaya akhirnya tahu, ke mana hatinya harus jatuh.',
            'category_id' => 17,
            'stock' => 85,
            'price' => 59000,
            'author' => 'Kansa Airlangga',
            'publisher' => 'Gramedia Widiasarana Indonesia',
            'year' => 2018,
            'pages' => 260
        ]);
        DB::table('products')->insert([
        	'title' => 'Sebuah Seni Untuk Bersikap Bodo Amat',
            'image' => 'Sebuah_Seni_Untuk_Bersikap_Bodo_Amat',
            'description' => 'Selama beberapa tahun belakangan, Mark Manson—melalui blognya yang sangat populer—telah membantu mengoreksi harapan-harapan delusional kita, baik mengenai diri kita sendiri maupun dunia. Ia kini menuangkan buah pikirnya yang keren itu di dalam buku hebat ini.',
            'category_id' => 14,
            'stock' => 130,
            'price' => 67000,
            'author' => 'Mark Manson',
            'publisher' => 'Gramedia Widiasarana Indonesia',
            'year' => 2005,
            'pages' => 256
        ]);
        DB::table('products')->insert([
        	'title' => 'Milea Suara Dari Dilan',
            'image' => 'Milea_Suara_Dari_Dilan.jpg',
            'description' => '“Dilan memberi penggambaran lain dari sebuah penaklukan cinta & bagaimana indahnya cinta sederhana anak zaman dahulu.” @refaniris
            “Cuma satu yang kuinginkan, aku ingin cowok seperti Dilan.” @_SLovaFC
            “Dilan brengsek! Dia selalu tahu caranya menjadi pusat perhatian, bahkan ketika jadi buku, setiap serinya selalu ditunggu.” @Tedy_Pensil
            “Membaca Dilan itu seperti jatuh cinta lagi, lagi, dan lagi. Ah, indah, deh. Rasanya gak akan pernah bosan membacanya.” @agungwyd
            “Bukan cuma sekadar novel, tapi bisa menjadikan yang malas baca jadi mau baca.” @cobra_iqq
            “Kisah cintanya gak lebay. Dilan tahu bagaimana memperlakukan wanita. Novelnya keren, bahasanya gak bertele-tele.” @AH_DILAN',
            'category_id' => 17,
            'stock' => 73,
            'price' => 89000,
            'author' => 'Pidi Baiq',
            'publisher' => 'Mizan Publishing',
            'year' => 2011,
            'pages' => 132
        ]);
        DB::table('products')->insert([
        	'title' => 'Perencanaan Bisnis',
            'image' => 'Perencanaan_Bisnis.jpg',
            'description' => 'Penelitian membuktikan bahwa perusahaan yang melakukan perencanaan bisnis secara matang (terukur dan teruji) akan mampu bertahan sekaligus menjadi pemenang. Rencana bisnis merupakan bukti tertulis bahwa pemilik usaha telah melakukan analisis kelayakan yang diperlukan, mempelajari peluang bisnis secara memadai, dan siap untuk menjalankannya dengan sebuah model bisnis yang unggul.',
            'category_id' => 4,
            'stock' => 47,
            'price' => 85000,
            'author' => 'Hery Se',
            'publisher' => 'Gramedia Widiasarana Indonesia',
            'year' => 2020,
            'pages' => 148
        ]);
        DB::table('products')->insert([
        	'title' => 'Bono-chan 02',
            'image' => 'Bono_Chan_02.jpg',
            'description' => 'Masa kecil Bono bersama teman-temannya yang ceria. Kali ini, Bono berkenalan lagi dengan sahabat-sahabat baru, seperti Kuzuri si wolverin, Fennec si rubah fennec, dan kakak adik tupai Shou-chan & Dai-chan.',
            'category_id' => 7,
            'stock' => 64,
            'price' => 40000,
            'author' => 'Mikio Igarashi',
            'publisher' => 'Elex Media Komputindo',
            'year' => 2020,
            'pages' => 96
        ]);
        DB::table('products')->insert([
        	'title' => 'How To Trade In Stocks',
            'image' => 'How_To_Trade_In_Stocks.jpg',
            'description' => 'How to Trade in Stocks. "Spekulasi bukanlah permainan untuk orang bodoh, bermentalpemalas, emosinya tidak stabil, dan orang yang ingin cepat kaya." Seorang trader selalu bisa meraih profit, entah pasar naik atau turun. Jesse Livermore telah membuktikannya. Ketika bursa Wall Street crash di tahun 1929, dia malah meraup laba 100 juta dollar. Apa rahasianya? Hanya dua hal; pergerakan harga dan elemen waktu. Itulah dasar-dasar analisis teknikal sampai kapan pun. Buku ini merupakan panduan praktis yang sengaja ditulis Jesse Livermore bagi siapapun yang masuk ke pasar modal. Formula Livermore sangat elementer dan mudah diaplikasikan di bursa manapun. Selama watak manusia tidak berubah, mudah merasa takut atau tamak, formula Livermore akan senantiasa relevan.',
            'category_id' => 4,
            'stock' => 28,
            'price' => 100000,
            'author' => 'Jesse Livermore',
            'publisher' => 'Media Pressindo',
            'year' => 2020,
            'pages' => 176
        ]);
        DB::table('products')->insert([
        	'title' => 'The Viking Warrior',
            'image' => 'The_Viking_Warrior.jpg',
            'description' => 'Bangsa Viking menyerbu keluar dari Skandinavia pada akhir abad kedelapan Masehi, membawa teror bagi bangsa Irlandia sampai Rusia. Mulai dari para pejuang Berserker semi mitos mereka sampai agama mereka, rute-rute perdagangan mereka yang luas, tuntutan-tuntutan upeti dan perseteruan berdarah yang mengerikan, Para Pejuang Viking melacak kemunculan tiba-tiba, sejarah yang penuh kekerasan, dan peninggalan orang-orang Norse ini.',
            'category_id' => 12,
            'stock' => 17,
            'price' => 130000,
            'author' => 'Ben Hubbard',
            'publisher' => 'Elex Media Komputindo',
            'year' => 2020,
            'pages' => 216
        ]);
        DB::table('products')->insert([
        	'title' => 'Republik Naga (The Dragon Republic)',
            'image' => 'Republik_Naga.jpg',
            'description' => 'Kisah Rin berlanjut dalam sekuel “Perang Opium” ini—fantasi epik yang menggabungkan sejarah Cina abad ke-20 dengan dunia dahsyat tempat para dewa dan monster. Tiga kali negara Nikan bertempur dalam Perang Opium yang bersimbah darah. Rin—sang syaman dan pejuang—dicengkeram rasa bersalah dan tak dapat melupakan tindakan keji yang dia lakukan demi menyelamatkan rakyat. Gadis itu bertekad membalas dendam pada Maharani yang mengkhianati tanah airnya. Satu-satunya cara adalah bergabung dengan Panglima Perang Naga, yang ingin menaklukkan Nikan, menggulingkan Maharani, dan mendirikan republik baru. Namun Maharani dan Panglima Perang Naga tidaklah seperti yang dikira gadis tersebut. Semakin banyak yang dilihatnya, semakin Rin takut bahwa cintanya pada Nikan akan memaksa dia menggunakan lagi kekuatan dahsyat Phoenix. Sebab Rin rela mengorbankan apa saja untuk menyelamatkan negeri itu... dan membalaskan dendamnya. “Kuang mengungkapkan efek psikologis dan material perang pada para prajurit dan orang-orang yang mereka lindungi. Penyuka kisah fantasi militer pasti takkan sabar menunggu kelanjutann kisah ini.”',
            'category_id' => 11,
            'stock' => 85,
            'price' => 189000,
            'author' => 'R.F. Kuang',
            'publisher' => 'Gramedia Pustaka Utama',
            'year' => 2020,
            'pages' => 656
        ]);
        DB::table('products')->insert([
        	'title' => 'How Not To Diet',
            'image' => 'How_Not_To_Diet.jpg',
            'description' => 'Dr. Michael Greger is one of my heroes and continues to inspire me. Why? Because he embodies personal integrity, values facts, and is one of the kindest and smartest people I know. All of his lecture fees and book royalties go to charity, including his non-profit NutritionFacts.org, one of the most credible sources of science-based nutrition. How Not to Diet is one of the best books I’ve ever read on how to lose weight in sustainable ways that enhance health. Highly recommended!',
            'category_id' => 14,
            'stock' => 37,
            'price' => 475000,
            'author' => 'Michael Greger',
            'publisher' => 'Macmillan Us',
            'year' => 2020,
            'pages' => 608
        ]);
        DB::table('products')->insert([
        	'title' => 'Kisah Aisyah & Ojol',
            'image' => 'Kisah_Aisyah_&_Ojol.jpg',
            'description' => 'isah Aisyah dan Ojol. Buku ini berisi kisah-kisah misterius yang menimpa beberapa driver ojol Jogja yang ditulis secara fiksi, beserta beberapa kisah misterius lainnya dengan tokoh yang sama, yaitu Aisyah. Siapakah sebenarnya Aisyah?',
            'category_id' => 13,
            'stock' => 57,
            'price' => 50000,
            'author' => 'Matsuri, dkk',
            'publisher' => 'Mediakom',
            'year' => 2020,
            'pages' => 204
        ]);
        DB::table('products')->insert([
        	'title' => 'Everna: Rajni Sari',
            'image' => 'Everna_Rajni_Sari.jpg',
            'description' => 'Rajni Sari, putri raja Negeri Rainusa terpaksa lari dari istana untuk menyusul ibunya, Lastika. Bersama Jaka, jawara yang diangkat menjadi pengawal istana, Sari melalui berbagai petualangan yang membuatnya harus berhadapan dengan sosok-sosok sakti. Cinta antara Sari dan Jaka pun bersemi, tetapi takdirnya sebagai putri Lastika yang ternyata adalah Calon Arang memisahkan dirinya dan Jaka. Sari lebih memilih ibunya. Keinginan Sari untuk kembali ke pangkuan ibunya pun memicu pertikaian baru antara Cahaya dan Kegelapan: Barong dan Calon Arang, sekaligus akan menentukan masa depan Rainusa. Tak kuasa menolak warisan kekuatan dari ibunya, Sari pun mengalah dan menerima perintah sang ibu untuk menjadi penerusnya, penguasa kekuatan gelap. Hati Sari kini terbagi: mengikuti perintah ibunya atau mengikuti keinginan hatinya.',
            'category_id' => 11,
            'stock' => 72,
            'price' => 70000,
            'author' => 'Andry Chang',
            'publisher' => 'Elex Media Komputindo',
            'year' => 2020,
            'pages' => 208
        ]);
        DB::table('products')->insert([
        	'title' => 'Al-Masih: Putra Sang Perawan',
            'image' => 'Al_Masih_Putra_Sang_Perawan.jpg',
            'description' => '“Sudahkah kalian dengar kisah Tuhan mengutus juru selamat kepada manusia?” Kedua mata Matteo de Gesù berpijar-pijar. Oleh matahari pagi, juga semangat yang berapi-api. Dia menatap para budak satu per satu. “Lebih dari seribu tahun lalu, Tuhan mengorbankan satu-satunya putra yang Ia punyai untuk menyelamatkan umat manusia dari dosa. Tidakkah kalian ingin mendengar kisahnya?” Gesu seorang naturalis asal Italia mendapat misi penyelamatan iman ribuan umat dengan mencari pusaka gereja yang hilang dicuri. Misi itu membawanya ke Batavia yang kala itu sedang menggeliat oleh hiruk-pikuk perdagangan. Pedagang dari berbagai bangsa dan keyakinan hadir menambah semarak dinamika di kota itu. Budak-budak didatangkan dari berbagai tempat untuk menggerakkan roda perekonomian.Pertemuannya dengan Saathi, seorang gadis Muslim yang misterius, memperkenalkannya pada sosok lain Almasih yang juga disebut dengan penuh hormat oleh umat lainnya. Mesias, Masiyakh, Al-Masih, semua merujuk pada satu sosok yang sama: Dia Putra Sang Perawan.',
            'category_id' => 10,
            'stock' => 74,
            'price' => 119000,
            'author' => 'Tasaro GK',
            'publisher' => 'Bentang Pustaka',
            'year' => 2020,
            'pages' => 456
        ]);
    }
}
