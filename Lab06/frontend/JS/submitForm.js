document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("registrationForm").addEventListener("submit", async function (e) {
        e.preventDefault();

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;

        if (!name || !email || !password) {
            document.getElementById('message').textContent = 'Будь ласка, заповніть всі поля.';
            return;
        }

        try {
            const response = await fetch('/Lab06/backend/register.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ name, email, password })
            });

            const result = await response.json();
            document.getElementById('message').textContent = result.message;
        } catch (error) {
            document.getElementById('message').textContent = 'Сталася помилка при відправці запиту.';
        }
    });
});
