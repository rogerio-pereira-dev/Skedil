<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'

const form = useForm({
  current_password: '',
  password: '',
  password_confirmation: '',
})

const submit = () => {
  form.put(route('password.update'), {
    onFinish: () => form.reset(),
  })
}
</script>

<template>
  <AppLayout :user="$page.props.auth.user">
    <v-row>
      <v-col cols="12" md="8">
        <v-card>
          <v-card-title class="text-h5">
            Alterar Senha
          </v-card-title>
          
          <v-card-text>
            <v-form @submit.prevent="submit">
              <v-text-field
                v-model="form.current_password"
                :error-messages="form.errors.current_password"
                label="Senha Atual"
                type="password"
                required
                variant="outlined"
              />

              <v-text-field
                v-model="form.password"
                :error-messages="form.errors.password"
                label="Nova Senha"
                type="password"
                required
                variant="outlined"
              />

              <v-text-field
                v-model="form.password_confirmation"
                :error-messages="form.errors.password_confirmation"
                label="Confirmar Nova Senha"
                type="password"
                required
                variant="outlined"
              />

              <v-btn
                type="submit"
                color="primary"
                :loading="form.processing"
                class="mt-4"
              >
                Alterar Senha
              </v-btn>
            </v-form>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </AppLayout>
</template>
