/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  theme: {
    container: {
      center: true, // Центрирование контейнера
      screens: {
        sm: "576px",
        md: "720px",
        lg: "920px",
        xl: "1110px",
      },
    },
    extend: {},
  },
  plugins: [],
}

