<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8"> <!-- Mengatur encoding karakter agar mendukung karakter UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Supaya tampilan responsif di perangkat mobile -->
    <title>Offline</title> <!-- Judul halaman -->

    <style>
        /* Reset dasar & set font */
        * {
            margin: 0;
            /* Menghilangkan margin default */
            padding: 0;
            /* Menghilangkan padding default */
            box-sizing: border-box;
            /* Membuat perhitungan width lebih akurat */
            font-family: 'Inter', sans-serif;
            /* Font utama */
        }

        /* Style untuk body */
        body {
            height: 100vh;
            /* Tinggi penuh layar */
            display: flex;
            /* Menggunakan flexbox */
            align-items: center;
            /* Konten ditengah vertikal */
            justify-content: center;
            /* Konten ditengah horizontal */
            background: linear-gradient(135deg, #0f172a, #1e293b);
            /* Background gradient */
            color: white;
            /* Warna teks */
            text-align: center;
            /* Teks rata tengah */
            padding: 20px;
            /* Ruang dalam */
            animation: fadeIn 0.6s ease;
            /* Animasi muncul */
        }

        /* Animasi fade-in */
        @keyframes fadeIn {
            from {
                opacity: 0;
                /* Transparan di awal */
                transform: translateY(10px);
                /* Turun sedikit */
            }

            to {
                opacity: 1;
                /* Muncul penuh */
                transform: translateY(0);
                /* Kembali ke posisi normal */
            }
        }

        /* Box container */
        .box {
            max-width: 340px;
            /* Lebar maksimal konten */
        }

        /* Gambar ikon */
        .icon {
            width: 110px;
            /* Lebar ikon */
            margin-bottom: 20px;
            /* Jarak bawah */
            opacity: 0.95;
            /* Transparansi sedikit */
            filter: drop-shadow(0 0 4px rgba(255, 255, 255, 0.2));
            /* Efek glow */
            animation: float 3s ease-in-out infinite;
            /* Animasi melayang */
        }

        /* Animasi melayang bergoyang */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
                /* Normal */
            }

            50% {
                transform: translateY(-6px);
                /* Naik sedikit */
            }
        }

        /* Style judul */
        h2 {
            font-size: 26px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        /* Style paragraf */
        p {
            opacity: 0.8;
            /* Transparansi agar lebih halus */
            font-size: 15px;
            margin-bottom: 20px;
        }

        /* ====================== */
        /*  BUTTON INTERAKTIF     */
        /* ====================== */
        button {
            padding: 12px 26px;
            /* Ruang dalam tombol */
            border: none;
            /* Tanpa border */
            border-radius: 12px;
            /* Rounded */
            background: #334155;
            /* Warna dasar */
            font-size: 15px;
            /* Ukuran tulisan */
            color: white;
            /* Warna teks */
            cursor: pointer;
            /* Cursor jadi pointer */
            position: relative;
            /* Agar efek shine bisa tampil */
            overflow: hidden;
            /* Sembunyikan overflow efek */

            /* Transisi efek halus */
            transition:
                background 0.25s ease,
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        /* Efek shine (kilauan) */
        button::before {
            content: "";
            position: absolute;
            /* Posisi bebas */
            top: 0;
            left: -120%;
            /* Awal berada di luar kiri */
            width: 100%;
            /* Lebar penuh */
            height: 100%;
            background: linear-gradient(120deg,
                    transparent,
                    rgba(255, 255, 255, 0.25),
                    transparent);
            /* Garis shine */
            transition: 0.5s ease;
            /* Kecepatan perpindahan shine */
        }

        /* Efek hover tombol */
        button:hover {
            background: #475569;
            /* Warna berubah */
            transform: scale(1.06);
            /* Membesar sedikit */
            box-shadow: 0 6px 20px rgba(148, 163, 184, 0.35);
            /* Bayangan */
        }

        /* Shine bergerak saat hover */
        button:hover::before {
            left: 120%;
            /* Shine bergeser ke kanan */
        }

        /* Efek klik */
        button:active {
            transform: scale(0.96);
            /* Mengecil saat diklik */
        }
    </style>
</head>

<body>
    <div class="box"> <!-- Container utama -->
        <img class="icon" src="assets/dist/img/pwa/512.png" alt="Offline"> <!-- Gambar ikon offline -->
        <h2>Koneksi Terputus</h2> <!-- Judul -->
        <p>Anda sedang offline. Pastikan koneksi internet aktif.</p> <!-- Keterangan -->

        <!-- Tombol untuk reload halaman -->
        <button onclick="location.reload()">Coba Lagi</button>
    </div>
</body>

</html>
