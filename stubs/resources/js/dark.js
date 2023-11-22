export function toggleDarkMode() {
    return {
        dark: document.documentElement.classList.contains('dark'),
        toggle: {
            ['@click.prevent.stop']() {
                this.$el.blur()
                if (this.dark) {
                    localStorage.theme = 'light'
                    document.documentElement.classList.remove('dark')
                } else {
                    localStorage.theme = 'dark'
                    document.documentElement.classList.add('dark')
                }
                this.dark = !this.dark
            }
        }
    }
}
