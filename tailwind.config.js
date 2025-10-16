
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './app/Views/landing/**/*.php',
    './public/js/landing/**/*.js',
  ],
  darkMode: 'class',
  theme: {
    screens: {
      sm: '480px',
      md: '768px',
      lg: '976px',
      xl: '1200px',
      '2xl': '1400px',
      '3xl': '1500px'
    },
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem', // < 540px
        md: '3.125rem', // 540px
        lg: '3.5rem', // 720px
        xl: '3.5rem', // 960px
        '2xl': '7.125rem' // 1140px
      }
    },
    extend: {
      fontFamily: {
        sans: ['Gordita', 'sans-serif'],
        poppins: ['Poppins', 'sans-serif'],

      },
      fontSize: {
        'H1': ['36px', {
          lineHeight: '140%',
          fontWeight: '900'
        }],
        'h1': ['28px', {
          lineHeight: '140%',
          fontWeight: '900'
        }],
        'H2': ['26px', {
          lineHeight: '140%',
          fontWeight: '900'
        }],
        'h2': ['20px', {
          lineHeight: '140%',
          fontWeight: '900'
        }],
        'P': ['18px', {
          lineHeight: '150%',
          fontWeight: '400'
        }],
        'p': ['15px', {
          lineHeight: '150%',
          fontWeight: '400'
        }],
      },
      colors: {
        one: {
          green: {
            1: '#527C45',
            2: '#F2F6F4',
            3: '#8ABF7E',
            4: '#89BE7D',
            5: '#293F3F',
            6: '#45774F',
          },
          gray: {
            1: '#E2DFF0',
            2: '#525252'
          },
          blue: {
            1: '#004677',
            2: '#01ACCA',
            3: '#CBF3F0'
          },
          yellow: {
            1: '#EFDF03',
          }
        }
      },
      backgroundImage: {
        'hero': "url('../images/index/hero.webp')",
        'blue': 'linear-gradient(90deg, #01ACCA 0.26%, rgba(1, 172, 202, 0.80) 34.57%, rgba(46, 196, 182, 0.00) 63.67%)',
        'form': "url('../images/index/background.webp')",
        'banner': "url('../images/index/banner.webp')",
      },
      boxShadow: {
        'card': '0px 0px 10px 0px #01113A26',
      }
    },
  },
  plugins: [],
}

