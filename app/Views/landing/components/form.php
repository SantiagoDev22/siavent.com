<div class="w-full lg:w-1/2">
    <h2 class="text-palosaltos-green-5 text-h2 text-center lg:text-left mb-6">
        Aparta tu terreno a un precio especial:
    </h2>

    <?= form_open(url_to('landing.pages.prospects'), ['id' => 'form-contact']) ?>
        <input type="hidden" name="origin" value="<?= esc($landing['id'] ?? 'default_landing_id') ?>">

        <div class="space-y-4">
            <div>
                <label for="name" class="sr-only">Nombre*</label>
                <input type="text" name="name" id="name" required placeholder="Nombre*"
                        class="w-full bg-palosaltos-green-2 rounded-lg px-4 py-3 text-palosaltos-green-5 placeholder-palosaltos-gray-2 focus:outline-none focus:ring-2 focus:ring-palosaltos-green-1 border border-transparent focus:border-palosaltos-green-1 text-p">
            </div>

            <div>
                <label for="phone" class="sr-only">Número*</label>
                <input type="tel" name="phone" id="phone" required placeholder="Número*"
                        maxLength="10" minLength="10" pattern="[0-9]{10}" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        class="w-full bg-palosaltos-green-2 rounded-lg px-4 py-3 text-palosaltos-green-5 placeholder-palosaltos-gray-2 focus:outline-none focus:ring-2 focus:ring-palosaltos-green-1 border border-transparent focus:border-palosaltos-green-1 text-p">
            </div>

            <div>
                <label for="email" class="sr-only">Mail*</label>
                <input type="email" name="email" id="email" required placeholder="Mail*"
                        class="w-full bg-palosaltos-green-2 rounded-lg px-4 py-3 text-palosaltos-green-5 placeholder-palosaltos-gray-2 focus:outline-none focus:ring-2 focus:ring-palosaltos-green-1 border border-transparent focus:border-palosaltos-green-1 text-p">
            </div>

            <div class="relative">
                <label for="estados" class="sr-only">Estado*</label>
                <select name="estados" id="estados" required
                        class="w-full appearance-none bg-palosaltos-green-2 rounded-lg px-4 py-3 text-palosaltos-green-5 focus:outline-none focus:ring-2 focus:ring-palosaltos-green-1 border border-transparent focus:border-palosaltos-green-1 text-p">
                    <option value="" disabled selected class="text-palosaltos-gray-2">Estado*</option>
                    <?php /* Asumiendo que $states está disponible en la vista */ ?>
                    <?php if (isset($states) && is_array($states)): ?>
                        <?php foreach ($states as $state) : ?>
                        <option value="<?= esc($state['id']) ?>" <?= set_select('estados', $state['id']) ?>>
                            <?= esc($state['name']) ?>
                        </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-palosaltos-green-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                </div>
            </div>
        </div>

        <div class="mt-6 text-center lg:text-left">
            <button type="submit" id="form"
                    class="inline-flex items-center justify-center px-8 py-3 bg-palosaltos-green-1 hover:bg-palosaltos-green-6 text-white font-semibold text-p rounded-lg transition-colors duration-300">
                <svg id="loading_icon" class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <span>Cotizar</span>
            </button>
        </div>

    <?= form_close() ?>
</div>