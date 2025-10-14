<header class=" fixed bg-black  z-40 lg:py-4 py-3 shadow-md w-full">
    <div class=" lg:px-[44px] px-[28px] flex items-center justify-between">
        <div>
            <figure>
                <img class=" object-scale-down w-auto h-[35px] lg:h-[50px]" src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'logo')]) ?>" alt="Logo <?= esc(setting()->get('App.general', 'company')) ?>">
            </figure>
        </div>
        <div class=" flex">
            <div class=" flex">
                <div class=" ">
                    <div class="">
                        <a class=" cursor-pointer open-modal-btn lg:text-xl bg-white rounded-[24px] font-normal text-sm transition-all ease-in duration-200 hover:text-white hover:bg-[#de5f0f]  px-[10px] lg:px-10 py-[12px]  text-black">
                            ¡Cotiza aquí!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="fixed  lg:bottom-6 bottom-12 right-3 z-50 ">
    <a href="<?= esc(setting()->get('App.apps', 'whatsapp')) ?>" class="inline-flex text-green-500 hover:scale-125 transition" target="_blank" rel="noopener noreferrer">
        <img class="w-16 h-16" src="<?= base_url('images/layouts/ws.svg') ?>" alt="Logo WhatsApp">
    </a>
</div>