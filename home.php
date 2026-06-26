<?php require_once 'views/layouts/header.php'; ?>

<nav class="navbar">
    <a href="home.php" class="navbar-brand">
        <img src="assets/img/logo.png" alt="Logo Klinik" class="logo-img">
        Klinik Kelompok 6
    </a>
   <div class="nav-buttons">
    <a href="jadwalPoli.php" class="btn btn-jadwal">Jadwal Poli</a>

 <span class="nav-divider"></span>

    <a href="login.php" class="btn btn-login">Login</a>
    <a href="registrasi.php" class="btn btn-register">Registrasi</a>
</div>
</nav>

<div class="hero-container" style="
    position: relative; 
    width: 100%; 
    overflow: hidden;
">
    <img src="assets/img/Asset1.png" alt="Dokter memeriksa pasien" class="hero-image" style="
        width: 100%; 
        height: 400px; /* <--- MENGUBAH TINGGI GAMBAR (Misal: dari default menjadi 400px atau 350px) */
        object-fit: cover; /* <--- MENJAGA GAMBAR TIDAK GEPENG */
        object-position: center; /* <--- Memastikan bagian tengah gambar tetap terlihat */
        display: block;
        filter: brightness(60%); 
    ">

    <div class="hero-overlay-text" style="
        position: absolute; 
        top: 50%; 
        left: 8%; 
        transform: translateY(-50%); 
        max-width: 600px; 
        color: #ffffff; 
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5); 
    ">
        <h1 style="
            font-size: 3.5rem; 
            margin-bottom: 10px; 
            font-weight: bold;
            line-height: 1.2;
        ">Klinik Sehat Bersama</h1>
        
        <h3 style="
            font-size: 1.6rem; 
            margin-bottom: 20px; 
            font-weight: 500;
            line-height: 1.3;
            color: #f0f0f0;
        ">Solusi Kesehatan Terpercaya untuk Anda dan Keluarga</h3>
        
        <p style="
            font-size: 1.05rem; 
            line-height: 1.6; 
            margin-bottom: 0;
            color: #e0e0e0;
        ">Memberikan pelayanan kesehatan yang profesional, cepat, dan nyaman dengan didukung tenaga medis berpengalaman serta fasilitas yang modern.</p>
    </div>
</div>

<!-- Bagian Fitur/Layanan Unggulan -->
<section class="features-section" style="padding: 50px 20px; text-align: center;">
    <h2>Layanan Poli Kami</h2>
    <p>Kami menyediakan berbagai layanan poli spesialis untuk kesehatan Anda dan keluarga.</p>
    <div class="features-grid" style="display: flex; justify-content: center; gap: 20px; margin-top: 30px;">
        <div class="feature-card" style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; width: 200px;">
            <h3>Poli Umum</h3>
            <p style="font-size: 0.9rem; color: #666;">Pemeriksaan kesehatan dasar.</p>
        </div>
        <div class="feature-card" style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; width: 200px;">
            <h3>Poli Gigi</h3>
            <p style="font-size: 0.9rem; color: #666;">Perawatan gigi dan mulut.</p>
        </div>
        <div class="feature-card" style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; width: 200px;">
            <h3>Poli Anak</h3>
            <p style="font-size: 0.9rem; color: #666;">Kesehatan bayi dan anak.</p>
        </div>
        <div class="feature-card" style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; width: 200px;">
            <h3>Poli Mata</h3>
            <p style="font-size: 0.9rem; color: #666;">Pemeriksaan penglihatan.</p>
        </div>
    </div>
</section>

<section class="facilities-section">
    <h1 class="facilities-title">Fasilitas Klinik Kami</h1>

    <div class="carousel-viewport">
        <button class="carousel-btn prev-btn" onclick="moveSlide(-1)">&#10094;</button>
        <button class="carousel-btn next-btn" onclick="moveSlide(1)">&#10095;</button>

        <div class="carousel-track-container">
            <div class="carousel-track" id="track">
                
                <div class="carousel-item">
                    <div class="card-box">
                        <img src="assets/img/Ruangtunggu.jpg" alt="Fasilitas 1">
                        <div class="card-text">
                            <h3>Ruang Tunggu Pasien yang Nyaman & Luas</h3>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="card-box">
                        <img src="assets/img/Lab.jpg" alt="Fasilitas 2">
                        <div class="card-text">
                            <h3>Laboratorium & Alat Medis Modern</h3>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="card-box">
                        <img src="assets/img/Apotek.jpg" alt="Fasilitas 3">
                        <div class="card-text">
                            <h3>Apotek Internal yang Lengkap & Cepat</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="location-section" style="padding: 50px 20px; text-align: center; background-color: #f0f0f0;">
    <h2 style="margin-bottom: 10px; color: #333;">Lokasi Klinik Kami</h2>
    <p style="margin-bottom: 30px; color: #666;">Kunjungi kami pada jam operasional kerja di alamat berikut.</p>
    
    <div class="map-container" style="max-width: 800px; margin: 0 auto; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden;">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.643339678149!2d106.7865231!3d-6.1784799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f65969dfb48b%3A0xcb1b51e44f1225fb!2sJl.%20Tanjung%20Duren%20Raya%20No.6%2C%20RT.1%2FRW.5%2FTj.%20Duren%20Utara%2C%20Kec.%20Grogol%20petamburan%2C%20Kota%20Jakarta%20Barat!5e0!3m2!1sid!2sid!4v1719220000000!5m2!1sid!2sid" 
            width="100%" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>

<div class="footer-address">
    <hr>
    <p>Jl. Tanjung Duren no.6 Jakarta Barat | +62 8767</p>
</div>

<script>
let currentIndex = 1; // Mulai dari index 1 agar gambar ke-2 otomatis di tengah saat awal load
const items = document.getElementsByClassName('carousel-item');
const track = document.getElementById('track');

function updateCarousel() {
    const totalItems = items.length;

    // Batasi loop index agar tidak out of bounds
    if (currentIndex >= totalItems) { currentIndex = 0; }
    if (currentIndex < 0) { currentIndex = totalItems - 1; }

    // Hapus class aktif lama
    for (let i = 0; i < totalItems; i++) {
        items[i].classList.remove('active-center');
    }

    // Tambah class aktif ke item tengah saat ini
    items[currentIndex].classList.add('active-center');

    /* LOGIKA PERGESERAN KIRI DAN KANAN:
       Geser track secara horizontal agar item aktif berada tepat di tengah viewport
    */
    const itemWidth = items[0].getBoundingClientRect().width;
    const offset = -(currentIndex * itemWidth) + (itemWidth); 
    track.style.transform = `translateX(${offset}px)`;
}

function moveSlide(direction) {
    currentIndex += direction;
    updateCarousel();
}

// Jalankan fungsi pertama kali saat halaman dibuka
window.addEventListener('resize', updateCarousel);
document.addEventListener('DOMContentLoaded', updateCarousel);
</script>

<?php require_once 'views/layouts/footer.php'; ?>