<header id="site-header" class="fixed top-0 left-0 w-full z-50 transition-all duration-300">
    <div class="mx-auto px-4 sm:px-6 lg:px-24 py-2">
        <div class="flex justify-between items-center">
            <!-- LOGO -->
            <a href="" class="flex items-center space-x-2">
                <img id="logo-img" src="<?= base_url('images/landing/home/logo-savient.svg') ?>" alt="Logo" class="w-auto h-[100px] lg:h-[134px] transition-all duration-300">
            </a>

            <!-- NAV LINKS -->
            <nav class="hidden md:flex items-center space-x-8 text-[15px] font-medium text-gray-700">
                <a href="tel:7226480074" class=" lg:text-[22px] font-semibold text-white font-poppins">Llámanos 722 648 0074</a>
                <a href="" class=" px-[20px] py-[10px] rounded-[25px] bg-[#E73636] hover:bg-[#032039] text-white font-poppins text-xl font-medium">Solicita tu cotización</a>
            </nav>

            <a href="tel:7226480074" class=" lg:text-[22px] font-semibold text-white md:hidden block font-poppins">Llámanos 722 648 0074</a>

        </div>
    </div>

    <!-- MENÚ MÓVIL -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
        <nav class="flex flex-col items-center space-y-4 py-4 text-gray-700 font-medium">
            <a href="#inicio" class="hover:text-bar-red-1 transition-colors">Inicio</a>
            <a href="#servicios" class="hover:text-bar-red-1 transition-colors">Servicios</a>
            <a href="#nosotros" class="hover:text-bar-red-1 transition-colors">Nosotros</a>
            <a href="#contacto" class="hover:text-bar-red-1 transition-colors">Contacto</a>
        </nav>
    </div>
</header>



<script>
    const header = document.getElementById('site-header');
    const logo = document.getElementById('logo-img');
    const scrollThreshold = 50; // píxeles para activar el cambio

    function onScroll() {
        if (window.scrollY > scrollThreshold) {
            header.classList.add('bg-[#093B57]/95', 'backdrop-blur-sm', 'shadow-md');
            logo.classList.add('lg:h-[80px]'); // logo pequeño en pantallas lg y superior
            logo.classList.remove('lg:h-[134px]');
        } else {
            header.classList.remove('bg-[#093B57]/95', 'backdrop-blur-sm', 'shadow-md');
            logo.classList.remove('lg:h-[80px]');
            logo.classList.add('lg:h-[134px]');
        }
    }

    window.addEventListener('scroll', onScroll, {
        passive: true
    });

    // menú móvil
    document.getElementById('menu-btn').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>