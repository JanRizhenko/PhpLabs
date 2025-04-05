const urlParams = new URLSearchParams(window.location.search);
const userId = urlParams.get('id');

document.getElementById('userId').value = userId;

let currentName = '';
let currentEmail = '';

async function loadUserData(id) {
    try {
        const res = await fetch(`/Lab06/backend/get_user.php?id=${id}`);
        const user = await res.json();
        console.log(user);

        document.getElementById('name').value = user.name;
        document.getElementById('email').value = user.email;

        currentName = user.name;
        currentEmail = user.email;
    } catch (error) {
        document.getElementById('message').textContent = 'Помилка при завантаженні даних.';
    }
}

document.getElementById('updateForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const id = document.getElementById('userId').value;
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password')?.value.trim();

    if (!name || !email) {
        document.getElementById('message').textContent = 'Будь ласка, заповніть всі обовʼязкові поля.';
        return;
    }

    const dataToSend = {
        id,
        name: name || currentName,
        email: email || currentEmail
    };

    if (password) {
        dataToSend.password = password;
    }

    try {
        const response = await fetch('/Lab06/backend/update_user.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(dataToSend)
        });

        const result = await response.json();
        document.getElementById('message').textContent = result.message;
    } catch (error) {
        document.getElementById('message').textContent = 'Помилка при оновленні.';
    }
});

if (userId) {
    loadUserData(userId);
} else {
    document.getElementById('message').textContent = 'ID користувача не вказано в URL.';
}
