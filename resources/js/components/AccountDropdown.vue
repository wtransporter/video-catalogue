<template>
    <div class="relative">
        <button @click="isOpen = !isOpen" class="relative z-10 block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600
            focus:outline-none focus:border-white">
            <svg class="h-full w-full object-cover" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
            </svg>
        </button>
        <button v-if="isOpen" @click="isOpen = false" tabindex="-1"
            class="fixed inset-0 h-full w-full bg-gray-900 opacity-25 cursor-default"></button>
        <div v-if="isOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl">
            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-300">Profile</a>
            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-300">Settings</a>
            <a class="block px-4 py-2 text-gray-800 hover:bg-gray-300" href="/logout"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="/logout" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isOpen: false
        }
    },
    created() {
        const handleEscape = (e) => {
            if (e.key === 'Esc' || e.key === 'Escape') {
                this.isOpen = false;
            }
        }

        document.addEventListener('keydown', handleEscape);

        this.$once('hook:beforeDestroy', () => {
            document.removeEventListener('keydown', handleEscape)
        })
    }
}
</script>