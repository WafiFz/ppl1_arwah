require("./bootstrap");

import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import Splide from "@splidejs/splide";
import jQuery from "jquery";
import 'flowbite';

Alpine.plugin(collapse);

window.Alpine = Alpine;
window.Splide = Splide;
window.$ = jQuery;

Alpine.start();
