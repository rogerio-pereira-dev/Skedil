<script setup>
import AuthLayout from '@/layouts/AuthLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <AuthLayout>
        <v-form @submit.prevent="submit">
            <v-text-field v-model="form.password" :error-messages="form.errors.password" label="Senha" type="password" required variant="outlined" />

            <v-btn type="submit" color="primary" block :loading="form.processing" class="mb-4"> Confirmar </v-btn>
        </v-form>
    </AuthLayout>
</template>
