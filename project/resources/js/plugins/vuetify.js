import '@mdi/font/css/materialdesignicons.css';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import { aliases, mdi } from 'vuetify/iconsets/mdi';
import 'vuetify/styles';

export default createVuetify({
    components,
    directives,
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
            mdi,
        },
    },
    theme: {
        defaultTheme: 'dark',
        themes: {
            light: {
                colors: {
                    background: '#F3F6F8',
                    surface: '#E3E8EB',
                    'surface-variant': '#CFD8DC',
                    'surface-bright': '#78909C',
                    'on-surface': '#263238',
                    primary: '#455A64', // igual ao dark
                    'primary-darken-1': '#1A5E8A', // azul escuro, mas próximo do tom
                    secondary: '#90A4AE',
                    error: '#D32F2F',
                    success: '#388E3C',
                    warning: '#FBC02D',
                    info: '#0288D1',
                },
            },
            dark: {
                colors: {
                    background: '#12181B',
                    surface: '#1C252B',
                    'surface-variant': '#263238',
                    'surface-bright': '#B0BEC5',
                    'on-surface': '#B0BEC5',
                    primary: '#455A64',
                    'primary-darken-1': '#90A4AE',
                    secondary: '#78909C',
                    error: '#FF5252',
                    success: '#4CAF50',
                    warning: '#FFC107',
                    info: '#29B6F6',
                },
            },
        },
    },
});
