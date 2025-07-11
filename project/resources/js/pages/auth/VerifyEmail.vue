<script setup>
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import AuthLayout from '@/layouts/AuthLayout.vue'

const resendForm = useForm({})

const resend = () => {
  resendForm.post(route('verification.send'))
}

const logout = () => {
  router.post(route('logout'))
}
</script>

<template>
  <AuthLayout>
    <v-card-text class="text-center">
      <v-icon size="64" color="info" class="mb-4">
        mdi-email-check
      </v-icon>
      
      <h2 class="text-h5 mb-4">
        Verifique seu email
      </h2>
      
      <p class="text-body-1 mb-6">
        Obrigado por se registrar! Antes de começar, você pode verificar seu endereço de email clicando no link que acabamos de enviar para você? Se você não recebeu o email, teremos o prazer de enviar outro.
      </p>

      <v-btn
        color="primary"
        @click="resend"
        :loading="resendForm.processing"
        class="mb-4"
      >
        Reenviar email de verificação
      </v-btn>

      <v-btn
        variant="text"
        @click="logout"
        class="mb-4"
      >
        Sair
      </v-btn>
    </v-card-text>
  </AuthLayout>
</template>
