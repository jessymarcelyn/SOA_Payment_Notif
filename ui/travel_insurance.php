<?php
session_start();
require "connect.php";
include "header.php";

// // $query = "SELECT negara FROM travel_insurance LIMIT 1";
$query2 = "SELECT `1-4` AS price FROM travel_insurance WHERE wilayah = 1 AND negara = 'Indonesia'";
$results = mysqli_query($con, $query2);

if ($results && mysqli_num_rows($results) > 0) {
    $row = mysqli_fetch_assoc($results);
    $price = $row['price'];
} else {
    $price = " Harga tidak tersedia";
}

// Query untuk mengambil nama negara dari tabel
$query = "SELECT * FROM travel_insurance";
$result = mysqli_query($con, $query);

$countries = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $countries[] = $row['negara'];
        // $price = $row['1-4'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Insurance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .bg-body-indexs {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .contents {
            text-align: center;
        }

        .texts {
            margin-bottom: 20px;
        }

        .texts2 {
            margin-bottom: 20px;
            text-align: left;
            margin-left: 170px;
        }

        .container2 {
            margin-top: 20px;
        }

        .card {
            border: none;
        }

        .menu-title {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .info-card {
            background-color: #f1f1f1;
            padding: 20px;
            margin-top: 20px;
            padding-left: 250px;
            text-align: left;
        }

        .info-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .info-item {
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .link-detail {
            color: #007bff;
            text-decoration: none;
        }

        .cropcity-img {
            width: 100%;
            /* width: 200px; Sesuaikan ukuran lebar yang diinginkan */
            height: 250px;
            /* Sesuaikan ukuran tinggi yang diinginkan */
            object-fit: cover;
            /* Memastikan gambar sesuai dengan area */
            object-position: center;
            /* Posisi gambar di dalam area */
        }

        .benefits {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .benefit {
            width: 22%;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            text-align: center;
            flex-grow: 1;
            box-sizing: border-box;
        }

        .benefit img {
            max-width: 100%;
            /* Sesuaikan ukuran gambar jika diperlukan */
            height: auto;
        }

        .benefit h3 {
            font-size: 1.2em;
            margin: 15px 0;
        }

        .benefit p {
            color: #555;
        }

        /* Responsive design */
        @media (max-width: 1200px) {
            .benefit {
                width: 30%;
            }
        }

        @media (max-width: 992px) {
            .benefit {
                width: 45%;
            }
        }

        @media (max-width: 768px) {
            .benefit {
                width: 100%;
            }

            .benefit h3 {
                font-size: 1em;
            }

            .benefit p {
                font-size: 0.9em;
            }
        }

        .sidebar {
            position: -webkit-sticky;
            /* For Safari */
            position: sticky;
            top: 0;
            width: 250px;
            height: 100vh;
            /* background-color: #f1f1f1; */
            padding: 10px;
            /* box-shadow: 2px 0 5px rgba(0,0,0,0.1); */
            flex-shrink: 0;
        }

        .container5 {
            display: flex;
            font-family: "Gill Sans", sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar a {
            display: block;
            color: #000;
            text-decoration: none;
            padding: 8px 0;
        }

        .sidebar a:hover {
            background-color: #ddd;
        }

        .content-info {
            flex-grow: 1;
            padding-top: 20px;
            padding-left: 40px;
            padding-right: 40px;
            background-color: #fff;
        }

        .content-info ul {
            list-style-type: none;
            /* Remove default bullet points */
            padding-left: 0;
            /* Remove default padding */
        }

        .content-info ul li {
            position: relative;
            padding-left: 20px;
            /* Add padding for custom bullet */
        }

        .content-info ul li::before {
            content: "•";
            /* Custom bullet point */
            position: absolute;
            left: 0;
            color: #000;
        }

        .highlight-box {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
        }

        .highlight-box ul {
            padding-left: 20px;
            /* Indent the list inside the box */
        }

        .highlight-box ul li {
            /* list-style-type: disc;  */
            /* Default disc bullet points */
        }

        .container6 {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
            background-color: #fff;
        }

        h1 {
            /* text-align: center;
            margin-bottom: 20px; */
        }

        .section-syarat {
            margin-bottom: 20px;
        }

        .section-syarat h2 {
            background-color: #f0f0f0;
            padding: 10px;
            border: 1px solid #ccc;
            cursor: pointer;
        }

        .section-content-syarat {
            display: none;
            padding: 10px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .section-content-syarat ul {
            list-style: none;
            padding: 0;
        }

        .section-content-syarat li {
            margin-bottom: 10px;
        }

        .section-content-syarat a {
            color: #00f;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="bg-body-index">
        <div class="container">
            <div class="content">
                <div class="text">
                    <h1 class="display-6 fst-italic">Asuransi Perjalanan Domestik Maupun Internasional</h1>
                    <p class="lead my-3">Akan terbang ke suatu daerah di Indonesia atau secara Internasional ? Dapatkan asuransi perjalanan domestik maupun International
                        secara online. Meringankan ketidaknyamanan perjalanan anda dengan kompensasi yang tepat.</p>
                </div>
                <img src="images/chill.png" alt="Chill Image">
            </div>
        </div>
    </div>

    <div class="container2">
        <div class="contents">
            <div class="texts">
                <h1 class="display-6 fst-italic">INDONESIA ⇔ DOMESTIK/INTERNASIONAL</h1>
                <p>Untuk perjalanan ke suatu daerah di Indonesia atau secara Internasional, tersedia berbagai paket asuransi <a href="#detail-asuransi"
                        class="link-detail">manfaat perlindungan hingga 1,5 milyar</a>.</p>
            </div>
        </div>
    </div>

    <div class="texts2">
        <div class="info-title">Perjalanan Domestik/Internasional</div>
        <!-- <div>PAKET 1</div> -->
    </div>

    <div class="container3">
        <div class="info-card">
            <div class="info-item" style="font-weight: bold">Premi Asuransi</div>
            <span style="color: orange;">Mulai dari Rp<?php echo number_format($price, 0, ',', '.'); ?>/orang</span>
            <h1></h1>
            <div class="info-item" style="font-weight: bold">Manfaat</div>

            <div class="info-item">Keterlambatan & Pembatalan</div>
            <span style="color: gray;">Perlindungan hingga Rp30.000.000</span>
            <h1></h1>
            <div class="info-item">Kecelakaan & Biaya Pengobatan</div>
            <span style="color: gray;">Perlindungan hingga Rp500.000.000</span>
            <h1></h1>
            <div class="info-item">Perlindungan Bagasi</div>
            <span style="color: gray;">Perlindungan hingga Rp10.000.000</span>
            <h1></h1>
            <a href="#detail-asuransi" class="link-detail">Periksa Rincian Asuransi</a>
            <h1></h1>
        </div>
    </div>

    <img src="images/city.png" alt="Cityscape" class="cropcity-img">

    <div class="container4">
        <section class="benefits">
            <div class="benefit">
                <img src="images/flight-delay-icon.png" alt="Flight Delay" class="img-benefits">
                <h3>Perlindungan Keterlambatan Penerbangan</h3>
                <p>Hindari stres ketika terjadi penundaan atau bahkan pembatalan penerbangan. Segala gangguan yang
                    terjadi pada rencana penerbangan Anda ditanggung hingga Rp30 Juta.</p>
            </div>
            <div class="benefit">
                <img src="images/personal-accident-icon.png" alt="Personal Accident" class="img-benefits">
                <h3>Cakupan Kecelakaan Diri</h3>
                <p>Pastikan Anda terlindungi sepenuhnya ketika menghadapi situasi yang tidak diharapkan. Kecelakaan yang
                    terjadi saat perjalanan Anda ditanggung hingga Rp500 Juta.</p>
            </div>
            <div class="benefit">
                <img src="images/medical-expense-icon.png" alt="Medical Expense" class="img-benefits">
                <h3>Pertanggungan Biaya Medis</h3>
                <p>Perawatan darurat adalah hal yang tidak menyenangkan, terutama ketika harus membayar biaya rumah
                    sakit yang mahal. Tapi tenang saja, karena ada tanggungan biaya pengobatan hingga Rp250 Juta.</p>
            </div>
            <div class="benefit">
                <img src="images/baggage-loss-icon.png" alt="Baggage Loss" class="img-benefits">
                <h3>Perlindungan Bagasi Hilang</h3>
                <p>Sudah mendarat, tapi tidak menemukan bagasi Anda? Tidak usah panik! Segala barang yang hilang atau
                    rusak dapat diklaim hingga Rp10 Juta.</p>
            </div>
        </section>
    </div>

    <div id="detail-asuransi">
        <div class="container5">
            <div class="sidebar">
                <a href="#keterlambatan-pembatalan">Perlindungan Keterlambatan dan Pembatalan</a>
                <a href="#kecelakaan-pengobatan">Perlindungan Kecelakaan dan Biaya Pengobatan</a>
                <a href="#perlindungan-bagasi">Perlindungan Bagasi</a>
                <a href="#">Manfaat Lainnya</a>
                <a href="#syarat-ketentuan">S&K, Cara Klaim, dan Pengajuan</a>
            </div>

            <div class="content-info">
                <div id="keterlambatan-pembatalan">
                    <h1>Keterlambatan dan Pembatalan</h1>
                    <p>Beli asuransi perjalanan anda sekarang. Buat perjalanan menjadi
                        lebih aman,
                        nyaman, dan bebas khawatir. Asuransi Perjalanan kini tersedia secara online.
                        Kami
                        menawarkan paket asuransi dengan cakupan perlindungan komprehensif agar Anda lebih tenang dan
                        mengurangi
                        dampak dari potensi gangguan selama perjalanan ke luar negeri.</p>
                    <p>Berikut adalah tiga manfaat asuransi dalam perlindungan Keterlambatan dan Pembatalan.</p>

                    <h2>1. Keterlambatan Penerbangan</h2>
                    <p style="color: orange;">Perlindungan Hingga Rp4.500.000</p>
                    <p>Jika penerbangan terlambat, anda bisa mendapatkan kompensasi Rp750.000 per 4 jam keterlambatan
                        (total maksimal sesuai paket dipilih).</p>
                    <p>Perlindungan ini hanya berlaku hanya jika asuransi dibeli selambatnya 2 hari sebelum tanggal
                        keberangkatan.</p>

                    <h2>2. Keterlambatan Bagasi</h2>
                    <p style="color: orange;">Perlindungan Hingga Rp750.000</p>
                    <p>Apabila bagasi check-in anda terlambat untuk tiba di bandara kedatangan oleh karena kesalahan
                        maskapai,
                        anda dapat mendapatkan santunan sejumlah nominal yang tertera pada ikhtisar polis.</p>
                    <p>Anda wajib menyerahkan konfirmasi tertulis dari maskapai yang menyatakan atas keterlambatan.</p>

                    <h2>3. Pembatalan Perjalanan</h2>
                    <p style="color: orange;">Perlindungan Hingga Rp30.000.000</p>
                    <p>Jika anda harus membatalkan perjalanan atau pesanan akomodasi karena alasan tertentu, anda akan
                        mendapatkan penggantian untuk biaya yang tidak bisa di-refund.</p>
                    <div class="highlight-box">
                        <p>Alasan yang berlaku adalah:</p>
                        <ul>
                            <li>Jika anda meninggal atau sakit keras;</li>
                            <li>anggota keluarga meninggal;</li>
                            <li>Terjadi kerusuhan /demonstrasi mendadak;</li>
                            <li>terjadi kerusakan parah pada tempat tinggal anda di Indonesia; dan</li>
                            <li>Jika anda dipanggil sebagai saksi oleh pengadilan.</li>
                        </ul>
                    </div>
                    <p>Perlindungan ini berlaku jika asuransi dibeli setidaknya 7 hari sebelum perjalanan dan untuk
                        alasan yang
                        terjadi dalam 10 hari sebelum perjalanan (kecuali risiko meninggal dunia dan cidera berat akibat
                        kecelakaan).</p>

                    <h2>4. Tidak Dilindungi</h2>
                    <div class="highlight-box">
                        <ul>
                            <li>Perlindungan keterlambatan penerbangan tidak akan berlaku jika asuransi di beli dalam
                                jangka waktu 1 hari sebelum atau pada tanggal keberangkatan penerbangan.</li>
                            <li>Penggantian jadwal penerbangan atau pembatalan dari pihak maskapai.</li>
                            <li>Anda mengetahui keadaan yang dapat menyebabkan gangguan perjalanan sebelum asuransi
                                dibeli.</li>
                            <li>Perawatan atau pembedahan yang dapat ditunda sampai anda kembali ke Indonesia.</li>
                            <li>Obat-obatan tambahan yang secara medis tidak diperlukan (misalnya balsem, salep, obat
                                anti serangga, Counterpain dan sejenisnya, Betadine dan sejenisnya).</li>
                        </ul>
                    </div>
                    <h1></h1>
                </div>

                <div id="kecelakaan-pengobatan">
                    <h1></h1>
                    <h1>Kecelakaan dan Biaya Pengobatan </h1>
                    <p>Tidak ada yang berharap akan terjadinya kecelakaan, dengan alasan apapun dan dimanapun. Utama
                        untuk kita semua adalah keselamatan. Namun risiko akan adanya ancaman terhadap keselamatan tetap
                        ada. Saat perjalanan ke bandar udara, insiden di dalam bandar udara, terjadinya kecelakaan
                        pesawat karena hal-hal diluar prediksi, dan potensi ancaman lainnya. Untuk itu penting sekali
                        untuk kita membuat persiapan atas keamanan finansial untuk waktu yang akan datang.</p>

                    <h2>1. Kecelakaan Diri</h2>
                    <p style="color: orange;">Perlindungan Hingga Rp500.000.000</p>
                    <p>Jika anda meninggal dunia atau mengalami cacat akibat kecelakaan yang terjadi selama perjalanan,
                        anda bisa mendapatkan kompensasi sesuai keseriusan kondisi.</p>
                    <p>Kompensasi sebesar 50% dari jumlah perlindungan maksimal akan diberikan untuk kehilangan anggota
                        badan (termasuk pengelihatan pada satu mata), atau 100% untuk kehilangan 2 anggota badan
                        (termasuk pengelihatan pada 2 mata), cacat permanen seluruh tubuh anggota badan, dan kematian.
                    </p>
                    <p>Jika anda berusia dibawah 17 tahun atau di atas 70 tahun, jumlah kompensasi maksimal 50% dari
                        jumlah perlindungan maksimal.</p>
                    <p>Anda juga wajib menyerahkan surat keterangan kematian atau cacat yang dikeluarkan oleh dokter
                        berwenang, maksimal 30 hari setelah kecelakaan.</p>

                    <h2>2. Biaya Pengobatan</h2>
                    <p style="color: orange;">Perlindungan Hingga Rp250.000.000</p>
                    <p>Jika anda mengalami kecelakaan atau sakit selama perjalanan, anda bisa mendapatkan penggantian
                        biaya pengobatan.</p>
                    <p>Jika anda berusia di bawah 17 tahun atau di atas 70 tahun, jumlah kompensasi maksimal 50% dari
                        jumlah perlindungan maksimal.</p>
                    <p>Anda juga diwajibkan untuk menyerahkan kwitansi.</p>

                    <h2>3. Tidak Dilindungi</h2>
                    <div class="highlight-box">
                        <ul>
                            <li>Kondisi medis dan penyakit kronis yang sudah ada sebelumnya (misalnya: asma, penyakit
                                jantung, stroke, epilepsi, diabetes, radang usus buntu, dan batu ginjal).</li>
                            <li>Wabah penyakit (termasuk perawatan akibat peraturan karantina di negara yang
                                dikunjungi).</li>
                            <li>Kehamilan dan kelahiran (termasuk cedera atau penyakit terkait) dan penyakit kelamin.
                            </li>
                            <li>Perawatan atau pembedahan yang dapat ditunda sampai anda kembali ke Indonesia.</li>
                            <li>Obat-obatan tambahan yang secara medis tidak diperlukan (misalnya balsem, salep, obat
                                anti serangga, Counterpain dan sejenisnya, Betadine dan sejenisnya).</li>
                        </ul>
                    </div>
                </div>

                <div id="perlindungan-bagasi">
                    <h1></h1>
                    <h1>Perlindungan Bagasi </h1>
                    <p>Iya, saat ini anda bisa membuat proteksi bahkan untuk bagasi pesawat. Kehilangan dan kerusakan
                        bagasi adalah dua risiko yang harus diperhatikan. Silahkan periksa manfaat dan perlindungan
                        asuransi yang kami sediakan berikut ini.</p>

                    <h2>1. Perlindungan Bagasi</h2>
                    <!-- <p style="color: orange;">Perlindungan Hingga Rp5.000.000 (paket Silver), Rp10.000.000 (paket Gold),
                        dan Rp15.000.000 (paket Platinum).</p> -->
                    <h5 style="color: orange">PAKET : PERJALANAN DOMESTIK/INTERNASIONAL</h5>
                    <p>Jika bagasi anda hilang atau rusak, anda bisa mendapatkan kompensasi hingga Rp1.500.000 per
                        barang yang hilang (total maksimal Rp10.000.000).</p>
                    <h5 style="color: orange">KETENTUAN UMUM PERLINDUNGAN BAGASI</h5>
                    <p>Jumlah kompensasi setara dengan harga asli barang, dikurangi 20% per tahun pemakaian.</p>
                    <p>Anda wajib melaporkan kehilangan dalam waktu 24 jam. Anda juga wajib menyerahkan surat laporan
                        polisi atau konfirmasi tertulis dari pihak manajemen transportasi atau hotel.</p>

                    <h2>2. Tidak Dilindungi</h2>
                    <div class="highlight-box">
                        <ul>
                            <li>Barang yang oleh maskapai dilarang dibawa dalam bagasi (misalnya barang antik, uang dan
                                surat berharga lain, pecah belah).</li>
                            <li>Kehilangan atau kerusakan akibat kelalaian diri sendiri, pemakaian, perang, kerusuhan,
                                atau peraturan pemerintah.</li>
                            <li>Peralatan sewaan.
                            </li>
                            <li>Kehilangan atau kerusakan baran yang dilindungi asuransu lain atau pihak
                                bertanggungjawab lainnya (misalnya hotel atau maskapai).</li>
                            <li>Simpanan/rekaman data.</li>
                            <li>Barang yang dikirim lebih dulu atau terpisah.</li>

                        </ul>
                    </div>
                </div>

                <div class="contents">
                    <div class="texts">
                        <h2 class="display-6 fst-italic">Other Destination?</h2>
                        <p>Planning for next destination to other country? Do further check here with Traveloka Travel
                            Insurance for International destination. We have online comprehensive information for you
                            here.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <?php
                            // Loop untuk menampilkan daftar negara
                            foreach ($countries as $index => $country) {
                                // Pecah menjadi dua kolom, 10 negara di setiap kolom
                                if ($index % 10 == 0 && $index != 0) {
                                    echo '</ul></div><div class="col-md-6"><ul>';
                                }
                                echo '<li><a href="travel_insurance.php?country=' . urlencode($country) . '">Travel Insurance to ' . htmlspecialchars($country) . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="syarat-ketentuan">
            <div class="container6">
                <h1 style="text-align: center; margin-bottom: 20px;">S&K, Klaim, dan Informasi Pengajuan</h1>
                <p>Berikut adalah informasi umum berkaitan dengan prosedur klaim, proses pengajuan, dan syarat ketentuan
                    yang berlaku. Hal ini penting untuk diketahui bersama, sehingga tidak menemukan kendala-kendala
                    selama proses pengajuan hingga klaim.</p>

                <div class="section-syarat">
                    <h2>Syarat dan Ketentuan ↓</h2>
                    <div class="section-content-syarat">
                        <ul>
                            <li>1. Asuransi tidak dapat di-refund.</li>
                            <li>2. Pemegang polis harus merupakan WANI atau WNA dengan izin tinggal di Indonesia (KITAS
                                atau KITAP).</li>
                            <li>3. Asuransi hanya berlaku untuk perjalanan dari atau ke Indonesia.</li>
                            <li>4. Saat membeli asuransi ini, anda harus dalam keadaan sehat untuk bepergian dan tidak
                                mengetahui adanya keadaan yang dapat mengganggu perjalanan anda.</li>
                            <li>5. Simas Insurtech berhak menarik kompensasi yang sudah dibayarkan jika ditemukan adanya
                                kecurangan atau manipulasi data dalam proses klaim.</li>
                            <li>6. Kecuali untuk pembatalan perjalanan, perlindungan dimulai pada tanggal mulai hingga
                                berakhirnya polis.</li>
                            <li>7. Untuk penerbangan sekali jalan, perlindungan berakhir saat anda mendarat di bandara
                                tujuan.</li>
                            <li>8. Simas Insurtech hanya akan menggantikan biaya yang tidak dapat di-refund, hingga
                                nilai perlindungan maksimal.</li>
                        </ul>
                    </div>
                </div>

                <div class="section-syarat">
                    <h2>Cara Klaim Asuransi ↓</h2>
                    <div class="section-content-syarat">
                        <ul>
                            <li>1. Lengkapi formulir klaim anda dan siapkan dokumen pendukung yang diperlukan (anda
                                dapat melihat daftar dokumen lengkap pada formulir klaim).</li>
                            <li>2. Permintaan klaim harus diajukan dalam waktu 30 hari setelah kejadian.</li>
                            <li>3. Kirim permintaan klaim anda beserta dokumen pendukung yang diperlukan ke Tim Klaim
                                Simasnet, melalui email atau Whatsapp (anda dapat merujuk pada detail kontak dibawah).
                            </li>
                            <li>4. Anda akan menerima pembayaran klaim paling lambat 9 hari kerja setelah semua bukti
                                pendukung telah dikirimkan.</li>
                        </ul>
                        <!-- <p>Dapatkan <a href="#">Formulir Klaim</a> anda.</p> -->
                    </div>
                </div>

                <div class="section-syarat">
                    <h2>Pengajuan Asuransi ↓</h2>
                    <div class="section-content-syarat">
                        <ul>
                            <li>1. Unduh Aplikasi di Google Play Store atau iOS App Store.</li>
                            <li>2. Selesaikan proses registrasi akun dan login.</li>
                            <li>3. Buka produk Asuransi dengan cara klik Semua Produk
                                (Versi EN, All Product).</li>
                            <li>4. Scroll ke bawah dan temukan bagian produk Panduan Travel & Add-on.</li>
                            <li>5. Klik button Protect.</li>
                            <li>6. Pilih dan klik button Asuransi Perjalanan.</li>
                            <li>7. Pilih destinasi penerbangan anda, tersedia dua pilihan penerbangan Domestik dan
                                Internasional; Contoh, saat ini anda sudah masuk di halaman Asuransi Perjalanan
                                Internasional;</li>
                            <li>8. Lengkapi data perbangan informasi lainnya yang diminta, pastikan anda mengisi dengan
                                akurat.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.querySelectorAll('.section-syarat h2').forEach(sectionHeader => {
                sectionHeader.addEventListener('click', () => {
                    const sectionContent = sectionHeader.nextElementSibling;
                    if (sectionContent.style.display === 'none' || !sectionContent.style.display) {
                        sectionContent.style.display = 'block';
                    } else {
                        sectionContent.style.display = 'none';
                    }
                });
            });
        </script>
<?php 
    include "footer.php"
?>
</body>

</html>