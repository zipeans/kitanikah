import './bootstrap';

// 1. Import Alpine dan plugin Collapse
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

// 2. Daftarkan plugin ke Alpine
Alpine.plugin(collapse);

// 3. Jadikan Alpine tersedia secara global
window.Alpine = Alpine;

// 4. Mulai Alpine.js
Alpine.start();
