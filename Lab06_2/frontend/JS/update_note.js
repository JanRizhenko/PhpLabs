const urlParams = new URLSearchParams(window.location.search);
const noteId = urlParams.get('id');

document.addEventListener('DOMContentLoaded', async function () {
    if (noteId) {
        try {
            const response = await fetch(`/Lab06_2/backend/get_note.php?id=${noteId}`);
            const data = await response.json();

            if (data.success) {
                document.getElementById('title').value = data.note.title;
                document.getElementById('note').value = data.note.content;
            } else {
                document.getElementById('error').textContent = data.message;
            }
        } catch (error) {
            document.getElementById('error').textContent = 'Помилка при отриманні нотатки.';
        }
    } else {
        document.getElementById('error').textContent = 'Нотатку не знайдено.';
    }
});

document.getElementById('updateNoteForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const title = document.getElementById('title').value.trim();
    const content = document.getElementById('note').value.trim();

    if (!title || !content) {
        document.getElementById('message').textContent = 'Будь ласка, заповніть всі поля.';
        return;
    }

    try {
        const response = await fetch(`/Lab06_2/backend/update_note.php?id=${noteId}`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: noteId, title, content })
        });
        const result = await response.json();

        if (result.success) {
            document.getElementById('message').textContent = 'Нотатку успішно оновлено.';

            setTimeout(() => {
                window.location.href = '/Lab06_2/frontend/HTML/notes.html';
            }, 3000);
        } else {
            document.getElementById('error').textContent = result.message;
        }
    } catch (error) {
        document.getElementById('error').textContent = 'Сталася помилка при оновленні нотатки.';
    }
});