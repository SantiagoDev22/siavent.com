<div id="modal" class="fixed inset-0 bg-white bg-opacity-40 lg:px-0 px-4 z-40 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="bg-black rounded-2xl shadow-xl  lg:max-w-[600px] w-full p-6 transform scale-95 transition-all relative duration-300">
        <h2 class="text-xl font-semibold mb-4 text-white text-center">Contáctanos</h2>
        <?= form_open(url_to('landing.pages.prospects'), ['id' => 'form-contact']) ?>
        <input type="hidden" name="origin" value="<?= esc($landing['id'] ?? 'default_landing_id') ?>">
        <div class="">
            <div class=" flex items-center gap-x-2">
                <label class="w-24 text-white" for="name">Nombre*</label>
                <input type="text" id="name" name="name" class=" pl-3 w-full py-2 rounded-[8px]" required>
            </div>
            <div class=" flex items-center gap-x-2 mt-5">
                <label class="w-24 text-white" for="phone">Teléfono*</label>
                <input type="tel" id="phone" name="phone" maxLength="10" minLength="10" pattern="[0-9]{10}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class=" pl-3 w-full py-2 rounded-[8px]" required>
            </div>
            <div class=" flex items-center gap-x-2 mt-5">
                <label class="w-24 text-white" for="email">Mail*</label>
                <input type="email" id="email" name="email" class=" pl-3 w-full py-2 rounded-[8px]" required>
            </div>
            <div class=" flex items-center gap-x-2 mt-5">
                <label class=" w-24 text-white" for="">Fecha del <br> evento*</label>
                <input type="date" id="date" name="date" class=" pl-3 w-full py-2 rounded-[8px]" required>

            </div>
            <div class=" flex items-center justify-center mt-5">
                <button type="submit" class=" bg-white rounded-[40px] px-[45px] py-[10px] font-semibold hover:bg-[#de5f0f] hover:text-white transition-colors">Enviar</button>
            </div>
        </div>
        <?= form_close() ?>
        <button id="closeModal" class=" text-white absolute top-2 right-2">
            <figure>
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x w-auto h-[45px]" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                </svg>
            </figure>
        </button>
    </div>
</div>

<script>
    const modal = document.getElementById("modal");
    const openButtons = document.querySelectorAll(".open-modal-btn");
    const closeButton = document.getElementById("closeModal");

    // Abrir modal
    openButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            modal.classList.remove("opacity-0", "pointer-events-none");
            modal.classList.add("opacity-100");
            modal.querySelector("div").classList.remove("scale-95");
            modal.querySelector("div").classList.add("scale-100");
        });
    });

    // Cerrar modal
    function closeModal() {
        modal.classList.add("opacity-0", "pointer-events-none");
        modal.classList.remove("opacity-100");
        modal.querySelector("div").classList.add("scale-95");
        modal.querySelector("div").classList.remove("scale-100");
    }

    closeButton.addEventListener("click", closeModal);
    modal.addEventListener("click", (e) => {
        if (e.target === modal) closeModal(); // clic fuera del contenido
    });
</script>