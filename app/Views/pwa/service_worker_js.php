/**
* ============================
* SERVICE WORKER VERSION LAMA
* (DIKOMENTARI)
* ============================
* Ini adalah versi lama service worker yang menyimpan
* beberapa asset ke dalam cache.
*
self.addEventListener('install', event => {
event.waitUntil(
caches.open('pwa-cache-v1').then(cache => {
return cache.addAll([
'/',
'/login',
'/manifest.json',
'/assets/dist/img/pwa/192.png',
'/assets/dist/img/pwa/512.png'
]);
})
);
});

self.addEventListener('fetch', event => {
event.respondWith(
caches.match(event.request).then(response => {
return response || fetch(event.request);
})
);
});
*/


/* ================================================
* SERVICE WORKER BARU DENGAN HALAMAN OFFLINE
* ================================================*/

// Nama cache utama
const CACHE_NAME = 'offline-cache';

// File yang akan ditampilkan ketika offline
const OFFLINE_URL = '/assets/dist/pwa/offline.php';

// Gambar default ketika gambar tidak bisa dimuat
const OFFLINE_IMAGE_URL = '/assets/dist/pwa/offline.png';


// =====================================================
// EVENT: INSTALL
// Dipanggil ketika service worker pertama kali di-install
// =====================================================
self.addEventListener('install', event => {
event.waitUntil(

// Membuka cache berdasarkan CACHE_NAME
caches.open(CACHE_NAME)
.then(cache => {

// Menyimpan halaman offline & gambar offline ke cache
return cache.addAll([OFFLINE_URL, OFFLINE_IMAGE_URL]);
})

// Skip waiting agar SW baru langsung aktif
.then(() => self.skipWaiting())
);
});


// =====================================================
// EVENT: ACTIVATE
// Membersihkan cache lama jika ada pembaruan versi
// =====================================================
self.addEventListener('activate', event => {
event.waitUntil(

// Mengambil semua nama cache yang tersimpan
caches.keys().then(keys => {
return Promise.all(
keys.map(key => {

// Hapus cache yang bukan milik versi terbaru
if (key !== CACHE_NAME) {
return caches.delete(key);
}
})
);
})
);
});


// =====================================================
// EVENT: FETCH
// Menangani request dari browser (aset, halaman, gambar)
// =====================================================
self.addEventListener('fetch', event => {

// Jika request berupa navigasi halaman (mode: navigate)
if (event.request.mode === 'navigate') {

event.respondWith(
// Usahakan ambil data dari internet
fetch(event.request)

// Jika gagal (tidak ada internet), tampilkan halaman offline
.catch(() => caches.match(OFFLINE_URL))

// Jika tetap tidak ada, fallback ke offline URL
.then(response => response || caches.match(OFFLINE_URL))
);

}
// Jika request berupa gambar
else if (event.request.destination === 'image') {

event.respondWith(
// Usahakan ambil gambar asli dari internet
fetch(event.request)

// Jika gagal (offline), pakai gambar offline default
.catch(() => caches.match(OFFLINE_IMAGE_URL))

// Jika tetap tidak ada, fallback gambar offline
.then(response => response || caches.match(OFFLINE_IMAGE_URL))
);
}
});
