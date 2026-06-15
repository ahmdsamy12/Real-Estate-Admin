/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                brand: {
                    50:  '#f0f4ff',
                    100: '#e0e9ff',
                    200: '#c7d5fe',
                    300: '#a5b8fc',
                    400: '#8094f8',
                    500: '#5f6ff2',
                    600: '#4a54e8',
                    700: '#3b42cf',
                    800: '#3138a8',
                    900: '#2d3484',
                    950: '#1c1f4d',
                },
                surface: {
                    50:  '#f8fafc',
                    100: '#f1f5f9',
                    200: '#e2e8f0',
                    300: '#cbd5e1',
                },
            },
            fontFamily: {
                sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            boxShadow: {
                'card': '0 1px 3px 0 rgba(0,0,0,0.06), 0 1px 2px -1px rgba(0,0,0,0.04)',
                'card-hover': '0 4px 12px 0 rgba(0,0,0,0.08), 0 2px 4px -1px rgba(0,0,0,0.04)',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
};
