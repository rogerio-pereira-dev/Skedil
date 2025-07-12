<template>
    <v-app>
        <v-main>
            <v-container fluid fill-height>
                <v-row align="center" justify="center">
                    <v-col cols="12" sm="8" md="4">
                        <v-card class="elevation-12">
                            <v-toolbar color="primary" dark flat>
                                <v-toolbar-title>Skedil</v-toolbar-title>
                                <v-spacer />
                                <v-btn icon @click="toggleTheme">
                                    <v-icon>
                                        {{ theme.global.current.value.dark ? 'mdi-weather-sunny' : 'mdi-weather-night' }}
                                    </v-icon>
                                </v-btn>
                            </v-toolbar>
                            <v-card-text>
                                <slot />
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>

<script setup>
import { useTheme } from 'vuetify';

const theme = useTheme();

const toggleTheme = () => {
    theme.global.name.value = theme.global.current.value.dark ? 'light' : 'dark';
};
</script>
