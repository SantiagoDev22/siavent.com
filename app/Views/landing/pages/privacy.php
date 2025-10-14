<?php
$lang    = 'es-mx';
$company = setting()->get('App.general', 'company');

?>
<?= $this->extend('website/templates/fullpage') ?>

<!-- Secction Head HTML -->
<?= $this->section('head') ?>
<!-- MetaTags -->
<title>Privacy | <?= $company ?></title>

<meta name="description" content="enter your description">

<!-- MetaTags OpenGraph -->
<meta property="og:title" content="">
<meta property="og:description" content="">
<meta property="og:url" content="<?= current_url('') ?>">
<meta property="og:image" content="<?= base_url('') ?>">
<meta property="og:image:alt" content="">
<meta property="og:type" content="website">

<!-- MetaTags Twitter -->
<meta name="twitter:title" content="">
<meta name="twitter:description" content="">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="">
<meta name="twitter:image" content="<?= base_url('') ?>">
<meta name="twitter:image:alt" content="">

<!-- MetaTags DublinCore -->
<meta name="DC.Title" content="">
<meta name="DC.Description" content="">
<meta name="DC.Type" content="">

<!-- MetaTags GeoTag -->
<meta name="geo.region" content="">
<meta name="geo.placename" content="">
<meta name="geo.position" content="">
<meta name="ICBM" content="">

<?= $this->endSection() ?>
<!-- EndSecction Head -->

<!-- Secction to use JavaScript -->
<?= $this->section('javascript') ?>

<!-- yours scripts -->
<script src="<?= base_url('') ?>"></script>

<?= $this->endSection() ?>
<!-- EndSecction Javascripts-->

<!-- Section Body Html -->
<?= $this->section('content') ?>

<main>
    <div class=" grid lg:grid-cols-[20%_80%] grid-cols-[10%_90%]">
        <div class="bg-[#080808] w-full h-full">

        </div>
        <div class=" py-10 lg:py-28 container">
            <div class=" flex flex-col">
                <h1 class=" text-[#221f20] font-bold lg:text-[40px] text-[30px]">Aviso de Privacidad de On eventos
                </h1>
                <p class=" mt-6 font-normal last:text-[20px] text-[16px]">A continuación se explica cómo On eventos gestiona y salvaguarda la información suministrada por los usuarios en nuestro sitio web, garantizando la protección de sus datos personales.</p>
                <h2 class=" font-bold lg:text-[28px] text-[24px] text-[#221f20] mt-6">Recolección y uso de Información</h2>
                <p class="mt-1 font-normal lg:text-[20px] text-[16px]">Obtenemos datos que nos brindas al navegar en nuestro sitio web. Esto abarca:</p>
                <ul class="mt-2 lg:ml-0 ml-4 list-disc marker:text-[#221f20] font-normal lg:text-[20px] text-[16px]">
                    <li>Información de Identificación Personal: Tu nombre y email, que facilitan nuestra comunicación.
                    </li>
                    <li>Información Demográfica: Datos como tu edad o intereses, útiles para adaptar nuestras ofertas y servicios.</li>
                    <li>Información Transaccional: Si efectúas una compra o pides un servicio, recopilamos la información necesaria para procesar tu solicitud.</li>
                </ul>
                <p class="font-normal mt-4 lg:text-[20px] text-[16px]">Usamos la información recabada para contactarte, enviarte noticias y actualizaciones sobre nuestros productos y servicios, a través de diferentes medios de contacto o suscripción.</p>
                <p class=" font-normal mt-8 lg:text-[20px] text-[16px]">Si decides revocar el permiso para usar tus datos personales, puedes solicitarlo a privacidad@oneventos.mx. Tu solicitud debe argumentar la revocación e incluir una identificación válida. Contestaremos en un máximo de 20 días hábiles, informándote del resultado por correo electrónico.</p>
                <h2 class="font-bold lg:text-[28px] text-[24px] text-[#221f20] mt-6">Protección de la Información</h2>
                <p class="font-normal mt-1 lg:text-[20px] text-[16px]">En On eventos, la seguridad de tus datos es primordial. Adoptamos medidas de seguridad avanzadas y protocolos estrictos para prevenir accesos no autorizados y filtraciones. Nuestro equipo trabaja continuamente en mejorar estas medidas, asegurando el manejo confidencial y seguro de tu información.</p>
                <h2 class="font-bold lg:text-[28px] text-[24px] text-[#221f20] mt-6">Compartir información personal</h2>
                <p class="font-normal mt-1 lg:text-[20px] text-[16px]">Te aseguramos que no compartiremos tus datos personales con terceros sin tu consentimiento, salvo que lo exija la ley o sea esencial para cumplir con los propósitos de este aviso.</p>
                <h2 class="font-bold lg:text-[28px] text-[24px] text-[#221f20] mt-6">Derechos ARCO</h2>
                <p class="font-normal mt-1 lg:text-[20px] text-[16px]">Tienes derecho a conocer qué datos personales tenemos sobre ti, su uso y las condiciones de uso (Acceso). Puedes solicitar la actualización de tus datos si están desactualizados, incorrectos o incompletos (Rectificación), pedir la eliminación de tus datos de nuestros registros (Cancelación), o rechazar el uso de tus datos para determinados fines (Oposición). Para ejercer estos derechos, envía tu solicitud a <a href="mailto:privacidad@oneventos.mx" class=" hover:underline-offset-2 hover:underline">privacidad@oneventos.mx</a></p>

                <h2 class="font-bold lg:text-[28px] text-[24px] text-[#221f20] mt-6">Política de Cookies</h2>
                <p class="font-normal mt-1 lg:text-[20px] text-[16px]">Explicamos el uso de cookies en nuestro sitio web. Estas son pequeños archivos guardados en tu dispositivo para mejorar tu experiencia en línea. Las usamos para analizar el tráfico del sitio y personalizar contenido. Puedes aceptar o rechazar las cookies, pero rechazarlas puede limitar algunas funcionalidades del sitio. Garantizamos que las cookies no acceden a tu información personal sin tu consentimiento.</p>

                <h2 class="font-bold lg:text-[28px] text-[24px] text-[#221f20] mt-6">Cambios en el Aviso de Privacidad
                </h2>
                <p class="font-normal mt-1 lg:text-[20px] text-[16px]">Este aviso puede cambiar o actualizarse por diversas razones. Te recomendamos revisarlo regularmente.
                </p>
                <p class="font-normal mt- lg:text-[20px] text-[16px] mt-8">Para cualquier duda, contáctanos en privacidad@oneventos.mx
                </p>
                <p class=" text-end font-normal mt- lg:text-[16px] text-[14px] mt-8">Última actualización: Mayo 2025
                </p>
            </div>
        </div>
    </div>
</main>



<?= $this->endSection() ?>