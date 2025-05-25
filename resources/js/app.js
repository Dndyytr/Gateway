import './bootstrap';
import Alpine from 'alpinejs';
import * as echarts from 'echarts/core';
import { PieChart } from 'echarts/charts';
import { TooltipComponent } from 'echarts/components';
import { CanvasRenderer } from 'echarts/renderers';
import { use } from 'echarts/core';
import 'default-passive-events';

use([PieChart, TooltipComponent, CanvasRenderer]);

// Import jQuery dan buat global
import $ from 'jquery';
window.jQuery = window.$ = $;


// Import DataTables
import 'datatables.net-dt';

window.Alpine = Alpine;
window.echarts = echarts;

Alpine.start();

// resources/js/map.js
import L from 'leaflet';
import 'leaflet/dist/leaflet.css'; // Impor CSS Leaflet
