/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**/*.blade.php", // toutes tes vues Blade
    "./resources/js/**/*.js",           // tes scripts JS
    "./resources/**/*.vue",             // si jamais tu utilises Vue
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
      backgroundImage: {
        'home': "url('/images/background-home.jpg')",
        'crew': "url('/images/background-crew.jpg')",
        'stars': "url('/images/background-stars.jpg')",
        'technology': "url('/images/technology/background-technology.jpg')",
      },
    },
  },
  plugins: [],
}
