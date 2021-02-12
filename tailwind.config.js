module.exports = {
	theme: {
		colors: {
			dark: "#2F4240",
			light: "#F7F5F2",
			greenlight: "#D9E1CC",
			green: "#98AB78",
			greendark: "#38524F",
			transparent: "transparent",
			white: "white",
		},
		container: {
			padding: {
				DEFAULT: '1.5rem',
				sm: '2rem',
				lg: '3rem',
				xl: '5vw',
			},
			center: true,
		},
		fontFamily: {
			'sans': ['"PT Sans"', 'sans-serif'],
			'serif': ['"Playfair Display"', 'serif'],
		},
		fontSize: {
			xs: ['0.8125rem', { lineHeight: '1.75' }],
			sm: ['calc(0.75rem + 0.15vw)', { lineHeight: '1.75' }],
			base: ['calc(0.80rem + 0.25vw)', { lineHeight: '1.75' }],
			lg: ['calc(1rem + 0.3vw)', { lineHeight: '1.75' }],
			xl: ['calc(1.4rem + 0.45vw)', { lineHeight: '1.1' }],
			'2xl': ['calc(1.3rem + 1.3vw)', { lineHeight: '1.1' }],
			'3xl': ['calc(1rem + 3vw)', { lineHeight: '1.1' }],
			'4xl': ['calc(0.9rem + 4.8vw)', { lineHeight: '1.1' }],
		},
		screens: {
			'sm': '640px',
			'md': '768px',
			'lg': '1024px',
			'xl': '1280px',
			'xxl': "1440px",
		},
	},
	variants: {},
	plugins: [],
	purge: [
		'./src/**/*.html',
		'./src/**/*.js',
		'./**/*.php'
	],
};
