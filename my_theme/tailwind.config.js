/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["**/*.twig", "../../../modules/**/**/*.twig"],
  darkMode: 'class',
  theme: {
    fontFamily: {
      'kumbh': ['Kumbh Sans', 'sans-serif']
    },
    extend: {
      colors: {
        violet: "#5964E0",
        light_violet: "#939BF4",
        very_dark_blue: "#19202D",
        midnight: "#121721",
        light_grey: "#F4F6F8",
        gray: "#9DAEC2",
        dark_grey: "#6E8098"
      },
    },
  },
  plugins: [],
}
