<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'

const props = defineProps({
  user: Object,
})

const form = useForm({
  name: props.user?.name || '',
  email: props.user?.email || '',
})

const submit = () => {
  form.patch(route('profile.update'))
}
</script>

<template>
  <AppLayout :user="$page.props.auth.user">
    <v-row>
      <v-col cols="12" md="8">
        <v-card>
          <v-card-title class="text-h5">
            Informações do Perfil
          </v-card-title>
          
          <v-card-text>
            <v-form @submit.prevent="submit">
              <v-text-field
                v-model="form.name"
                :error-messages="form.errors.name"
                label="Nome"
                required
                variant="outlined"
              />

              <v-text-field
                v-model="form.email"
                :error-messages="form.errors.email"
                label="Email"
                type="email"
                required
                variant="outlined"
              />

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
