/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["**/*.php", "**/*.js"],
  theme: {
    extend: {
      animation: {
        "pop-appear": "pop-appear 0.6s cubic-bezier(0.4, 0, 0.3, 1.25)",
      },
      keyframes: {
        "pop-appear": {
          "0%": { transform: "translateY(12rem)" },
          "100%": { transform: "translateY(0)" },
        },
      },
    },
  },
  plugins: [],
  prefix: "tw-",
};
