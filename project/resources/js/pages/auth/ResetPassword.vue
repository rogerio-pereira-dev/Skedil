<script setup>
import { useForm } from '@inertiajs/vue3'
import AuthLayout from '@/layouts/AuthLayout.vue'

const props = defineProps({
  email: String,
  token: String,
})

const form = useForm({
  token: props.token,
  email: props.email,
  password: '',
  password_confirmation: '',
})

const submit = () => {
  form.post(route('password.store'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  })
}
</script>

<template>
  <AuthLayout>
    <v-form @submit.prevent="submit">
      <v-text-field
        v-model="form.email"
        :error-messages="form.errors.email"
        label="Email"
        type="email"
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
        block
        :loading="form.processing"
        class="mb-4"
      >
        Redefinir Senha
      </v-btn>

      <div class="text-center">
        <v-btn
          variant="text"
          :href="route('login')"
        >
          Voltar para o login
        </v-btn>
      </div>
    </v-form>
  </AuthLayout>
</template>
