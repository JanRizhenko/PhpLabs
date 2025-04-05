async function loadUsers() {
    try {
        const response = await fetch('/Lab06/backend/get_users.php');
        const users = await response.json();

        const userList = document.getElementById('usersList');
        userList.innerHTML = '';

        users.forEach(user => {
            const row = document.createElement('tr');

            const dateCell = document.createElement('td');
            dateCell.textContent = user.created_at;
            row.appendChild(dateCell);

            const nameCell = document.createElement('td');
            nameCell.textContent = user.name;

            const emailCell = document.createElement('td');
            emailCell.textContent = user.email;
            const actionCell = document.createElement('td');

            const updateBtn = document.createElement('button');
            updateBtn.textContent = 'Змінити';
            updateBtn.classList.add('updateButton')
            updateBtn.onclick = () => update_user(user.id);
            actionCell.appendChild(updateBtn);

            const deleteBtn = document.createElement('button');
            deleteBtn.textContent = 'Видалити';
            deleteBtn.classList.add('deleteButton')
            deleteBtn.onclick = () => deleteUser(user.id);
            actionCell.appendChild(deleteBtn);



            row.appendChild(nameCell);
            row.appendChild(emailCell);
            row.appendChild(actionCell);

            userList.appendChild(row);
        });
    } catch (error) {
        console.error('Помилка отримання користувачів:', error);
    }
}

async function deleteUser(userId) {
    if (!confirm('Ви впевнені, що хочете видалити цього користувача?')) return;

    try {
        const response = await fetch('/Lab06/backend/delete_user.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: userId })
        });

        const result = await response.json();
        alert(result.message);
        await loadUsers();
    } catch (error) {
        console.error('Помилка видалення:', error);
    }
}
function update_user(userId) {
    window.location.href = `/Lab06/frontend/HTML/update_user.html?id=${userId}`;
}
