// =======================
// INISIALISASI MAP & PANES (Kunci Utama Urutan Layer)
// =======================
const map = L.map('map').setView([-5.429, 105.261], 12);

map.createPane('kecamatanPane');
map.getPane('kecamatanPane').style.zIndex = 400; 

map.createPane('isochronePane');
map.getPane('isochronePane').style.zIndex = 450; 

map.createPane('titikSekolahPane');
map.getPane('titikSekolahPane').style.zIndex = 650; 
map.getPane('titikSekolahPane').style.pointerEvents = 'auto'; 

// =======================
// BASE LAYERS
// =======================
const osm = L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    { attribution: '© OpenStreetMap' }
);

const satellite = L.tileLayer(
    'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
    { attribution: '© Esri' }
);

osm.addTo(map);

// =======================
// LAYER VARIABLES & GROUPS
// =======================
let smaLayer;
let kecamatanLayer;
let bufferLayer;

const layerHijau = L.layerGroup().addTo(map);
const layerKuning = L.layerGroup().addTo(map);
const layerMerah = L.layerGroup().addTo(map);

function getFeatureName(properties) {
    if (!properties) return "Tanpa Nama";
    return properties.name || properties.nama || properties.NAME || properties.nama_sekolah || "Tanpa Nama";
}

function getColor(d){
    return d > 80 ? '#006837' :
           d > 60 ? '#31a354' :
           d > 40 ? '#78c679' :
           d > 20 ? '#c2e699' :
                    '#ffffcc';
}

function styleKecamatan(feature){
    const nilai = feature.properties ? (feature.properties.nilai_pemerataan || 0) : 0;
    return {
        fillColor: getColor(nilai),
        weight: 1.5,
        color: '#666',
        fillOpacity: 0.4, 
        pane: 'kecamatanPane' 
    };
}

// =======================
// LOGIKA PENCARIAN SEKOLAH
// =======================
const searchInput = document.getElementById('search-sekolah');
const searchResults = document.getElementById('search-results');

searchInput.addEventListener('input', function(e) {
    const keyword = e.target.value.toLowerCase().trim();
    searchResults.innerHTML = '';
    
    if (keyword === '') {
        searchResults.classList.add('hidden');
        return;
    }

    let cocok = 0;

    if (smaLayer) {
        smaLayer.eachLayer(function(layer) {
            const properties = layer.feature.properties;
            const namaSekolah = getFeatureName(properties);
            
            if (namaSekolah.toLowerCase().includes(keyword)) {
                cocok++;
                const item = document.createElement('div');
                item.className = 'px-4 py-2.5 hover:bg-blue-50 cursor-pointer border-b border-gray-100 transition last:border-0 font-medium text-gray-700 text-xs md:text-sm';
                item.textContent = namaSekolah;
                
                item.addEventListener('click', function() {
                    searchInput.value = namaSekolah;
                    searchResults.classList.add('hidden');
                    
                    const latlng = layer.getLatLng();
                    map.flyTo(latlng, 16, { animate: true, duration: 1.5 });
                    
                    setTimeout(() => {
                        layer.openPopup();
                    }, 1500);
                });
                
                searchResults.appendChild(item);
            }
        });
    }

    if (cocok > 0) {
        searchResults.classList.remove('hidden');
    } else {
        const noResult = document.createElement('div');
        noResult.className = 'p-3 text-gray-400 italic text-center text-xs';
        noResult.textContent = 'Sekolah tidak ditemukan';
        searchResults.appendChild(noResult);
        searchResults.classList.remove('hidden');
    }
});

document.addEventListener('click', function(e) {
    if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
        searchResults.classList.add('hidden');
    }
});

// =======================
// DYNAMIC ISOCHRONE (ORS)
// =======================
const ORS_API_KEY = 'eyJvcmciOiI1YjNjZTM1OTc4NTExMTAwMDFjZjYyNDgiLCJpZCI6ImQ4NjkxMWE0MDU4OTQzMzk4NDJjNTcwZjYxYmM1MzRiIiwiaCI6Im11cm11cjY0In0=';

