<script setup>
import AuthLayout from '@/layouts/AuthLayout.vue'
</script>

<template>
  <AuthLayout>
    <v-row justify="center">
      <v-col cols="12" class="text-center">
        <v-card-title class="text-h4 mb-4">
          Bem-vindo ao Skedil
        </v-card-title>
        
        <v-card-text>
          <p class="text-body-1 mb-6">
            Uma aplicação moderna construída com Laravel e Vuetify
          </p>
          
          <v-row justify="center" class="mb-6">
            <v-col cols="12" sm="6" md="4">
              <v-card class="pa-4">
                <v-card-title class="text-h6">
                  <v-icon class="mr-2">mdi-login</v-icon>
                  Login
                </v-card-title>
                <v-card-text>
                  Acesse sua conta existente
                </v-card-text>
                <v-card-actions>
                  <v-btn
                    color="primary"
                    block
                    :href="route('login')"
                  >
                    Entrar
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
            
            <v-col cols="12" sm="6" md="4">
              <v-card class="pa-4">
                <v-card-title class="text-h6">
                  <v-icon class="mr-2">mdi-account-plus</v-icon>
                  Registrar
                </v-card-title>
                <v-card-text>
                  Crie uma nova conta
                </v-card-text>
                <v-card-actions>
                  <v-btn
                    color="secondary"
                    block
                    :href="route('register')"
                  >
                    Registrar
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
          </v-row>
        </v-card-text>
      </v-col>
    </v-row>
  </AuthLayout>
</template>
