/** @type {import('tailwindcss').Config} */
/**
 * Archivo de configuración de Tailwind CSS para el backend.
 */
module.exports = {
  content: [
    './app/Views/auth/**/*.php',
    './public/js/auth/**/*.js',
    './node_modules/flowbite/**/*.js'
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem' // < 540px
      }
    },
    extend: {}
  },
  plugins: [
    require('daisyui')
  ],
  // daisyUI config
  daisyui: {
    styled: true,
    themes: true,
    base: true,
    utils: true,
    logs: true,
    rtl: false,
    darkTheme: 'light',
    prefix: ''
  }
}
