<script setup>
import { useForm } from '@inertiajs/vue3'
import AuthLayout from '@/layouts/AuthLayout.vue'

const form = useForm({
  email: '',
  password: '',
  remember: false,
})

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
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
        label="Senha"
        type="password"
        required
        variant="outlined"
      />

      <v-checkbox
        v-model="form.remember"
        label="Lembrar de mim"
      />

      <v-btn
        type="submit"
        color="primary"
        block
        :loading="form.processing"
        class="mb-4"
      >
        Entrar
      </v-btn>

      <div class="text-center">
        <v-btn
          variant="text"
          :href="route('password.request')"
          class="mb-2"
        >
          Esqueceu sua senha?
        </v-btn>
        
        <v-divider class="my-4" />
        
        <v-btn
          variant="text"
          :href="route('register')"
        >
          Não tem uma conta? Registre-se
        </v-btn>
      </div>
    </v-form>
  </AuthLayout>
</template>
