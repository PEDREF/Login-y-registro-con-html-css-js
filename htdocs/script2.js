const sidebar = document.querySelector('.sidebar');
const topbar = document.querySelector('.toggle-btn');
const sidebarWidth = '15%';

function toggleSidebar() {
    sidebar.style.width = sidebar.style.width === sidebarWidth ? '0' : sidebarWidth;
}

// topbar.addEventListener('click', () => {
//     if (sidebar.style.width !== '0') {
//         toggleSidebar();
//     }
// });
