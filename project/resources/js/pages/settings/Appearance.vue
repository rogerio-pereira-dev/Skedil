<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'

const form = useForm({
  theme: 'system',
})

const submit = () => {
  form.patch(route('appearance.update'))
}
</script>

<template>
  <AppLayout :user="$page.props.auth.user">
    <v-row>
      <v-col cols="12" md="8">
        <v-card>
          <v-card-title class="text-h5">
            Aparência
          </v-card-title>
          
          <v-card-text>
            <v-form @submit.prevent="submit">
              <v-card-subtitle class="px-0">
                Escolha o tema da aplicação
              </v-card-subtitle>
              
              <v-radio-group
                v-model="form.theme"
                :error-messages="form.errors.theme"
                class="mt-4"
              >
                <v-radio
                  value="light"
                  label="Claro"
                />
                <v-radio
                  value="dark"
                  label="Escuro"
                />
                <v-radio
                  value="system"
                  label="Sistema"
                />
              </v-radio-group>

              <v-btn
                type="submit"
                color="primary"
                :loading="form.processing"
                class="mt-4"
              >
                Salvar
              </v-btn>
            </v-form>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </AppLayout>
</template>
