import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/**/*.js',                 // <- scripts (si tu utilises des classes dans du JS)
  ],

  theme: {
    extend: {
      // Couleurs utilisées partout dans la maquette
      colors: {
        space: '#0B0D17',                  // fond
        spaceText: '#D0D6F9',             // texte gris clair
      },

      // Polices de la maquette
      fontFamily: {
        sans: ['Barlow', ...defaultTheme.fontFamily.sans],
        'barlow-condensed': ['"Barlow Condensed"', ...defaultTheme.fontFamily.sans],
        bellefair: ['Bellefair', ...defaultTheme.fontFamily.serif],
      },

      // Animations utiles pour la partie 05
      keyframes: {
        fadeInUp: {
          '0%': { opacity: '0', transform: 'translateY(12px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
      },
      animation: {
        fadeInUp: 'fadeInUp 0.8s ease forwards',
        fadeIn: 'fadeIn 0.8s ease forwards',
      },

      // Optionnel : container centré
      container: {
        center: true,
        padding: '1rem',
      },
    },
  },

  plugins: [forms],
}
