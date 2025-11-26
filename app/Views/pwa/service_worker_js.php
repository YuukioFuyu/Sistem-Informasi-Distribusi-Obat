const CACHE_NAME = 'simpharma-dynamic-cache-v2';
const OFFLINE_URL = '/app/Views/template/offline.php';
const OFFLINE_IMAGE_URL = '/assets/dist/pwa/512.png';

// Install
self.addEventListener("install", event => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(cache => {
            return cache.addAll([OFFLINE_URL, OFFLINE_IMAGE_URL]);
        })
    );
    self.skipWaiting();
});

// Activate
self.addEventListener("activate", event => {
    event.waitUntil(
        caches.keys().then(keys => {
            return Promise.all(
                keys.map(key => {
                    if (key !== CACHE_NAME) return caches.delete(key);
                })
            );
        })
    );
    self.clients.claim();
});

// Fetch
self.addEventListener("fetch", event => {

    if (event.request.method !== "GET") return;

    // Navigation/page request → Network First
    if (event.request.mode === "navigate") {
        event.respondWith(
            fetch(event.request)
                .then(response => {
                    const clone = response.clone();
                    caches.open(CACHE_NAME).then(cache => cache.put(event.request, clone));
                    return response;
                })
                .catch(() => caches.match(event.request).then(c => c || caches.match(OFFLINE_URL)))
        );
        return;
    }

    // Assets → Cache First
    if (event.request.destination === "image") {
        event.respondWith(
            fetch(event.request)
                .then(response => {
                    const clone = response.clone();
                    caches.open(CACHE_NAME).then(cache => cache.put(event.request, clone));
                    return response;
                })
                .catch(() => caches.match(OFFLINE_IMAGE_URL))
        );
        return;
    }

    // Non-image asset request → Cache First
    event.respondWith(
        caches.match(event.request).then(cacheRes => {
            return (
                cacheRes ||
                fetch(event.request).then(networkRes => {
                    const clone = networkRes.clone();
                    caches.open(CACHE_NAME).then(cache => cache.put(event.request, clone));
                    return networkRes;
                })
            );
        })
    );
});


// ================================
// BACKGROUND SYNC
// ================================
self.addEventListener("sync", event => {
    if (event.tag === "sync-pending-data") {
        event.waitUntil(syncPendingData());
    }
});

async function syncPendingData() {
    const pendingData = await idbGetPendingData();

    if (!pendingData || pendingData.length === 0) return;

    try {
        const response = await fetch("/api/sync_offline_data", {
            method: "POST",
            body: JSON.stringify(pendingData),
            headers: { "Content-Type": "application/json" }
        });

        if (response.ok) {
            await idbClearPendingData();
        }
    } catch (err) {
        console.log("Sync gagal, nanti dicoba lagi");
    }
}


// ================================
// PERIODIC SYNC
// ================================
self.addEventListener("periodicsync", event => {
    if (event.tag === "sync-latest-data") {
        event.waitUntil(updateLatestData());
    }
});

async function updateLatestData() {
    try {
        await fetch("/api/update-cache-data");
    } catch (err) {
        console.log("Periodic sync gagal:", err);
    }
}