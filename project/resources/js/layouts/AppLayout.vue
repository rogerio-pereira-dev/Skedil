<template>
  <v-app>
    <v-navigation-drawer
      v-model="drawer"
      :rail="rail"
      permanent
      @click="rail = false"
    >
      <v-list-item
        prepend-avatar="https://randomuser.me/api/portraits/men/85.jpg"
        :title="user?.name || 'Usuário'"
        nav
      >
        <template v-slot:append>
          <v-btn
            variant="text"
            icon="mdi-chevron-left"
            @click.stop="rail = !rail"
          />
        </template>
      </v-list-item>

      <v-divider />

      <v-list density="compact" nav>
        <v-list-item
          v-for="item in menuItems"
          :key="item.title"
          :prepend-icon="item.icon"
          :title="item.title"
          :href="item.href"
          :value="item.title"
        />
      </v-list>

      <template v-slot:append>
        <div class="pa-2">
          <v-btn
            block
            color="error"
            variant="outlined"
            @click="logout"
          >
            Sair
          </v-btn>
        </div>
      </template>
    </v-navigation-drawer>

    <v-app-bar>
      <v-app-bar-nav-icon @click="drawer = !drawer" />
      <v-app-bar-title>Skedil</v-app-bar-title>
      <v-spacer />
      
      <v-btn
        icon
        @click="toggleTheme"
      >
        <v-icon>
          {{ theme.global.current.value.dark ? 'mdi-weather-sunny' : 'mdi-weather-night' }}
        </v-icon>
      </v-btn>
    </v-app-bar>

    <v-main>
      <v-container fluid>
        <slot />
      </v-container>
    </v-main>
  </v-app>
</template>

<script setup>
import { ref } from 'vue'
import { useTheme } from 'vuetify'
import { router } from '@inertiajs/vue3'
import { route } from 'ziggy-js'

defineProps({
  user: Object,
})

const drawer = ref(true)
const rail = ref(false)
const theme = useTheme()

const menuItems = [
  {
    title: 'Dashboard',
    icon: 'mdi-view-dashboard',
    href: route('dashboard')
  },
  {
    title: 'Perfil',
    icon: 'mdi-account',
    href: route('profile.edit')
  },
  {
    title: 'Senha',
    icon: 'mdi-lock',
    href: route('password.edit')
  },
  {
    title: 'Aparência',
    icon: 'mdi-palette',
    href: route('appearance')
  }
]

const toggleTheme = () => {
  theme.global.name.value = theme.global.current.value.dark ? 'light' : 'dark'
}

const logout = () => {
  router.post(route('logout'))
}
</script> 