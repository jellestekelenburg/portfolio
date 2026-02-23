import { ref, computed, watch } from 'vue';

type Theme = 'light' | 'dark' | 'system';
type Resolved = 'light' | 'dark';

const selectedTheme = ref<Theme>((localStorage.getItem('theme') as Theme) || 'system');
const systemDark = ref(window.matchMedia('(prefers-color-scheme: dark)').matches);

const resolvedTheme = computed<Resolved>(() =>
    selectedTheme.value === 'system' ? (systemDark.value ? 'dark' : 'light') : selectedTheme.value
);

watch(resolvedTheme, (v) => {
    if (v === 'dark') document.documentElement.setAttribute('data-theme', 'dark');
    else document.documentElement.removeAttribute('data-theme');
}, { immediate: true });

function setTheme(theme: Theme) {
    selectedTheme.value = theme;

    if (theme === 'system') localStorage.removeItem('theme');
    else localStorage.setItem('theme', theme);
}

function setThemeOnLoad() {
    if(
        localStorage.theme === 'dark' ||
        (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        document.documentElement.setAttribute('data-theme', 'dark')
    } else {

    }
}

export function useTheme() {
    return { selectedTheme, resolvedTheme, setTheme, setThemeOnLoad };
}
