<script setup>
import AppLayout from '@/layouts/AppLayout.vue'
</script>

<template>
    <AppLayout :user="$page.props.auth.user">
        <v-row>
            <v-col cols="12">
                <v-card>
                    <v-card-title class="text-h4">
                        Dashboard
                    </v-card-title>
                    <v-card-text>
                        <p class="text-body-1">
                            Bem-vindo ao seu painel de controle!
                        </p>
                        
                        <v-row class="mt-6">
                            <v-col cols="12" md="4">
                                <v-card color="primary" dark>
                                    <v-card-title>
                                        <v-icon class="mr-2">mdi-account</v-icon>
                                        Perfil
                                    </v-card-title>
                                    <v-card-text>
                                        Gerencie suas informações pessoais
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-btn
                                            variant="outlined"
                                            :href="route('profile.edit')"
                                        >
                                            Editar Perfil
                                        </v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-col>
                            
                            <v-col cols="12" md="4">
                                <v-card color="secondary" dark>
                                    <v-card-title>
                                        <v-icon class="mr-2">mdi-lock</v-icon>
                                        Senha
                                    </v-card-title>
                                    <v-card-text>
                                        Altere sua senha de acesso
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-btn
                                            variant="outlined"
                                            :href="route('password.edit')"
                                        >
                                            Alterar Senha
                                        </v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-col>
                            
                            <v-col cols="12" md="4">
                                <v-card color="info" dark>
                                    <v-card-title>
                                        <v-icon class="mr-2">mdi-palette</v-icon>
                                        Aparência
                                    </v-card-title>
                                    <v-card-text>
                                        Personalize a aparência da aplicação
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-btn
                                            variant="outlined"
                                            :href="route('appearance')"
                                        >
                                            Configurar
                                        </v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </AppLayout>
</template>
