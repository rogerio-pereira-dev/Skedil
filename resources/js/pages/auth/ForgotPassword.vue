<script setup lang="ts">
import { useForm, usePage } from '@inertiajs/vue3'
import AuthLayout from '@/layouts/AuthLayout.vue'

const form = useForm({
  email: '',
})

const submit = () => {
  form.post(route('password.email'))
}

const page = usePage()
const status = page.props.status as string | undefined
</script>

<template>
  <AuthLayout>
    <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
      {{ status }}
    </div>
    <v-form @submit.prevent="submit">
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
        block
        :loading="form.processing"
        class="mb-4"
      >
        Enviar link de recuperação
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