function buatAksesbilitasDinamis(lat, lng, namaSekolah) {
    const url = `https://api.openrouteservice.org/v2/isochrones/driving-car`;
    const batasanWaktu = [180, 360, 600]; 

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': ORS_API_KEY
        },
        body: JSON.stringify({
            locations: [[lng, lat]], 
            range: batasanWaktu,
            range_type: 'time',
            smoothing: 3.0
        })
    })
    .then(response => {
        if (!response.ok) throw new Error("Gagal merespon API ORS");
        return response.json();
    })
    .then(data => {
        data.features.reverse();

        L.geoJSON(data, {
            style: function(feature) {
                const value = feature.properties.value; 
                if (value <= 180) {
                    return { color: '#10b981', fillColor: '#10b981', fillOpacity: 0.45, weight: 1.5, pane: 'isochronePane' };
                } else if (value <= 360) {
                    return { color: '#f59e0b', fillColor: '#f59e0b', fillOpacity: 0.30, weight: 1.5, pane: 'isochronePane' };
                } else {
                    return { color: '#f43f5e', fillColor: '#f43f5e', fillOpacity: 0.15, weight: 1.5, pane: 'isochronePane' };
                }
            },
            onEachFeature: function(feature, layer) {
                const value = feature.properties.value;
                let menit = value / 60;
                let keterangan = `Zona Jangkauan: ${menit} Menit Berkendara`;
                layer.bindPopup(`<b>${namaSekolah}</b><br>${keterangan}`);

                if (value <= 180) {
                    layer.addTo(layerHijau);
                } else if (value <= 360) {
                    layer.addTo(layerKuning);
                } else {
                    layer.addTo(layerMerah);
                }
            }
        }).addTo(map);
    })
    .catch(err => console.error(`Gagal memuat jangkauan untuk ${namaSekolah}:`, err));
}

// =======================
// LOAD DATA SMA (GeoJSON Parser murni)
// =======================
fetch('api_sekolah.php')
.then(res => res.json())
.then(geojsonData => {
    smaLayer = L.geoJSON(geojsonData, {
        pointToLayer: function(feature, latlng){
            const nama = getFeatureName(feature.properties);
            
            // Jalankan ORS Isokron
            buatAksesbilitasDinamis(latlng.lat, latlng.lng, nama);

            return L.circleMarker(latlng, {
                radius: 6,
                fillColor: '#0056b3',
                color: '#fff',
                weight: 1.5,
                fillOpacity: 1,
                pane: 'titikSekolahPane' 
            });
        },
        onEachFeature: function(feature, layer){
            const namaSekolah = getFeatureName(feature.properties);
            layer.bindPopup(`<b>${namaSekolah}</b><br>Kategori: SMA`);
        }
    });
    smaLayer.addTo(map);
    initializeLayers();
})
.catch(err => console.error("Gagal memuat API Sekolah:", err));

// =======================
// LOAD DATA KECAMATAN
// =======================
fetch('../data/kecamatan.geojson')
.then(res => res.json())
.then(data => {
    if(data && data.features){
        kecamatanLayer = L.geoJSON(data, {
            style: styleKecamatan,
            onEachFeature: function(feature, layer){
                const namaKec = getFeatureName(feature.properties);
                const nilai = feature.properties ? (feature.properties.nilai_pemerataan || '-') : '-';
                layer.bindPopup(`<b>Wilayah: ${namaKec}</b><br>Nilai Pemerataan: ${nilai}`);
            }
        });
        kecamatanLayer.addTo(map);
    }
    initializeLayers();
})
.catch(err => {
    console.error("Gagal memuat data Kecamatan:", err);
    initializeLayers(); 
});

// =======================
// LOAD DATA BUFFER
// =======================
fetch('../data/buffer.geojson')
.then(res => res.json())
.then(data => {
    if(data && data.features){
        bufferLayer = L.geoJSON(data, {
            style:{ color:'orange', weight:2, fillOpacity:0.15, pane: 'kecamatanPane' }
        });
    }
    initializeLayers();
})
.catch(err => {
    console.error("Gagal memuat data Buffer:", err);
    initializeLayers();
});

// =======================
// EVENT LISTENER CENTANG
// =======================
document.getElementById('chk-hijau').addEventListener('change', function(e) {
    if(e.target.checked) { map.addLayer(layerHijau); } else { map.removeLayer(layerHijau); }
});

document.getElementById('chk-kuning').addEventListener('change', function(e) {
    if(e.target.checked) { map.addLayer(layerKuning); } else { map.removeLayer(layerKuning); }
});

document.getElementById('chk-merah').addEventListener('change', function(e) {
    if(e.target.checked) { map.addLayer(layerMerah); } else { map.removeLayer(layerMerah); }
});

// =======================
// CONTROL INTERFACE LAYER
// =======================
let layerControl;

function initializeLayers(){
    if(layerControl) {
        map.removeControl(layerControl);
    }

    const baseMaps = {
        "OpenStreetMap": osm,
        "Satelit": satellite
    };

    const overlayMaps = {};
    const groupLayers = [];

    if (smaLayer) { overlayMaps["Titik SMA"] = smaLayer; groupLayers.push(smaLayer); }
    if (kecamatanLayer) { overlayMaps["Batas Kecamatan"] = kecamatanLayer; groupLayers.push(kecamatanLayer); }
    if (bufferLayer) { overlayMaps["Radius Zonasi 3KM"] = bufferLayer; }
    
    layerControl = L.control.layers(baseMaps, overlayMaps, { collapsed: false });

    if (groupLayers.length > 0 && smaLayer) {
        map.fitBounds(smaLayer.getBounds());
    }
}