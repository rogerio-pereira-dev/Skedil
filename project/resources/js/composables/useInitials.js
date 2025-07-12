export function getInitials(fullName) {
    if (!fullName) return '';

    const names = fullName.trim().split(' ');
    const initials = names
        .map((name) => name.charAt(0))
        .join('')
        .toUpperCase();

    return initials.slice(0, 2);
}

export function useInitials() {
    return { getInitials };
}
