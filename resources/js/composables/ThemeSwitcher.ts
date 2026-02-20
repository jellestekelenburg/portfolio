function setThemeOnLoad() {
    if(
        localStorage.theme === 'dark' ||
        (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        document.documentElement.setAttribute('data-theme', 'dark')
    } else {
        document.documentElement.removeAttribute('data-theme')
    }
}

function setTheme(theme: string) {
    localStorage.theme = theme
    setThemeOnLoad()
}

function removeTheme() {
    localStorage.removeItem('theme')
    setThemeOnLoad()
}

// Backward-compatible name used by app bootstrap.

export { setThemeOnLoad, setTheme, removeTheme }
