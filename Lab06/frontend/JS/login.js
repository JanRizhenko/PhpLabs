document.getElementById("loginForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;

    if (!email || !password) {
        document.getElementById('message').textContent = 'Будь ласка, заповніть всі поля.';
        return;
    }

    try {
        const response = await fetch('/Lab06/backend/login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, password })
        });

        const result = await response.json();
        document.getElementById('message').textContent = result.message;

        if (result.success) {
            window.location.href = 'users.html';
        }
    } catch (error) {
        document.getElementById('message').textContent = 'Сталася помилка при вході.';
        console.error('Login error:', error);
    }
});