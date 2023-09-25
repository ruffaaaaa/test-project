/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'gradient-green': 'linear-gradient(10deg, #00FF00, #004225)', 
      },
     
    },
  },
  plugins: [],
}