import preset from '../../../../vendor/filament/filament/tailwind.config.preset'
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // // Using modern `rgb`
                // brand: "rgb(var(--color-brand) / <alpha-value>)",
                // brand1: "rgb(var(--color-brand1) / <alpha-value>)",
                // // primary: "#ef4444",
                // // success: "#13ce66",
                // // danger: "#dc2626",
                // // info: "#1fb6ff",
                // // gray: "#8492a6",
                // // warning: "#ffc82c",
                // brandRed: "#ED1B24",
                // brandBlack: "#151515",
                // brand900: "#18181B",
                // brand800: "#27272A",
                // brand700: "#3F3F46",
                // brand600: "#52525B",
                // brand500: "#71717A",
                // brand400: "#A1A1AA",
                // brand300: "#D4D4D8",
                // brand200: "#E4E4E7",
                // brand100: "#F4F4F5",
                // brand50: "#FAFAFA",
            },
            screens: {
                sm: "480px",
                md: "768px",
                lg: "976px",
                xl: "1440px",
            },
        },
    },
    plugins: [forms, typography],
}
