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