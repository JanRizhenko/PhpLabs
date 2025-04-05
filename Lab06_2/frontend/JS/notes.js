document.addEventListener('DOMContentLoaded', function ()
{
   document.getElementById('createNote').addEventListener('submit', async function(e)
   {
       e.preventDefault();
       const title = document.getElementById('title').value.trim();
       const note = document.getElementById('note').value.trim()

       if (!title || !note) {
           document.getElementById('message').textContent = 'Будь ласка, заповніть всі поля.';
           return;
       }

       try
       {
           const response = await fetch('/Lab06_2/backend/add_note.php',
               {
                   method: 'POST',
                   headers: { 'Content-Type': 'application/json' },
                   body: JSON.stringify({ title: title, content: note })
               });

           const result = await response.json()
           document.getElementById('message').textContent = result.message;
           loadNotes();
       }
       catch (error)
       {
           document.getElementById('message').textContent = 'Сталася помилка при відправці запиту.';
       }
   })
});


async function loadNotes()
{
    try{
        const response = await fetch("/Lab06_2/backend/get_notes.php");
        const notes = await response.json();

        const notesList = document.getElementById('notesList');
        notesList.innerHTML = '';

        notes.forEach(note => {
            const row = document.createElement('tr');

            const dateCell = document.createElement('td');
            dateCell.textContent = note.created_at;
            row.appendChild(dateCell);

            const titleCell = document.createElement('td');
            titleCell.textContent = note.title;

            const contentCell = document.createElement('td');
            contentCell.textContent = note.content;

            const actionCell = document.createElement('td');
            const updateBtn = document.createElement('button');
            updateBtn.textContent = 'Змінити';
            updateBtn.classList.add('updateButton')
            updateBtn.onclick = () => update_note(note.id);
            actionCell.appendChild(updateBtn);

            const deleteBtn = document.createElement('button');
            deleteBtn.textContent = 'Видалити';
            deleteBtn.classList.add('deleteButton')
            deleteBtn.onclick = () => delete_note(note.id);
            actionCell.appendChild(deleteBtn);


            row.appendChild(titleCell);
            row.appendChild(contentCell);
            row.appendChild(actionCell);

            notesList.appendChild(row);
        });
    }
    catch (error)
    {
        console.error('Помилка отримання нотаток:', error);
    }
}

async function delete_note(noteId)
{
    if (!confirm('Ви впевнені, що хочете видалити цю нотатку?')) return;
    try
    {
        const response = await fetch(`/Lab06_2/backend/delete_note.php?id=${noteId}`,
            {method: 'GET',
            });
        const result = await response.json();

        if (result.success) {
            loadNotes();
        } else {
            console.error('Не вдалося видалити нотатку:', result.message);
        }
    }
    catch (error)
    {
        console.error('Сталася помилка при видаленні нотатки:', error)
    }
}
async function update_note(noteId)
{
    window.location.href = `/Lab06_2/frontend/HTML/update_note.html?id=${noteId}`;
}