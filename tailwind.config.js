module.exports = {
    purge: ["./resources/views/**/*.blade.php", "./resources/css/**/*.css"],
    darkMode: "media",
    theme: {
        extend: {
            screens: {
                print: { raw: "print" }
                // => @media print { ... }
            }
        }
    },
    variants: {},
    plugins: [require("@tailwindcss/ui"), require("tailwindcss-question-mark")]
};
