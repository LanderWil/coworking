window.addEventListener('DOMContentLoaded', function () {
    const cookieBanner = document.getElementById('cookie-banner');
    const isAccepted = localStorage.getItem('cookieAccepted');

    
    if (isAccepted === 'true') {
        cookieBanner.style.display = 'none';
    }

    
    document.getElementById('accept-btn').addEventListener('click', function () {
        
        cookieBanner.style.display = 'none';
        localStorage.setItem('cookieAccepted', 'true');
    });
});
