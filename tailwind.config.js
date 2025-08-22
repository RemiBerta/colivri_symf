/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {      
      colors : {
      bluecolivri: '#009195',
      whitecolivri: '#fffbf8',
      pinkcolivri: '#f0a4cf',
      graycolivri:'#292d32'
    },
  },
  },
  plugins: [],
}
