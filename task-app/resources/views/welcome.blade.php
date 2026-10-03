<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & Laravel Task App</title>
    <!-- Hızlı ve şık görünüm için Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-10">

    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">📝 Görev Yöneticisi</h1>

        <!-- Görev Ekleme Formu -->
        <form id="taskForm" class="mb-6 flex gap-2">
            <input type="text" id="taskTitle" placeholder="Yeni bir görev yazın..." 
                class="flex-1 border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition">Ekle</button>
        </form>

        <!-- Görev Listesi -->
        <ul id="taskList" class="space-y-3">
            <li class="text-center text-gray-500">Yükleniyor...</li>
        </ul>
    </div>

    <script>
        // Sayfa yüklendiğinde görevleri getir
        document.addEventListener('DOMContentLoaded', fetchTasks);

        // 1. Görevleri API'den Çekme (GET /tasks)
        async function fetchTasks() {
            const response = await fetch('/tasks');
            const tasks = await response.json();
            const taskList = document.getElementById('taskList');
            taskList.innerHTML = '';

            if (tasks.length === 0) {
                taskList.innerHTML = '<li class="text-center text-gray-400">Henüz eklenmiş bir görev yok.</li>';
                return;
            }

            tasks.forEach(task => {
                const li = document.createElement('li');
                li.className = `flex items-center justify-between p-3 border rounded-lg ${task.is_completed ? 'bg-gray-50' : 'bg-white'}`;
                
                li.innerHTML = `
                    <div class="flex items-center gap-3">
                        <input type="checkbox" ${task.is_completed ? 'checked' : ''} 
                            onchange="toggleTask(${task.id}, this.checked)" class="w-5 h-5 text-blue-600 rounded">
                        <span class="${task.is_completed ? 'line-through text-gray-400' : 'text-gray-800'} font-medium">
                            ${task.title}
                        </span>
                    </div>
                    <button onclick="deleteTask(${task.id})" class="text-red-500 hover:text-red-700 font-bold px-2 py-1">Sil</button>
                `;
                taskList.appendChild(li);
            });
        }

        // 2. Yeni Görev Ekleme (POST /tasks)
        document.getElementById('taskForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const titleInput = document.getElementById('taskTitle');
            
            await fetch('/tasks', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ title: titleInput.value })
            });

            titleInput.value = '';
            fetchTasks();
        });

        // 3. Görev Durumu Güncelleme (PUT /tasks/{id})
        async function toggleTask(id, isCompleted) {
            await fetch(`/tasks/${id}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ is_completed: isCompleted })
            });
            fetchTasks();
        }

        // 4. Görev Silme (DELETE /tasks/{id})
        async function deleteTask(id) {
            await fetch(`/tasks/${id}`, {
                method: 'DELETE'
            });
            fetchTasks();
        }
    </script>
</body>
</html>